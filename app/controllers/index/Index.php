<?php
namespace app\controllers\index;
use core\fast\Controller;
use core\fast\Upload;
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
		// debug(new Upload());
		//获取地理位置
		// dump(get_position('127.0.0.1'));
		//通过table查询数据
		// dump(Db::table('user')->get());
		//通过model查询数据
		// dump(User::all());
		$this->assign('data','index');
		return $this->view();
	}
/*	public function demo($id){
		dump($id);
		return $this->view();
	}*/
	public function demo(){
		// 上传文件;
		// $uuu = new Upload();
		// debug($uuu->upload('file'));
		// echo $uuu->getError();
		// echo $uuu->getLastName();
		// return $this->view('demo');
	}
}