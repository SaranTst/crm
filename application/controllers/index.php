<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

}
