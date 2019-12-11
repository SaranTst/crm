<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_service extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('customers_service_model');
	}

	public function lists_customers_service()
	{
		$msg = $this->customers_service_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_customers_service($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_service_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_customers_service($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_service_model->chk_service_detail($id);
		
		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_customers_service($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_service_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}


}
