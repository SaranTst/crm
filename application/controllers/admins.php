<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'admins';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;
		
		$this->load->view('header');
		$this->load->view('admins/index', $data);
		$this->load->view('footer');
	}

	public function create_admin()
	{
		$this->load->view('header');
		$this->load->view('admins/create_admin');
		$this->load->view('footer');
	}

}