<?php
namespace app\controllers;
use core\fast\Sql;
class Index 
{
	public function index(){
		$table = new Sql();
		$name = $table->getOne(1);
		debug($name);
	}
}