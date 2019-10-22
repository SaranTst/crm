<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function move_images($path_from, $path_to) {

		// check file is not empty
		if (file_exists($path_from)) {

			// explode
			$exp_path_from=explode('/', $path_from);
			$move_path_to=str_replace($exp_path_from[1],$path_to,$path_from);
			$folder_move_to=dirname($move_path_to);
			$name_image_move_to=basename($move_path_to);

			// check folder
			$folder=$folder_move_to;
			if (!file_exists(DOCUMENT_ROOT.$folder)) {
				$subfolder=explode('/', '/'.$folder);
				foreach ($subfolder as $key => $value) {
					if($key==0){
						$dir=DOCUMENT_ROOT;
					}else{
						$dir.='/'.$value;
						if (!file_exists($dir)) {mkdir($dir, 0777);}
					}
				}
			}

			// move image
			$move_image = rename($path_from, $move_path_to);
			if ($move_image) {
				$msg['status']=1;
				$msg['message']=$move_path_to;
				return $msg;
			}else{
				$msg['status']=0;
				$msg['message']='ไม่สามารถย้ายไฟล์ได้ กรุณาลองใหม่อีกครั้ง';
				return $msg;
			}

		}else{
			$msg['status']=0;
			$msg['message']='ไม่มีไฟล์ที่จะทำการย้าย กรุณาลองใหม่อีกครั้ง';
			return $msg;
		}
	}

	public function clearbadstr($string){
        $string=htmlspecialchars(strip_tags(trim($string)));
        return $string;
    }
}
?>