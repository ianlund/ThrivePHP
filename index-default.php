<?
	/*
		This file should be renamed to index.php and moved to the site's web root.
		THRIVE_SYSTEM should be changed to point the thrive directory relative to the web root.
	*/
	
	define('THRIVE_ROOT', __DIR__);
	define('THRIVE_SYSTEM', THRIVE_ROOT.'/thrive');
	define('THRIVE_USER', THRIVE_ROOT);
	
	require_once(THRIVE_SYSTEM.'/config/setup-http.php');