<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_sales extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'add_sales';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;
		
		$this->load->view('header');
		$this->load->view('add_sales/index', $data);
		$this->load->view('footer');
	}

	public function create_sales()
	{
		$this->load->view('header');
		$this->load->view('add_sales/create_sales');
		$this->load->view('footer');
	}

}
