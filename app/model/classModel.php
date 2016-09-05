<?php

namespace app\model;

class classModel extends \core\lib\model {
	
	public $table = 't_class';
	
	public function lists() {
		$ret = $this->select($this->table, '*');
		return $ret;
	}
	
}