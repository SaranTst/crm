<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'management';
		$this->load->model('brands_model');
	}

	public function index()
	{
		$data['datas'] = $this->brands_model->lists();

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}
		
		$this->load->view('header');
		$this->load->view('management/index', $data);
		$this->load->view('footer');
	}

	public function create_brand()
	{
		$this->load->view('header');
		$this->load->view('management/create_brand');
		$this->load->view('footer');
	}

	public function update_brand($id='')
	{
		$id = (int)$id; 

		$data['datas'] = $this->brands_model->gets($id);
		$data['id'] = $id;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('management/create_brand', $data);
		$this->load->view('footer');
	}

}
