<?php

function p($var) {
	if(is_bool($var)) {
		var_dump($var);
	} else if(is_null($var)) {
		var_dump(NULL);
	} else {
		echo "<pre>" . print_r($var, true) . "</pre>";
	}
}

function pe($var) {
	p($var);
	exit();
}

function post($name, $default=false, $filter=false) {
	if(isset($_POST[$name])) {
		if($filter) {
			switch($filter){
				case 'int':
					if(is_numeric($_POST[$name])) {
						return $_POST[$name];
					} else {
						return $default;
					}
				break;
				default: ;
			}
		} else {
			return $_POST[$name];
		}
	} else {
		return $default;
	}
}

function get($name, $default=false, $filter=false) {
	if(isset($_GET[$name])) {
		if($filter) {
			switch($filter){
				case 'int':
					if(is_numeric($_GET[$name])) {
						return $_GET[$name];
					} else {
						return $default;
					}
				break;
				default: ;
			}
		} else {
			return $_GET[$name];
		}
	} else {
		return $default;
	}
}

function jump($url) {
	header("Location: " . $url);
	exit();
}

