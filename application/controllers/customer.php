<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'customer';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;

		$this->load->view('header');
		$this->load->view('customer/index', $data);
		$this->load->view('footer');
	}

	public function create_customer()
	{
		$this->load->view('header');
		$this->load->view('customer/create_customer');
		$this->load->view('footer');
	}

	public function more_create_customer()
	{
		$this->load->view('header');
		$this->load->view('customer/more_create_customer');
		$this->load->view('footer');
	}

	public function read_customer()
	{
		$this->load->view('header');
		$this->load->view('customer/read_customer');
		$this->load->view('footer');
	}

	public function more_read_customer()
	{
		$this->load->view('header');
		$this->load->view('customer/more_read_customer');
		$this->load->view('footer');
	}

}
