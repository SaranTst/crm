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
				// $where .= "CONCAT(HOSPITAL_NAME_TH, HOSPITAL_NAME_ENG) LIKE '%".$keyword."%' AND ";
				$where .= "HOSPITAL_NAME_TH LIKE '%".$keyword."%' OR ";
				$where .= "HOSPITAL_NAME_ENG LIKE '%".$keyword."%' AND ";
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

	public function gets_more_customer_old($id=null) {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 3;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$ip_post = $this->input->post();
		$where = $this->table.".ID=".$id;
		$where .= " AND ".$this->table.".STATUS_DELETE=0"; // status_delete 0 => no delete / 1 => delete
		
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

	public function gets_more_customer($id=null) {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 500;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$ip_post = $this->input->post();
		$where = $this->table.".ID=".$id;
		$where .= " AND ".$this->table.".STATUS_DELETE=0"; // status_delete 0 => no delete / 1 => delete

		/* SELECT COLUME SHOWS */
		$arr_col_show[$this->table] = ['ID','EXPERTISE'];
		$arr_col_show[$this->table_sales_detail] = ['ID','SALES_ID'];
		$arr_col_show['SALES'] = ['ID','IMAGE','FIRST_NAME_TH','LAST_NAME_TH','FIRST_NAME_ENG','LAST_NAME_ENG','NICKNAME_TH','NICKNAME_ENG','DEPARTMENT_ID'];

		$arr_col_show[$this->table_service_detail] = ['ID','SERVICES_ID'];
		$arr_col_show['SERVICES'] = ['IMAGE','FIRST_NAME_TH','LAST_NAME_TH','FIRST_NAME_ENG','LAST_NAME_ENG','NICKNAME_TH','NICKNAME_ENG','DEPARTMENT_ID'];

		$arr_col_show[$this->table_bjc_product_detail] = ['ID','SN','BRANDS_ID','SALES_ID','SERVICES_ID','WARRANTY','MODEL','UNIT','PRICE'];
		$arr_col_show[$this->table_other_product_detail] = ['ID','BRANDS_ID','MODEL','UNIT'];
		$arr_col_show[$this->table_personnel_detail] = ['ID','RELATIONSHIP','PREFIX','POSITION_ID','IMAGE','FIRST_NAME_TH','LAST_NAME_TH','FIRST_NAME_ENG','LAST_NAME_ENG','EMAIL','TELEPHONE','BIRTHDAY','GENDER','SALES_ID','CONTACT_CHANNAL','EVENT','DATE_STAMP','BRANDS_ID','MODEL','STATUS','CONFIDENT','REMARKS'];

		$str_select = '';
		foreach ($arr_col_show as $key => $value) {
			if (sizeof($value)>0) {
				foreach ($value as $k => $val) {
					$str_select .= $key.'.'.$val.' AS '.$key.'_'.$val.',';
				}
			}
		}
		$str_select = substr($str_select, 0, -1);
		/* END SELECT COLUME SHOWS */

		$this->db->distinct();
		$this->db->select($str_select);
		$this->db->from($this->table);
		$this->db->join($this->table_sales_detail, $this->table_sales_detail.'.CUSTOMERS_ID='.$this->table.'.ID AND '.$this->table_sales_detail.'.STATUS_DELETE=0', 'left outer');
		$this->db->join('SALES', 'SALES.ID='.$this->table_sales_detail.'.SALES_ID AND '.$this->table_sales_detail.'.STATUS_DELETE=0 AND SALES.STATUS_DELETE=0', 'left outer');

		$this->db->join($this->table_service_detail, $this->table_service_detail.'.CUSTOMERS_ID='.$this->table.'.ID AND '.$this->table_service_detail.'.STATUS_DELETE=0', 'left outer');
		$this->db->join('SERVICES', 'SERVICES.ID='.$this->table_service_detail.'.SERVICES_ID AND '.$this->table_service_detail.'.STATUS_DELETE=0 AND SERVICES.STATUS_DELETE=0', 'left outer');

		$this->db->join($this->table_bjc_product_detail, $this->table_bjc_product_detail.'.CUSTOMERS_ID='.$this->table.'.ID AND '.$this->table_bjc_product_detail.'.STATUS_DELETE=0', 'left outer');
		$this->db->join($this->table_other_product_detail, $this->table_other_product_detail.'.CUSTOMERS_ID='.$this->table.'.ID AND '.$this->table_other_product_detail.'.STATUS_DELETE=0', 'left outer');
		$this->db->join($this->table_personnel_detail, $this->table_personnel_detail.'.CUSTOMERS_ID='.$this->table.'.ID AND '.$this->table_personnel_detail.'.STATUS_DELETE=0', 'left outer');


		$this->db->where($where, NULL, FALSE);
		// $this->db->limit($limit,$offset);
		$this->db->order_by($this->table.'.ID', $sort);
		$query = $this->db->get();

		$msg['status']=1;
		$msg['data'] = $query->result_array();

		if (sizeof($msg['data'])<1) {
			$msg['status']=0;
			$msg['message']='ไม่มีข้อมูล';
			unset($msg['data']);
			goto error;
		}else{

			$new_arr = array();
			foreach ($msg['data'] as $key => $value) {
				$new_arr['CUSTOMERS_ID'] = (int)$value['CUSTOMERS_ID'];
				$new_arr['CUSTOMERS_EXPERTISE'] = (int)$value['CUSTOMERS_EXPERTISE'];

				// SALES DETAIL
				$c_salse = isset($new_arr['salse_detail']) ? count($new_arr['salse_detail']) : 0;
				$in_array_salse = isset($new_arr['salse_detail']) ? array_column($new_arr['salse_detail'], 'ID') : array();
				if (!in_array((int)$value['CUSTOMERS_SALE_ID'] ,$in_array_salse)) {
					$new_arr['salse_detail'][$c_salse]['ID'] = (int)$value['CUSTOMERS_SALE_ID'];
					$new_arr['salse_detail'][$c_salse]['SALES_ID'] = (int)$value['CUSTOMERS_SALE_SALES_ID'];
					$new_arr['salse_detail'][$c_salse]['IMAGE'] = $value['SALES_IMAGE'];
					$new_arr['salse_detail'][$c_salse]['FIRST_NAME_TH'] = $value['SALES_FIRST_NAME_TH'];
					$new_arr['salse_detail'][$c_salse]['LAST_NAME_TH'] = $value['SALES_LAST_NAME_TH'];
					$new_arr['salse_detail'][$c_salse]['FIRST_NAME_ENG'] = $value['SALES_FIRST_NAME_ENG'];
					$new_arr['salse_detail'][$c_salse]['LAST_NAME_ENG'] = $value['SALES_LAST_NAME_ENG'];
					$new_arr['salse_detail'][$c_salse]['NICKNAME_TH'] = $value['SALES_NICKNAME_TH'];
					$new_arr['salse_detail'][$c_salse]['NICKNAME_ENG'] = $value['SALES_NICKNAME_ENG'];
					$new_arr['salse_detail'][$c_salse]['DEPARTMENT_ID'] = $value['SALES_DEPARTMENT_ID'];
				}
				if (isset($new_arr['salse_detail']) && $new_arr['salse_detail'][0]['ID']==0) {
					$new_arr['salse_detail']=array();
				}

				// SERVICE DETAIL
				$c_service = isset($new_arr['service_detail']) ? count($new_arr['service_detail']) : 0;
				$in_array_service = isset($new_arr['service_detail']) ? array_column($new_arr['service_detail'], 'ID') : array();
			 	if (!in_array((int)$value['CUSTOMERS_SERVICE_ID'] ,$in_array_service)) {
					$new_arr['service_detail'][$c_service]['ID'] = (int)$value['CUSTOMERS_SERVICE_ID'];
					$new_arr['service_detail'][$c_service]['SERVICES_ID'] = (int)$value['CUSTOMERS_SERVICE_SERVICES_ID'];
					$new_arr['service_detail'][$c_service]['IMAGE'] = $value['SERVICES_IMAGE'];
					$new_arr['service_detail'][$c_service]['FIRST_NAME_TH'] = $value['SERVICES_FIRST_NAME_TH'];
					$new_arr['service_detail'][$c_service]['LAST_NAME_TH'] = $value['SERVICES_LAST_NAME_TH'];
					$new_arr['service_detail'][$c_service]['FIRST_NAME_ENG'] = $value['SERVICES_FIRST_NAME_ENG'];
					$new_arr['service_detail'][$c_service]['LAST_NAME_ENG'] = $value['SERVICES_LAST_NAME_ENG'];
					$new_arr['service_detail'][$c_service]['NICKNAME_TH'] = $value['SERVICES_NICKNAME_TH'];
					$new_arr['service_detail'][$c_service]['NICKNAME_ENG'] = $value['SERVICES_NICKNAME_ENG'];
					$new_arr['service_detail'][$c_service]['DEPARTMENT_ID'] = $value['SERVICES_DEPARTMENT_ID'];
				}
				if (isset($new_arr['service_detail']) && $new_arr['service_detail'][0]['ID']==0) {
					$new_arr['service_detail']=array();
				}

				// BJC PRODUCTS
				$c_bjc_p = isset($new_arr['product_bjc']) ? count($new_arr['product_bjc']) : 0;
				$in_array_bjc_p = isset($new_arr['product_bjc']) ? array_column($new_arr['product_bjc'], 'ID') : array();
			 	if (!in_array((int)$value['CUSTOMERS_PRODUCT_BJC_ID'] ,$in_array_bjc_p)) {
					$new_arr['product_bjc'][$c_bjc_p]['ID'] = (int)$value['CUSTOMERS_PRODUCT_BJC_ID'];
					$new_arr['product_bjc'][$c_bjc_p]['SN'] = $value['CUSTOMERS_PRODUCT_BJC_SN'];
					$new_arr['product_bjc'][$c_bjc_p]['BRANDS_ID'] = (int)$value['CUSTOMERS_PRODUCT_BJC_BRANDS_ID'];
					$new_arr['product_bjc'][$c_bjc_p]['SALES_ID'] = (int)$value['CUSTOMERS_PRODUCT_BJC_SALES_ID'];
					$new_arr['product_bjc'][$c_bjc_p]['SERVICES_ID'] = (int)$value['CUSTOMERS_PRODUCT_BJC_SERVICES_ID'];
					$new_arr['product_bjc'][$c_bjc_p]['WARRANTY'] = $value['CUSTOMERS_PRODUCT_BJC_WARRANTY'];
					$new_arr['product_bjc'][$c_bjc_p]['MODEL'] = $value['CUSTOMERS_PRODUCT_BJC_MODEL'];
					$new_arr['product_bjc'][$c_bjc_p]['UNIT'] = (int)$value['CUSTOMERS_PRODUCT_BJC_UNIT'];
					$new_arr['product_bjc'][$c_bjc_p]['PRICE'] = (int)$value['CUSTOMERS_PRODUCT_BJC_PRICE'];
				}
				if (isset($new_arr['product_bjc']) && $new_arr['product_bjc'][0]['ID']==0) {
					$new_arr['product_bjc']=array();
				}

				// OTHER PRODUCTS
				$c_other_p = isset($new_arr['product_other']) ? count($new_arr['product_other']) : 0;
				$in_array_other_p = isset($new_arr['product_other']) ? array_column($new_arr['product_other'], 'ID') : array();
			 	if (!in_array((int)$value['CUSTOMERS_PRODUCT_OTHER_ID'] ,$in_array_other_p)) {
					$new_arr['product_other'][$c_other_p]['ID'] = (int)$value['CUSTOMERS_PRODUCT_OTHER_ID'];
					$new_arr['product_other'][$c_other_p]['BRANDS_ID'] = (int)$value['CUSTOMERS_PRODUCT_OTHER_BRANDS_ID'];
					$new_arr['product_other'][$c_other_p]['MODEL'] = $value['CUSTOMERS_PRODUCT_OTHER_MODEL'];
					$new_arr['product_other'][$c_other_p]['UNIT'] = (int)$value['CUSTOMERS_PRODUCT_OTHER_UNIT'];
				}
				if (isset($new_arr['product_other']) && $new_arr['product_other'][0]['ID']==0) {
					$new_arr['product_other']=array();
				}

				// PERSONNEL DETAIL
				$c_personnel = isset($new_arr['personnel_detail']) ? count($new_arr['personnel_detail']) : 0;
				$in_array_personnel = isset($new_arr['personnel_detail']) ? array_column($new_arr['personnel_detail'], 'ID') : array();
			 	if (!in_array((int)$value['CUSTOMERS_PERSONNEL_ID'] ,$in_array_personnel)) {
					$new_arr['personnel_detail'][$c_personnel]['ID'] = (int)$value['CUSTOMERS_PERSONNEL_ID'];
					$new_arr['personnel_detail'][$c_personnel]['RELATIONSHIP'] = (int)$value['CUSTOMERS_PERSONNEL_RELATIONSHIP'];
					$new_arr['personnel_detail'][$c_personnel]['PREFIX'] = (int)$value['CUSTOMERS_PERSONNEL_PREFIX'];
					$new_arr['personnel_detail'][$c_personnel]['POSITION_ID'] = (int)$value['CUSTOMERS_PERSONNEL_POSITION_ID'];
					$new_arr['personnel_detail'][$c_personnel]['IMAGE'] = $value['CUSTOMERS_PERSONNEL_IMAGE'];
					$new_arr['personnel_detail'][$c_personnel]['FIRST_NAME_TH'] = $value['CUSTOMERS_PERSONNEL_FIRST_NAME_TH'];
					$new_arr['personnel_detail'][$c_personnel]['LAST_NAME_TH'] = $value['CUSTOMERS_PERSONNEL_LAST_NAME_TH'];
					$new_arr['personnel_detail'][$c_personnel]['FIRST_NAME_ENG'] = $value['CUSTOMERS_PERSONNEL_FIRST_NAME_ENG'];
					$new_arr['personnel_detail'][$c_personnel]['LAST_NAME_ENG'] = $value['CUSTOMERS_PERSONNEL_LAST_NAME_ENG'];
					$new_arr['personnel_detail'][$c_personnel]['EMAIL'] = $value['CUSTOMERS_PERSONNEL_EMAIL'];
					$new_arr['personnel_detail'][$c_personnel]['TELEPHONE'] = $value['CUSTOMERS_PERSONNEL_TELEPHONE'];
					$new_arr['personnel_detail'][$c_personnel]['BIRTHDAY'] = $value['CUSTOMERS_PERSONNEL_BIRTHDAY'];
					$new_arr['personnel_detail'][$c_personnel]['GENDER'] = (int)$value['CUSTOMERS_PERSONNEL_GENDER'];
					$new_arr['personnel_detail'][$c_personnel]['SALES_ID'] = (int)$value['CUSTOMERS_PERSONNEL_SALES_ID'];
					$new_arr['personnel_detail'][$c_personnel]['CONTACT_CHANNAL'] = (int)$value['CUSTOMERS_PERSONNEL_CONTACT_CHANNAL'];
					$new_arr['personnel_detail'][$c_personnel]['EVENT'] = $value['CUSTOMERS_PERSONNEL_EVENT'];
					$new_arr['personnel_detail'][$c_personnel]['DATE_STAMP'] = $value['CUSTOMERS_PERSONNEL_DATE_STAMP'];
					$new_arr['personnel_detail'][$c_personnel]['BRANDS_ID'] = (int)$value['CUSTOMERS_PERSONNEL_BRANDS_ID'];
					$new_arr['personnel_detail'][$c_personnel]['MODEL'] = $value['CUSTOMERS_PERSONNEL_MODEL'];
					$new_arr['personnel_detail'][$c_personnel]['STATUS'] = (int)$value['CUSTOMERS_PERSONNEL_STATUS'];
					$new_arr['personnel_detail'][$c_personnel]['CONFIDENT'] = (int)$value['CUSTOMERS_PERSONNEL_CONFIDENT'];
					$new_arr['personnel_detail'][$c_personnel]['REMARKS'] = $value['CUSTOMERS_PERSONNEL_REMARKS'];
				}
				if (isset($new_arr['personnel_detail']) && $new_arr['personnel_detail'][0]['ID']==0) {
					$new_arr['personnel_detail']=array();
				}
			}

			unset($msg['data']);
			$msg['data'][0] = $new_arr;
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
	        if ($new_path_image_hospital['status']==0) {
				$msg_img=$new_path_image_hospital;
	        	return $msg_img;
	        }
			$data['IMAGE_HOSPITAL'] = $new_path_image_hospital['message'];
		}

		// move image Doctor
		if (isset($ip_post['image_doctor']) && !empty($ip_post['image_doctor'])) {
			$new_path_image_doctor = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_doctor']), 'doctors');
	        if ($new_path_image_doctor['status']==0) {
				$msg_img=$new_path_image_doctor;
	        	return $msg_img;
	        }
			$data['IMAGE_DOCTOR'] = $new_path_image_doctor['message'];
		}

		// move image Purchase
		if (isset($ip_post['image_purchase']) && !empty($ip_post['image_purchase'])) {
			$new_path_image_purchase = $this->general_model->move_images($this->general_model->clearbadstr($ip_post['image_purchase']), 'purchases');
	        if ($new_path_image_purchase['status']==0) {
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
	        if ($new_path_image_hospital['status']==0) {
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
	        if ($new_path_image_doctor['status']==0) {
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
	        if ($new_path_image_purchase['status']==0) {
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

		$show_data['data_sales']=$data_sales;
		$show_data['data_service']=$data_service;
		$show_data['data_bjc_product']=$data_bjc_product;
		$show_data['data_other_product']=$data_other_product;
		$show_data['data_personnel']=$data_personnel;
		$msg['show_data']=$show_data;


		//Action Insert Data Sales Detail
		foreach ($data_sales['message']['sales_detail'] as $key => $value) {

			if (isset($value['ID_COLUM']) && !empty($value['ID_COLUM'])) {
				$id_sale_update = $value['ID_COLUM'];
				$arr_val['SALES_ID'] = $value['SALES_ID'];
				$arr_val['UPDATE_DATE'] = $value['CREATE_DATE'];
				$arr_val['USER_UPDATE'] = $value['USER_CREATE'];
				$res_sales_model = $this->customers_sales_model->updates($arr_val, $id_sale_update);
			}else{
				$res_sales_model = $this->customers_sales_model->inserts($value);
			}

			if ($res_sales_model['status']==0) {
				$msg['message']=$res_sales_model['message'];
				goto error;
			}
		}

		//Action Insert Data Service Detail
		foreach ($data_service['message']['service_detail'] as $key => $value) {

			if (isset($value['ID_COLUM']) && !empty($value['ID_COLUM'])) {
				$id_service_update = $value['ID_COLUM'];
				$arr_val['SERVICES_ID'] = $value['SERVICES_ID'];
				$arr_val['UPDATE_DATE'] = $value['CREATE_DATE'];
				$arr_val['USER_UPDATE'] = $value['USER_CREATE'];
				$res_service_model = $this->customers_service_model->updates($arr_val, $id_service_update);
			}else{
				$res_service_model = $this->customers_service_model->inserts($value);
			}

			if ($res_service_model['status']==0) {
				$msg['message']=$res_service_model['message'];
				goto error;
			}
		}
		goto error;

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


	/*Read More Customer */
	public function lists_customers_general($name_hospital=null) {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 2;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$where = "";
		if ($name_hospital!='') {
			$keyword = $this->db->escape_like_str($this->general_model->clearbadstr($name_hospital));
			// $where .= "CONCAT(HOSPITAL_NAME_TH, HOSPITAL_NAME_ENG) LIKE '%".$keyword."%' AND ";
			$where .= "HOSPITAL_NAME_TH LIKE '%".$keyword."%' OR ";
			$where .= "HOSPITAL_NAME_ENG LIKE '%".$keyword."%' AND ";
		}
		$where .= "STATUS_DELETE = 0";

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

}
?>