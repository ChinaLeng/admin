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
		$dbtab = Conf::all('Database');
		parent::__construct($dbtab);
	}

}