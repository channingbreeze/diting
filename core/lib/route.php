<?php

namespace core\lib;

use core\lib\conf;

class route {
	
	public $ctrl;
	public $action;
	
	public function __construct() {
		/**
		 * 1、隐藏index.php
		 * 2、获取URL参数
		 * 3、返回对应的控制器和方法
		 */
		if(isset($_SERVER['REQUEST_URI']) 
			&& $_SERVER['REQUEST_URI'] != '/') {
			$path = $_SERVER['REQUEST_URI'];
			$pathArr = explode('/', trim($path, '/'));
			if(isset($pathArr[0])) {
				$this->ctrl = $pathArr[0];
			}
			if(isset($pathArr[1])) {
				$this->action = $pathArr[1];
			} else {
				$this->action = conf::get('ACTION', 'route');
			}
			// url多余部分转换成get
			$count = count($pathArr);
			$i = 2;
			while($i < $count) {
				if(isset($pathArr[$i + 1])) {
					$_GET[$pathArr[$i]] = $pathArr[$i + 1];
				}
				$i = $i + 2;
			}
		} else {
			$this->ctrl = conf::get('CTRL', 'route');;
			$this->action = conf::get('ACTION', 'route');;
		}
	}

}