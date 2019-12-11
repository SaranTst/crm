<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_product extends MY_Controller {

    public function __construct()
    {
		parent::__construct ();
		$this->load->model('customers_bjc_product_model');
		$this->load->model('customers_other_product_model');
	}

	/* BJC Product */
	public function lists_customers_bjc_product()
	{
		$msg = $this->customers_bjc_product_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_customers_bjc_product($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_bjc_product_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_customers_bjc_product($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_bjc_product_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}
	/* End BJC Product */



	/* Other Product */
	public function lists_customers_other_product()
	{
		$msg = $this->customers_other_product_model->lists();

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function gets_customers_other_product($id=null)
	{
		$id = (int)$id; 
		$msg = $this->customers_other_product_model->gets($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}

	public function delete_customers_other_product($id=null)
	{
		$id = (int)$id;
		$msg = $this->customers_other_product_model->deletes($id);

		header("Content-Type: application/json");
		echo json_encode($msg);
	}
	/* End BJC Product */


	/* Update Product Detail [Bjc Product + Other Product]*/
	public function update_customers_product_detail($id=null)
	{
		$id = (int)$id;
		$res_bjc = $this->customers_bjc_product_model->chk_bjc_product($id);
		if ($res_bjc['status']==0) {
			$msg=$res_bjc;
			goto error;
		}

		$res_other = $this->customers_other_product_model->chk_other_product($id);
		if ($res_other['status']==0) {
			$msg=$res_other;
			goto error;
		}

		$msg['status']=1;
		$msg['message']='บันทึกข้อมูลสำเร็จ';

		error:
		header("Content-Type: application/json");
		echo json_encode($msg);
	}
	/* End Update Product Detail [Bjc Product + Other Product]*/

}
