<?php
// +----------------------------------------------------------------------
// | 路由
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
use \NoahBuscher\Macaw\Macaw;
//基础用法
/*Macaw::get('/', function() {
  echo 'Hello world!';
});*/
Macaw::get('/', 'app\controllers\index\index@index');
// Macaw::get('/demo/(:num)', 'app\controllers\index\index@demo');
Macaw::get('/demo', 'app\controllers\index\index@demo');
Macaw::dispatch();