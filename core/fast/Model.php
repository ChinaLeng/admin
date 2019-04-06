<?php
// +----------------------------------------------------------------------
// | 模型类基类
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
namespace core\fast;
// use core\fast\Sql;
use Illuminate\Database\Eloquent\Model as Models;


class Model extends Models{
	protected $model;
	protected $table = null;
	public $timestamps  = false;
	public function __construct(){
		new \core\fast\Db();
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