<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'dashboard';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;

		$this->load->view('header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('footer');
	}

}
