<?php
// +----------------------------------------------------------------------
// | 上传文件配置
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
return [
	//文件上传目录
	'upload_target_dir' => '/public/upload',
	//文件上传大小
	'allow_uploaded_maxsize' => 20000000,
	//允许上传的文件类型
	'allow_uploadedfile_type' => ['image/gif','image/jpeg','image/jpg','image/pjpeg','image/png'],
	//允许文件上传后缀
	'suffix_uploadedfile_type' => ["gif", "jpeg", "jpg", "png"]
]; 