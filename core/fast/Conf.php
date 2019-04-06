<?php
namespace core\fast;
// +----------------------------------------------------------------------
// | 获取配置
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
class Conf 
{
	public static $fileArray = [];
	//获取单个配置文件
	/*
	*$name  配置项名称
	$file   文件名 默认为Config
	*/
	public static function get($name,$file='Config'){
		if(isset(self::$fileArray[$file])){
			return self::$fileArray[$file][$name];
		}else{
			$newfile = APP_PATH.'/config/'.$file.'.php';
			if(is_file($newfile)){
				$conf = include $newfile;
				if(isset($conf[$name])){
					self::$fileArray[$file] = $conf;
					return $conf[$name];
				}else{
					throw new \Exception("找不到这个配置项".$name);
					
				}
			}else{
				throw new \Exception("配置文件不存在".$file);
				
			}
		}
	}
	//获取某一个文件中的所有配置
	//$file  文件名称  默认为Config
	public static function all($file='Config'){
		if(isset(self::$fileArray[$file])){
			return self::$fileArray[$file];
		}else{
			$newfile = APP_PATH.'/config/'.$file.'.php';
			if(is_file($newfile)){
				$conf = include $newfile;
				self::$fileArray[$file] = $conf;
				return $conf;
			}else{
				throw new \Exception("配置文件不存在".$file);
				
			}
		}
	}
}