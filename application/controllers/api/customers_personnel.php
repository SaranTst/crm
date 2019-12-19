<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_personnel extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('customers_personnel_model');
	}

	public function lists_customers_personnel($id_customers=null)
	{
		$msg = $this->customers_personnel_model->lists($id_customers);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_customers_personnel($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_personnel_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_customers_personnel($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_personnel_model->chk_personnel($id);
		
		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_customers_personnel($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_personnel_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}


}
