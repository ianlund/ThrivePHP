<?
	class Router {
		public $viewPath;
		public $arguments;
		public function __construct() {
			$this->arguments = array();
			if(isset($_SERVER['PATH_INFO'])) {
				$segments = explode('/', $_SERVER['PATH_INFO']);
				array_shift($segments);
				$arguments = array();
				while(count($segments) && empty($this->viewPath)) {
					$path = PATH_BASE.'/views/'.implode($segments, '/');
					if(is_file($path.'.php')) {
						$this->viewPath = $path.'.php';
					} elseif(is_file($path.'/index.php')) {
						$this->viewPath = $path.'/index.php';
					} else {
						array_unshift($this->arguments, array_pop($segments));
					}
				}
			}
			if(!$this->viewPath)
				$this->viewPath = PATH_BASE.'/views/index.php';
			if(!is_file($this->viewPath))
				throw new Exception("Sorry, I'm not sure what you're looking for");
		}
		function arg($index) { return (isset($this->arguments[$index]) ? $this->arguments[$index] : null); }
	}