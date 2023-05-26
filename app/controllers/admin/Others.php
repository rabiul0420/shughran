<?php defined('BASEPATH') or exit('No direct script access allowed');

class Others extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->loggedIn) {
			$this->session->set_userdata('requested_page', $this->uri->uri_string());
			$this->sma->md('login');
		}
		$this->lang->admin_load('manpower', $this->Settings->user_language);
		$this->load->library('form_validation');
		$this->load->helper('report');
		$this->load->admin_model('others_model');
		$this->digital_upload_path = 'files/';
		$this->upload_path = 'assets/uploads/';
		$this->thumbs_path = 'assets/uploads/thumbs/';
		$this->image_types = 'gif|jpg|jpeg|png|tif';
		$this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
		$this->allowed_file_size = '1024';
		$this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
	}











	function index($branch_id = NULL)
	{
		$this->sma->checkPermissions();
	}



	function program($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/program/' . $this->session->userdata('branch_id'));
		}


		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;


		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$this->data['programs'] = $this->others_model->getAllProgram();


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfo($report_type_get, $this->data['programs'], $branch_id);
		} else
			$this->data['detailinfo'] = '';


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$this->data['program_summary'] = $this->getprogram_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		// $this->sma->print_arrays($this->data['org_summary']);



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Program'));
		$meta = array('page_title' => 'Program', 'bc' => $bc);


		if ($branch_id) {
			$this->page_construct('others/program_entry', $meta, $this->data, 'leftmenu/program');
		} else
			$this->page_construct('others/program', $meta, $this->data, 'leftmenu/program');
	}



	function getprogram_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{




		if ($branch_id) {

			if (($reportinfo['last_half'] || $report_type == 'half_yearly'))
				$result =  $this->site->query_binding("SELECT * from sma_program_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `program_id`, SUM(`number`) AS number ,SUM(`total_presence`) AS total_presence, sum(id) id  from sma_program_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY program_id", array($branch_id, $start_date, $end_date));
		} else {
			if (($reportinfo['last_half'] || $report_type == 'half_yearly'))
				$result =  $this->site->query_binding("SELECT * from sma_program_record WHERE  date BETWEEN ? AND ? ", array($start_date, $end_date));

			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `program_id`, SUM(`number`) AS number ,SUM(`total_presence`) AS total_presence, sum(id) id  from sma_program_record WHERE date BETWEEN ? AND ? GROUP BY program_id", array($start_date, $end_date));
		}

		return $result;
	}



	function getorg_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));

		else
			$result =  $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}




	function getEntryInfo($report_type_get, $programs, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';
			///half_yearly starts
			$program_recordinfo = $this->site->getOneRecord('program_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$program_recordinfo) {

				foreach ($programs as $program)
					$this->site->insertData('program_record', array('program_id' => $program->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}

			///half_yearly ends


		}





		$program_recordinfo = $this->site->getOneRecord('program_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);

		return array(
			'program_recordinfo' => $program_recordinfo
		);
	}

























	/* --------------------------------------------------------------------------------------------- */

	function modal_view($id = NULL, $status = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);

		$pr_details = $this->site->getManpowerByID($id);
		if (!$id || !$pr_details) {
			$this->session->set_flashdata('error', lang('manpower_not_found'));
			$this->sma->md();
		}

		$this->data['manpower'] = $pr_details;
		if ($status == 1) {
			$this->data['member'] = $this->manpower_model->getMemberByID($id);
			$this->data['status'] =  'Member';
		}
		$this->load->view($this->theme . 'manpower/modal_view', $this->data);
	}






	function detailupdate()
	{

		$this->sma->checkPermissions('index', TRUE);

		$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));


		$flag = 1;
		$msg = 'done';
		if ($is_changeable) {
			$flag = 100;
			$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
		} else {
			$msg = 'failed';
		}
		echo json_encode(array('flag' => $flag, 'msg' => $msg));
		exit;
	}




	function centraltraining($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
		}

		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;




		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$this->data['centraltrainings'] = $this->others_model->getAllCentralTraining();
		//$this->sma->print_arrays($this->data['centraltrainings']);


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfoCentralTraining($report_type_get, $this->data['centraltrainings'], $branch_id);
		} else
			$this->data['detailinfo'] = '';



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$this->data['centraltraining_summary'] = $this->getcentraltraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Central Training'));
		$meta = array('page_title' => 'central training', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('others/centraltraining_entry', $meta, $this->data, 'leftmenu/training');
		} else
			$this->page_construct('others/centraltraining', $meta, $this->data, 'leftmenu/training');
	}



	function centraltraining_export($branch_id)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/centraltraining/' . $this->session->userdata('branch_id'));
		}

		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$report_info = $report_type_get;




		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$centraltrainings = $this->others_model->getAllCentralTraining();
		//$this->sma->print_arrays($this->data['centraltrainings']);


		if ($branch_id) {
			$detailinfo = $this->getEntryInfoCentralTraining($report_type_get, $this->data['centraltrainings'], $branch_id);
		} else
			$detailinfo = '';



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$centraltraining_summary = $this->getcentraltraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);








		if ($centraltrainings) {
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('BM');




			$this->excel->getActiveSheet()->mergeCells('A1:I1');
			$this->excel->getActiveSheet()->mergeCells('A2:I2');
			$this->excel->getActiveSheet()->mergeCells('A3:I3');
			$this->excel->getActiveSheet()->mergeCells('A4:I4');
			$this->excel->getActiveSheet()->mergeCells('A5:I5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:I4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:I4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'কেন্দ্রীয় প্রশিক্ষণ ' . strtoupper($report_type['type']) . ' Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




			$this->excel->getActiveSheet()->getStyle('A7:I7')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('A7', 'শিক্ষাশিবির');
			$this->excel->getActiveSheet()->SetCellValue('B7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('C7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('D7', 'গড়');

			$this->excel->getActiveSheet()->SetCellValue('F7', 'শিক্ষা বৈঠক');
			$this->excel->getActiveSheet()->SetCellValue('G7', 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('H7', 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('I7', 'গড়');




			$row = 8;

			foreach ($centraltrainings as $training) if ($training->type == 1) {

				$row_info = record_row($centraltraining_summary, 'centraltraining_id', $training->id);

				$number = $row_info['number'];
				$total_presence = $row_info['total_presence'];

				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

				$row++;
			}

			$row = 8;
			foreach ($centraltrainings as $training) if ($training->type == 2) {
				$row_info = record_row($centraltraining_summary, 'centraltraining_id', $training->id);

				$number = $row_info['number'];
				$total_presence = $row_info['total_presence'];
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('I' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);

				$row++;
			}



			$this->excel->getActiveSheet()->getStyle('F' . $row . ':I' . $row)->getFont()->setBold(true);
			$this->excel->getActiveSheet()->SetCellValue('F' . $row, 'কর্মশালা');
			$this->excel->getActiveSheet()->SetCellValue('G' . $row, 'সংখ্যা');
			$this->excel->getActiveSheet()->SetCellValue('H' . $row, 'মোট উপস্থিতি');
			$this->excel->getActiveSheet()->SetCellValue('I' . $row, 'গড়');

			$row++;

			foreach ($centraltrainings as $training) if ($training->type == 3) {
				$row_info = record_row($centraltraining_summary, 'centraltraining_id', $training->id);

				$number = $row_info['number'];
				$total_presence = $row_info['total_presence'];
				$this->excel->getActiveSheet()->SetCellValue('F' . $row, $training->training_name);
				$this->excel->getActiveSheet()->SetCellValue('G' . $row, $row_info['number']);
				$this->excel->getActiveSheet()->SetCellValue('H' . $row, $row_info['total_presence']);
				$this->excel->getActiveSheet()->SetCellValue('I' . $row, ($number > 0) ? round($total_presence / $number, 2) : 0);
				$row++;
			}


			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);


			$filename = 'centraltraining_' . ($branch->name);
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}

		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	function getEntryInfoCentralTraining($report_type_get, $centraltrainings, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';
			///half_yearly starts
			$centraltraining_recordinfo = $this->site->getOneRecord('centraltraining_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$centraltraining_recordinfo) {

				foreach ($centraltrainings as $training)
					$this->site->insertData('centraltraining_record', array('centraltraining_id' => $training->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}

			///half_yearly ends


		}







		$centraltraining_recordinfo = $this->site->getOneRecord('centraltraining_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);

		return array(
			'centraltraining_recordinfo' => $centraltraining_recordinfo
		);
	}






	function getcentraltraining_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{
		$last_half = $reportinfo['last_half'];

		if ($branch_id) {
			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_centraltraining_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `centraltraining_id`, SUM(`number`) number, SUM(`total_presence`) total_presence , SUM(id) id from sma_centraltraining_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY centraltraining_id", array($branch_id, $start_date, $end_date));
		} else {

			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_centraltraining_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));

			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT `centraltraining_id`, SUM(`number`) number, SUM(`total_presence`) total_presence , SUM(id) id from sma_centraltraining_record WHERE   date BETWEEN ? AND ? GROUP BY centraltraining_id", array($start_date, $end_date));
		}


		return $result;
	}







	function organizationinfo($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/organizationinfo/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/organizationinfo/' . $this->session->userdata('branch_id'));
		}


		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;




		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$this->data['organizationinfos'] = $this->others_model->getAllOrganizationInfo();
		//$this->sma->print_arrays($this->data['centraltrainings']);


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryOrganizationInfo($report_type_get, $this->data['organizationinfos'], $branch_id);
		} else
			$this->data['detailinfo'] = '';




		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$this->data['organizationinfo_summary'] = $this->getorganizationinfo_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);



		$this->data['organizationinfo_summary_prev'] = $this->getorganizationinfo_summary_prev('annual', $report_type_get['last_year'], $branch_id);

		$this->data['unit_increase_decrease'] = $this->unit_increase_decrease($report_type, $report_start, $report_end, $branch_id, $report_type_get);






		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization Info'));
		$meta = array('page_title' => 'organization info', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('others/organizationinfo_entry', $meta, $this->data, 'leftmenu/organization');
		} else
			$this->page_construct('others/organizationinfo', $meta, $this->data, 'leftmenu/organization');
	}



	function unit_increase_decrease2($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{


		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease from sma_organization_record WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

		else
			$result =  $this->site->query_binding("SELECT  SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease  from sma_organization_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));



		return $result;
	}



	function unit_increase_decrease($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{


		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease from sma_institution_unit WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

		else
			$result =  $this->site->query_binding("SELECT  SUM(unit_increase) unit_increase , SUM(unit_decrease) unit_decrease  from sma_institution_unit WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));



		return $result;
	}





	function getorganizationinfo_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT * from sma_organizationinfo_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));

		else
			$result =  $this->site->query_binding("SELECT * from sma_organizationinfo_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}



	function getEntryOrganizationInfo($report_type_get, $organizationinfos, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';


			$organizationinfo_recordinfo = $this->site->getOneRecord('organizationinfo_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$organizationinfo_recordinfo) {

				foreach ($organizationinfos as $organizationinfo)
					$this->site->insertData('organizationinfo_record', array('organizationinfo_id' => $organizationinfo->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}







		$organizationinfo_recordinfo = $this->site->getOneRecord('organizationinfo_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);





		return array(
			'organizationinfo_recordinfo' => $organizationinfo_recordinfo
		);
	}






	function getorganizationinfo_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{



		if ($branch_id) {
			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result =  $this->site->query_binding("SELECT * from sma_organizationinfo_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT  `organizationinfo_id`,SUM(`institutional_increase`)  institutional_increase, SUM(`institutional_decrease`) institutional_decrease, SUM(`residential_increase`) residential_increase , SUM(`residential_decrease`) residential_decrease, SUM(id) id from sma_organizationinfo_record WHERE   branch_id = ? AND date BETWEEN ? AND ? GROUP BY organizationinfo_id", array($branch_id, $start_date, $end_date));
		} else {

			if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
				$result =  $this->site->query_binding("SELECT * from sma_organizationinfo_record WHERE date BETWEEN ? AND ? ", array($start_date, $end_date));
			else if ($report_type == 'annual')
				$result =  $this->site->query_binding("SELECT  `organizationinfo_id`,SUM(`institutional_increase`)  institutional_increase, SUM(`institutional_decrease`) institutional_decrease, SUM(`residential_increase`) residential_increase , SUM(`residential_decrease`) residential_decrease, SUM(id) id from sma_organizationinfo_record WHERE   date BETWEEN ? AND ? GROUP BY organizationinfo_id", array($start_date, $end_date));
		}


		return $result;
	}




	function administration($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);
		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/administration/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/administration/' . $this->session->userdata('branch_id'));
		}





		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;



		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}

		$this->data['administrations'] = $this->others_model->getAllAdministration();


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryAdministrationInfo($report_type_get, $this->data['administrations'], $branch_id);
		} else
			$this->data['detailinfo'] = '';





		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$this->data['administration_summary'] = $this->getadministration_summary($branch_id, $report_type_get);

		$this->data['nor_org'] = $this->get_no_org($branch_id);

		//$this->sma->print_arrays($this->data['administration_summary']);




		$this->data['prev'] = $this->administrative_details_prev('annual', $report_type_get['last_year'], $branch_id);



		//$this->sma->print_arrays($this->data['prev']);

		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Administration'));
		$meta = array('page_title' => 'Administration', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('others/administration_entry', $meta, $this->data, 'leftmenu/organization');
		} else
			$this->page_construct('others/administration', $meta, $this->data, 'leftmenu/organization');
	}




	function administrative_details_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(organization)  as organization,  SUM(administration)  as administration,  administration_id from sma_administration_record_calculated WHERE  branch_id = ? AND  calculated_year = ? group by  administration_id", array($branch_id, $year)); //`report_type` = ? AND $report_type,

		else
			$result =  $this->site->query_binding("SELECT SUM(organization)  as organization,  SUM(administration)  as administration, administration_id  from sma_administration_record_calculated WHERE  calculated_year = ?  group by administration_id", array($year));   //`report_type` = ? AND $report_type,


		return $result;
	}





	function getadministration_summary($branch_id = NULL, $reportinfo = null)
	{

		//$this->sma->print_arrays($reportinfo);

		$report_start = $reportinfo['start'];
		$report_end = $reportinfo['end'];
		$report_type = $reportinfo['type'];
		$report_year = $reportinfo['year'];
		$last_half = $reportinfo['last_half'];


		if ($branch_id) {


			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_administration_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));


			else if ($report_type == 'annual') {

				$result =  $this->site->query_binding("SELECT  administration_id,  SUM(`administrative_increase`) administrative_increase,  SUM(`administrative_decrease`) administrative_decrease, SUM(`organization_increase`) organization_increase,SUM(`organization_decrease`) organization_decrease, SUM(id) id from sma_administration_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY administration_id", array($branch_id, $report_start, $report_end));


				//last half
				$result2 =  $this->site->query_binding("SELECT  administration_id, SUM(`branch`) branch,   SUM(`thana`) thana,SUM(`ward`) ward,SUM(`unit`) unit,SUM(`supporter_org`) supporter_org from sma_administration_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY administration_id", array($branch_id, $reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));

				$merged = array_replace_recursive($result, $result2);

				$result  = $merged;
			}
		} else {


			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_administration_record WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));

			else if ($report_type == 'annual') {

				$result =  $this->site->query_binding("SELECT  administration_id,  SUM(`administrative_increase`) administrative_increase,  SUM(`administrative_decrease`) administrative_decrease, SUM(`organization_increase`) organization_increase,SUM(`organization_decrease`) organization_decrease, SUM(id) id from sma_administration_record WHERE date BETWEEN ? AND ? GROUP BY administration_id", array($report_start, $report_end));


				//last half
				$result2 =  $this->site->query_binding("SELECT  administration_id, SUM(`branch`) branch,   SUM(`thana`) thana,SUM(`ward`) ward,SUM(`unit`) unit,SUM(`supporter_org`) supporter_org from sma_administration_record WHERE  date BETWEEN ? AND ? GROUP BY administration_id", array($reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));

				$merged = array_replace_recursive($result, $result2);

				$result  = $merged;
			}
		}

		//$this->sma->print_arrays($result);
		return $result;
	}



	function getadministration_summary_prev($report_type, $year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT * from sma_administration_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));

		else
			$result =  $this->site->query_binding("SELECT * from sma_administration_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));



		return $result;
	}



	function get_no_org($branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT COUNT(id) as total, administration_id from sma_administration_without_org WHERE   branch_id = ?  GROUP BY administration_id ", array($branch_id));

		else
			$result =  $this->site->query("SELECT COUNT(id) as total, administration_id from sma_administration_without_org GROUP BY administration_id");



		return $result;
	}













	function getEntryAdministrationInfo($report_type_get, $administrations, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {
			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';

			$administration_recordinfo = $this->site->getOneRecord('administration_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$administration_recordinfo) {

				foreach ($administrations as $administration)
					$this->site->insertData('administration_record', array('administration_id' => $administration->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}









		if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {
			/*$administration_recordinfo = $this->site->query_binding('SELECT administration_id,SUM(organization_increase) organization_increase, SUM(organization_decrease) organization_decrease, SUM(thana) thana, SUM(ward) ward, SUM(unit) unit, SUM(supporter_org) supporter_org,  SUM(prev) prev, SUM(org_number) org_number,SUM(id) id FROM sma_administration_record GROUP BY administration_id',array($branch_id,$end,$start));	
	*/
			// it seems no need this part
		} else {
			// $administration_recordinfo = $this->site->getOneRecord('administration_record','*',array('branch_id'=>$branch_id,'date <= '=>$report_end,'date >= '=>$report_start),'id desc',1,0);
		}




		return array(
			'administration_recordinfo' => $administration_recordinfo
		);
	}









	function administrationbutorg($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/administrationbutorg/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/administrationbutorg/' . $this->session->userdata('branch_id'));
		}




		$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$this->data['branches'] = $this->site->getAllBranches();
			$this->data['branch_id'] = $branch_id;
			$this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$this->data['branches'] = NULL;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}


		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Area without org'));
		$meta = array('page_title' => 'Area without org', 'bc' => $bc);
		$this->page_construct('others/administrationbutorg', $meta, $this->data, 'leftmenu/organization');
	}








	function getAdministration($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);

		if ((!$this->Owner || !$this->Admin) && !$branch_id) {
			$user = $this->site->getUser();
			$branch_id = $user->branch_id;
		}

		$delete_link = "<a href='#' class='tip po' title='<b>" . "Delete" . "</b>' data-content=\"<p>"
			. lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('others/delete/$1') . "'>"
			. lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
			. "Delete" . "</a>";

		$edit_link = anchor('admin/others/editadministration/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');



		$action = '<div class="text-center"><div class="btn-group text-left">'
			. '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
			. lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

		$action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
			<li>' . $edit_link . '</li>
            </ul>
        </div></div>';




		$this->load->library('datatables');

		if ($branch_id) {

			$this->datatables
				->select($this->db->dbprefix('administration_without_org') . ".id as id,  administration_name,   {$this->db->dbprefix('administration')}.administration_type, {$this->db->dbprefix('branches')}.name as branch_name,notes", FALSE)
				->from('administration_without_org');
			$this->datatables->join('administration', 'administration_without_org.administration_id=administration.id', 'left');
			$this->datatables->join('branches', 'branches.id=administration_without_org.branch_id', 'left')
				->where('branches.id', $branch_id);
		} else {
			$this->datatables
				->select($this->db->dbprefix('administration_without_org') . ".id as id,  administration_name,   {$this->db->dbprefix('administration')}.administration_type, {$this->db->dbprefix('branches')}.name as branch_name,notes", FALSE)
				->from('administration_without_org');
			$this->datatables->join('administration', 'administration_without_org.administration_id=administration.id', 'left');
			$this->datatables->join('branches', 'branches.id=administration_without_org.branch_id', 'left');
		}








		$this->datatables->add_column("Actions", $action, "id");

		echo $this->datatables->generate();
	}


	function administrationexport($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);

		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
			$branch_id = $branch_id;
			$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
		} else {
			$branch_id = $branch_id;
			$this->data['branch_id'] = $this->session->userdata('branch_id');
			$branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
		}


		$this->db->select($this->db->dbprefix('administration_without_org') . ".id as id,  administration_name,   {$this->db->dbprefix('administration')}.administration_type, {$this->db->dbprefix('branches')}.name as branch_name,notes", FALSE)
			->from('administration_without_org')
			->join('administration', 'administration_without_org.administration_id=administration.id', 'left')

			->join('branches', 'branches.id=administration_without_org.branch_id', 'left')
			->order_by('administration_without_org.id ASC');



		if ($branch_id)
			$this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);




		$q = $this->db->get();

		if ($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
		} else {
			$data = NULL;
		}


		if (!empty($data)) {

			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Associate Increase list');





			$this->excel->getActiveSheet()->mergeCells('A1:G1');
			$this->excel->getActiveSheet()->mergeCells('A2:G2');
			$this->excel->getActiveSheet()->mergeCells('A3:G3');
			$this->excel->getActiveSheet()->mergeCells('A4:G4');
			$this->excel->getActiveSheet()->mergeCells('A5:G5');

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold(true);


			$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
			$this->excel->getActiveSheet()->SetCellValue('A3', 'Administration without org');
			$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch ? $branch->name : lang('all_branches')));

			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);

			$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
			$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold(true);





			$this->excel->getActiveSheet()->SetCellValue('A6', 'Sr');
			$this->excel->getActiveSheet()->SetCellValue('B6', lang('name'));
			$this->excel->getActiveSheet()->SetCellValue('C6', lang('ধরণ'));

			$this->excel->getActiveSheet()->SetCellValue('D6', 'Branch');
			$this->excel->getActiveSheet()->SetCellValue('E6', 'Notes');

			$row = 7;

			foreach ($data as $key => $data_row) {


				$this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
				$this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->administration_name);
				$this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->administration_type);
				$this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->branch_name);
				$this->excel->getActiveSheet()->SetCellValue('E' . $row, strip_tags($data_row->notes));
				$row++;
			}


			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('C2:E' . $row)->getAlignment()->setWrapText(true);
			$filename = 'administrationwithoutorg';
			$this->load->helper('excel');
			create_excel($this->excel, $filename);
		}
		$this->session->set_flashdata('error', lang('nothing_found'));
		redirect($_SERVER["HTTP_REFERER"]);
	}


	/* ------------------------------------------------------- */

	function addadministration($branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('others/addadministration/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('others/addadministration/' . $this->session->userdata('branch_id'));
		}






		$this->form_validation->set_rules('branch_id', lang("branch"), 'required');
		$this->form_validation->set_rules('administration_name', 'Name', 'required');
		$this->form_validation->set_rules('administration_id', 'Type', 'required');



		if ($this->form_validation->run() == true) {


			$is_changeable = $this->site->check_confirm($this->input->post('branch_id'), date('Y-m-d'));

			if ($is_changeable == false) {
				$this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
				redirect($_SERVER["HTTP_REFERER"]);
			}


			$data = array(
				'administration_name' => $this->input->post('administration_name'),
				'administration_id' => $this->input->post('administration_id'),
				'user_id' => $this->session->userdata('user_id'),
				'branch_id' => $this->input->post('branch_id'),
				'notes' => $this->input->post('notes')
			);
		} elseif ($this->input->post('orgadministration')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('others/admnistrationbutorg/' . $branch_id);
		}

		if ($this->form_validation->run() == true && $this->others_model->addAdministration($data)) {

			$this->session->set_flashdata('message', 'Added successfully');
			admin_redirect("others/administrationbutorg/" . $branch_id);
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			$this->data['modal_js'] = $this->site->modal_js();

			$this->data['branch_id'] = $branch_id;
			$this->data['administrations'] = $this->others_model->getAllAdministration();

			$this->load->view($this->theme . 'others/administrationentry', $this->data);
		}
	}





	function editadministration($id = NULL)
	{


		$this->sma->checkPermissions('index', TRUE);



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		$administration_without_org_details = $this->site->getByID('administration_without_org', 'id', $id);


		$this->form_validation->set_rules('administration_name', 'Name', 'required');
		$this->form_validation->set_rules('administration_id', 'Type', 'required');



		if ($this->form_validation->run() == true) {
			$data = array(
				'administration_name' => $this->input->post('administration_name'),
				'administration_id' => $this->input->post('administration_id'),
				'user_id' => $this->session->userdata('user_id'),

				'notes' => $this->input->post('notes')
			);
		} elseif ($this->input->post('edit_administration')) {
			$this->session->set_flashdata('error', validation_errors());
			admin_redirect('others/administrationbutorg');
		}

		if ($this->form_validation->run() == true && $this->site->updateData('administration_without_org', $data, array('id' => $id))) {

			$this->session->set_flashdata('message', 'Updated successfully');
			admin_redirect("others/administrationbutorg");
		} else {




			$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
			$this->data['modal_js'] = $this->site->modal_js();

			$this->data['administration'] = $administration_without_org_details;



			$this->data['administrations'] = $this->others_model->getAllAdministration();


			$this->load->view($this->theme . 'others/administrationedit', $this->data);
		}
	}





	function delete($id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		if (!($this->Owner || $this->Admin))
			$where =  array('id' => $id, 'branch_id' => $this->session->userdata('branch_id'));

		else if ($this->Owner || $this->Admin)
			$where =  array('id' => $id);



		if ($this->input->get('id')) {
			$id = $this->input->get('id');
		}

		if ($this->site->delete('administration_without_org', $where)) {
			if ($this->input->is_ajax_request()) {
				$this->sma->send_json(array('error' => 0, 'msg' => 'Area Deleted'));
			}
			$this->session->set_flashdata('message', 'Area Deleted');
			admin_redirect('welcome');
		}
	}
}
