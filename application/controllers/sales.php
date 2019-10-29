<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'sales';
		$this->load->model('sales_model');
	}

	public function index()
	{
		$data['datas'] = $this->sales_model->lists();

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('sales/index', $data);
		$this->load->view('footer');
	}

  	public function logout() {      
  		$this->session->unset_userdata('sale');
		header('Location: '.base_url().'login' );	           
  	}

	public function create_sale()
	{
		$data['actions'] = 'create';

		$this->load->view('header');
		$this->load->view('sales/create_sale', $data);
		$this->load->view('footer');
	}

	public function update_sale($id='')
	{
		$id = (int)$id; 
		$data['datas'] = $this->sales_model->gets($id);
		$data['actions'] = 'update';
		$data['id'] = $id;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('sales/create_sale', $data);
		$this->load->view('footer');
	}
}
