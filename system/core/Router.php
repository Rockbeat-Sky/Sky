<?php
namespace Sky\core;

class Router extends BaseClass{
	public $requires = [
		'Sky.core.URI'
	];

	/**
	 * Config class
	 *
	 * @var object
	 * @access public
	 */
	public $_config = [
		'controller_folder' => 'controller',
		'default_controller' => 'welcome',
		'default_method'	=> 'index',
		'404_override' => '',
		'map' => []
	];
	/**
	 * List of routes
	 *
	 * @var array
	 * @access public
	 */
	var $routes			= array();
	/**
	 * List of error routes
	 *
	 * @var array
	 * @access public
	 */
	var $error_routes	= array();
	/**
	 * Current class name
	 *
	 * @var string
	 * @access public
	 */
	var $class			= '';
	/**
	 * Current method name
	 *
	 * @var string
	 * @access public
	 */
	var $method			= '';
	/**
	 * Sub-directory that contains the requested controller class
	 *
	 * @var string
	 * @access public
	 */
	var $directory		= '';
	/**
	 * Constructor
	 *
	 * Runs the route mapping function.
	 */
	public $segments = [];
	
	public $app_path = APP_PATH;
	 
	function __construct($conf = []){
		parent::__CONSTRUCT($conf);
		$this->uri = create_class('Sky.core.URI');
		
		// get config routes.php
		$this->routes = get_config('App.config.Routes');
		
		$this->method = $this->getConfig('default_method');
		$this->class = $this->getConfig('default_controller');
		
		if (!$this->class){
			user_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
			exit;
		}
		$this->_initialize();
		
	}

	// --------------------------------------------------------------------

	/**
	 * Set the route mapping
	 *
	 * This function determines what should be served based on the URI request,
	 * as well as any "routes" that have been set in the routing config file.
	 *
	 * @access	private
	 * @return	void
	 */
	protected function _initialize(){

		// Fetch the complete URI string
		$this->uri->_fetch_uri_string();
		
		// Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
		if ($this->uri->uri_string == ''){
			return $this->uri->_reindex_segments();
		}

		// Do we need to remove the URL suffix?
		$this->uri->_remove_url_suffix();

		// Compile the segments into an array
		$this->uri->_explode_segments();
		
		// Set Segments
		$this->segments = $this->uri->segments;
		
		// Parse any custom routing that may exist
		$this->_parseRoutes();

		// Re-index the segment array so that it starts with 1 rather than 0
		$this->uri->_reindex_segments();

	}


	// --------------------------------------------------------------------

	/**
	 * Set the Route
	 *
	 * This function takes an array of URI segments as
	 * input, and sets the current class/method
	 *
	 * @access	private
	 * @param	array
	 * @param	bool
	 * @return	void
	 */
	function _setRequest($segments = array()){
		$segments = $this->_validate_request($segments);
		if (count($segments) == 0)
		{
			return $this->uri->_reindex_segments();
		}

		$this->class = $segments[0];

		if (isset($segments[1]))
		{
			// A standard method request
			$this->method = $segments[1];
		}
		else
		{
			// This lets the "routed" segment array identify that the default
			// index method is being used.
			$segments[1] = 'index';
		}

		// Update our "routed" segment array to contain the segments.
		// Note: If there is no custom routing, this array will be
		// identical to $this->uri->segments
		$this->uri->rsegments = $segments;
	}

	// --------------------------------------------------------------------

	/**
	 * Validates the supplied segments.  Attempts to determine the path to
	 * the controller.
	 *
	 * @access	private
	 * @param	array
	 * @return	array
	 */
	function _validate_request($segments){
		if (count($segments) == 0){
			user_error('No Segments');
			exit;
		}
		$controller_path = $this->app_path.$this->getConfig('controller_folder').DS;
		
		// Does the requested controller exist in the root folder?
		if (file_exists($controller_path.ucfirst($segments[0]).'.php')){
			return $segments;
		}

		// Is the controller in a sub-folder?
		if (is_dir($controller_path.$segments[0]))
		{
			// Set the directory and remove it from the segment array
			$this->set_directory($segments[0]);

			$segments = array_slice($segments, 1);

			if (count($segments) > 0){
				// Does the requested controller exist in the sub-folder?
				if ( ! file_exists($controller_path.$this->directory.$segments[0].'.php')){
					if ( ! $this->getConfig('404_override')){
						$x = explode('/', $this->getConfig('404_override'));
						$this->set_directory('');
						$this->class = $x[0];
						$this->method = isset($x[1]) ? $x[1] : 'index';

						return $x;
					}
					else{
						show_404($this->fetch_directory().$segments[0]);
					}
				}
			}
			else
			{
				// Is the method being specified in the route?
				if (strpos($this->class, '/') !== FALSE)
				{
					$x = explode('/', $this->default_controller);

					$this->class = $x[0];
					$this->method = $x[1];
				}

				// Does the default controller exist in the sub-folder?
				if ( ! file_exists($controller_path.$this->directory.$this->class.'.php'))
				{
					$this->directory = '';
					return [];
				}

			}

			return $segments;
		}
		
		// Nothing else to do at this point but show a 404
		user_error('Page Not Found 404');
		//user_error($segments[0]);
	}

	// --------------------------------------------------------------------

	/**
	 *  Parse Routes
	 *
	 * This function matches any routes that may exist in
	 * the config/routes.php file against the URI to
	 * determine if the class/method need to be remapped.
	 *
	 * @access	private
	 * @return	void
	 */
	function _parseRoutes(){
		$routes = $this->getConfig('map');
		
		$uri = implode('/',$this->segments);
		
		if(isset($routes[$this->uri->segments[0].'->vendor'])){
			$this->app_path = VENDOR_PATH.$routes[$this->uri->segments[0].'->vendor'].DS;
			array_shift($this->segments);
		}
		// Is there a literal match?  If so we're done
		elseif (isset($routes[$uri])){
			explode('/', $routes[$uri]);
			return $this->_setRequest(explode('/', $routes[$uri]));
		}
		
		// Loop through the route array looking for wild-cards
		foreach ($routes as $key => $val)
		{
			// Convert wild-cards to RegEx
			$key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));

			// Does the RegEx match?
			if (preg_match('#^'.$key.'$#', $uri))
			{
				// Do we have a back-reference?
				if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
				{
					$val = preg_replace('#^'.$key.'$#', $val, $uri);
				}

				return $this->_set_request(explode('/', $val));
			}
		}
		// If we got this far it means we didn't encounter a
		// matching route so we'll set the site default route
		$this->_setRequest($this->segments);
		
	}
	// --------------------------------------------------------------------

	/**
	 *  Set the directory name
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_directory($dir){
		$this->directory = str_replace(array('/', '.'), '', $dir).DS;
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 *  Set the controller overrides
	 *
	 * @access	public
	 * @param	array
	 * @return	null
	 */
	function _set_overrides($routing){
		if ( ! is_array($routing)){
			return;
		}

		if (isset($routing['directory'])){
			$this->set_directory($routing['directory']);
		}

		if (isset($routing['controller']) AND $routing['controller'] != ''){
			$this->set_class($routing['controller']);
		}

		if (isset($routing['function'])){
			$routing['function'] = ($routing['function'] == '') ? 'index' : $routing['function'];
			$this->set_method($routing['function']);
		}
	}
	public function getPath(){
		return $this->app_path.$this->getConfig('controller_folder').DS.$this->directory.$this->class.'.php';
	}

}
// END Router Class

/* End of file Router.php */
/* Location: ./system/core/Router.php */