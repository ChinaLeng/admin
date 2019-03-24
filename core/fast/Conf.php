<?php
namespace core\fast;
/**
获取配置
**/
class Conf 
{
	public static $fileArray = [];
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