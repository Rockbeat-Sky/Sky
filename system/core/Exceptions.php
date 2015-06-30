<?php
namespace Sky\core;

class Exceptions extends BaseClass{
	function show_404($page = '', $log_error = TRUE)
	{
		$heading = "404 Page Not Found";
		$message = "The page you requested was not found.";

		// By default we log this, but allow a dev to skip it
		if ($log_error)
		{
			log_message('error', '404 Page Not Found --> '.$page);
		}

		//echo $this->show_error($heading, $message, 'error_404', 404);
		user_errro('Page Not Found');
		exit;
	}
}