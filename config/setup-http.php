<?
	try {
		
		// load base setup
		require_once(THRIVE_SYSTEM.'/config/setup-script.php');
		
		// setup http defines, use this example url: http://fqdn.com/app/index.php/path/to/view?key=value
		define('THRIVE_HOST', $_SERVER['HTTP_HOST']); // fqdn.com
		define('THRIVE_BASE', (dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME']))); // /app
		define('THRIVE_SELF', $_SERVER['PHP_SELF']); // /app/index.php/path/to/view
		define('THRIVE_SCRIPT', $_SERVER['SCRIPT_NAME']); // /app/index.php
		define('THRIVE_INFO', (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '')); // /path/to/view
		define('THRIVE_FULL', $_SERVER['REQUEST_URI']); // /app/index.php/path/to/view?key=value
		define('THRIVE_QUERY', $_SERVER['QUERY_STRING']); // key=value
		
		// setup user config if exists
		if(is_file(THRIVE_USER.'/config/config.php'))
			require_once(THRIVE_USER.'/config/config.php');
			
		// load view
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