<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('services_model');
	}

	public function lists_services()
	{
		$msg = $this->services_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_services($id=null)
	{
		$id = (int)$id; 
		$msg = $this->services_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function update_services($id=null)
	{
		$id = (int)$id; 

		if ($id) {
			$msg = $this->services_model->updates($id);
		}else{
			$msg = $this->services_model->inserts();
		}

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_services($id=null)
	{
		$id = (int)$id;
		$msg = $this->services_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function lists_id_service() 
	{
		$msg = $this->services_model->lists_id_service();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

}
