<?php defined('BASEPATH') or exit('No direct script access allowed');

class Training extends MY_Controller
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
		$this->load->admin_model('training_model');
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


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/' . $this->session->userdata('branch_id'));
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

		$this->data['trainings'] = $this->training_model->getAllTraining();


		if ($branch_id) {
			$this->data['detailinfo'] = $this->getEntryInfo($report_type_get, $this->data['trainings'], $branch_id);
		} else
			$this->data['detailinfo'] = '';




		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		$this->data['training_summary'] = $this->gettraining_summary($report_type, $report_start, $report_end, $branch_id, $report_type_get);


		// $this->sma->print_arrays($this->data['org_summary']);



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Training'));
		$meta = array('page_title' => 'training', 'bc' => $bc);


		if ($branch_id) {


			$this->page_construct('training/training_entry', $meta, $this->data, 'leftmenu/training');
		} else
			$this->page_construct('training/training', $meta, $this->data, 'leftmenu/training');
	}


	function get_no_org($branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org WHERE   branch_id = ?  GROUP BY institution_type_id ", array($branch_id));

		else
			$result =  $this->site->query("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org GROUP BY institution_type_id");



		return $result;
	}


	function gettraining_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
	{

		$last_half = $reportinfo['last_half'];

		if ($branch_id) {
			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_training_record WHERE   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
			else if ($this->input->get('type') && ($this->input->get('type') == 'annual'))
				$result =  $this->site->query_binding("SELECT `training_id`, SUM(`number`) number, SUM(`delegate_number`) delegate_number,SUM(`session_number`) session_number,SUM(`total_presence`) total_presence, SUM(id) id from sma_training_record WHERE   branch_id = ? AND date BETWEEN ? AND ?  GROUP BY training_id", array($branch_id, $start_date, $end_date));
		} else {
			if ($report_type == 'half_yearly' || $last_half)
				$result =  $this->site->query_binding("SELECT * from sma_training_record WHERE   date BETWEEN ? AND ? ", array($start_date, $end_date));

			else if ($this->input->get('type') && ($this->input->get('type') == 'annual'))
				$result =  $this->site->query_binding("SELECT `training_id`, SUM(`number`) number, SUM(`delegate_number`) delegate_number,SUM(`session_number`) session_number,SUM(`total_presence`) total_presence, SUM(id) id from sma_training_record WHERE    date BETWEEN ? AND ?  GROUP BY training_id", array($start_date, $end_date));
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



















	function getEntryInfo($report_type_get, $trainings, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];

		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';

			$training_recordinfo = $this->site->getOneRecord('training_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$training_recordinfo) {

				foreach ($trainings as $training)
					$this->site->insertData('training_record', array('training_id' => $training->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}






		$training_recordinfo = $this->site->getOneRecord('training_record', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);


		return array(
			'training_recordinfo' => $training_recordinfo
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
		$msg = "done";

		if ($is_changeable) {
			$flag = 100;
			$this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
		} else {
			$msg = "failed";
		}
		echo json_encode(array('flag' => $flag, 'msg' => $msg));


		exit;
	}




	function library($branch_id = NULL)
	{



		$this->sma->checkPermissions('index', TRUE);



		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/library/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/library/' . $this->session->userdata('branch_id'));
		}

		$report_type_get = $this->report_type();

		if ($report_type_get == false)
			admin_redirect();

		$this->data['report_info'] = $report_type_get;

		//$this->sma->print_arrays($report_type_get['last_year']);


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



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];
		$prev = $report_type_get['last_year'];


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$this->data['detailinfo'] = $this->getEntryInfoLibrary($report_type_get, $branch_id);
			 $totalreader = $this->gettotalreader($report_start, $report_end, $prev, $branch_id);
			 $this->data['totalreader'] = isset($totalreader[0]['current_manpower']) ? $totalreader[0]['current_manpower'] : 0;
		} else {
			$this->data['detailinfo'] = $this->getEntryInfoLibrarySUM($report_type_get, $branch_id);
			$totalreader = $this->gettotalreader($report_start, $report_end, $prev, $branch_id);
			$this->data['totalreader'] = isset($totalreader[0]['current_manpower']) ? $totalreader[0]['current_manpower'] : 0;
		}



		 
		//$this->sma->print_arrays($this->data['totalreader']);

		



		$this->data['prev'] = $this->getPrev('annual', $report_type_get['last_year'], $branch_id);







		$this->data['current_worker'] = $this->current_worker($report_type, $report_start, $report_end, $report_year, $branch_id);





		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Library'));
		$meta = array('page_title' => 'Library', 'bc' => $bc);
		if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
			$this->page_construct('training/library_entry', $meta, $this->data, 'leftmenu/training');
		else
			$this->page_construct('training/library', $meta, $this->data, 'leftmenu/training');
	}



	function current_worker($type, $start, $end, $year, $branch_id = null)
	{

		$total = 0;

		$this->db
			->select("COUNT(id) as associate_number", FALSE)
			->from('associatelog');
		$this->db->where('process_id', 2);
		$this->db->where('in_out', 1);
		$this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');

		if ($branch_id)
			$this->db->where('branch', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();

			$total = $total - (isset($rt[0]->associate_number) ? $rt[0]->associate_number : 0);

			//		 echo 'Asso improvement: '.( isset($rt[0]->associate_number) ? $rt[0]->associate_number : 0 ).'<br/>';
		}



		$this->db
			->select("COUNT(id) as worker_number", FALSE)
			->from('worker_decrease');

		$this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');
		if ($branch_id)
			$this->db->where('branch_id', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();
			$total = $total - (isset($rt[0]->worker_number) ? $rt[0]->worker_number : 0);

			//		 	 echo 'worker_decrease: '.( isset($rt[0]->worker_number) ? $rt[0]->worker_number : 0 ).'<br/>';
		}






		$this->db
			->select("SUM(worker_improvement+ worker_arrival -worker_demotion - worker_endstd  - worker_transfer  - worker_cancel) as worker_cal_number", FALSE)
			->from('manpower_record');
		$this->db->where('report_type', $type);
		$this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');

		if ($branch_id)
			$this->db->where('branch_id', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();
			$total = $total + (isset($rt[0]->worker_cal_number) ? $rt[0]->worker_cal_number : 0);

			//		   echo 'manpower_record: '.( isset($rt[0]->worker_cal_number) ? $rt[0]->worker_cal_number : 0 ).'<br/>';
		}


		//	 echo 'last: '.($year-1).'<br/>';

		$this->db
			->select("SUM(`worker`) as worker", FALSE)
			->from('calculated_mapower');
		$this->db->where('report_type', 'annual');
		$this->db->where('calculated_year', $year - 1);

		if ($branch_id)
			$this->db->where('branch_id', $branch_id);

		$q = $this->db->get();
		if ($q->num_rows() > 0) {
			$rt = $q->result();
			$total = $total + (isset($rt[0]->worker) ? $rt[0]->worker : 0);

			//		    echo 'calculated_mapower: '.( isset($rt[0]->worker) ? $rt[0]->worker : 0 ).'<br/>';
		}

		return $total;
	}





	function getPrev($report_type, $last_year, $branch_id = NULL)
	{

		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(`library_number`) as  library_number,   SUM(`personal`) as  personal, SUM(`book_number`) as  book_number          
FROM `sma_library_calculated` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));

		else
			$result =  $this->site->query_binding("SELECT SUM(`library_number`) as  library_number,   SUM(`personal`) as  personal, SUM(`book_number`) as  book_number          
FROM `sma_library_calculated` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));


		return $result;
	}


	function gettotalreader($start, $end, $prev, $branch_id = NULL)
	{

		if ($branch_id)
			return $this->site->query_binding("SELECT increase_decrease(?,?,?,?) + `worker_increase_decrease`(?,?,?) current_manpower  ", array($start, $end, $branch_id, $prev, $start, $end, $branch_id));

		else
			return $this->site->query_binding("SELECT increase_decrease(? ,?,?,?) + `worker_increase_decrease`(?,?,?) current_manpower  ", array($start, $end, $branch_id, $prev, $start, $end, $branch_id));
	}



	function gettotalreaderOLD($branch_id = NULL)
	{

		if ($branch_id)
			return $this->site->query_binding("SELECT COUNT(id) reader FROM `sma_manpower` WHERE `orgstatus_id` IN (1,2,12) AND branch = ? ", array($branch_id));

		else
			return $this->site->query("SELECT COUNT(id) reader FROM `sma_manpower` WHERE `orgstatus_id` IN (1,2,12)");
	}

	function getEntryInfoLibrary($report_type_get, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];



		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {
			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';


			$libraryinfo = $this->site->getOneRecord('library', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$libraryinfo) {
				$this->site->insertData('library', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}


		if (($report_type == 'annual' && $report_type_get['last_half']) || $report_type == 'half_yearly')
			$libraryinfo = $this->site->getOneRecord('library', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);


		else if ($report_type == 'annual') {
			$library_info1 = $this->site->query_binding('SELECT SUM(id) id, SUM(`library_increase`) library_increase,  SUM(`library_decrease`) library_decrease, SUM(`book_increase`) book_increase, SUM(`book_decrease`) book_decrease,
 SUM(`personal_increase`) personal_increase, SUM(`personal_decrease`) personal_decrease, SUM(`issued_book`) issued_book, SUM(`read_book`) read_book,  SUM(`online_read_book`) online_read_book, SUM(`online_sent_book`) online_sent_book, SUM(`online_book_upload`) online_book_upload
 FROM sma_library WHERE branch_id = ? AND  DATE(date) between  ? AND ? ', array($branch_id, $report_start, $report_end));

			// last half
			$library_info2 = $this->site->query_binding('SELECT   SUM(id) id,  SUM(`reader`) reader, 
 SUM(`online_reader`) online_reader 
 FROM sma_library WHERE branch_id = ? AND  DATE(date) between  ? AND ? ', array($branch_id, $report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));


			$library_info = array_replace_recursive($library_info1, $library_info2);

			// $this->sma->print_arrays($library_info1,$library_info2,$library_info);

			$library_info = isset($library_info[0]) ? $library_info[0] : array();
			$libraryinfo = (object)$library_info;
		}



		// $this->sma->print_arrays($libraryinfo);

		return array(
			'libraryinfo' => $libraryinfo
		);
	}




	function getEntryInfoLibrarySUM($report_type_get, $branch_id = NULL)
	{

		$this->sma->checkPermissions('index', TRUE);


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		$result1 =  $this->site->query_binding("SELECT SUM(id) id, SUM(`library_increase`) as library_increase, SUM(`library_decrease`) as library_decrease, SUM(`book_increase`) as book_increase, SUM(`book_decrease`) as book_decrease, SUM(`personal_increase`) as personal_increase, SUM(`personal_decrease`) as personal_decrease,  SUM(`issued_book`) as issued_book, SUM(`read_book`) as read_book,  SUM(`online_read_book`) as online_read_book, SUM(`online_sent_book`) as online_sent_book, SUM(`online_book_upload`) as  online_book_upload FROM `sma_library` WHERE  date BETWEEN ? AND ? ", array($report_start, $report_end));

		// last half		 
		$result2 =  $this->site->query_binding("SELECT SUM(id) id, SUM(`reader`) as reader,  SUM(`online_reader`) as online_reader FROM `sma_library` WHERE  date BETWEEN ? AND ? ", array($report_start, $report_end)); //$report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual

		$result = array_replace_recursive($result1, $result2);

		return $result;
	}





	function communication($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/communication/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/communication/' . $this->session->userdata('branch_id'));
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

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$this->data['report_info'] = $report_type;


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$this->data['detailinfo'] = $this->getEntryInfoCommunication($report_type, $branch_id);
		} else {
			$this->data['detailinfo'] = $this->getEntryInfoCommunicationSUM($report_type, $branch_id);
		}



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Communication'));
		$meta = array('page_title' => 'Communication', 'bc' => $bc);
		if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
			$this->page_construct('training/communication_entry', $meta, $this->data, 'leftmenu/others');
		else
			$this->page_construct('training/communication', $meta, $this->data, 'leftmenu/others');
	}




	function getEntryInfoCommunication($report_type_get, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {
			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';



			$communicationinfo = $this->site->getOneRecord('communication', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$communicationinfo) {
				$this->site->insertData('communication', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}



		if (($report_type == 'annual' && $report_type_get['last_half']) || $report_type == 'half_yearly')
			$communicationinfo = $this->site->getOneRecord('communication', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);


		else if ($report_type == 'annual') {
			$communication_info =  $this->site->query_binding("SELECT sum(id) id, SUM(`letter_from_center`) as letter_from_center, SUM(`letter_from_branch`) as letter_from_branch, SUM(`letter_to_subordinate`) as letter_to_subordinate, SUM(`letter_to_center`) as letter_to_center, SUM(`letter_from_outside`) as letter_from_outside, SUM(`email_from_center`) as email_from_center, SUM(`email_from_branch`) as email_from_branch, SUM(`email_to_subordinate`) as email_to_subordinate, SUM(`email_to_center`) as email_to_center, SUM(`email_from_outside`) as email_from_outside  FROM `sma_communication` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
			//$communicationinfo = $this->site->getOneRecord('communication','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);	
			$communicationinfo = isset($communication_info[0]) ? (object) $communication_info[0] : NULL;
		}


		return array(
			'communicationinfo' => $communicationinfo
		);
	}




	function getEntryInfoCommunicationSUM($report_type_get, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];


		if ($branch_id)
			$result =  $this->site->query_binding("SELECT SUM(`letter_from_center`) as letter_from_center, SUM(`letter_from_branch`) as letter_from_branch, SUM(`letter_to_subordinate`) as letter_to_subordinate, SUM(`letter_to_center`) as letter_to_center, SUM(`letter_from_outside`) as letter_from_outside, SUM(`email_from_center`) as email_from_center, SUM(`email_from_branch`) as email_from_branch, SUM(`email_to_subordinate`) as email_to_subordinate, SUM(`email_to_center`) as email_to_center, SUM(`email_from_outside`) as email_from_outside  FROM `sma_communication` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
		else
			$result =  $this->site->query_binding("SELECT SUM(`letter_from_center`) as letter_from_center, SUM(`letter_from_branch`) as letter_from_branch, SUM(`letter_to_subordinate`) as letter_to_subordinate, SUM(`letter_to_center`) as letter_to_center, SUM(`letter_from_outside`) as letter_from_outside, SUM(`email_from_center`) as email_from_center, SUM(`email_from_branch`) as email_from_branch, SUM(`email_to_subordinate`) as email_to_subordinate, SUM(`email_to_center`) as email_to_center, SUM(`email_from_outside`) as email_from_outside  FROM `sma_communication` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));


		return $result;
	}









	function trainingelement($branch_id = NULL)
	{
		$this->sma->checkPermissions('index', TRUE);


		if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('training/trainingelement/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
			admin_redirect('training/trainingelement/' . $this->session->userdata('branch_id'));
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

		$report_type = $this->report_type();

		if ($report_type == false)
			admin_redirect();

		$this->data['report_info'] = $report_type;


		if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
		{
			$this->data['detailinfo'] = $this->getEntryInfoTrainingElement($report_type, $branch_id);
		} else {
			$this->data['detailinfo'] = $this->getEntryInfoTrainingElementSUM($report_type, $branch_id);
		}



		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'TrainingElement'));
		$meta = array('page_title' => 'TrainingElement', 'bc' => $bc);
		if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
			$this->page_construct('training/trainingelement_entry', $meta, $this->data, 'leftmenu/others');
		else
			$this->page_construct('training/trainingelement', $meta, $this->data, 'leftmenu/others');
	}




	function getEntryInfoTrainingElement($report_type_get, $branch_id = NULL)
	{


		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];
		$report_type = $report_type_get['type'];
		$report_year = $report_type_get['year'];




		if ($report_type_get['is_current'] != false  && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {

			$type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';


			$trainingelementinfo = $this->site->getOneRecord('trainingelement', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

			if (!$trainingelementinfo) {
				$this->site->insertData('trainingelement', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
			}
		}





		if (($report_type == 'annual' && $report_type_get['last_half']) || $report_type == 'half_yearly')
			$trainingelementinfo = $this->site->getOneRecord('trainingelement', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);

		else if ($report_type == 'annual') {

			$trainingelement_info  =  $this->site->query_binding("SELECT GROUP_CONCAT(leaflet_from_center_topic) leaflet_from_center_topic, GROUP_CONCAT(bulletin_topic) bulletin_topic, GROUP_CONCAT(dawat_banner_topic) dawat_banner_topic,  GROUP_CONCAT(leaflet_from_branch_topic) leaflet_from_branch_topic,  GROUP_CONCAT(`poster_from_branch_topic`) as poster_from_branch_topic , SUM(`poster_from_center`) as poster_from_center , GROUP_CONCAT(`poster_from_center_topic`) as poster_from_center_topic ,SUM(`poster_from_branch`) as poster_from_branch , SUM(`leaflet_from_center`) as leaflet_from_center , SUM(`leaflet_from_branch`) as leaflet_from_branch , SUM(`dawat_banner`) as dawat_banner, SUM(`bulletin`) as bulletin, SUM(id) as id FROM `sma_trainingelement` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));

			$trainingelementinfo = isset($trainingelement_info[0]) ? (object)$trainingelement_info[0] : null;
		}


		return array(
			'trainingelementinfo' => $trainingelementinfo
		);
	}




	function getEntryInfoTrainingElementSUM($report_type_get, $branch_id = NULL)
	{

		//$this->sma->checkPermissions('index', TRUE);



		$report_start = $report_type_get['start'];
		$report_end = $report_type_get['end'];


		$result  =  $this->site->query_binding("SELECT SUM(`poster_from_center`) as poster_from_center , SUM(`poster_from_branch`) as poster_from_branch , SUM(`leaflet_from_center`) as leaflet_from_center , SUM(`leaflet_from_branch`) as leaflet_from_branch , SUM(`dawat_banner`) as dawat_banner, SUM(`bulletin`) as bulletin FROM `sma_trainingelement` WHERE  date BETWEEN ? AND ? ", array($report_start, $report_end));



		return $result;
	}
}
