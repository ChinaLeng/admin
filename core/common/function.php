<?php
/*
全局方法
*/
function debug($var){
	if(is_null($var)){
		var_dump(null);
	}else {
		var_dump($var);
	}
}