<?php
//入口文件
define('APP_PATH', str_replace('\\','/',realpath(__DIR__ . '/../')));//定义根目录
define('CORE', APP_PATH.'/core');//定义框架核心目录
require CORE.'/base.php';