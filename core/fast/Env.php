<?php
namespace core\fast;
// +----------------------------------------------------------------------
// | 获取env配置
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
class Env 
{
	/**
	*$name  变量名
	*$default  默认值
	**/
	public static function get($name, $default = null){
        $result = getenv(ENV_PREFIX . strtoupper(str_replace('.', '_', $name)));
        if (false !== $result) {
            if ('false' === $result) {
                $result = false;
            } elseif ('true' === $result) {
                $result = true;
            }

            return $result;
        }

        return $default;
	}
}