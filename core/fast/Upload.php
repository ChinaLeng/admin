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
	public $upload_new_name;				//上传文件新名称
	public $upload_tmp_name;				//上传临时文件名
	public $upload_final_name;				//上传文件的最终文件名
	public $upload_target_dir;				//文件被上传到的目标目录
	public $upload_target_path;			    //文件被上传到的最终路径
	public $upload_filetype ;				//上传文件类型
	public $upload_suffixtype ;				//上传文件后缀
	public $allow_uploadedfile_type;		//允许的上传文件类型
	public $suffix_uploadedfile_type;		//允许的上传文件后缀名
	public $upload_file_size;				//上传文件的大小
	public $allow_uploaded_maxsize; 	//允许上传文件的最大值
	public $upload_error;              //文件上传错误号
	public $upload_error_msg;              //文件上传错误信息
	public $upload_target_newdir;         //文件上传的地址
 	public function __construct()
 	{
 		//获取上传配置
 		// $this->setFiles($this->fileName);
 		$this->fileArray = Conf::all('FileUpload');
 		$this->set($this->fileArray);
 	}
 	//设置成员属性
 	public function set($keyArray = []){
		foreach ($keyArray as $key => $value) {
			$this->setOption($key, $value);
		}
		return $this;
 	}
 	//设置单个成员属性的值
 	public function setOption($key,$val){
 		$key = strtolower($key);
		if(array_key_exists($key, get_class_vars(get_class($this)))){
			$this->$key = $val;
		}
 	}
 	//获取原文件名
 	public function getName(){
 		return $this->upload_name;
 	}
 	//文件上传方法
 	public  function upload($fileName='file'){
 		//获取上传信息
 		// return $this->setFiles($fileName);
		if($this->setFiles($fileName)){
			debug(1);
			if($this->checkFilePath() && $this->checkSize() && $this->checkType() && $this->checkSuffixType() && $this->checkIsdir()){
				$filePath = $this->uploadFile();
				return $filePath;
			}
		}
 	}
 	//检查是否文件夹是否存在 不存在就生成
 	public function checkIsdir(){
 		if(!is_dir(APP_PATH.$this->upload_target_dir.'/'.date('Ymd'))){
			mkdir(APP_PATH.$this->upload_target_dir.'/'.date('Ymd'));
			chmod(APP_PATH.$this->upload_target_dir.'/'.date('Ymd'),0777);
 		}
 		$this->upload_target_newdir = APP_PATH.$this->upload_target_dir.'/'.date('Ymd');
 		return true;
 	}
 	//检查上传目录
 	public function checkFilePath(){
 		//判断是否设置了存放路径
 		if(empty($this->upload_target_dir)){
			$this->setOption('upload_error',-5);
			return false;
 		}
 		return true;
 	}
 	//检查上传文件大小
 	public function checkSize(){
 		if($this->upload_file_size > $this->allow_uploaded_maxsize){
			$this->setOption('upload_error',-2);
			return false;
 		}
 		return true;
 	}
 	//检查是否为允许类型
 	public function checkType(){
 		if(!in_array($this->upload_filetype, $this->allow_uploadedfile_type)){
			$this->setOption('upload_error',-1);
			return false;
 		}
 		return true;
 	}
 	//检查是否为允许后缀
 	public function checkSuffixType(){
 		if(!in_array($this->upload_suffixtype, $this->suffix_uploadedfile_type)){
			$this->setOption('upload_error',-1);
			return false;
 		}
 		return true;
 	}
 	//设置新的文件名
 	public function setNewName(){
		$this->upload_new_name = date('ymd').rand(100,999).rand(100,999).$this->upload_suffixtype;
 	}
 	//进行文件上传
 	public function uploadFile(){
 		$this->setNewName();
 		$this->upload_target_path = $this->upload_target_newdir."/".$this->upload_new_name;
 		if(@move_uploaded_file($this->upload_new_name,$this->upload_target_path)){
			return $this->upload_target_dir."/".date('ymd').'/'.$this->upload_new_name;
 		}
 	    $this->setOption('upload_error',-3);
		 return false;
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
		$aryStr = explode(".", $this->upload_name);
		$this->upload_suffixtype = strtolower(end($aryStr));
 	}
 	//设置错误信息
 	public function getError(){
 		$str = '上传文件时<font color="red">'.$this->upload_name.'</font>出错:';
 		switch($this->upload_error){
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
 	// }
 }