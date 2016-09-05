<?php

namespace core\lib;

use core\lib\conf;

class model extends \medoo {
	
	public function __construct() {
		
		/*$database = conf::all('database');
		
		try {
			parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
		} catch(\PDOException $e) {
			p($e->getMessage());
		}*/
		
		$option = conf::all('database');
		parent::__construct($option);
	}
	
}