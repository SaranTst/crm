<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('sales_model');
	}

	public function lists_sales()
	{
		$msg = $this->sales_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_sales($id=null)
	{
		$id = (int)$id; 
		$msg = $this->sales_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_sales($id=null)
	{
		$id = (int)$id; 

		if ($id) {
			$msg = $this->sales_model->updates($id);
		}else{
			$msg = $this->sales_model->inserts();
		}

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_sales($id=null)
	{
		$id = (int)$id;
		$msg = $this->sales_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function login()
	{

		$res = $this->sales_model->login();

		if (sizeof($res)>0) {
			$msg['status'] = 1;
			$msg['datas'] = $res;

			$userdata['sale'] = array(
			'id' => $res[0]['id'],
			'name' => $res[0]['first_name'].' '.$res[0]['last_name'],
			'email' => $res[0]['email'],
			);
			$this->session->set_userdata($userdata);

		}else{
			$msg['status'] = 0;
			$msg['message'] = 'ไม่มีข้อมูล';
		}

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

  	public function logout() {      
      $this->session->unset_userdata('sale');

      if($this->session->userdata("sale")){
          $msg['status']=0;
          $msg['message']='ออกจากระบบไม่สำเร็จกรุณาลองใหม่อีกครั้ง';               
      }else{
          $msg['status']=1;
          $msg['message']='ออกจากระบบสำเร็จ';	    
      }

      header('Content-Type: application/json');
      echo json_encode($msg);	           
  	}  

}
