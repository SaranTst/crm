<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('customer');
		$this->load->view('footer');
	}

	public function create_customer()
	{
		$this->load->view('header');
		$this->load->view('create_customer');
		$this->load->view('footer');
	}

	public function more_create_customer()
	{
		$this->load->view('header');
		$this->load->view('more_create_customer');
		$this->load->view('footer');
	}

}
