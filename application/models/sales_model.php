<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'SALES';
		$this->load->model('general_model');
		$this->load->model('logs_model');
	}

	public function lists() {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 3;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$ip_post = $this->input->post();
		$where = '';
		if ($ip_post) {

			if (isset($ip_post['department']) && !empty($ip_post['department'])) {
				$where .= "DEPARTMENT = '".$this->general_model->clearbadstr($ip_post['department'])."' AND ";
			}

			if (isset($ip_post['zone']) && !empty($ip_post['zone'])) {
				$where .= "ZONE = '".$this->general_model->clearbadstr($ip_post['zone'])."' AND ";
			}

			if (isset($ip_post['county']) && !empty($ip_post['county'])) {
				$where .= "COUNTY = '".$this->general_model->clearbadstr($ip_post['county'])."' AND ";
			}

			if (isset($ip_post['position']) && !empty($ip_post['position'])) {
				$where .= "POSITION = '".$this->general_model->clearbadstr($ip_post['position'])."' AND ";
			}

			if (isset($ip_post['brand']) && !empty($ip_post['brand'])) {
				$where .= "BRAND = '".$this->general_model->clearbadstr($ip_post['brand'])."' AND ";
			}

			if (isset($ip_post['keyword']) && !empty($ip_post['keyword'])) {
				$keyword = $this->db->escape_like_str($this->general_model->clearbadstr($ip_post['keyword']));
				$where .= "CONCAT(FIRST_NAME_TH, LAST_NAME_TH, FIRST_NAME_ENG, LAST_NAME_ENG, NICKNAME_TH, NICKNAME_ENG) LIKE '%".$keyword."%' AND ";
			}

			$where = substr($where, 0, -5);
		}

		$this->db->select('*');
		$this->db->from($this->table);
		$ip_post ? $this->db->where($where, NULL, FALSE) : '';
		$this->db->limit($limit,$offset);
		$this->db->order_by('ID', $sort);
		$query = $this->db->get();

		$msg['status']=1;
		$msg['data'] = $query->result_array();
		if (sizeof($msg['data'])<1) {
			$msg['status']=0;
			$msg['message']='ไม่มีข้อมูล';
			unset($msg['data']);
			goto error;
		}

		$this->db->select('*');
		$this->db->from($this->table);
		$ip_post ? $this->db->where($where, NULL, FALSE) : '';
		$query_total = $this->db->get();

		$msg['total'] = $query_total->num_rows();
		$msg['limit'] = (int)$limit;
		$msg['page'] = (int)$page;

		error:
		return $msg;
	}

	public function gets($id) {

		$this->db->from($this->table);
		$this->db->where('ID',$id);
		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get();

		$msg['status']=1;
		$msg['data'] = $query->result_array();
		if (sizeof($msg['data'])<1) {
			$msg['status']=0;
			$msg['message']='ไม่มีข้อมูล';
			unset($msg['data']);
		}
		return $msg;
	}

	public function gets_where($wheres=array()) {

		$this->db->from($this->table);
		foreach ($wheres as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get();

		$msg['status']=1;
		$msg['data'] = $query->result_array();
		if (sizeof($msg['data'])<1) {
			$msg['status']=0;
			$msg['message']='ไม่มีข้อมูล';
			unset($msg['data']);
		}
		return $msg;
	}

	public function inserts() {

		$msg['status']=0;
		$msg['message']='ไม่สามารถเพิ่มช้อมูลลงฐานข้อมูลได้ กรุณาลองใหม่อีกครั้ง';
		$ip_post = $this->input->post();

		// check id sale duplicate
		$this->db->from($this->table);
		$this->db->where('ID_SALE',(int)$ip_post['id_sale']);
		$query = $this->db->get();
		$res_query = $query->result_array();
		if (sizeof($res_query)>0) {
			$msg['status']=0;
			$msg['message']='มีข้อมูลอยู่ในระบบนี้แล้ว';
			goto error;
		}

		$data['ID_SALE'] = (int)$ip_post['id_sale'];
		$data['PREFIX'] = $this->general_model->clearbadstr($ip_post['prefix']);

		// move image
		if (isset($ip_post['image']) && !empty($ip_post['image'])) {
			$new_path_image = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image']), 'sales');
	        if (!$new_path_image['status']) {
				$msg=$new_path_image;
	        	return $msg;
	        }
			$data['IMAGE'] = $new_path_image['message'];
		}else{
			$data['IMAGE'] = '';
		}

		$explode_name_th = explode(' ', $this->general_model->clearbadstr($ip_post['name_surname_th']));
		if (empty($explode_name_th[1])) {
			$msg['message']='กรุณากรอกนามสกุลภาษาไทยด้วยครับ';
			goto error;
		}
		$data['FIRST_NAME_TH'] = $explode_name_th[0];
		$data['LAST_NAME_TH'] = $explode_name_th[1];

		$explode_name_eng = explode(' ', $this->general_model->clearbadstr($ip_post['name_surname_eng']));
		if (empty($explode_name_eng[1])) {
			$msg['message']='กรุณากรอกนามสกุลภาษาอังกฤษด้วยครับ';
			goto error;
		}
		$data['FIRST_NAME_ENG'] = $explode_name_eng[0];
		$data['LAST_NAME_ENG'] = $explode_name_eng[1];

		$data['NICKNAME_TH'] = $this->general_model->clearbadstr($ip_post['nickname_th']);
		$data['NICKNAME_ENG'] = $this->general_model->clearbadstr($ip_post['nickname_eng']);

		$chk_mail = $this->general_model->clearbadstr($ip_post['e_mail']);
		if (!$this->general_model->check_email($chk_mail)) {
			$msg['message']='กรุณากรอกอีเมลให้ถูกต้องด้วยครับ';
			goto error;
		}
		$data['EMAIL'] = $chk_mail;

		$chk_tel = $this->general_model->clearbadstr($ip_post['telephone']);
		if (!$this->general_model->check_telephone_number($chk_tel)) {
			$msg['message']='กรุณากรอกเบอร์โทรให้ครบถ้วนด้วยครับ';
			goto error;
		}
		$data['TELEPHONE'] = $chk_tel;

		$data['BIRTHDAY'] = date('Y-m-d', strtotime($this->general_model->clearbadstr($ip_post['birthday'])));
		$data['POSITION'] = $this->general_model->clearbadstr($ip_post['position']);
		$data['DEPARTMENT'] = $this->general_model->clearbadstr($ip_post['department']);
		$data['ZONE'] = $this->general_model->clearbadstr($ip_post['zone']);
		$data['COUNTY'] = $this->general_model->clearbadstr($ip_post['county']);
		$data['BRAND'] = $this->general_model->clearbadstr($ip_post['brand']);
		$data['ROLE'] = 2;
		$data['CREATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_CREATE'] = (int)$ip_post['user_create'];
		$data['PASSWORD'] = md5($data['FIRST_NAME_ENG'].KEY_PASSWORD);

		$this->db->insert($this->table, $data);
		$res_insert = $this->db->affected_rows()>0 ? true : false;

		if ($res_insert) {
			$res_insert_log = $this->logs_model->inserts($this->table, $this->db->insert_id(), 'insert', $data['USER_CREATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อย';
			}
		}

		error:
		return $msg;
	}

	public function updates($id) {

		// $ip_post = $this->input->post();

		// $data['first_name'] = $ip_post['first_name'];
		// $data['last_name'] = $ip_post['last_name'];
		// // if (! is_null($this->input->post('role'))) {
		// // 	$data['role'] = $ip_post['role'];
		// // }
		// // if (! is_null($this->input->post('password'))) {
		// // 	$data['password'] = md5($ip_post['password'].KEY_PASSWORD);
		// // }
		// $data['update_date'] = date('Y-m-d H:i:s');

		// $this->db->where('id', $id);
		// $this->db->update($this->table, $data);
		// return $this->db->affected_rows()>0 ? true : false;
	}

	public function deletes($id) {

		// $this->db->where('ID', $id);
		// $this->db->delete($this->table);
		// return $this->db->affected_rows()>0 ? true : false;
	}

	public function login() {

		$ip_login = $this->input->post();

		$data['ID_SALE'] = $ip_login['id_sale'];
		if (!is_numeric($data['ID_SALE'])) {
			$msg['status'] = 0;
			$msg['message'] = 'กรุณากรอกรหัสพนักงานให้ถูกต้องด้วยครับ';
			goto error;
		}
		$data['PASSWORD'] = md5($ip_login['password'].KEY_PASSWORD);

		$this->db->from($this->table);
		$this->db->where('ID_SALE',$data['ID_SALE']);
		$this->db->where('PASSWORD',$data['PASSWORD']);
		$query = $this->db->get();
		$res_query = $query->result_array();
		if (sizeof($res_query)>0) {
			$msg['status'] = 1;
			$msg['datas'] = 'เข้าสู่ระบบสำเร็จ';

			$userdata['sale'] = array(
			'ID_SALE' => $res_query[0]['ID_SALE'],
			'FIRST_NAME_ENG' => $res_query[0]['FIRST_NAME_ENG'],
			'LAST_NAME_ENG' => $res_query[0]['LAST_NAME_ENG'],
			'ROLE' => $res_query[0]['ROLE'],
			);
			$this->session->set_userdata($userdata);

		}else{
			$msg['status'] = 0;
			$msg['message'] = 'รหัสพนักงานหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง';
		}

		error:
		return $msg;
	}

	public function initial_admin() {

		// create admin
		$data['ID_SALE'] = 1018601;
		$data['PREFIX'] = 'Mr.';
		$data['IMAGE'] = 'uploads/sales/img-admin.jpg';
		$data['FIRST_NAME_TH'] = 'ผู้ดูแล';
		$data['LAST_NAME_TH'] = 'ระบบ';
		$data['FIRST_NAME_ENG'] = 'System';
		$data['LAST_NAME_ENG'] = 'Administrator';
		$data['NICKNAME_TH'] = 'ผู้ดูแลระบบ';
		$data['NICKNAME_ENG'] = 'Admin';
		$data['EMAIL'] = 'sarant@bjc.co.th';
		$data['TELEPHONE'] = '0999999999';
		$data['BIRTHDAY'] = date('Y-m-d');
		$data['POSITION'] = 'Admin';
		$data['DEPARTMENT'] = 'Admin';
		$data['ZONE'] = 'Admin';
		$data['COUNTY'] = 'Admin';
		$data['BRAND'] = 'Admin';
		$data['ROLE'] = 1;
		$data['CREATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_CREATE'] = 1018601;
		$data['PASSWORD'] = md5('saran'.KEY_PASSWORD);

		$this->db->from($this->table);
		$this->db->where('ID_SALE',$data['ID_SALE']);
		$query = $this->db->get();
		$res_query = $query->result_array();

		$msg['status']=0;
		$msg['message']='ไม่สามารถเพิ่มช้อมูลลงฐานข้อมูลได้ กรุณาลองใหม่อีกครั้ง';
		if (sizeof($res_query)>0) {
			$msg['message']='มีข้อมูลแอดมินอยู่ในระบบนี้แล้ว';
			goto error;
		}else{

			$this->db->insert($this->table, $data);
			$res_insert = $this->db->affected_rows()>0 ? true : false;

			if ($res_insert) {
				$msg['status']=1;
				$msg['message'] = 'เพิ่มข้อมูลแอดมินเรียบร้อย';
				$this->logs_model->inserts($this->table, $this->db->insert_id(), 'insert', $data['USER_CREATE']);
			}
		}


		error:
		return $msg;
	}

}
?>