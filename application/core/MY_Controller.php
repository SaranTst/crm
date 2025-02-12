<?php
 
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        self::login();
    }

    private function login(){

        $admin=$this->session->userdata('sale');
        $valid=self::permission($admin);

        if(!$valid){
            header('Location: '.base_url().'login' );
        }
    }

    protected function permission($admin){

        $allow_function=array('login');

        $folder = $this->uri->segment(1);
        $class = $this->uri->segment(2);
        $function = $this->uri->segment(3);

        $status=FALSE;
        if($admin['ID_EMPLOYEE']){
            $status=TRUE;
        }else if ($class=="sales" && in_array($function, $allow_function)){
            $status=TRUE;
        }else if ($folder=="api"){
            $msg['status'] = 0;
            $msg['message'] = 'กรุณาเข้าสู่ระบบเพื่อใช้งาน';
            header("Content-Type: application/json");
            echo json_encode($msg);
            exit;
        }
        
        return $status;
    }

    protected function Safety($string){
        $string=htmlspecialchars(strip_tags(trim($string)));
        return $string;
    }

}