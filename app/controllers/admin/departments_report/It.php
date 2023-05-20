<?php defined('BASEPATH') OR exit('No direct script access allowed');

class It extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=29) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==29) {  //literature
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

    function it_bivag($branch_id = NULL)
    {  
        
         $this->sma->print_arrays(1111);
        
        
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/it-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/it-bivag/'.$this->session->userdata('branch_id'));
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


        $this->db->select_sum('sod_s');
        $this->db->select_sum('sod_pltpa');
	    $this->db->select_sum('sod_adphna');
		$this->db->select_sum('sod_ena');
		$this->db->select_sum('sod_nmble_enrj');
		$this->db->select_sum('sod_nmble_bnl');
		$this->db->select_sum('sod_fbkpk');
		$this->db->select_sum('sod_tutkpk');
		$this->db->select_sum('sod_itap');
		$this->db->select_sum('sat_s');
		$this->db->select_sum('sat_pltpa');
		$this->db->select_sum('sat_adphna');
		$this->db->select_sum('sat_ena');
		$this->db->select_sum('sat_nmble_enrj');
		$this->db->select_sum('sat_nmble_bnl');
		$this->db->select_sum('sat_fbkpk');
		$this->db->select_sum('sat_tutkpk');
		$this->db->select_sum('sat_itap');
		$this->db->select_sum('kor_s');
		$this->db->select_sum('kor_pltpa');
		$this->db->select_sum('kor_adphna');
		$this->db->select_sum('kor_ena');
		$this->db->select_sum('kor_nmble_enrj');
		$this->db->select_sum('kor_nmble_bnl');
        $this->db->select_sum('kor_fbkpk');
        $this->db->select_sum('kor_tutkpk');
        $this->db->select_sum('kor_itap');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_jonoshoktiorisors'] = $this->db->get('it_jonoshoktiorisors')->first_row('array');
	
        $this->db->select_sum('sod_mio');
        $this->db->select_sum('sod_miax');
        $this->db->select_sum('sod_mipp');
        $this->db->select_sum('sod_vdoe');
        $this->db->select_sum('sod_gdp');
        $this->db->select_sum('sod_gde');
        $this->db->select_sum('sod_web');
        $this->db->select_sum('sod_app');
        $this->db->select_sum('sod_it');

        $this->db->select_sum('sat_mio');
        $this->db->select_sum('sat_miax');
        $this->db->select_sum('sat_mipp');
        $this->db->select_sum('sat_vdoe');
        $this->db->select_sum('sat_gdp');
        $this->db->select_sum('sat_gde');
        $this->db->select_sum('sat_web');
        $this->db->select_sum('sat_app');
        $this->db->select_sum('sat_it');

        $this->db->select_sum('kor_mio');
        $this->db->select_sum('kor_miax');
        $this->db->select_sum('kor_mipp');
        $this->db->select_sum('kor_vdoe');
        $this->db->select_sum('kor_gdp');
        $this->db->select_sum('kor_gde');
        $this->db->select_sum('kor_web');
        $this->db->select_sum('kor_app');
        $this->db->select_sum('kor_it');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_dept_jonoshoktir_dokkhota'] = $this->db->get('it_dept_jonoshoktir_dokkhota')->first_row('array');


        $this->db->select_sum('s_ose_bm');
		$this->db->select_sum('s_ose_br');
        $this->db->select_sum('s_fbpj_bm');
		$this->db->select_sum('s_fbpj_br');
		$this->db->select_sum('s_tuta_bm');
		$this->db->select_sum('s_tuta_br');
		$this->db->select_sum('s_youtub_bm');
		$this->db->select_sum('s_youtub_br');
		$this->db->select_sum('s_onnoannososhal');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_dept_shakhar_online_risors'] = $this->db->get('it_dept_shakhar_online_risors')->first_row('array');
  
        $this->db->select_sum('bscmput_s');
	    $this->db->select_sum('bscmput_upthi');
	    $this->db->select_sum('msford_s');
		$this->db->select_sum('msford_upthi');
	    $this->db->select_sum('bsmobile_s');
		$this->db->select_sum('bsmobile_upthi');
        $this->db->select_sum('eltt_s');
		$this->db->select_sum('eltt_upthi');
        $this->db->select_sum('msword_s');
		$this->db->select_sum('msword_upthi');
		$this->db->select_sum('video_s');
		$this->db->select_sum('video_upthi');
		$this->db->select_sum('msfexl_s');
		$this->db->select_sum('msfexl_upthi');
        $this->db->select_sum('web_s');
        $this->db->select_sum('web_upthi');
		$this->db->select_sum('pwrp_s');
		$this->db->select_sum('pwrp_upthi');
        $this->db->select_sum('apsdpm_s');
        $this->db->select_sum('apsdpm_upthi');
		$this->db->select_sum('fb_s');
		$this->db->select_sum('fb_upthi');
        $this->db->select_sum('bsicint_s');
        $this->db->select_sum('bsicint_upthi');
		$this->db->select_sum('tutr_s');
		$this->db->select_sum('tutr_upthi');
        $this->db->select_sum('onlinept_s');
		$this->db->select_sum('onlinept_upthi');
		$this->db->select_sum('bgbe_s');
		$this->db->select_sum('bgbe_upthi');
        $this->db->select_sum('onlineni_s');
		$this->db->select_sum('onlineni_upthi');
		$this->db->select_sum('ukp_s');
		$this->db->select_sum('ukp_upthi');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_proshikkhon'] = $this->db->get('it_proshikkhon')->first_row('array');
		
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
        $this->data['it_training_program'] = $this->db->get('it_training_program')->first_row('array');
    
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_training_program');
        $this->data['it_training_program'] = $query->first_row('array');	
    
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_jonoshoktiorisors');
        $this->data['it_jonoshoktiorisors'] = $query->first_row('array');
        
        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_dept_jonoshoktir_dokkhota');
        $this->data['it_dept_jonoshoktir_dokkhota'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_dept_shakhar_online_risors');
        $this->data['it_dept_shakhar_online_risors'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_proshikkhon');
        $this->data['it_proshikkhon'] = $query->first_row('array');
	}



		$this->data['m'] = 'it';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/it/it_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/it/it_bivag', $meta, $this->data,'leftmenu/departmentsreport');
	}

    function it_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/it-page-two/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/it-page-two/'.$this->session->userdata('branch_id'));
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


        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();

        $this->db->select_sum('sod_mio');
        $this->db->select_sum('sod_miax');
        $this->db->select_sum('sod_mipp');
        $this->db->select_sum('sod_vdoe');
        $this->db->select_sum('sod_gdp');
        $this->db->select_sum('sod_gde');
        $this->db->select_sum('sod_web');
        $this->db->select_sum('sod_app');
        $this->db->select_sum('sod_it');

        $this->db->select_sum('sat_mio');
        $this->db->select_sum('sat_miax');
        $this->db->select_sum('sat_mipp');
        $this->db->select_sum('sat_vdoe');
        $this->db->select_sum('sat_gdp');
        $this->db->select_sum('sat_gde');
        $this->db->select_sum('sat_web');
        $this->db->select_sum('sat_app');
        $this->db->select_sum('sat_it');

        $this->db->select_sum('kor_mio');
        $this->db->select_sum('kor_miax');
        $this->db->select_sum('kor_mipp');
        $this->db->select_sum('kor_vdoe');
        $this->db->select_sum('kor_gdp');
        $this->db->select_sum('kor_gde');
        $this->db->select_sum('kor_web');
        $this->db->select_sum('kor_app');
        $this->db->select_sum('kor_it');



       
        $this->data['dept_jonoshoktir_dokkhota'] = $this->db->get('dept_jonoshoktir_dokkhota')->first_row('array');



        $this->db->from('dept_jonoshoktir_dokkhota');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['dept_jonoshoktir_dokkhota'] = $query->first_row('array');




        $this->data['m'] = 'it';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/it/it_page_two_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/it/it_page_two', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function shakhar_online_resource($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/shakhar-online-resource/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/shakhar-online-resource/'.$this->session->userdata('branch_id'));
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


        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();

        $this->db->select_sum('s_ose_bm');
		$this->db->select_sum('s_ose_br');
        $this->db->select_sum('s_fbpj_bm');
		$this->db->select_sum('s_fbpj_br');
		$this->db->select_sum('s_tuta_bm');
		$this->db->select_sum('s_tuta_br');
		$this->db->select_sum('s_youtub_bm');
		$this->db->select_sum('s_youtub_br');
		$this->db->select_sum('s_onnoannososhal');

        $this->data['it_dept_shakhar_online_risors'] = $this->db->get('dept_shakhar_online_risors')->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('dept_shakhar_online_risors');
        $this->data['dept_shakhar_online_risors'] = $query->first_row('array');


        $this->data['m'] = 'it';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/it/shakhar_online_resource_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/it/shakhar_online_resource', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function it_proshikkhon($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/it-proshikkhon/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/it-proshikkhon/'.$this->session->userdata('branch_id'));
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


        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();

        $this->db->select_sum('bscmput_s');
	    $this->db->select_sum('bscmput_upthi');
	    $this->db->select_sum('msford_s');
		$this->db->select_sum('msford_upthi');
		$this->db->select_sum('msfexl_s');
		$this->db->select_sum('msfexl_upthi');
		$this->db->select_sum('pwrp_s');
		$this->db->select_sum('pwrp_upthi');
		$this->db->select_sum('fb_s');
		$this->db->select_sum('fb_upthi');
		$this->db->select_sum('tutr_s');
		$this->db->select_sum('tutr_upthi');
		$this->db->select_sum('bgbe_s');
		$this->db->select_sum('bgbe_upthi');
		$this->db->select_sum('ukp_s');
		$this->db->select_sum('ukp_upthi');
		
		$this->db->select_sum('ftshp_s');
		$this->db->select_sum('ftshp_upthi');
		$this->db->select_sum('eltt_s');
		$this->db->select_sum('eltt_upthi');
		$this->db->select_sum('video_s');
		$this->db->select_sum('video_upthi');
		$this->db->select_sum('web_s');
        $this->db->select_sum('web_upthi');
        $this->db->select_sum('apsdpm_s');
        $this->db->select_sum('apsdpm_upthi');
        $this->db->select_sum('bsicint_s');
        $this->db->select_sum('bsicint_upthi');
        $this->db->select_sum('onlinept_s');
		$this->db->select_sum('onlinept_upthi');
		

        
        $this->data['proshikkhon'] = $this->db->get('proshikkhon')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('proshikkhon');
        $this->data['proshikkhon'] = $query->first_row('array');


        $this->data['m'] = 'it';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/it/it_proshikkhon_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/it/it_proshikkhon', $meta, $this->data,'leftmenu/departmentsreport');
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
