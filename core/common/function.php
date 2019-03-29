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
/*
*获取get数据
*$name  变量名
*$default  默认参数,没有值时返回默认参数
*
*/
function get($name = false,$default = false){
	//如果没有传变量名就直接返回$_GET
    if ($name !== false) {
        $return = isset($_GET[$name]) ? $_GET[$name] : false;
        if ($return) {
            $return = htmlspecialchars($return);
            return $return;
        } else {
            return $default;
        }
    } else {
        return $_GET;
    }

}
/*
*获取post数据
*$name  变量名
*$default  默认参数,没有值时返回默认参数
*
*/
function post($name = false,$default = false){
	//如果没有传变量名就直接返回$_POST
    if ($name !== false) {
        $return = isset($_POST[$name]) ? $_POST[$name] : false;
        if ($return) {
            $return = htmlspecialchars($return);
            return $return;
        } else {
            return $default;
        }
    } else {
        return $_POST;
    }
}
