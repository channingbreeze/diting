<?php

namespace core;

class diting {
	
	static public $classMap = array();
	static public function run() {
		\core\lib\log::init();
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$wholeCtrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		if(is_file($ctrlFile)) {
			include $ctrlFile;
			$ctrl = new $wholeCtrlClass();
			$ctrl->$action();
			\core\lib\log::log('ctrl:'.$ctrlClass.' action:'.$action);
		} else {
			throw new \Exception('找不到控制器'.$ctrlClass);
		}
	}
	
	static public function load($class) {
		// 自动加载类库
		if(isset($classMap[$class])) {
			return true;
		} else {
			$class = str_replace('\\', '/', $class);
			$file = DITING.'/'.$class.'.php';
			if(is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}
	}
	
	public $assign = array();
	public function assign($name, $value) {
		$this->assign[$name] = $value;
	}
	
	public function display($file) {
		/*$file = APP.'/views/'.$file;
		if(is_file($file)) {
			extract($this->assign);
			include $file;
		}*/
		$file = APP.'/views/'.$file;
		if(is_file($file)) {
			
			\Twig_Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP.'/views');
			$twig = new \Twig_Environment($loader);
			$template = $twig->loadTemplate('index.html');
			$template->display($this->assign?$this->assign:array());
		}
	}
	
}
