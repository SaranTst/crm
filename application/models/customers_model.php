<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'CUSTOMERS';
		$this->load->model('general_model');
		$this->load->model('logs_model');
		$this->load->model('customers_sales_model');
		$this->load->model('customers_service_model');
		$this->load->model('customers_bjc_product_model');
		$this->load->model('customers_other_product_model');
		$this->load->model('customers_personnel_model');

		$this->table_sales_detail = 'CUSTOMERS_SALE';
		$this->table_service_detail = 'CUSTOMERS_SERVICE';
		$this->table_bjc_product_detail = 'CUSTOMERS_PRODUCT_BJC';
		$this->table_other_product_detail = 'CUSTOMERS_PRODUCT_OTHER';
		$this->table_personnel_detail = 'CUSTOMERS_PERSONNEL';
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
				$where .= "CONCAT(HOSPITAL_NAME_TH, HOSPITAL_NAME_ENG) LIKE '%".$keyword."%' AND ";
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

	public function gets_more_customer($id=null) {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 3;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$ip_post = $this->input->post();
		$where = $this->table.".ID=".$id;
		$where .= " AND ".$this->table.".STATUS_DELETE=0"; // status_delete 0 => no delete / 1 => delete

		/* SELECT COLUME SHOWS */
		// $arr_col_show[$this->table] = ['ID','RATING_HOSPITAL','IMAGE_HOSPITAL','CUSTOMER_ID_HOSPITAL'];
		// $arr_col_show[$this->table_sales_detail] = ['ID','SALES_ID'];
		// $arr_col_show[$this->table_service_detail] = ['ID','SERVICES_ID'];
		// $arr_col_show[$this->table_bjc_product_detail] = ['ID','SN','BRANDS_ID','SALES_ID','SERVICES_ID','WARRANTY','MODEL','UNIT','PRICE'];
		// $arr_col_show[$this->table_other_product_detail] = ['ID','BRANDS_ID','MODEL','UNIT'];
		// $arr_col_show[$this->table_personnel_detail] = ['ID','RELATIONSHIP','PREFIX','POSITION_ID','IMAGE','FIRST_NAME_TH','LAST_NAME_TH','FIRST_NAME_ENG','LAST_NAME_ENG','EMAIL','TELEPHONE','BIRTHDAY','GENDER','SALES_ID','CONTACT_CHANNAL','EVENT','DATE_STAMP','BRANDS_ID','MODEL','STATUS','CONFIDENT','REMARKS'];

		// $str_select = '';
		// foreach ($arr_col_show as $key => $value) {
		// 	if (sizeof($value)>0) {
		// 		foreach ($value as $k => $val) {
		// 			$str_select .= $key.'.'.$val.' AS '.$key.'_'.$val.',';
		// 		}
		// 	}
		// }
		// $str_select = substr($str_select, 0, -1);
		/* END SELECT COLUME SHOWS */

		// $this->db->select($str_select);
		$this->db->select('*');
		$this->db->from($this->table);
		// $this->db->join($this->table_sales_detail, $this->table.'.ID='.$this->table_sales_detail.'.CUSTOMERS_ID AND '.$this->table_sales_detail.'.STATUS_DELETE=0', 'left outer');
		// $this->db->join($this->table_service_detail, $this->table.'.ID='.$this->table_service_detail.'.CUSTOMERS_ID AND '.$this->table_service_detail.'.STATUS_DELETE=0', 'left outer');
		// $this->db->join($this->table_bjc_product_detail, $this->table.'.ID='.$this->table_bjc_product_detail.'.CUSTOMERS_ID AND '.$this->table_bjc_product_detail.'.STATUS_DELETE=0', 'left outer');
		// $this->db->join($this->table_other_product_detail, $this->table.'.ID='.$this->table_other_product_detail.'.CUSTOMERS_ID AND '.$this->table_other_product_detail.'.STATUS_DELETE=0', 'left outer');
		// $this->db->join($this->table_personnel_detail, $this->table.'.ID='.$this->table_personnel_detail.'.CUSTOMERS_ID AND '.$this->table_personnel_detail.'.STATUS_DELETE=0', 'left outer');

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

		if ($msg['status']==1) {
			
			$customer_id = $msg['data'][0]['ID'];
			$salse_detail = $this->customers_sales_model->gets_where(array('CUSTOMERS_ID' => $customer_id));
			$service_detail = $this->customers_service_model->gets_where(array('CUSTOMERS_ID' => $customer_id));
			$product_bjc = $this->customers_bjc_product_model->gets_where(array('CUSTOMERS_ID' => $customer_id));
			$product_other = $this->customers_other_product_model->gets_where(array('CUSTOMERS_ID' => $customer_id));
			$personnel_detail = $this->customers_personnel_model->gets_where(array('CUSTOMERS_ID' => $customer_id));

			$msg['salse_detail']=$salse_detail['status']==1 ? $salse_detail['data'] : array();
			$msg['service_detail']=$service_detail['status']==1 ? $service_detail['data'] : array();
			$msg['product_bjc']=$product_bjc['status']==1 ? $product_bjc['data'] : array();
			$msg['product_other']=$product_other['status']==1 ? $product_other['data'] : array();
			$msg['personnel_detail']=$personnel_detail['status']==1 ? $personnel_detail['data'] : array();
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

		$data['STATUS_DELETE'] = 0;
		$data['CREATE_DATE'] = date('Y-m-d H:i:s');
		$data['USER_CREATE'] = (int)$ip_post['user_create'];

		// move image Hospital
		if (isset($ip_post['image_hospital']) && !empty($ip_post['image_hospital'])) {
			$new_path_image_hospital = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_hospital']), 'hospitals');
	        if (!$new_path_image_hospital['status']) {
				$msg_img=$new_path_image_hospital;
	        	return $msg_img;
	        }
			$data['IMAGE_HOSPITAL'] = $new_path_image_hospital['message'];
		}

		// move image Doctor
		if (isset($ip_post['image_doctor']) && !empty($ip_post['image_doctor'])) {
			$new_path_image_doctor = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_doctor']), 'doctors');
	        if (!$new_path_image_doctor['status']) {
				$msg_img=$new_path_image_doctor;
	        	return $msg_img;
	        }
			$data['IMAGE_DOCTOR'] = $new_path_image_doctor['message'];
		}

		// move image Purchase
		if (isset($ip_post['image_purchase']) && !empty($ip_post['image_purchase'])) {
			$new_path_image_purchase = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_purchase']), 'purchases');
	        if (!$new_path_image_purchase['status']) {
				$msg_img=$new_path_image_purchase;
	        	return $msg_img;
	        }
			$data['IMAGE_PURCHASE'] = $new_path_image_purchase['message'];
		}

		$this->db->insert($this->table, $data);
		$res_insert = $this->db->affected_rows();

		if ($res_insert > 0) {
			$id_insert = $this->db->insert_id();
			$res_insert_log = $this->logs_model->inserts($this->table, $id_insert, 'insert', $data['USER_CREATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อย';

				if (isset($ip_post['moreinfo']) && !empty($ip_post['moreinfo'])) {
					$msg['message']=$id_insert;
				}
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

	    	if (isset($ip_post['moreinfo']) && !empty($ip_post['moreinfo'])) {
				$msg['message']=$id;
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


	/* Insert/Update More Create Customer*/
	public function updates_more_customer($id=null) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถเพิ่มช้อมูลลงฐานข้อมูลได้ กรุณาลองใหม่อีกครั้ง';
		$ip_post = $this->input->post();
		$user_create = $ip_post['user_create'];

		// Sales Detail
		if (isset($ip_post['sales_detail']) && !empty($ip_post['sales_detail'])) {
			$data_sales = $this->customers_sales_model->chk_sale_detail($ip_post['sales_detail'],$user_create,$id);
			if ($data_sales['status']==0) {
				$msg['message']=$data_sales['message'];
				goto error;
			}
		}else{
			$msg['message']='กรุณาระบุเซลอย่างน้อย 1 คน';
			goto error;
		}

		// Service Detail
		if (isset($ip_post['service_detail']) && !empty($ip_post['service_detail'])) {
			$data_service = $this->customers_service_model->chk_service_detail($ip_post['service_detail'],$user_create,$id);
			if ($data_service['status']==0) {
				$msg['message']=$data_service['message'];
				goto error;
			}
		}else{
			$msg['message']='กรุณาระบุเซอร์วิสอย่างน้อย 1 คน';
			goto error;
		}

		// Bjc Product Detail
		if (isset($ip_post['bjc_product_detail']) && !empty($ip_post['bjc_product_detail'])) {
			$data_bjc_product = $this->customers_bjc_product_model->chk_bjc_product($ip_post['bjc_product_detail'],$user_create,$id);
			if ($data_bjc_product['status']==0) {
				$msg['message']=$data_bjc_product['message'];
				goto error;
			}
		}else{
			$msg['message']='กรุณาระบุผลิตภัณฑ์ Bjc อย่างน้อย 1 ผลิตภัณฑ์';
			goto error;
		}

		// Other Product Detail
		if (isset($ip_post['other_product_detail']) && !empty($ip_post['other_product_detail'])) {
			$data_other_product = $this->customers_other_product_model->chk_other_product($ip_post['other_product_detail'],$user_create,$id);
			if ($data_other_product['status']==0) {
				$msg['message']=$data_other_product['message'];
				goto error;
			}
		}else{
			$msg['message']='กรุณาระบุผลิตภัณฑ์ที่ไม่ใช้ของ Bjc อย่างน้อย 1 ผลิตภัณฑ์';
			goto error;
		}


		// Personnel Detail
		if (isset($ip_post['personnel_detail']) && !empty($ip_post['personnel_detail'])) {
			$data_personnel = $this->customers_personnel_model->chk_personnel($ip_post['personnel_detail'],$user_create,$id);
			if ($data_personnel['status']==0) {
				$msg['message']=$data_personnel['message'];
				goto error;
			}
		}


		//Action Insert Data Sales Detail
		foreach ($data_sales['message']['sales_detail'] as $key => $value) {

			$res_sales_model = $this->customers_sales_model->inserts($value);
			if ($res_sales_model['status']==0) {
				$msg['message']=$res_sales_model['message'];
				goto error;
			}
		}

		//Action Insert Data Service Detail
		foreach ($data_service['message']['service_detail'] as $key => $value) {

			$res_service_model = $this->customers_service_model->inserts($value);
			if ($res_service_model['status']==0) {
				$msg['message']=$res_service_model['message'];
				goto error;
			}
		}

		//Action Insert Data Bjc Product
		foreach ($data_bjc_product['message']['bjc_product_detail'] as $key => $value) {

			$res_bjc_product_model = $this->customers_bjc_product_model->inserts($value);
			if ($res_bjc_product_model['status']==0) {
				$msg['message']=$res_bjc_product_model['message'];
				goto error;
			}
		}

		//Action Insert Data Other Product
		foreach ($data_other_product['message']['other_product_detail'] as $key => $value) {

			$res_other_product_model = $this->customers_other_product_model->inserts($value);
			if ($res_other_product_model['status']==0) {
				$msg['message']=$res_other_product_model['message'];
				goto error;
			}
		}

		//Action Insert Data Personnel
		foreach ($data_personnel['message']['personnel_detail'] as $key => $value) {

			$res_personnel_model = $this->customers_personnel_model->inserts($value);
			if ($res_personnel_model['status']==0) {
				$msg['message']=$res_personnel_model['message'];
				goto error;
			}
		}

		$msg['status']=1;
		$msg['message']='เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อย';

		error:
		return $msg;
	}

	public function updates_expertise_customer($id=null) {

		$msg['status'] = 0;
		$msg['message'] = 'แก้ไขช้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง';

		if (!$id) {
			$msg['status']=0;
			$msg['message']='กรุณาไอดีที่ต้องการแก้ไขข้อมูลด้วยครับ';
			goto error;
		}
		$ip_post = $this->input->post();
		$user_create = (int)$ip_post['user_create'];

		$data['EXPERTISE'] = (int)$ip_post['customer_expertise'];;
		$this->db->where('ID', $id);
		$this->db->update($this->table, $data);
		$res_delete = $this->db->affected_rows();

		if ($res_delete > 0) {

			$res_insert_log = $this->logs_model->inserts($this->table, $id, 'update', $user_create);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='แก้ไขข้อมูลสำเร็จ';
			}
		}

		error:
		return $msg;
	}

}
?>