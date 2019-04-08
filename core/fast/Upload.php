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
 	//获取原文件名
 	public function getName(){
 		return $this->upload_name;
 	}
 	//文件上传方法
 	public function upload($fileName='file'){
 		//获取上传信息
		if($this->setFiles($fileName)){
			if($this->checkFilePath()){

			}
		}
 	}
 	//检查上传目录
 	public function checkFilePath(){
 		//判断是否设置了存放路径
 		if(empty($this->upload_target_dir)){
			$this->setOption('upload_error',-5);
			return false;
 		}
 	}
 	//获取文件上传信息
 	public function setFiles($fileName){
		$this->upload_name = $_FILES[$fileName]["name"]; //取得上传文件名
 		$this->upload_error = $_FILES[$fileName]["error"];
 		if($this->upload_error > 0){
			return false;
 		}
		$this->upload_filetype = $_FILES[$fileName]["type"];
		$this->upload_tmp_name = $_FILES[$fileName]["tmp_name"];
		$this->upload_file_size = $_FILES["file"]["size"];
 	}
 	//设置错误信息
 	public function getError(){
 		$str = '上传文件时<font color="red">'.$this->upload_name.'</font>出错:'
 		switch ($this->upload_error) {
            case 4:
                $str .= "没有文件被上传";
                break;
            case 3:
                $str .= "文件只有部分被上传";
                break;
            case 2:
                $str .= "上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值";
                break;
            case 1:
                $str .= "上传的文件超过了php.ini中upload_max_filesize选项限制的值";
                break;
            case -1:
                $str .= "未允许类型";
                break;
            case -2:
                $str .= '文件过大,上传的文件不能超过'.$this->allow_uploaded_maxsize.'个字节';
                break;
            case -3:
                $str .= "上传失败";
                break;
            case -4:
                $str .= "建立存放上传文件目录失败，请重新指定上传目录";
                break;
            case -5:
                $str .= "必须指定上传文件的路径";
                break;
            default:
                $str .= "未知错误";
        }
        return $str . '<br>';
 		}
 	}
 }