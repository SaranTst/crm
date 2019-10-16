<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('sales_model');
	}

	public function lists_users()
	{
		$res = $this->sales_model->lists();

		if (sizeof($res['data'])>0) {
			$message['status'] = 1;
			$message['datas'] = $res;
		}else{
			$message['status'] = 0;
			$message['message'] = 'ไม่มีข้อมูล';
		}

		header("Content-Type: application/json");
		echo json_encode($message);
	}

	public function gets_users($id=null)
	{
		$id = (int)$id; 

		$res = $this->sales_model->gets($id);

		if (sizeof($res)>0) {
			$message['status'] = 1;
			$message['datas'] = $res;
		}else{
			$message['status'] = 0;
			$message['message'] = 'ไม่มีข้อมูล';
		}

		header("Content-Type: application/json");
		echo json_encode($message);
	}

	public function update_users($id=null)
	{
		$id = (int)$id; 

		if ($id) {
			$res = $this->sales_model->updates($id);
		}else{
			$res = $this->sales_model->inserts();
		}

		$txt_message = $id ? 'แก้ไข' : 'เพิ่ม';
		$message['status'] = 0;
		$message['message'] = 'ไม่สามารถ'.$txt_message.'ข้อมูลได้ กรุณาลองใหม่อีกครั้ง';

		if ($res) {
			$message['status'] = 1;
			$message['message'] = $txt_message.'ข้อมูลเรียบร้อยแล้ว';
		}

		header("Content-Type: application/json");
		echo json_encode($message);
	}

	public function delete_users($id=null)
	{
		$id = (int)$id;
		$message['status'] = 0;
		$message['message'] = 'ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง';

		$res = $this->sales_model->deletes($id);

		if ($res) {
			$message['status'] = 1;
			$message['message'] = 'ลบข้อมูลเรียบร้อยแล้ว';
		}
		header("Content-Type: application/json");
		echo json_encode($message);
	}

	public function login()
	{

		$res = $this->sales_model->login();

		if (sizeof($res)>0) {
			$message['status'] = 1;
			$message['datas'] = $res;

			$userdata['sales'] = array(
			'id' => $res[0]['id'],
			'name' => $res[0]['first_name'].' '.$res[0]['last_name'],
			'email' => $res[0]['email'],
			);
			$this->session->set_userdata($userdata);

		}else{
			$message['status'] = 0;
			$message['message'] = 'ไม่มีข้อมูล';
		}

		header("Content-Type: application/json");
		echo json_encode($message);
	}

  	public function logout() {      
      $this->session->unset_userdata('sales');

      if($this->session->userdata("sales")){
          $message['status']=0;
          $message['message']='ออกจากระบบไม่สำเร็จกรุณาลองใหม่อีกครั้ง';               
      }else{
          $message['status']=1;
          $message['message']='ออกจากระบบสำเร็จ';	    
      }

      header('Content-Type: application/json');
      echo json_encode($message);	           
  	}  

}
