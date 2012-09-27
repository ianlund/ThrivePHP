<?
	// load base setup
	require_once(PATH_BASE.'/config/setup-base.php');
	/*
		setup defaults that are dependent on the web server

		Using this URL: http://fqdn.com/app/index.php/path/to/view?key=value
		URI_HOST:	fqdn.com
		URI_BASE:	/app
		URI_SELF:	/app/index.php/path/to/view
		URI_SCRIPT:	/app/index.php
		URI_INFO:	/path/to/view
		URI_FULL:	/app/index.php/path/to/view?key=value
		URI_QUERY:	key=value
	*/
	define('URI_HOST', $_SERVER['HTTP_HOST']);
	define('URI_BASE', (dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME'])));
	define('URI_SELF', $_SERVER['PHP_SELF']);
	define('URI_SCRIPT', $_SERVER['SCRIPT_NAME']);
	define('URI_INFO', (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : ''));
	define('URI_FULL', $_SERVER['REQUEST_URI']);
	define('URI_QUERY', $_SERVER['QUERY_STRING']);
?>
