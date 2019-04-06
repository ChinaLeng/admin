<?php
// +----------------------------------------------------------------------
// | 数据库配置
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
use core\fast\Env;
/*return [
	"database_type" => Env::get('database.type'),
	"server"        => Env::get('database.hostname'),
	"database_name" => Env::get('database.database'),
	"username"      => Env::get('database.username'),
	"password"      => Env::get('database.password'),
	"charset"       => Env::get('database.charset'),
	"port"          => Env::get('database.hostport'),
	"prefix"        => Env::get('database.prefix')
];*/
return [
		    'driver'    => Env::get('database.type'),
		    'host'      => Env::get('database.hostname'),
		    'database'  => Env::get('database.database'),
		    'username'  => Env::get('database.username'),
		    'password'  => Env::get('database.password'),
		    'charset'   => Env::get('database.charset'),
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => Env::get('database.prefix')
];