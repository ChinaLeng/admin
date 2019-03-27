<?php
namespace core\fast;
use core\fast\Conf;
use Medoo\Medoo;
/**
*数据库的链接
**/
class Db extends Medoo
{
	public function __construct()
	{
		//获取数据库配置信息,链接数据库
		$dbtab = Conf::all('Database');
		parent::__construct($dbtab);
	}

}