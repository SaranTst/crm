<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

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
			$_POST['ROLE'] = 2;
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
		$msg = $this->sales_model->login();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function lists_id_sale() 
	{
		$msg = $this->sales_model->lists_id_sale();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

}
