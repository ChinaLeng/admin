<?php
namespace core\fast;
use core\fast\Conf;
/**
 * 
 */
class App 
{
	public static $classArray =[];
	public function __construct()
	{
		# code...
	}
	public static function run( ){ 
		spl_autoload_register('self::loadClass');
		self::setReporting();
		new \core\fast\route();
		$conf = Conf::all();
		// debug($conf);
	}
	//自动加载
	public static function loadClass($className){
		if(isset(self::$classArray[$className])){
			return true;
		}else {
			 	$class = APP_PATH . '/'.str_replace('\\', '/', $className) . '.php';
				if(is_file($class)){
				include $class;
				self::$classArray[$className] = $className;
				}else{
					return false;
				}
		}
	}

	// 检测开发环境
    public static function setReporting()
    {
    	include 'vendor/autoload.php';
        if (APP_DEBUG === true) {
        	$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
        }
    }
}