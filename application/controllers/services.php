<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'services';
		$this->load->model('services_model');
		$this->load->model('brands_model');
	}

	public function index()
	{
		$data['datas'] = $this->services_model->lists();
		$data['brands'] = $this->brands_model->lists_vendorname();

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}
		
		$this->load->view('header');
		$this->load->view('services/index', $data);
		$this->load->view('footer');
	}

	public function create_service()
	{
		$this->load->view('header');
		$this->load->view('services/create_service');
		$this->load->view('footer');
	}

	public function update_service($id='')
	{
		$id = (int)$id; 
		$data['datas'] = $this->services_model->gets($id);
		$data['id'] = $id;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('services/create_service', $data);
		$this->load->view('footer');
	}

}