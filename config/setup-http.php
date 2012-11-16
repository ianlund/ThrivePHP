<?
	try {
		// load base setup
		require_once(THRIVE_SYSTEM.'/config/setup-script.php');
		/*
			setup defaults that are dependent on the web server
		
			Using this URL: http://fqdn.com/app/index.php/path/to/view?key=value
			THRIVE_HOST:	fqdn.com
			THRIVE_BASE:	/app
			THRIVE_SELF:	/app/index.php/path/to/view
			THRIVE_SCRIPT:	/app/index.php
			THRIVE_INFO:	/path/to/view
			THRIVE_FULL:	/app/index.php/path/to/view?key=value
			THRIVE_QUERY:	key=value
		*/
		define('THRIVE_HOST', $_SERVER['HTTP_HOST']);
		define('THRIVE_BASE', (dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME'])));
		define('THRIVE_SELF', $_SERVER['PHP_SELF']);
		define('THRIVE_SCRIPT', $_SERVER['SCRIPT_NAME']);
		define('THRIVE_INFO', (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : ''));
		define('THRIVE_FULL', $_SERVER['REQUEST_URI']);
		define('THRIVE_QUERY', $_SERVER['QUERY_STRING']);
		if(is_file(THRIVE_USER.'/config/config.php'))
			require_once(THRIVE_USER.'/config/config.php');
		require_once(THRIVE_SYSTEM.'/config/setup-http.php');
		$RTR = new Router();
		require_once($RTR->viewPath);
	} catch(Exception $e) {
		$file = $line = null;
		if(!headers_sent($file, $line)) {
			print "<h1>404 Error</h1>".
				"<pre>Message: ".$e->getMessage()."\n".print_r($e->getTraceAsString(), 1)."</pre>";
		} else {
			print "Headers sent. File: $file, line: $line";
			print "<pre>".$e->getMessage()."\n".print_r($e->getTraceAsString(), 1)."</pre>";
		}
	}