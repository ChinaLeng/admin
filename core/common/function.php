<?php
/*
全局方法
*/
function debug($var){
	if(is_null($var)){
		dump(null);
	}else {
		dump($var);
	}
}