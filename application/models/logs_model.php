<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'LOGS';
	}

	public function lists() {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 10;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->limit($limit,$offset);
		$this->db->order_by('ID', $sort);
		$query = $this->db->get();

		$msg['data'] = $query->result_array();

		$this->db->select('*');
		$this->db->from($this->table);
		$query_total = $this->db->get();

		$msg['total'] = $query_total->num_rows();
		$msg['limit'] = (int)$limit;
		return $msg;
	}

	public function gets($id) {

		$this->db->from($this->table);
		$this->db->where('ID',$id);
		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get();

		$msg = $query->result_array();
		return $msg;
	}

	public function gets_where($wheres=array()) {

		$this->db->from($this->table);
		foreach ($wheres as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get();

		$msg = $query->result_array();
		return $msg;
	}

	public function inserts($action_table,$action_id,$action,$action_user) {

		$log['ACTION_TABLE'] = $action_table;
		$log['ACTION_ID'] = $action_id;
		$log['ACTION'] = $action;
		$log['ACTION_USER'] = $action_user;
		$log['ACTION_DATE'] = date('Y-m-d H:i:s');
		$this->db->insert($this->table, $log);
		return $this->db->affected_rows()>0 ? true : false;
	}

}
?>