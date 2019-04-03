<?php
namespace core\fast;
/**
 * 已废弃
 */
class Sql extends Db
{	
	// 数据库表名
	protected $table;
	// 要查询的字段
	protected $columns;
	// 数据库主键
	protected $primary = 'id';
	private $filter = '';
	public function __construct()
	{
		parent::__construct();
	}
	//获取所有列表
	public function getList($columns = "*",$where=[]){
		$ret = $this->select($this->table,$columns,$where);
		return $ret;
	}
	//根据主键获取一条信息
	public function getOne($id,$columns = "*"){
		$ret = $this->get($this->table,$columns,[$this->primary=>$id]);
		return $ret;
	}
	//插入数据
	public function insertOne($oneArray){
		$ret = $this->insert($this->table,$oneArray);
		return $ret;
	}

}