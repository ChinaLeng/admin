<?php
/*
全局方法
*/
//打印值
function debug($var){
	if(is_null($var)){
		dump(null);
	}else {
		dump($var);
	}
}
/**
 * @param string $msg
 * @param $data
 * ajax返回正确信息
 */
function ajax_success($msg='',$data=''){
    echo json_encode(["errCode"=>0,"msg"=>$msg,"data"=>$data]);
}

/**
 * @param string $msg
 * @param string $data
 * ajax返回错误信息
 */
function ajax_error($msg='',$data=''){
    echo json_encode(["errCode"=>1,"msg"=>$msg,"data"=>$data]);
}
//重定向
function redirect($str){
	header("Location:{$str}");
	die;
}
