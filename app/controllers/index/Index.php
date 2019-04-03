<?php
namespace app\controllers\index;
use core\fast\Controller;
use app\model\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class Index extends Controller
{
	public function __construct($module,$controller,$action)
	{
		parent::__construct($module,$controller,$action);
	}
	public function index(){
		//通过table查询数据
		dump(Capsule::table('user')->get());
		//通过model查询数据
		dump(User::all());
		$this->assign('data','index');
		return $this->view();
	}
	public function demo(){
		return $this->view();
	}
}