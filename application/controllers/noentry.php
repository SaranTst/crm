<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noentry extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'noentry';
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('noentry');
		$this->load->view('footer');
	}
}