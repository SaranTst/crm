<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_other_product_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'CUSTOMERS_PRODUCT_OTHER';
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
		$msg['message']='ไม่สามารถเพิ่มช้อมูล OTHER PRODUCT DETAIL ได้กรุณาลองใหม่อีกครั้ง';

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

	public function updates($arr=array(), $id=null) {

		$msg['status']=0;
		$msg['message']='ไม่สามารถแก้ไขช้อมูล OTHER PRODUCT DETAIL ได้กรุณาลองใหม่อีกครั้ง';

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

	/* Check Data Other Product Detail */
	public function chk_other_product($id=null) {

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

		foreach ($ip_post['other_product_detail'] as $k_other_product => $val_other_product) {

			if (!isset($val_other_product['brands']) && empty($val_other_product['brands'])) {
				$msg['message']='กรุณาระบุ Brands [Other Product]';
				goto error;
			}else if (!isset($val_other_product['model']) && empty($val_other_product['model'])) {
				$msg['message']='กรุณาระบุ Model [Other Product]';
				goto error;
			}else if (!isset($val_other_product['unit']) && empty($val_other_product['unit'])) {
				$msg['message']='กรุณาระบุ Unit [Other Product]';
				goto error;
			}else{
				if (isset($val_other_product['id_colum']) && !empty($val_other_product['id_colum'])) {
					$id_colum = (int)$val_other_product['id_colum'];
					$data_update['BRANDS_ID'] = (int)$val_other_product['brands'];
					$data_update['MODEL'] = $this->general_model->clearbadstr($val_other_product['model']);
					$data_update['UNIT'] = (int)$val_other_product['unit'];
					$data_update['UPDATE_DATE'] = date('Y-m-d H:i:s');
					$data_update['USER_UPDATE'] = (int)$user_create;

					$res_update = $this->updates($data_update, $id_colum);
					if ($res_update['status']==0) {
						$msg['message']=$res_update['message'];
						goto error;
					}
				}else{
					$data_insert['CUSTOMERS_ID'] = (int)$id;
					$data_insert['BRANDS_ID'] = (int)$val_other_product['brands'];
					$data_insert['MODEL'] = $this->general_model->clearbadstr($val_other_product['model']);
					$data_insert['UNIT'] = (int)$val_other_product['unit'];
					$data_insert['STATUS_DELETE'] = 0;
					$data_insert['CREATE_DATE'] =  date('Y-m-d H:i:s');
					$data_insert['USER_CREATE'] = (int)$user_create;

					$res_insert = $this->inserts($data_insert);
					if ($res_insert['status']==0) {
						$msg['message']=$res_insert['message'];
						goto error;
					}
				}
			}
		}

		$msg['status']=1;
		$msg['message']='บันทึกข้อมูลสำเร็จ';

		error:
		return $msg;;
	}

}
?>