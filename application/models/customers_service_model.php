<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_service_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'CUSTOMERS_SERVICE';
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
		$arr_col_show[$this->table] = ['ID','CUSTOMERS_ID','SERVICES_ID'];
		$arr_col_show['SERVICES'] = ['IMAGE','FIRST_NAME_TH','LAST_NAME_TH','FIRST_NAME_ENG','LAST_NAME_ENG','NICKNAME_TH','NICKNAME_ENG','DEPARTMENT_ID'];

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
		$this->db->join('SERVICES', 'SERVICES.ID='.$this->table.'.SERVICES_ID AND '.$this->table.'.STATUS_DELETE=0 AND SERVICES.STATUS_DELETE=0', 'left outer');
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
		$msg['message']='ไม่สามารถเพิ่มช้อมูล SERVICE DETAIL ได้กรุณาลองใหม่อีกครั้ง';

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
		$msg['message']='ไม่สามารถแก้ไขช้อมูล SERVICES DETAIL ได้กรุณาลองใหม่อีกครั้ง';

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

	/* Check Data Service Detail */
	public function chk_service_detail($id=null) {

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
		if (isset($ip_post['service_detail']) && !empty($ip_post['service_detail'])) {
			foreach ($ip_post['service_detail'] as $k_service => $val_service) {

				if ($val_service['id']!='') {
					// set data
					$data['SERVICES_ID'] = (int)$val_service['id'];

					if (isset($val_service['id_colum']) && !empty($val_service['id_colum'])) {
						$id_colum = (int)$val_service['id_colum'];
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
							$arr_id_insert[$ii]['k_id_colum'] = $k_service;
							$arr_id_insert[$ii]['id_colum'] = $res_insert['message'];
							$ii++;
						}
					}
					unset($data);
				}
			}
		}else{
			$msg['message']='กรุณาระบุเซอร์วิสอย่างน้อย 1 คน';
			goto error;
		}

		$msg['status']=1;
		$msg['message']=$arr_id_insert;

		error:
		return $msg;
	}

}
?>