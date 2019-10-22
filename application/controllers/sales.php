<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'sales';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;
		
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
		$this->load->view('header');
		$this->load->view('sales/create_sale');
		$this->load->view('modal');
		$this->load->view('footer');
	}
}
