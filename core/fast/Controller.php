<?php
namespace core\fast;

class Controller extends View
{
	public  $_module;
	public  $_controller;
	public  $_action;
	//new View的时候传入默认的视图
	public function __construct($module='',$controller='',$action='')
	{
		$this->_module     = $module;
		$this->_controller = $controller;
		$this->_action     = $action;
		new View($module,$controller,$action);
	}
}