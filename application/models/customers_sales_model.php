<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_sales_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'CUSTOMERS_SALE';
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

		/* SELECT COLUME SHOWS */
		$arr_col_show[$this->table] = ['ID','CUSTOMERS_ID','SALES_ID'];
		$arr_col_show['SALES'] = ['IMAGE','FIRST_NAME_TH','LAST_NAME_TH','FIRST_NAME_ENG','LAST_NAME_ENG','NICKNAME_TH','NICKNAME_ENG','DEPARTMENT_ID'];

		$str_select = '';
		foreach ($arr_col_show as $key => $value) {
			if (sizeof($value)>0) {
				foreach ($value as $k => $val) {
					$str_select .= $key.'.'.$val.' AS '.$val.',';
				}
			}
		}
		$str_select = substr($str_select, 0, -1);
		/* END SELECT COLUME SHOWS */

		$this->db->select($str_select);
		$this->db->from($this->table);
		$this->db->join('SALES', 'SALES.ID='.$this->table.'.SALES_ID AND '.$this->table.'.STATUS_DELETE=0 AND SALES.STATUS_DELETE=0', 'left outer');
		foreach ($wheres as $key => $value) {
			$this->db->where($this->table.'.'.$key, $value);
		}
		$this->db->where($this->table.'.STATUS_DELETE', 0);
		$this->db->order_by($this->table.'.ID', 'DESC');
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

	public function inserts($arr=array()) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถเพิ่มช้อมูล SALES DETAIL ได้กรุณาลองใหม่อีกครั้ง';

		if (sizeof($arr)<0) {
			$msg['message']='ไม่มีข้อมูล';
			goto error;
		}
		
		$this->db->insert($this->table, $arr);
		$res_insert = $this->db->affected_rows();

		if ($res_insert > 0) {
			$res_insert_log = $this->logs_model->inserts($this->table, $this->db->insert_id(), 'insert', $arr['USER_CREATE']);
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

		// Hospital
		$data['RATING_HOSPITAL'] = (int)$ip_post['rating_hospital'];
		$data['CUSTOMER_ID_HOSPITAL'] = $this->general_model->clearbadstr($ip_post['customer_id_hospital']);
		$data['HOSPITAL_NAME_TH'] = $this->general_model->clearbadstr($ip_post['hospital_name_th']);
		$data['HOSPITAL_NAME_ENG'] = $this->general_model->clearbadstr($ip_post['hospital_name_eng']);
		$data['ORDER_AMOUNT_HOSPITAL'] = (int)$ip_post['order_amount_hospital'];

		// Doctor
		$data['RELATIONSHIP_DOCTOR'] = (int)$ip_post['relationship_doctor'];
		$data['NAME_SURNAME_DOCTOR'] = $this->general_model->clearbadstr($ip_post['name_surname_doctor']);
		$chk_mail_doctor = $this->general_model->clearbadstr($ip_post['e_mail_doctor']);
		if (!$this->general_model->check_email($chk_mail_doctor)) {
			$msg['message']='กรุณากรอกอีเมลให้ถูกต้องด้วยครับ';
			goto error;
		}
		$data['E_MAIL_DOCTOR'] = $chk_mail_doctor;

		$chk_tel_doctor = $this->general_model->clearbadstr($ip_post['telephone_doctor']);
		if (!$this->general_model->check_telephone_number($chk_tel_doctor)) {
			$msg['message']='กรุณากรอกเบอร์โทรให้ครบถ้วนด้วยครับ';
			goto error;
		}
		$data['TELEPHONE_DOCTOR'] = $chk_tel_doctor;
		$data['BIRTHDAY_DOCTOR'] = date('Y-m-d', strtotime($this->general_model->clearbadstr($ip_post['birthday_doctor'])));

		// Purchase
		$data['RELATIONSHIP_PURCHASE'] = (int)$ip_post['relationship_purchase'];
		$data['NAME_SURNAME_PURCHASE'] = $this->general_model->clearbadstr($ip_post['name_surname_purchase']);
		$chk_mail_purchase = $this->general_model->clearbadstr($ip_post['e_mail_purchase']);
		if (!$this->general_model->check_email($chk_mail_purchase)) {
			$msg['message']='กรุณากรอกอีเมลให้ถูกต้องด้วยครับ';
			goto error;
		}
		$data['E_MAIL_PURCHASE'] = $chk_mail_purchase;

		$chk_tel_purchase = $this->general_model->clearbadstr($ip_post['telephone_purchase']);
		if (!$this->general_model->check_telephone_number($chk_tel_purchase)) {
			$msg['message']='กรุณากรอกเบอร์โทรให้ครบถ้วนด้วยครับ';
			goto error;
		}
		$data['TELEPHONE_PURCHASE'] = $chk_tel_purchase;
		$data['BIRTHDAY_PURCHASE'] = date('Y-m-d', strtotime($this->general_model->clearbadstr($ip_post['birthday_purchase'])));

		$data['UPDATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_UPDATE'] = (int)$ip_post['user_create'];

		// move image Hospital
		if (isset($ip_post['image_hospital']) && !empty($ip_post['image_hospital']) && $ip_post['image_hospital']!=$ip_post['old_image_hospital']) {
			$new_path_image_hospital = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_hospital']), 'hospitals');
	        if (!$new_path_image_hospital['status']) {
				$msg_img=$new_path_image_hospital;
	        	return $msg_img;
	        }
			$data['IMAGE_HOSPITAL'] = $new_path_image_hospital['message'];
			$status_upload_new = TRUE;
		}else{
			$data['IMAGE_HOSPITAL'] = $ip_post['image_hospital'];
		}

		// move image Doctor
		if (isset($ip_post['image_doctor']) && !empty($ip_post['image_doctor']) && $ip_post['image_doctor']!=$ip_post['old_image_doctor']) {
			$new_path_image_doctor = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_doctor']), 'doctors');
	        if (!$new_path_image_doctor['status']) {
				$msg_img=$new_path_image_doctor;
	        	return $msg_img;
	        }
			$data['IMAGE_DOCTOR'] = $new_path_image_doctor['message'];
			$status_upload_new = TRUE;
		}else{
			$data['IMAGE_DOCTOR'] = $ip_post['image_doctor'];
		}

		// move image Purchase
		if (isset($ip_post['image_purchase']) && !empty($ip_post['image_purchase']) && $ip_post['image_purchase']!=$ip_post['old_image_purchase']) {
			$new_path_image_purchase = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_purchase']), 'purchases');
	        if (!$new_path_image_purchase['status']) {
				$msg_img=$new_path_image_purchase;
	        	return $msg_img;
	        }
			$data['IMAGE_PURCHASE'] = $new_path_image_purchase['message'];
			$status_upload_new = TRUE;
		}else{
			$data['IMAGE_PURCHASE'] = $ip_post['image_purchase'];
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
				// delete old image Hospital
		        if (isset($ip_post['old_image_hospital']) && !empty($ip_post['old_image_hospital'])) {
		        	$old_image_hospital = $this->general_model->clearbadstr($ip_post['old_image_hospital']);
		        	$res_delete_image_hospital = unlink(DOCUMENT_ROOT.$old_image_hospital);
		        	if (!$res_delete_image_hospital) {
		        		$msg['status']=0;
						$msg['message']='ไม่สามารถลบไฟล์รูป Hospital ได้ กรุณาลองใหม่อีกครั้ง';
		        	}
		        }

		        // delete old image Doctor
		        if (isset($ip_post['old_image_doctor']) && !empty($ip_post['old_image_doctor'])) {
		        	$old_image_doctor = $this->general_model->clearbadstr($ip_post['old_image_doctor']);
		        	$res_delete_image_doctor = unlink(DOCUMENT_ROOT.$old_image_doctor);
		        	if (!$res_delete_image_doctor) {
		        		$msg['status']=0;
						$msg['message']='ไม่สามารถลบไฟล์รูป Doctor ได้ กรุณาลองใหม่อีกครั้ง';
		        	}
		        }

		        // delete old image Purchase
		        if (isset($ip_post['old_image_purchase']) && !empty($ip_post['old_image_purchase'])) {
		        	$old_image_purchase = $this->general_model->clearbadstr($ip_post['old_image_purchase']);
		        	$res_delete_image_purchase = unlink(DOCUMENT_ROOT.$old_image_purchase);
		        	if (!$res_delete_image_purchase) {
		        		$msg['status']=0;
						$msg['message']='ไม่สามารถลบไฟล์รูป Purchase ได้ กรุณาลองใหม่อีกครั้ง';
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

	/* Check Data Sales Detail */
	public function chk_sale_detail($arr=array(), $user_create='', $id='') {

		$msg['status']=0;
		$msg['message']='ไม่มีข้อมูล';
		if ($user_create=='') {
			$msg['message']='กรุณาเข้าสู่ระบบเพื่อทำรายการด้วยครับ';
			goto error;
		}
		if ($id=='') {
			$msg['message']='กรุณาระบุไอดีที่จะทำรายการด้วยครับ';
			goto error;
		}

		$is=0;
		foreach ($arr as $k_sales => $val_sales) {
			if ($val_sales['id']!='') {
				$data['sales_detail'][$is]['CUSTOMERS_ID'] = (int)$id;
				$data['sales_detail'][$is]['SALES_ID'] = (int)$val_sales['id'];
				$data['sales_detail'][$is]['STATUS_DELETE'] = 0;
				$data['sales_detail'][$is]['CREATE_DATE'] =  date('Y-m-d H:i:s');
				$data['sales_detail'][$is]['USER_CREATE'] = (int)$user_create;
				$is++;
			}
		}

		if (sizeof($data['sales_detail'])>0) {
			$msg['status']=1;
			$msg['message']=$data;
		}

		error:
		return $msg;
	}

}
?>