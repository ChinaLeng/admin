<?php
//入口文件
define('APP_PATH', str_replace('\\','/',dirname(__FILE__)));//定义根目录
define('CORE', APP_PATH.'/core');//定义框架核心目录
define('APP', 'app\\');
define('APP_DEBUG', true);

include CORE.'/common/function.php';
// debug(APP_PATH);
include CORE.'/fast/App.php';
\core\fast\APP::run();