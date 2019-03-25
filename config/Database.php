<?php
use core\fast\Env;
return [
	"database_type" => Env::get('database.type'),
	"server"        => Env::get('database.hostname'),
	"database_name" => Env::get('database.database'),
	"username"      => Env::get('database.username'),
	"password"      => Env::get('database.password'),
	"charset"       => Env::get('database.charset'),
	"port"          => Env::get('database.hostport'),
	"prefix"        => Env::get('database.prefix')
];