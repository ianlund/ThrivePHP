<?
	/*
		This file should be renamed to index.php and moved to the site's web root.
		THRIVE_SYSTEM should be changed to point the thrive directory relative to the web root.
	*/
	
	define('THRIVE_ROOT', __DIR__);
	define('THRIVE_SYSTEM', THRIVE_ROOT.'/thrive');
	define('THRIVE_USER', THRIVE_ROOT);
	
	try {
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
