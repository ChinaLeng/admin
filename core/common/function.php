<?php
// +----------------------------------------------------------------------
// | 全局方法
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
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
//获取用户登录IP
function getIp(){
        if ($_SERVER["HTTP_CLIENT_IP"])
             $ip = $_SERVER["HTTP_CLIENT_IP"];
        else if($_SERVER["HTTP_X_FORWARDED_FOR"])
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        else if($_SERVER["REMOTE_ADDR"])
            $ip = $_SERVER["REMOTE_ADDR"];
        else $ip = "Unknow";
        if($ip=='::1')
            $ip='127.0.0.1';
        return $ip;
}
/**
* 根据用户IP获取用户地理位置
* $ip  用户ip
*/
function get_position($ip){
     if(empty($ip)){
         return  '缺少用户ip';
     }
     $url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
     $ipContent = file_get_contents($url);
     $ipContent = json_decode($ipContent,true); 
     return $ipContent;
 }
