<?
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
