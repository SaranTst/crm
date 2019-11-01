<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('brands_model');
	}

	public function lists_brands()
	{
		$msg = $this->brands_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_brands($id=null)
	{
		$id = (int)$id; 
		$msg = $this->brands_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_brands($id=null)
	{
		$id = (int)$id; 

		if ($id) {
			$msg = $this->brands_model->updates($id);
		}else{
			$msg = $this->brands_model->inserts();
		}

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_brands($id=null)
	{
		$id = (int)$id;
		$msg = $this->brands_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function lists_vendorname() 
	{
		$msg = $this->brands_model->lists_vendorname();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}
}
