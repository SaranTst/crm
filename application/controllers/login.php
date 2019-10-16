<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
		parent::__construct ();
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	public function selects()
	{
		$limit = $this->input->get('limit') ? $this->input->get('limit') : 10;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$this->db->select('*');
		$this->db->from('TESTS');
		$this->db->limit($limit,$offset);
		// $this->db->order_by('id', $sort);
		$query = $this->db->get();

		$data['data'] = $query->result_array();

		$this->db->select('*');
		$this->db->from('TESTS');
		$query_total = $this->db->get();

		$data['total'] = $query_total->num_rows();
		$data['limit'] = (int)$limit;
		echo json_encode($data);
	}

}
