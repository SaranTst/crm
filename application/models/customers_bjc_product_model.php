<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_bjc_product_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'CUSTOMERS_PRODUCT_BJC';
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
		$this->db->where('CUSTOMERS_ID',$id);
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

	public function inserts($arr=array()) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถเพิ่มช้อมูล BJC PRODUCT DETAIL ได้กรุณาลองใหม่อีกครั้ง';

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
		$msg['message']='ไม่สามารถแก้ไขช้อมูล BJC PRODUCT DETAIL ได้กรุณาลองใหม่อีกครั้ง';

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

	/* Check Data Bjc Product Detail */
	public function chk_bjc_product($id=null) {

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
		if (isset($ip_post['bjc_product_detail']) && !empty($ip_post['bjc_product_detail'])) {
			foreach ($ip_post['bjc_product_detail'] as $k_bjc_product => $val_bjc_product) {

				if (!isset($val_bjc_product['sn']) && empty($val_bjc_product['sn'])) {
					$msg['message']='กรุณาระบุ SN [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['brands']) && empty($val_bjc_product['brands'])) {
					$msg['message']='กรุณาระบุ Brands [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['saleperson']) && empty($val_bjc_product['saleperson'])) {
					$msg['message']='กรุณาระบุ Saleperson [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['serviceperson']) && empty($val_bjc_product['serviceperson'])) {
					$msg['message']='กรุณาระบุ Serviceperson [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['warranty']) && empty($val_bjc_product['warranty'])) {
					$msg['message']='กรุณาระบุ Warranty [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['model']) && empty($val_bjc_product['model'])) {
					$msg['message']='กรุณาระบุ Model [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['unit']) && empty($val_bjc_product['unit'])) {
					$msg['message']='กรุณาระบุ Unit [Bjc Product]';
					goto error;
				}else if (!isset($val_bjc_product['price']) && empty($val_bjc_product['price'])) {
					$msg['message']='กรุณาระบุ Price [Bjc Product]';
					goto error;
				}else{

					// set data
					$data['SN'] = $this->general_model->clearbadstr($val_bjc_product['sn']);
					$data['BRANDS_ID'] = (int)$val_bjc_product['brands'];
					$data['SALES_ID'] = (int)$val_bjc_product['saleperson'];
					$data['SERVICES_ID'] = (int)$val_bjc_product['serviceperson'];
					$data['WARRANTY'] = date('Y-m-d', strtotime($this->general_model->clearbadstr($val_bjc_product['warranty'])));
					$data['MODEL'] = $this->general_model->clearbadstr($val_bjc_product['model']);
					$data['UNIT'] = (int)$val_bjc_product['unit'];
					$data['PRICE'] = (int)$val_bjc_product['price'];

					if (isset($val_bjc_product['id_colum']) && !empty($val_bjc_product['id_colum'])) {
						$id_colum = (int)$val_bjc_product['id_colum'];
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
							$arr_id_insert[$ii]['k_id_colum'] = $k_bjc_product;
							$arr_id_insert[$ii]['id_colum'] = $res_insert['message'];
							$ii++;
						}
					}
					unset($data);
				}
			}
		}else{
			$msg['message']='กรุณาระบุผลิตภัณฑ์ Bjc อย่างน้อย 1 ผลิตภัณฑ์';
			goto error;
		}

		$msg['status']=1;
		$msg['message']=$arr_id_insert;

		error:
		return $msg;
	}

}
?>