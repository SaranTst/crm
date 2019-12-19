<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'SERVICES';
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

			if (isset($ip_post['department_id']) && !empty($ip_post['department_id'])) {
				$where .= "DEPARTMENT_ID = '".$this->general_model->clearbadstr($ip_post['department_id'])."' AND ";
			}

			if (isset($ip_post['zone_id']) && !empty($ip_post['zone_id'])) {
				$where .= "ZONE_ID = '".$this->general_model->clearbadstr($ip_post['zone_id'])."' AND ";
			}

			if (isset($ip_post['county']) && !empty($ip_post['county'])) {
				$keyword = $this->db->escape_like_str($this->general_model->clearbadstr($ip_post['county']));
				$where .= "COUNTY LIKE '%".$keyword."%' AND ";
			}

			if (isset($ip_post['position_id']) && !empty($ip_post['position_id'])) {
				$where .= "POSITION_ID = '".$this->general_model->clearbadstr($ip_post['position_id'])."' AND ";
			}

			if (isset($ip_post['brand_id']) && !empty($ip_post['brand_id'])) {
				$where .= "BRAND_ID = '".$this->general_model->clearbadstr($ip_post['brand_id'])."' AND ";
			}

			if (isset($ip_post['keyword']) && !empty($ip_post['keyword'])) {
				$keyword = $this->db->escape_like_str($this->general_model->clearbadstr($ip_post['keyword']));
				$where .= "CONCAT(FIRST_NAME_TH, LAST_NAME_TH, FIRST_NAME_ENG, LAST_NAME_ENG, NICKNAME_TH, NICKNAME_ENG) LIKE '%".$keyword."%' AND ";
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

	public function lists_id_service() {

		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';
		$where = "STATUS_DELETE = 0"; // status_delete 0 => no delete / 1 => delete

		$this->db->select('ID,ID_EMPLOYEE');
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
				$arr_vendername[$value['ID']] = $value['ID_EMPLOYEE'];
			}
			$msg['data'] = $arr_vendername;
		}

		$this->db->select('ID_EMPLOYEE');
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

		// check id service duplicate
		$this->db->from($this->table);
		$this->db->where('ID_EMPLOYEE',(int)$ip_post['id_employee']);
		$query = $this->db->get();
		$res_query = $query->result_array();
		if (sizeof($res_query)>0) {
			$msg['status']=0;
			$msg['message']='มีข้อมูลอยู่ในระบบนี้แล้ว';
			goto error;
		}

		$data['ID_EMPLOYEE'] = (int)$ip_post['id_employee'];
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
		$data['POSITION_ID'] = (int)$ip_post['position_id'];
		$data['DEPARTMENT_ID'] = (int)$ip_post['department_id'];
		$data['ZONE_ID'] = (int)$ip_post['zone_id'];
		$data['COUNTY'] = isset($ip_post['county'])&&!empty($ip_post['county']) ? $this->general_model->clearbadstr($ip_post['county']) : '';
		$data['BRAND_ID'] = isset($ip_post['brand_id'])&&!empty($ip_post['brand_id']) ? (int)$ip_post['brand_id'] : 0;
		$data['STATUS_DELETE'] = 0;
		$data['CREATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_CREATE'] = (int)$ip_post['user_create'];
		$data['PASSWORD'] = md5($data['FIRST_NAME_ENG'].KEY_PASSWORD);

		// move image
		if (isset($ip_post['image']) && !empty($ip_post['image'])) {
			$new_path_image = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image']), 'services');
	        if ($new_path_image['status']==0) {
				$msg_img=$new_path_image;
	        	return $msg_img;
	        }
			$data['IMAGE'] = $new_path_image['message'];
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
		$status_upload_new = FALSE;

		$data['ID_EMPLOYEE'] = (int)$ip_post['id_employee'];
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
		$data['POSITION_ID'] = (int)$ip_post['position_id'];
		$data['DEPARTMENT_ID'] = (int)$ip_post['department_id'];
		$data['ZONE_ID'] = (int)$ip_post['zone_id'];
		$data['COUNTY'] = isset($ip_post['county'])&&!empty($ip_post['county']) ? $this->general_model->clearbadstr($ip_post['county']) : '';
		$data['BRAND_ID'] = isset($ip_post['brand_id'])&&!empty($ip_post['brand_id']) ? (int)$ip_post['brand_id'] : 0;
		$data['UPDATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_UPDATE'] = (int)$ip_post['user_create'];

		// move image
		if (isset($ip_post['image']) && !empty($ip_post['image']) && $ip_post['image']!=$ip_post['old_image']) {
			$new_path_image = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image']), 'services');
	        if ($new_path_image['status']==0) {
				$msg_img=$new_path_image;
	        	return $msg_img;
	        }
			$data['IMAGE'] = $new_path_image['message'];
			$status_upload_new = TRUE;
		}else{
			$data['IMAGE'] = $ip_post['image'];
		}


		$this->db->where('ID', $id);
		$this->db->update($this->table, $data);
		$res_update = $this->db->affected_rows();
		if ($res_update > 0) {

			$res_insert_log = $this->logs_model->inserts($this->table, $id, 'update', $data['USER_UPDATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='แก้ไขข้อมูลเรียบร้อย';
			}

			if ($status_upload_new) {
				// delete old image
		        if (isset($ip_post['old_image']) && !empty($ip_post['old_image'])) {
		        	$old_image = $this->general_model->clearbadstr($ip_post['old_image']);
		        	$res_delete_image = unlink(DOCUMENT_ROOT.$old_image);
		        	if (!$res_delete_image) {
		        		$msg['status']=0;
						$msg['message']='ไม่สามารถลบไฟล์รูปได้ กรุณาลองใหม่อีกครั้ง';
		        	}
		        }
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
		$user_delete = (int)$ip_post['user_delete'];

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