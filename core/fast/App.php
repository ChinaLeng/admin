<?php
namespace core\fast;

/**
 * 
 */
class App 
{
	
	public function __construct()
	{
		# code...
	}
	public static function run( ){ 
		spl_autoload_register('self::loadClass');
		self::setReporting();
		new \dhdgsdv\dhcb();
	}
	public static function loadClass($className){
		echo $className;
	}
	    // 检测开发环境
    public static function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
        }
    }
}