<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once DOCUMENT_ROOT.'vendor/autoload.php';
  
class Report_pdf extends CI_Controller {

	public function __construct()
    {
		parent::__construct ();
		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		$this->mpdf = new \Mpdf\Mpdf(['tempDir' =>  DOCUMENT_ROOT.'vendor/mpdf/mpdf/tmp',
		    'fontdata' => $fontData + [
	            'sarabun' => [
	                'R' => 'THSarabunNew.ttf',
	                'I' => 'THSarabunNewItalic.ttf',
	                'B' =>  'THSarabunNewBold.ttf',
	                'BI' => 'THSarabunNewBoldItalic.ttf',
	            ]
	        ],
		]);

		$this->arr_short_month = array('', 'ม.ค.', 'ก.พ.', 'มี.ค', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.');
        $this->arr_month = array('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
	}

    public function report_all($start_date=null, $end_date=null)
    {

    	$report_name = $this->input->get('report') ? $this->input->get('report') : '';
    	$name_report = 'report_';
    	$html = '';
    	if (!$report_name) {
			$name_report.='กรุณาระบุชื่อรีพอร์ตที่จะทำการออกรีพอร์ตด้วยครับ';
			goto error;
    	}

    	if ($start_date && $end_date) {

	    	$set_date = $this->set_date_start_end($start_date, $end_date);

	    	$data['title'] = 'Report '.strtoupper($report_name);
	    	$data['subtitle_time'] = $set_date['times']['subtitle_time'];

	    	/* Check Name Report */
	    	if ($report_name=='brands') {
		    	$this->load->model('brands_model');
		    	$data['datas'] = $this->brands_model->lists($set_date['start']['start_date'], $set_date['end']['end_date']);
	    	}

	    	if ($report_name=='customers') {
		    	$this->load->model('customers_model');
		    	$data['datas'] = $this->customers_model->lists($set_date['start']['start_date'], $set_date['end']['end_date']);
	    	}

	    	if ($report_name=='read_customers') {
	    		$this->load->model('customers_model');
    			$name_hospital = $this->input->get('hospital') ? $this->input->get('hospital') : '';
				$data['datas'] = $this->customers_model->lists_customers_general($name_hospital, $set_date['start']['start_date'], $set_date['end']['end_date']);
				$data['title'] .= ' ['.$name_hospital.']';
	    	}

	    	if ($report_name=='more_read_customers') {
	    		$this->load->model('customers_model');
    			$name_hospital = $this->input->get('hospital') ? $this->input->get('hospital') : '';
				$data['datas'] = $this->customers_model->gets_read_more_customer($name_hospital, $set_date['start']['start_date'], $set_date['end']['end_date']);
				$data['title'] .= ' ['.$name_hospital.']';
	    	}
	    	/* End Check Name Report */

	    	$html=$this->load->view('reports/report_'.strtolower($report_name), $data,true);
	    	$name_report .= strtolower($report_name).'_'.$set_date['times']['time_name_report'];

    	}else{

			$name_report.='กรุณาเลือกวันที่จะทำการออกรีพอร์ตด้วยครับ';
			goto error;
    	}

    	error:
		$this->mpdf->WriteHTML($html);
    	$this->mpdf->Output($name_report.".pdf" ,'D');
    }

    public function set_date_start_end($start_date=null, $end_date=null)
    {

    	if ($start_date && $end_date) {
	    	$date_format['start']['start_date'] = date('Y-m-d 00:00:00', strtotime($start_date));
	    	$date_format['start']['start_day'] = date('d', strtotime($start_date));
	    	$date_format['start']['start_month'] = date('m', strtotime($start_date));
	    	$date_format['start']['start_year'] = date('Y', strtotime($start_date));

	    	$date_format['end']['end_date'] = date('Y-m-d 23:59:59', strtotime($end_date));
	    	$date_format['end']['end_day'] = date('d', strtotime($end_date));
	    	$date_format['end']['end_month'] = date('m', strtotime($end_date));
	    	$date_format['end']['end_year'] = date('Y', strtotime($end_date));

	    	$date_format['times']['subtitle_time'] = $date_format['start']['start_day'].' '.$this->arr_month[(int)$date_format['start']['start_month']].' '.($date_format['start']['start_year']+543).' ถึง '.$date_format['end']['end_day'].' '.$this->arr_month[(int)$date_format['end']['end_month']].' '.($date_format['end']['end_year']+543);
	    	$date_format['times']['time_name_report'] = $date_format['start']['start_day'].'_'.$date_format['start']['start_month'].'_'.($date_format['start']['start_year']+543).'_to_'.$date_format['end']['end_day'].'_'.$date_format['end']['end_month'].'_'.($date_format['end']['end_year']+543);

	    	return $date_format;
    	}else{
    		return FALSE;
    	}

    }
  
}