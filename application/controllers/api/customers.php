<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('customers_model');
		$this->load->model('customers_sales_model');
		$this->load->model('customers_service_model');
		$this->load->model('customers_bjc_product_model');
		$this->load->model('customers_other_product_model');
		$this->load->model('customers_personnel_model');
	}

	public function lists_customers()
	{
		$msg = $this->customers_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_customers($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_customers($id=null)
	{
		$id = (int)$id; 

		if ($id) {
			$msg = $this->customers_model->updates($id);
		}else{
			$msg = $this->customers_model->inserts();
		}

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_customers($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function updates_more_customer($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_model->updates_more_customer($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_more_customer($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_model->gets_more_customer($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function updates_expertise_customer($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_model->updates_expertise_customer($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function lists_customers_general($name_hospital=null)
	{
		$msg = $this->customers_model->lists_customers_general(urldecode($name_hospital));

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

}
