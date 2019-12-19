<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_sales extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('customers_sales_model');
	}

	public function lists_customers_sales($id_customers=null)
	{
		$msg = $this->customers_sales_model->lists($id_customers);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_customers_sales($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_sales_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_customers_sales($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_sales_model->chk_sale_detail($id);
		
		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_customers_sales($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_sales_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}


}
