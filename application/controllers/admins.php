<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'admins';
		$this->load->model('sales_model');
		$this->load->model('brands_model');
	}

	public function index()
	{
		$data['datas'] = $this->sales_model->lists(1);
		$data['brands'] = $this->brands_model->lists_vendorname();

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}
		
		$this->load->view('header');
		$this->load->view('admins/index', $data);
		$this->load->view('footer');
	}

	public function create_admin()
	{
		$data['brands'] = $this->brands_model->lists_vendorname();

		$this->load->view('header');
		$this->load->view('admins/create_admin', $data);
		$this->load->view('footer');
	}

	public function update_admin($id='')
	{
		$id = (int)$id; 
		$data['datas'] = $this->sales_model->gets($id);
		$data['brands'] = $this->brands_model->lists_vendorname();
		$data['id'] = $id;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('admins/create_admin', $data);
		$this->load->view('footer');
	}

}