<?
	class Load {
		static function view($name, $data=array(), $return=false) {
			$path = THRIVE_USER."/views/".$name.".php";
			if(!file_exists($path)) throw new Exception('Could not find view ('.$name.').');
			if(!empty($data)) extract($data);
			ob_start();
			require($path);
			$buffer = ob_get_contents();
			@ob_end_clean();
			if($return) return $buffer;
			print $buffer;
		}
		static function model($name) {
			$path = NULL;
			if(file_exists(THRIVE_USER."/models/".$name.".php")) {
				$path = THRIVE_USER.'/models/'.$name.'.php';
				require_once($path);
				return;
			}
			if(file_exists(THRIVE_SYSTEM."/models/".$name.".php")) {
				$path = THRIVE_SYSTEM.'/models/'.$name.'.php';
				require_once($path);
				return;
			}
			throw new Exception("Could not find model '$name'.");
		}
		static function library($name) {
			$path = NULL;
			if(file_exists(THRIVE_USER.'/libraries/'.$name.'.php')) {
				$path = THRIVE_USER.'/libraries/'.$name.'.php';
				require_once($path);
				return;
			}
			if(file_exists(THRIVE_SYSTEM.'/libraries/'.$name.'.php')) {
				$path = THRIVE_SYSTEM.'/libraries/'.$name.'.php';
				require_once($path);
				return;
			}
			throw new Exception("Could not find model '$name'.");
		}
		static function other($name) {
			$path = THRIVE_SYSTEM."/".$name.".php";
			if(!file_exists($path)) die('Could not find file. '.print_p(debug_backtrace()));
			require_once($path);
		}
	}