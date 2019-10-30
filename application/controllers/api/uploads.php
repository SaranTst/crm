<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}

	// ถ้ามีมากกว่า 1 ไฟล์ขนาด 3 ไฟล์รวมกันต้องไม่เกิน 100MB ถ้าอยากให้เกินให้ไปตั้งค่าที่ไฟล์ php.ini post_max_size=8M / upload_max_filesize=2M
   	public function from($type='temp',$multi=false) 
   	{

		/* check folder */
		$folder='uploads/'.$type.'/'.date('Ymd');
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
		/* end */

		if($type=='file'){			
			$config['allowed_types'] = 'pdf|doc|docx|odt|xls|xlsx|ppt|pptx|txt'; 
		}else if($type=='video'){			
			$config['allowed_types'] = 'mp4'; 
		}else{
			$config['allowed_types'] = 'gif|jpg|png';
		}
		$config['upload_path']  = DOCUMENT_ROOT.$folder;
	 	if($type=='video'){
			$config['max_size'] = 102400; // 100MB
		}else{
			$config['max_size'] = 10240; //10MB
		}
		$config['encrypt_name'] = TRUE;		
		// $config['file_name'] = $new_name;
		$this->load->library('upload', $config);

		if ($multi) {
			$count = count($_FILES['file']['name']);
      		for($i=0;$i<$count;$i++){
				if(!empty($_FILES['file']['name'][$i])){

					// set file
					$_FILES['file_multi']['name'] = $_FILES['file']['name'][$i];
					$_FILES['file_multi']['type'] = $_FILES['file']['type'][$i];
					$_FILES['file_multi']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
					$_FILES['file_multi']['error'] = $_FILES['file']['error'][$i];
					$_FILES['file_multi']['size'] = $_FILES['file']['size'][$i];

					if ( ! $this->upload->do_upload('file_multi')) {
						$error = array('error' => $this->upload->display_errors());
						$multi_data['status'] = 0;
						$multi_data['message']= $error;
					}else { 
						$uploadedImage = $this->upload->data();
						$multi_data['status'] = 1;
						$multi_data['message']= 'success';
						$multi_data['path'] =  $folder.'/'.$uploadedImage['file_name'];
						$multi_data['detail'] = $uploadedImage;
					}
					$data[] = $multi_data;
					unset($multi_data);
				}
			}
		}else{

			if ( ! $this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_errors());
				$data['status'] = 0;
				$data['message']= $error;
			}else { 
				$uploadedImage = $this->upload->data();
				$data['status'] = 1;
				$data['message']= 'success';
				// $data['path'] =  base_url().$folder.'/'.$uploadedImage['file_name'];
				$data['path'] =  $folder.'/'.$uploadedImage['file_name'];
				$data['detail'] = $uploadedImage;
			}
		}

		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}

}