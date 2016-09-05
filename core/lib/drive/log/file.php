<?php

namespace core\lib\drive\log;

use core\lib\conf;

// 文件系统
class file {
	
	public $path;
	
	public function __construct() {
		$conf = conf::get('OPTION', 'log');
		$this->path = $conf['PATH'];
	}
	
	public function log($message, $file = 'log') {
		/**
		 * 1、确定文件存储位置是否存在
		 *  新建目录
		 * 2、写入配置
		 */
		if(!is_dir($this->path)) {
			mkdir($this->path, '0777', true);
		}
		file_put_contents($this->path.date('YmdH').$file.'.log', date('Y-m-d H:i:s').json_encode($message).PHP_EOL, FILE_APPEND);
	}
	
}






