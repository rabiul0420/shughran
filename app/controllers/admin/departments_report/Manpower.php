<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manpower extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=24) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==24) {  //literature
			$this->departmentuser = true; 
		}
		
        $this->lang->admin_load('manpower', $this->Settings->user_language);
        $this->load->library('form_validation');
		$this->load->helper('report');
        $this->load->admin_model('manpower_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function manpower_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/manpower-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/manpower-bivag/'.$this->session->userdata('branch_id'));
		}

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

		if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
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

        if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {
        $this->db->select_sum('branch_committee');
        $this->db->select_sum('coun_team');
        $this->db->select_sum('bivag_com_meeting');
        $this->db->select_sum('per_biodata');
        $this->db->select_sum('sec_man_month');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['human_management_songothon'] = $this->db->get('human_management_songothon')->first_row('array');

        
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('human_management_songothon');
        $this->data['human_management_songothon_row'] = $query->num_rows();
       
        $this->db->select_sum('jonosheba_terget');
        $this->db->select_sum('jonosheba_bachai');
        $this->db->select_sum('jonosheba_num');
        $this->db->select_sum('jonosheba_pre');
        $this->db->select_sum('jonosheba_sang');
        $this->db->select_sum('jonosheba_shadha');
        $this->db->select_sum('jonosheba_ongsho');
        $this->db->select_sum('jonosheba_uttirno');

        $this->db->select_sum('shomajsheba_terget');
        $this->db->select_sum('shomajsheba_bachai');
        $this->db->select_sum('shomajsheba_num');
        $this->db->select_sum('shomajsheba_pre');
        $this->db->select_sum('shomajsheba_sang');
        $this->db->select_sum('shomajsheba_shadha');
        $this->db->select_sum('shomajsheba_ongsho');
        $this->db->select_sum('shomajsheba_uttirno');

        $this->db->select_sum('manobsheba_terget');
        $this->db->select_sum('manobsheba_bachai');
        $this->db->select_sum('manobsheba_num');
        $this->db->select_sum('manobsheba_pre');
        $this->db->select_sum('manobsheba_sang');
        $this->db->select_sum('manobsheba_shadha');
        $this->db->select_sum('manobsheba_ongsho');
        $this->db->select_sum('manobsheba_uttirno');


        $this->db->select_sum('law_terget');
        $this->db->select_sum('law_bachai');
        $this->db->select_sum('law_num');
        $this->db->select_sum('law_pre');
        $this->db->select_sum('law_sang');
        $this->db->select_sum('law_shadha');
        $this->db->select_sum('law_ongsho');
        $this->db->select_sum('law_uttirno');

        $this->db->select_sum('totthosheba_terget');
        $this->db->select_sum('totthosheba_bachai');
        $this->db->select_sum('totthosheba_num');
        $this->db->select_sum('totthosheba_pre');
        $this->db->select_sum('totthosheba_sang');
        $this->db->select_sum('totthosheba_shadha');
        $this->db->select_sum('totthosheba_ongsho');
        $this->db->select_sum('totthosheba_uttirno');

        $this->db->select_sum('uni_teacher_govt_terget');
        $this->db->select_sum('uni_teacher_govt_bachai');
        $this->db->select_sum('uni_teacher_govt_num');
        $this->db->select_sum('uni_teacher_govt_pre');
        $this->db->select_sum('uni_teacher_govt_sang');
        $this->db->select_sum('uni_teacher_govt_shadha');
        $this->db->select_sum('uni_teacher_govt_ongsho');
        $this->db->select_sum('uni_teacher_govt_uttirno');

        $this->db->select_sum('uni_teacher_private_terget');
        $this->db->select_sum('uni_teacher_private_bachai');
        $this->db->select_sum('uni_teacher_private_num');
        $this->db->select_sum('uni_teacher_private_pre');
        $this->db->select_sum('uni_teacher_private_sang');
        $this->db->select_sum('uni_teacher_private_shadha');
        $this->db->select_sum('uni_teacher_private_ongsho');
        $this->db->select_sum('uni_teacher_private_uttirno');

        $this->db->select_sum('medi_teacher_terget');
        $this->db->select_sum('medi_teacher_bachai');
        $this->db->select_sum('medi_teacher_num');
        $this->db->select_sum('medi_teacher_pre');
        $this->db->select_sum('medi_teacher_sang');
        $this->db->select_sum('medi_teacher_shadha');
        $this->db->select_sum('medi_teacher_ongsho');
        $this->db->select_sum('medi_teacher_uttirno');

        $this->db->select_sum('college_teacher_terget');
        $this->db->select_sum('college_teacher_bachai');
        $this->db->select_sum('college_teacher_num');
        $this->db->select_sum('college_teacher_pre');
        $this->db->select_sum('college_teacher_sang');
        $this->db->select_sum('college_teacher_shadha');
        $this->db->select_sum('college_teacher_ongsho');
        $this->db->select_sum('college_teacher_uttirno');

        $this->db->select_sum('karigori_teacher_terget');
        $this->db->select_sum('karigori_teacher_bachai');
        $this->db->select_sum('karigori_teacher_num');
        $this->db->select_sum('karigori_teacher_pre');
        $this->db->select_sum('karigori_teacher_sang');
        $this->db->select_sum('karigori_teacher_shadha');
        $this->db->select_sum('karigori_teacher_ongsho');
        $this->db->select_sum('karigori_teacher_uttirno');

        $this->db->select_sum('maddhomik_teacher_terget');
        $this->db->select_sum('maddhomik_teacher_bachai');
        $this->db->select_sum('maddhomik_teacher_num');
        $this->db->select_sum('maddhomik_teacher_pre');
        $this->db->select_sum('maddhomik_teacher_sang');
        $this->db->select_sum('maddhomik_teacher_shadha');
        $this->db->select_sum('maddhomik_teacher_ongsho');
        $this->db->select_sum('maddhomik_teacher_uttirno');

        $this->db->select_sum('madrasah_teacher_terget');
        $this->db->select_sum('madrasah_teacher_bachai');
        $this->db->select_sum('madrasah_teacher_num');
        $this->db->select_sum('madrasah_teacher_pre');
        $this->db->select_sum('madrasah_teacher_sang');
        $this->db->select_sum('madrasah_teacher_shadha');
        $this->db->select_sum('madrasah_teacher_ongsho');
        $this->db->select_sum('madrasah_teacher_uttirno');

        $this->db->select_sum('cultural_worker_terget');
        $this->db->select_sum('cultural_worker_bachai');
        $this->db->select_sum('cultural_worker_num');
        $this->db->select_sum('cultural_worker_pre');
        $this->db->select_sum('cultural_worker_sang');
        $this->db->select_sum('cultural_worker_shadha');
        $this->db->select_sum('cultural_worker_ongsho');
        $this->db->select_sum('cultural_worker_uttirno');

        $this->db->select_sum('player_terget');
        $this->db->select_sum('player_bachai');
        $this->db->select_sum('player_num');
        $this->db->select_sum('player_pre');
        $this->db->select_sum('player_sang');
        $this->db->select_sum('player_shadha');
        $this->db->select_sum('player_ongsho');
        $this->db->select_sum('player_uttirno');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        
        $this->data['human_managemant_jonobol_shorboraho'] = $this->db->get('human_managemant_jonobol_shorboraho')->first_row('array');
      
        $this->db->select_sum('shikkha_central_s');
        $this->db->select_sum('shikkha_central_p');
        $this->db->select_sum('shikkha_shakha_s');
        $this->db->select_sum('shikkha_shakha_p'); 
        $this->db->select_sum('kormoshala_central_s');
        $this->db->select_sum('kormoshala_central_p');
        $this->db->select_sum('kormoshala_shakha_s');
        $this->db->select_sum('kormoshala_shakha_p'); 
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['human_management_training_program'] = $this->db->get('human_management_training_program')->first_row('array');

    }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_management_training_program');
            $this->data['human_management_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_managemant_jonobol_shorboraho');
            $this->data['human_managemant_jonobol_shorboraho'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_management_songothon');
            $this->data['human_management_songothon'] = $query->first_row('array');
        }

		$this->data['m'] = 'manpower';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/manpower/manpower_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/manpower/manpower_bivag', $meta, $this->data,'leftmenu/departmentsreport');
	}

   
	
function report_type1(){
	
	$entrytimeinfo = $this->site->getOneRecord('entry_settings','*',array('year'=>date('Y')),'id desc',1,0);	
	
	
	$current_date = strtotime(date('Y-m-d'));
	
	
	$annual_start = strtotime($entrytimeinfo->startdate_annual);
	$annual_end = strtotime($entrytimeinfo->enddate_annual);
  	
	$half_start = strtotime($entrytimeinfo->startdate_half);
	$half_end = strtotime($entrytimeinfo->enddate_half);
	
	$type =  ($current_date  >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual'; 
	if($type=='half_yearly') 
	  return array('type'=>'half_yearly','start'=>$entrytimeinfo->startdate_half,'end'=>$entrytimeinfo->enddate_half,'year'=>$entrytimeinfo->year);
    else 
	  return array('type'=>'annual','start'=>$entrytimeinfo->startdate_annual,'end'=>$entrytimeinfo->enddate_annual,'year'=>$entrytimeinfo->year);
}	
	

 
  function detailupdate()
    {
		 $this->sma->checkPermissions('index', TRUE);
	$report_type = $this->report_type(); 
	//$this->site->check_confirm(6, date('Y-m-d'));
	 
	$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
	
	$flag = 1; 	 
	$msg = 'done';
	if($is_changeable) {
	 if($this->input->get_post('pk') && $this->input->get_post('pk')>0){ 
	    $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name')=>$this->input->get_post('value')),array('id'=>$this->input->get_post('pk')));
		$flag = 2;  //update
		}
	 elseif($this->input->get_post('branch_id')){
		 $this->site->insertData($this->input->get_post('table'), array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$this->input->get_post('branch_id'), 'report_type'=>$report_type['type'],$this->input->get_post('name')=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
		 
	} }  

 	else 
		$msg = 'failed';
	
	
	//$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	
	
	
        echo json_encode(array('flag'=>$flag,'msg'=>$msg));
        exit;
		
	  
	}		
	   
	   
	   

	
	
	
}
