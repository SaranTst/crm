<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('logs_model');
	}

	public function lists_logs()
	{
		$msg = $this->logs_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_logs($id=null)
	{
		$id = (int)$id; 
		$msg = $this->logs_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function phpinfo() {
		echo phpinfo();
	}

}
