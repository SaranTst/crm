<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_personnel_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'CUSTOMERS_PERSONNEL';
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
				$where .= "CONCAT(VENDOR_NAME, COUNTY) LIKE '%".$keyword."%' AND ";
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
		$msg['message']='ไม่สามารถเพิ่มช้อมูล PERSONNEL DETAIL ได้กรุณาลองใหม่อีกครั้ง';

		if (sizeof($arr)<0) {
			$msg['message']='ไม่มีข้อมูล';
			goto error;
		}

		// move image Personnel
		if (isset($arr['IMAGE']) && !empty($arr['IMAGE'])) {
			$new_path_image = $this->general_model->move_images($arr['IMAGE'], 'personnel');
	        if ($new_path_image['status']==0) {
				$msg_img=$new_path_image;
	        	return $msg_img;
	        }
			$arr['IMAGE'] = $new_path_image['message'];
		}
		unset($arr['OLD_IMAGE']);
		
		$this->db->insert($this->table, $arr);
		$res_insert = $this->db->affected_rows();
		$id_insert = $this->db->insert_id();

		if ($res_insert > 0) {
			$res_insert_log = $this->logs_model->inserts($this->table, $id_insert, 'insert', $arr['USER_CREATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']=$id_insert;
				$msg['message_upload']=$arr['IMAGE'];
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

		// move image Personnel
		$status_upload_new = FALSE;
		if (isset($arr['IMAGE']) && !empty($arr['IMAGE']) && $arr['IMAGE']!=$arr['OLD_IMAGE']) {
			$new_path_image_personnel = $this->general_model->move_images($this->general_model->clearbadstr($arr['IMAGE']), 'personnel');
	        if ($new_path_image_personnel['status']==0) {
				$msg_img=$new_path_image_personnel;
	        	return $msg_img;
	        }
			$arr['IMAGE'] = $new_path_image_personnel['message'];
			$status_upload_new = TRUE;
			$old_image_personnel = $arr['OLD_IMAGE'];
		}else{
			$arr['IMAGE'] = $arr['IMAGE'];
		}
		unset($arr['OLD_IMAGE']);

		$this->db->where('ID', $id);
		$this->db->update($this->table, $arr);
		$res_update = $this->db->affected_rows();

		if ($res_update > 0) {

			$res_insert_log = $this->logs_model->inserts($this->table, $id, 'update', $arr['USER_UPDATE']);
			if ($res_insert_log) {
				$msg['status']=1;
				$msg['message']='แก้ไขข้อมูลสำเร็จ';
			}

			if ($status_upload_new) {
				// delete old image Personnel
		        if (isset($old_image_personnel) && !empty($old_image_personnel)) {
		        	$res_delete_image_personnel = unlink(DOCUMENT_ROOT.$old_image_personnel);
		        	if (!$res_delete_image_personnel) {
		        		$msg['status']=0;
						$msg['message']='ไม่สามารถลบไฟล์รูป Personnel ได้ กรุณาลองใหม่อีกครั้ง';
		        	}else{
		        		$msg['message']=$arr['IMAGE'];
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

	/* Check Data Personnel */
	public function chk_personnel($id=null) {

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
		if (isset($ip_post['personnel_detail']) && !empty($ip_post['personnel_detail'])) {
			foreach ($ip_post['personnel_detail'] as $k_personnel => $val_personnel) {

				if (!isset($val_personnel['relationship']) && empty($val_personnel['relationship'])) {
					$msg['message']='กรุณาระบุ Relationship';
					goto error;
				}else if (!isset($val_personnel['prefix']) && empty($val_personnel['prefix'])) {
					$msg['message']='กรุณาระบุ Prefix';
					goto error;
				}else if (!isset($val_personnel['position']) && empty($val_personnel['position'])) {
					$msg['message']='กรุณาระบุ Position';
					goto error;
				}else if (!isset($val_personnel['name_surname_th']) && empty($val_personnel['name_surname_th'])) {
					$msg['message']='กรุณาระบุ Name Surname Thai';
					goto error;
				}else if (!isset($val_personnel['name_surname_eng']) && empty($val_personnel['name_surname_eng'])) {
					$msg['message']='กรุณาระบุ Name Surname Eng';
					goto error;
				}else if (!isset($val_personnel['e_mail']) && empty($val_personnel['e_mail'])) {
					$msg['message']='กรุณาระบุ E-mail';
					goto error;
				}else if (!isset($val_personnel['tel']) && empty($val_personnel['tel'])) {
					$msg['message']='กรุณาระบุ Tel.';
					goto error;
				}else if (!isset($val_personnel['date_birthday']) && empty($val_personnel['date_birthday'])) {
					$msg['message']='กรุณาระบุ Date Birthday.';
					goto error;
				}else if (!isset($val_personnel['gender']) && empty($val_personnel['gender'])) {
					$msg['message']='กรุณาระบุ Gender';
					goto error;
				}else if (!isset($val_personnel['salesperson']) && empty($val_personnel['salesperson'])) {
					$msg['message']='กรุณาระบุ Salesperson';
					goto error;
				}else if (!isset($val_personnel['contact_channal']) && empty($val_personnel['contact_channal'])) {
					$msg['message']='กรุณาระบุ Contact Channal';
					goto error;
				}else if (!isset($val_personnel['event']) && empty($val_personnel['event'])) {
					$msg['message']='กรุณาระบุ Event';
					goto error;
				}else if (!isset($val_personnel['date_stamp']) && empty($val_personnel['date_stamp'])) {
					$msg['message']='กรุณาระบุ Date Stamp';
					goto error;
				}else if (!isset($val_personnel['brands']) && empty($val_personnel['brands'])) {
					$msg['message']='กรุณาระบุ Brands';
					goto error;
				}else if (!isset($val_personnel['model']) && empty($val_personnel['model'])) {
					$msg['message']='กรุณาระบุ Model';
					goto error;
				}else if (!isset($val_personnel['status']) && empty($val_personnel['status'])) {
					$msg['message']='กรุณาระบุ Status';
					goto error;
				}else if (!isset($val_personnel['confident']) && empty($val_personnel['confident'])) {
					$msg['message']='กรุณาระบุ Confident';
					goto error;
				}else if (!isset($val_personnel['remarks']) && empty($val_personnel['remarks'])) {
					$msg['message']='กรุณาระบุ Remarks';
					goto error;
				}else{

					// set data
					$data['RELATIONSHIP'] = (int)$val_personnel['relationship'];
					$data['PREFIX'] = (int)$val_personnel['prefix'];
					$data['POSITION_ID'] = (int)$val_personnel['position'];

					if (!isset($val_personnel['img_personnel']) && empty($val_personnel['img_personnel'])) {
						$data['IMAGE'] = '';
					}else{
						$data['IMAGE'] = $this->general_model->clearbadstr($val_personnel['img_personnel']);
					}

					if (!isset($val_personnel['old_img_personnel']) && empty($val_personnel['old_img_personnel'])) {
						$data['OLD_IMAGE'] = '';
					}else{
						$data['OLD_IMAGE'] = $this->general_model->clearbadstr($val_personnel['old_img_personnel']);
					}

					$explode_name_th = explode(' ', $this->general_model->clearbadstr($val_personnel['name_surname_th']));
					if (empty($explode_name_th[1])) {
						$msg['message']='กรุณากรอกนามสกุลภาษาไทยด้วยครับ';
						goto error;
					}
					$data['FIRST_NAME_TH'] = $explode_name_th[0];
					$data['LAST_NAME_TH'] = $explode_name_th[1];

					$explode_name_eng = explode(' ', $this->general_model->clearbadstr($val_personnel['name_surname_eng']));
					if (empty($explode_name_eng[1])) {
						$msg['message']='กรุณากรอกนามสกุลภาษาอังกฤษด้วยครับ';
						goto error;
					}
					$data['FIRST_NAME_ENG'] = $explode_name_eng[0];
					$data['LAST_NAME_ENG'] = $explode_name_eng[1];

					$chk_mail = $this->general_model->clearbadstr($val_personnel['e_mail']);
					if (!$this->general_model->check_email($chk_mail)) {
						$msg['message']='กรุณากรอกอีเมลให้ถูกต้องด้วยครับ';
						goto error;
					}
					$data['EMAIL'] = $chk_mail;

					$chk_tel = $this->general_model->clearbadstr($val_personnel['tel']);
					if (!$this->general_model->check_telephone_number($chk_tel)) {
						$msg['message']='กรุณากรอกเบอร์โทรให้ครบถ้วนด้วยครับ';
						goto error;
					}
					$data['TELEPHONE'] = $chk_tel;
					$data['BIRTHDAY'] = date('Y-m-d', strtotime($this->general_model->clearbadstr($val_personnel['date_birthday'])));
					$data['GENDER'] = (int)$val_personnel['gender'];
					$data['SALES_ID'] = (int)$val_personnel['salesperson'];
					$data['CONTACT_CHANNAL'] = (int)$val_personnel['contact_channal'];
					$data['EVENT'] = $this->general_model->clearbadstr($val_personnel['event']);
					$data['DATE_STAMP'] = date('Y-m-d', strtotime($this->general_model->clearbadstr($val_personnel['date_stamp'])));
					$data['BRANDS_ID'] = (int)$val_personnel['brands'];
					$data['MODEL'] = $this->general_model->clearbadstr($val_personnel['model']);
					$data['STATUS'] = (int)$val_personnel['status'];
					$data['CONFIDENT'] = (int)$val_personnel['confident'];
					$data['REMARKS'] = $this->general_model->clearbadstr($val_personnel['remarks']);

					if (isset($val_personnel['id_colum']) && !empty($val_personnel['id_colum'])) {
						$id_colum = (int)$val_personnel['id_colum'];
						$data['UPDATE_DATE'] = date('Y-m-d H:i:s');
						$data['USER_UPDATE'] = (int)$user_create;

						$res_update = $this->updates($data, $id_colum);
						if ($res_update['status']==0) {
							$msg['message']=$res_update['message'];
							goto error;
						}else{
							$arr_id_insert[$ii]['k_id_colum'] = $k_personnel;
							$arr_id_insert[$ii]['id_colum'] = 0;
							$arr_id_insert[$ii]['upload'] = $res_update['message'];
							$ii++;
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
							$arr_id_insert[$ii]['k_id_colum'] = $k_personnel;
							$arr_id_insert[$ii]['id_colum'] = $res_insert['message'];
							$arr_id_insert[$ii]['upload'] = $res_insert['message_upload'];
							$ii++;
						}
					}
					unset($data);
				}
			}
		}else{
			$msg['message']='กรุณาระบุบุคลากรอย่างน้อย 1 คน';
			goto error;
		}

		$msg['status']=1;
		$msg['message']=$arr_id_insert;

		error:
		return $msg;
	}

	public function delete_personnel_detail($id=null) {

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