<?
	define('PATH_BASE', __DIR__);
	require_once(PATH_BASE.'/config/config.php');
	require_once(PATH_BASE.'/config/setup-http.php');
	$RTR = new Router();
	require_once($RTR->viewPath);