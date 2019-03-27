<?php
namespace core\fast;
use core\fast\Sql;

class Model extends Sql{
	protected $model;
	public function __construct(){
		parent::__construct();
		//如果没有设置表名
		if(!$this->table){
			//获取模型名称
			$this->model = get_class($this);
			$this->model = substr($this->model,strrpos($this->model,'\\')+1);
			//名称转成小写,和数据库表名一致
			$this->table = strtolower($this->model);
		}
	}
}