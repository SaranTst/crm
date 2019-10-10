<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'management';
	}

	public function index()
	{
		$data['current_page'] = $this->current_page;
		
		$this->load->view('header');
		$this->load->view('management/index', $data);
		$this->load->view('footer');
	}

	public function create_lists()
	{
		$this->load->view('header');
		$this->load->view('management/create_lists');
		$this->load->view('footer');
	}

	public function lists($name_lists='')
	{
		$data['name_lists'] = $name_lists ? $name_lists : '';

		$this->load->view('header');
		$this->load->view('management/lists', $data);
		$this->load->view('footer');
	}

}
