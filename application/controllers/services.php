<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'services';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;
		
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

}