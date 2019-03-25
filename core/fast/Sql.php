<?php
namespace core\fast;
/**
 * 
 */
class Sql extends Db
{	
	// 数据库表名
	protected $table='user';
	// 要查询的字段
	protected $columns;
	// 数据库主键
	protected $primary = 'id';
	private $filter = '';
	public function __construct()
	{
		parent::__construct();
	}
	public function getList($columns = "*",$where=[]){
		$ret = $this->select($this->table,$columns,$where);
		return $ret;
	}
	public function getOne($id,$columns = "*"){
		$ret = $this->get($this->table,$columns,[$this->primary=>$id]);
		return $ret;
	}

}