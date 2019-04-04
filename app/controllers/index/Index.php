<?php
namespace app\controllers\index;
use core\fast\Controller;
use app\model\User;
use Illuminate\Database\Capsule\Manager as Db;

class Index extends Controller
{
/*	public function __construct($module,$controller,$action)
	{
		parent::__construct($module,$controller,$action);
	}*/
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		//通过table查询数据
		dump(Db::table('user')->get());
		//通过model查询数据
		dump(User::all());
		$this->assign('data','index');
		return $this->view('index/demo');
	}
/*	public function demo($id){
		dump($id);
		return $this->view();
	}*/
	public function demo(){
		return $this->view();
	}
}