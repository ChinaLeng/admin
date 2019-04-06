<?php
// +----------------------------------------------------------------------
// | 数据库连接
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
namespace core\fast;
use core\fast\Conf;
// use Medoo\Medoo;
use Illuminate\Database\Capsule\Manager as Capsule;

class Db 
{
	public function __construct()
	{
		//获取数据库配置信息,链接数据库
		$dbtab = Conf::all('Database');
		// parent::__construct($dbtab);
		$capsule = new Capsule;
		$capsule->addConnection($dbtab);
		$capsule->setAsGlobal();
		$capsule->bootEloquent();

	}

}