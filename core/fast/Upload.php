<?php
// +----------------------------------------------------------------------
// | 文件上传类
// +----------------------------------------------------------------------
// | Blog http://blog.skyczk.cn/
// +----------------------------------------------------------------------
// | Author: 陈政宽 <kuan9531@skyczk.cn>
// +----------------------------------------------------------------------
namespace core\fast;
use core\fast\Conf;

 class Upload
 {
 	public $fileArray = [];
	public $upload_name;					//上传文件名
	public $upload_tmp_name;				//上传临时文件名
	public $upload_final_name;				//上传文件的最终文件名
	public $upload_target_dir;				//文件被上传到的目标目录
	public $upload_target_path;			    //文件被上传到的最终路径
	public $upload_filetype ;				//上传文件类型
	public $allow_uploadedfile_type;		//允许的上传文件类型
	public $suffix_uploadedfile_type;		//允许的上传文件后缀名
	public $upload_file_size;				//上传文件的大小
	public $allow_uploaded_maxsize; 	//允许上传文件的最大值
	public $upload_error;              //文件上传错误号
	public $upload_error_msg;              //文件上传错误信息
 	public function __construct()
 	{
 		//获取上传配置
 		$this->fileArray = Conf::all('FileUpload');
 		$this->set($this->fileArray);
 	}
 	//设置成员属性
 	public function set($keyArray = []){
		foreach ($keyArray as $key => $value) {
			$key = strtolower($key);
			if(array_key_exists($key, get_class_vars(get_class($this)))){
				$this->setOption($key, $value);
			}
		}
		return $this;
 	}
 	//设置单个成员属性的值
 	public function setOption($key,$val){
		$this->$key = $val;
 	}
 	//文件上传方法
 	public function upload($fileName='file'){
 		//获取上传信息
		if($this->setFiles($fileName)){

		}
 	}
 	//获取文件上传信息
 	public function setFiles($fileName){
		$this->upload_name = $_FILES[$fileName]["name"]; //取得上传文件名
		$this->upload_filetype = $_FILES[$fileName]["type"];
		$this->upload_tmp_name = $_FILES[$fileName]["tmp_name"];
		$this->upload_file_size = $_FILES["file"]["size"];
 	}
 }