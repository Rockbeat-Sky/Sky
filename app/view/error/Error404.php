<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $heading; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo _publicUrl('font/orbitron/sky.font.orbitron.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo _publicUrl('css/sky.style.css');?>" />
<style type="text/css">

body {
	margin: 40px;
	color: #fff;
	background: #00aeef;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h2 {
	color: #fff;
	background-color: transparent;
	border-bottom: 1px solid #fff;
	font-size: 19px;
	font-weight: normal;
	padding: 14px 15px 10px 15px;
	margin-bottom:5px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
}

p {
	margin: 12px 15px 12px 15px;
}
.body-content{
	padding:10px 14px;
}
pre{
	width:500px;
	background:#0099ef;
	padding:10px;
	overflow:auto;
	width:100%;
}
</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Sky Framework</h1>
		</div>

		<h2><?php echo $heading; ?></h2>
		<div class="body-content"><?php echo $message; ?></div>
		
	</div>
</body>
</html>