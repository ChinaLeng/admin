<?php
namespace app\controllers\index;
use core\fast\Controller;
use app\model\User;

class Index extends Controller
{
	public function __construct($module,$controller,$action)
	{
		parent::__construct($module,$controller,$action);
	}
	public function index(){
		$user = new User();
		// debug($user->insertOne([['textname'=>'测试2'],['textname'=>'测试3']]));
		$this->assign('data','index');
		return $this->view();
	}
	public function demo(){
		return $this->view();
	}
}