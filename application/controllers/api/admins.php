<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('sales_model');
	}

	public function lists_admins()
	{
		$msg = $this->sales_model->lists(1);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_admins($id=null)
	{
		$id = (int)$id; 
		$msg = $this->sales_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_admins($id=null)
	{
		$id = (int)$id; 

		if ($id) {
			$msg = $this->sales_model->updates($id);
		}else{
			$_POST['ROLE'] = 1;
			$msg = $this->sales_model->inserts();
		}

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_admins($id=null)
	{
		$id = (int)$id;
		$msg = $this->sales_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

  	public function initial_admin()
	{
		$msg = $this->sales_model->initial_admin();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function echodefind() {
		echo json_encode(ARR_EXPERTISE);
	}

}
