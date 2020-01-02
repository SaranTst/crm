<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->current_page = 'customer';
		$this->load->model('customers_model');
		$this->load->model('brands_model');
		$this->load->model('sales_model');
		$this->load->model('services_model');
	}

	public function index()
	{
		$data['datas'] = $this->customers_model->lists();

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

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

	public function update_customer($id='')
	{
		$id = (int)$id; 
		$data['datas'] = $this->customers_model->gets($id);
		$data['id'] = $id;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('customer/create_customer', $data);
		$this->load->view('footer');
	}

	public function more_create_customer($id='')
	{
		$id = (int)$id; 
		$lists_vendorname = $this->brands_model->lists_vendorname();
		$data['brands'] = $lists_vendorname['status']==1 ? $lists_vendorname['data'] : array();

		$lists_id_sale = $this->sales_model->lists_id_sale();
		$data['sales'] = $lists_id_sale['status']==1 ? $lists_id_sale['data'] : array();

		$lists_id_service = $this->services_model->lists_id_service();
		$data['services'] = $lists_id_service['status']==1 ? $lists_id_service['data'] : array();

		$data['datas'] = $this->customers_model->gets_more_customer($id);
		$data['id'] = $id;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('customer/more_create_customer', $data);
		$this->load->view('footer');
	}

	public function read_customer()
	{
		$name_hospital = $this->input->get('hospital') ? $this->input->get('hospital') : '';
		$data['datas'] = $this->customers_model->lists_customers_general($name_hospital);
		$data['name_hospital'] = $name_hospital;

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('customer/read_customer', $data);
		$this->load->view('footer');
	}

	public function more_read_customer()
	{
		$name_hospital = $this->input->get('hospital') ? $this->input->get('hospital') : '';
		$data['datas'] = $this->customers_model->gets_read_more_customer($name_hospital);

		if ($this->input->get('json')) {
			header("Content-Type: application/json");
			echo json_encode($data);
			exit;
		}

		$this->load->view('header');
		$this->load->view('customer/more_read_customer', $data);
		$this->load->view('footer');
	}

}
