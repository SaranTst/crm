<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'BRANDS';
		$this->load->model('general_model');
		$this->load->model('logs_model');
	}

	public function lists() {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 3;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$ip_post = $this->input->post();
		$where = "";
		if ($ip_post) {

			if (isset($ip_post['search']) && !empty($ip_post['search'])) {
				$keyword = $this->db->escape_like_str($this->general_model->clearbadstr($ip_post['search']));
				$where .= "CONCAT(VENDOR_NAME, COUNTY) LIKE '%".$keyword."%' AND ";
			}
		}
		$where .= "STATUS_DELETE = 0"; // status_delete 0 => no delete / 1 => delete

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($where, NULL, FALSE);
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
		$this->db->where($where, NULL, FALSE);
		$query_total = $this->db->get();

		$msg['total'] = $query_total->num_rows();
		$msg['limit'] = (int)$limit;
		$msg['page'] = (int)$page;

		error:
		return $msg;
	}

	public function lists_vendorname() {

		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';
		$where = "STATUS_DELETE = 0"; // status_delete 0 => no delete / 1 => delete

		$this->db->select('ID,VENDOR_NAME');
		$this->db->from($this->table);
		$this->db->where($where, NULL, FALSE);
		$this->db->order_by('ID', $sort);
		$query = $this->db->get();

		$msg['status']=1;
		$msg['data'] = $query->result_array();
		if (sizeof($msg['data'])<1) {
			$msg['status']=0;
			$msg['message']='ไม่มีข้อมูล';
			unset($msg['data']);
			goto error;
		}else{
			$data = $msg['data'];
			$arr_vendername = array();
			foreach ($data as $key => $value) {
				$arr_vendername[$value['ID']] = $value['VENDOR_NAME'];
			}
			$msg['data'] = $arr_vendername;
		}

		$this->db->select('VENDOR_NAME');
		$this->db->from($this->table);
		$this->db->where($where, NULL, FALSE);
		$query_total = $this->db->get();

		$msg['total'] = $query_total->num_rows();

		error:
		return $msg;
	}

	public function gets($id=null) {

		if (!$id) {
			$msg['status']=0;
			$msg['message']='กรุณาไอดีที่ต้องการค้นหาด้วยครับ';
			goto error;
		}

		$this->db->from($this->table);
		$this->db->where('ID',$id);
		$this->db->where('STATUS_DELETE', 0);
		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get();

		$msg['status']=1;
		$msg['data'] = $query->result_array();
		if (sizeof($msg['data'])<1) {
			$msg['status']=0;
			$msg['message']='ไม่มีข้อมูล';
			unset($msg['data']);
		}

		error:
		return $msg;
	}

	public function gets_where($wheres=array()) {

		$this->db->from($this->table);
		foreach ($wheres as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->where('STATUS_DELETE', 0);
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
		$vender_name = strtoupper($this->general_model->clearbadstr($ip_post['vendor_name']));

		// check id brand duplicate
		$this->db->from($this->table);
		$this->db->where('VENDOR_NAME',$vender_name);
		$query = $this->db->get();
		$res_query = $query->result_array();
		if (sizeof($res_query)>0) {
			$msg['status']=0;
			$msg['message']='มีข้อมูลอยู่ในระบบนี้แล้ว';
			goto error;
		}

		$data['VENDOR_NAME'] = $vender_name;
		$data['COUNTY'] = $this->general_model->clearbadstr($ip_post['county']);
		$data['TEAM'] = $this->general_model->clearbadstr($ip_post['team']);
		$data['EXPERTISE'] = $this->general_model->clearbadstr($ip_post['expertise']);
		$data['SOLUTION_EQUIPMENT'] = $this->general_model->clearbadstr($ip_post['solution_equipment']);
		$data['ADDRESS'] = $this->general_model->clearbadstr($ip_post['address']);
		$data['WEBSITE'] = $this->general_model->clearbadstr($ip_post['website']);
		$data['CONTACT_PERSON_RA'] = $this->general_model->clearbadstr($ip_post['contact_person_ra']);
		$data['CONTACT_INTER_SUPPORT'] = $this->general_model->clearbadstr($ip_post['contact_inter_support']);
		$data['MANUFACTURING'] = $this->general_model->clearbadstr($ip_post['manufacturing']);
		$data['STATUS_DELETE'] = 0;
		$data['CREATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_CREATE'] = (int)$ip_post['user_create'];

		// move image
		if (isset($ip_post['image']) && !empty($ip_post['image'])) {
			$new_path_image = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image']), 'brand');
	        if (!$new_path_image['status']) {
				$msg=$new_path_image;
	        	return $msg;
	        }
			$data['LOGO'] = $new_path_image['message'];
		}else{
			$data['LOGO'] = '';
		}

		$this->db->insert($this->table, $data);
		$res_insert = $this->db->affected_rows();

		if ($res_insert > 0) {
			$res_insert_log = $this->logs_model->inserts($this->table, $this->db->insert_id(), 'insert', $data['USER_CREATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อย';
			}
		}

		error:
		return $msg;
	}

	public function updates($id=null) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่อีกครั้ง';
		$ip_post = $this->input->post();

		$data['ID_SALE'] = (int)$ip_post['id_sale'];
		$data['PREFIX'] = (int)$ip_post['prefix'];

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
		$data['POSITION'] = (int)$ip_post['position'];
		$data['DEPARTMENT'] = (int)$ip_post['department'];
		$data['ZONE'] = (int)$ip_post['zone'];
		$data['COUNTY'] = $this->general_model->clearbadstr($ip_post['county']);
		$data['BRAND'] = (int)$ip_post['brand'];
		$data['UPDATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_UPDATE'] = (int)$ip_post['user_create'];

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


		$this->db->where('ID', $id);
		$this->db->update($this->table, $data);
		$res_update = $this->db->affected_rows();
		if ($res_update > 0) {

			// delete old image
	        if (isset($ip_post['old_image']) && !empty($ip_post['old_image'])) {
	        	$old_image = $this->general_model->clearbadstr($ip_post['old_image']);
	        	$res_delete_image = unlink(DOCUMENT_ROOT.$old_image);
	        	if (!$res_delete_image) {
	        		$msg['status']=0;
					$msg['message']='ไม่สามารถลบไฟล์รูปได้ กรุณาลองใหม่อีกครั้ง';
	        		goto error;
	        	}
	        }

			$res_insert_log = $this->logs_model->inserts($this->table, $id, 'update', $data['USER_UPDATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='แก้ไขข้อมูลเรียบร้อย';
			}
		}

		error:
		return $msg;
	}

	public function deletes($id=null) {

		$msg['status'] = 0;
		$msg['message'] = 'ลบช้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง';

		if (!$id) {
			$msg['status']=0;
			$msg['message']='กรุณาไอดีที่ต้องการลบข้อมูลด้วยครับ';
			goto error;
		}
		$ip_post = $this->input->post();
		$user_delete = (int)$ip_post['USER_DELETE'];

		$data['STATUS_DELETE'] = 1;
		$this->db->where('ID', $id);
		$this->db->update($this->table, $data);
		$res_delete = $this->db->affected_rows();

		if ($res_delete > 0) {

			$res_insert_log = $this->logs_model->inserts($this->table, $id, 'delete', $user_delete);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='ลบข้อมูลสำเร็จ';
			}
		}

		error:
		return $msg;
	}

}
?>