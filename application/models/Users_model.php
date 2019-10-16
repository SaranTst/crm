<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->collection = 'users';
	}

	public function lists() {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 10;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$this->db->select('*');
		$this->db->from($this->collection);
		$this->db->limit($limit,$offset);
		$this->db->order_by('id', $sort);
		$query = $this->db->get();

		$data['data'] = $query->result_array();

		$this->db->select('*');
		$this->db->from($this->collection);
		$query_total = $this->db->get();

		$data['total'] = $query_total->num_rows();
		$data['limit'] = (int)$limit;
		return $data;
	}

	public function gets($id) {

		$this->db->from($this->collection);
		$this->db->where('id',$id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		$data = $query->result_array();
		return $data;
	}

	public function gets_where($wheres=array()) {

		$this->db->from($this->collection);
		foreach ($wheres as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		$data = $query->result_array();
		return $data;
	}

	public function inserts() {

		$ip_post = $this->input->post();

		if (isset($ip_post['id_employee']) || !empty($ip_post['id_employee'])) {
			$data['id_card'] = (int)$ip_post['id_employee'];
		}
		if (isset($ip_post['id_personal']) || !empty($ip_post['id_personal'])) {
			$data['id_card'] = (int)$ip_post['id_personal'];
		}

		$data['type_user'] = (int)$ip_post['type_user'];
		$data['first_name'] = $ip_post['first_name'];
		$data['last_name'] = $ip_post['last_name'];
		$data['email'] = $ip_post['email'];
		$data['password'] = md5($ip_post['password'].KEY_PASSWORD);
		$data['create_date'] = date('Y-m-d H:i:s');

		$this->db->insert($this->collection, $data);
		return $this->db->affected_rows()>0 ? true : false;
	}

	public function updates($id) {

		$ip_post = $this->input->post();

		$data['first_name'] = $ip_post['first_name'];
		$data['last_name'] = $ip_post['last_name'];
		// if (! is_null($this->input->post('role'))) {
		// 	$data['role'] = $ip_post['role'];
		// }
		// if (! is_null($this->input->post('password'))) {
		// 	$data['password'] = md5($ip_post['password'].KEY_PASSWORD);
		// }
		$data['update_date'] = date('Y-m-d H:i:s');

		$this->db->where('id', $id);
		$this->db->update($this->collection, $data);
		return $this->db->affected_rows()>0 ? true : false;
	}

	public function deletes($id) {

		$this->db->where('id', $id);
		$this->db->delete($this->collection);
		return $this->db->affected_rows()>0 ? true : false;
	}

	public function login() {

		$ip_login = $this->input->post();

		$data['email'] = $ip_login['email'];
		$data['password'] = md5($ip_login['password'].KEY_PASSWORD);

		$this->db->from($this->collection);
		$this->db->where('email',$data['email']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get();

		$data = $query->result_array();
		return $data;
	}

}
?>