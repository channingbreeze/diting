<?php
/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */

define('DITING', dirname(__FILE__));
define('CORE', DITING.'/core');
define('APP', DITING.'/app');
define('MODULE', 'app');

define('DEBUG', true);

include 'vendor/autoload.php';

if(DEBUG) {
	$whoops = new \Whoops\Run;
	$errorTitle = 'DITING出错啦';
	$options = new \Whoops\Handler\PrettyPageHandler;
	$options->setPageTitle($errorTitle);
	$whoops->pushHandler($options);
	$whoops->register();
	ini_set('display_error', 'On');
} else {
	ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';

include CORE.'/diting.php';

spl_autoload_register('\core\diting::load');

\core\diting::run();



