<?php
namespace core\fast;
use core\fast\Conf;

class View 
{
	public  $_assign = [];
	public  $_module;
	public  $_controller;
	public  $_action;
	public function __construct()
	{
		$this->get_module();
		// $this->_module     = strtolower(Conf::get('default_module'));
		$this->_controller = strtolower(Conf::get('default_controller'));
		$this->_action     = strtolower(Conf::get('default_action'));
	}
	//存储变量
	public function assign($name,$value){
		$this->_assign[$name] = $value;
	}
	//渲染视图
	public function view($views = ''){
		//是否自定义视图
		if(!empty($views)){
			$this->view_explode($views);
		}
		$file = APP_PATH . '/' . Conf::get('view_path').'/'.$this->_module.'/'.$this->_controller.'/'.$this->_action.'.html';
		//判断视图是否存在
		if(is_file($file)){
			$view = $this->_module.'/'.$this->_controller.'/'.$this->_action.'.html';
			$loader = new \Twig\Loader\FilesystemLoader(APP_PATH.'/' . Conf::get('view_path'));
			$twig = new \Twig\Environment($loader, [
			    'cache' => APP_PATH.'/' . Conf::get('view_log'),//模板缓存存在
			    'debug' => Conf::get('view_debug'),//调试模式
			]);
			echo $twig->render($view,$this->_assign);
/*			$template = $twig->load($view);
			$template->display();*/
		}else{
			throw new \Exception("找不到视图文件".$this->_module.'/'.$this->_controller.'/'.$this->_action.'.html');
		}
	}
	//不使用默认模板就分割
	public function view_explode($views){
		$viewarray = explode('/',$views);
		$viewarray = array_filter($viewarray);
		if(count($viewarray) == 3){
			$this->_module = array_shift($viewarray);
		}
		krsort($viewarray);
		if(!empty($viewarray)){
			$this->_action = array_shift($viewarray);
		}
		if(!empty($viewarray)){
			$this->_controller = array_shift($viewarray);
		}
	}

	public function get_module(){
		$modulearry = get_class($this);
		$modulearry = explode('\\', $modulearry);
		$modulearry = array_filter($modulearry);
		$this->_module = strtolower(end($modulearry));
	}
}