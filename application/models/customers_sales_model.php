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

	public function lists($id_customers=null) {

		$limit = $this->input->get('limit') ? $this->input->get('limit') : 3;
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$offset = ($page - 1) * $limit;
		$sort = $this->input->get('sort') ? $this->input->get('sort') : 'DESC';

		$ip_post = $this->input->post();
		$where = "";
		if ($ip_post) {

			if (isset($ip_post['search']) && !empty($ip_post['search'])) {
				$keyword = $this->db->escape_like_str($this->general_model->clearbadstr($ip_post['search']));
				// $where .= "CONCAT(VENDOR_NAME, COUNTY) LIKE '%".$keyword."%' AND ";
				$where .= "VENDOR_NAME LIKE '%".$keyword."%' OR ";
				$where .= "COUNTY LIKE '%".$keyword."%' AND ";
			}
		}
		if ($id_customers) {
			$where .= "CUSTOMERS_ID = ".(int)$id_customers." AND ";
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
		$id_insert = $this->db->insert_id();

		if ($res_insert > 0) {
			$res_insert_log = $this->logs_model->inserts($this->table, $id_insert, 'insert', $arr['USER_CREATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']=$id_insert;
			}
		}

		error:
		return $msg;
	}

	public function updates($arr=array(), $id=null) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถแก้ไขช้อมูล SALES DETAIL ได้กรุณาลองใหม่อีกครั้ง';

		if (sizeof($arr)<0) {
			$msg['message']='ไม่มีข้อมูล';
			goto error;
		}

		if (!$id) {
			$msg['status']=0;
			$msg['message']='กรุณาไอดีที่ต้องการแก้ไขข้อมูลด้วยครับ';
			goto error;
		}

		$this->db->where('ID', $id);
		$this->db->update($this->table, $arr);
		$res_update = $this->db->affected_rows();

		if ($res_update > 0) {

			$res_insert_log = $this->logs_model->inserts($this->table, $id, 'update', $arr['USER_UPDATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='แก้ไขข้อมูลสำเร็จ';
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
	public function chk_sale_detail($id=null) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถเพิ่มช้อมูลลงฐานข้อมูลได้ กรุณาลองใหม่อีกครั้ง';
		$ip_post = $this->input->post();
		$user_create = isset($ip_post['user_create'])&&!empty($ip_post['user_create']) ? $ip_post['user_create'] : '';

		if ($user_create=='') {
			$msg['message']='กรุณาเข้าสู่ระบบเพื่อทำรายการด้วยครับ';
			goto error;
		}
		if ($id=='') {
			$msg['message']='กรุณาระบุไอดีที่จะทำรายการด้วยครับ';
			goto error;
		}

		$arr_id_insert=array();
		$ii=0;
		if (isset($ip_post['sales_detail']) && !empty($ip_post['sales_detail'])) {
			foreach ($ip_post['sales_detail'] as $k_sales => $val_sales) {
				
				// set data
				$data['SALES_ID'] = (int)$val_sales['id'];

				if (isset($val_sales['id_colum']) && !empty($val_sales['id_colum'])) {
					$id_colum = (int)$val_sales['id_colum'];
					$data['UPDATE_DATE'] = date('Y-m-d H:i:s');
					$data['USER_UPDATE'] = (int)$user_create;

					$res_update = $this->updates($data, $id_colum);
					if ($res_update['status']==0) {
						$msg['message']=$res_update['message'];
						goto error;
					}
				}else{
					$data['CUSTOMERS_ID'] = (int)$id;
					$data['STATUS_DELETE'] = 0;
					$data['CREATE_DATE'] =  date('Y-m-d H:i:s');
					$data['USER_CREATE'] = (int)$user_create;

					$res_insert = $this->inserts($data);
					if ($res_insert['status']==0) {
						$msg['message']=$res_insert['message'];
						goto error;
					}else{
						$arr_id_insert[$ii]['k_id_colum'] = $k_sales;
						$arr_id_insert[$ii]['id_colum'] = $res_insert['message'];
						$ii++;
					}
				}
				unset($data);
			}
		}else{
			$msg['message']='กรุณาระบุเซลอย่างน้อย 1 คน';
			goto error;
		}

		$msg['status']=1;
		$msg['message']=$arr_id_insert;

		error:
		return $msg;
	}
	/* End Check Data Sales Detail */

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

}
?>