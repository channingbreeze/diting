<?php

namespace app\ctrl;

class indexCtrl extends \core\diting {
	
	public function index() {
		
		/*$model = new \core\lib\model();
		$sql = 'select * from t_class';
		$ret = $model->query($sql);
		p($ret->fetchAll());*/
		
		$data = 'Hello World';
		$this->assign('data', $data);
		$this->display('index.html');
		
		/*$model = new \app\model\classModel();
		
		$data = $model->lists();
		dump($data);*/
		
	}
	
	public function test() {
		$data = 'Test';
		$this->assign('data', $data);
		$this->display('test.html');
	}
	
}




