<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
	}

   	public function from($type='temp') 
   	{

		/* check folder */
		$folder='uploads/'.$type.'/'.date('Ym');
		if($type=='temp'){
			$folder='uploads/'.$type;
		}   		

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
		}else{
			$config['allowed_types'] = 'gif|jpg|png';
		}
		$config['upload_path']   = DOCUMENT_ROOT.'./'.$folder; 
		$config['max_size']      = 10240;
		$config['encrypt_name'] = TRUE;		
		// $config['file_name'] = $new_name;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$data['status'] = 0;
			$data['message']= $error;     
		}else { 
			$uploadedImage = $this->upload->data();
			$data['status'] = 1;
			$data['message']= 'success';    
			$data['path'] =  base_url().$folder.'/'.$uploadedImage['file_name'];
			$data['detail'] = $uploadedImage;
		} 

		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}

}