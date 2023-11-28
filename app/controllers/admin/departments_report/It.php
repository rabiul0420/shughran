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
        
        // $this->sma->print_arrays(1111);
        
        
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


        $this->db->select_sum('hardware_s');
        $this->db->select_sum('hardware_upthi');
        $this->db->select_sum('programing_s');
        $this->db->select_sum('programing_upthi');
        $this->db->select_sum('googleform_s');
        $this->db->select_sum('googleform_upthi');
        $this->db->select_sum('mobiledesign_s');
        $this->db->select_sum('mobiledesign_upthi');
        $this->db->select_sum('mobileve_s');
        $this->db->select_sum('mobileve_upthi');
        $this->db->select_sum('pdf_s');
        $this->db->select_sum('pdf_upthi');
        $this->db->select_sum('windows_s');
        $this->db->select_sum('windows_upthi');




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


        $this->db->select_sum('oard_s');
        $this->db->select_sum('exel_s');
        $this->db->select_sum('powerpoint_s');
        $this->db->select_sum('pdf_s');
        $this->db->select_sum('google_s');
        $this->db->select_sum('poster_s');
        $this->db->select_sum('banner_s');
        $this->db->select_sum('video_s');
        $this->db->select_sum('web_s');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_kajer_biboron'] = $this->db->get('it_kajer_biboron')->first_row('array');


       
        $this->db->select_sum('design_ps');
        $this->db->select_sum('design_ms');
        $this->db->select_sum('design_cs');
        $this->db->select_sum('design_mont');
        $this->db->select_sum('video_ps');
        $this->db->select_sum('video_ms');
        $this->db->select_sum('video_cs');
        $this->db->select_sum('video_mont');
        $this->db->select_sum('web_ps');
        $this->db->select_sum('web_ms');
        $this->db->select_sum('web_cs');
        $this->db->select_sum('web_mont');
        $this->db->select_sum('app_ps');
        $this->db->select_sum('app_ms');
        $this->db->select_sum('app_cs');
        $this->db->select_sum('app_mont');
        $this->db->select_sum('programing_ps');
        $this->db->select_sum('programing_ms');
        $this->db->select_sum('programing_cs');
        $this->db->select_sum('programing_mont');
        $this->db->select_sum('tech_ps');
        $this->db->select_sum('tech_ms');
        $this->db->select_sum('tech_cs');
        $this->db->select_sum('tech_mont');
        $this->db->select_sum('migo_ps');
        $this->db->select_sum('migo_ms');
        $this->db->select_sum('migo_cs');
        $this->db->select_sum('migo_mont');
        $this->db->select_sum('phvi_ps');
        $this->db->select_sum('phvi_ms');
        $this->db->select_sum('phvi_cs');
        $this->db->select_sum('phvi_mont');
        $this->db->select_sum('onse_ps');
        $this->db->select_sum('onse_ms');
        $this->db->select_sum('onse_cs');
        $this->db->select_sum('onse_mont');
        $this->db->select_sum('rede_ps');
        $this->db->select_sum('rede_ms');
        $this->db->select_sum('rede_cs');
        $this->db->select_sum('rede_mont');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_category_team_output'] = $this->db->get('it_category_team_output')->first_row('array');

        $this->db->select_sum('it_presentyn');
        $this->db->select_sum('it_laptopdesktop');
        $this->db->select_sum('it_classworkshoop');
        $this->db->select_sum('it_gor');
        $this->db->select_sum('pro_bisoy');
        $this->db->select_sum('pro_jon');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_ictcenter_prosikkhok'] = $this->db->get('it_ictcenter_prosikkhok')->first_row('array');
    
        $this->db->select_sum('laptopdesktop');
        $this->db->select_sum('smartphone');
        $this->db->select_sum('portabledisk');
        $this->db->select_sum('pendribe');
        $this->db->select_sum('onlinestorage');
        $this->db->select_sum('projector');
        $this->db->select_sum('camera');



        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_shakhar_totto_resource'] = $this->db->get('it_shakhar_totto_resource')->first_row('array');

        $this->db->select_sum('m_it');
        $this->db->select_sum('m_hardware');
        $this->db->select_sum('m_photoshop');
        $this->db->select_sum('m_ilustrator');
        $this->db->select_sum('m_typography');
        $this->db->select_sum('m_uiux');
        $this->db->select_sum('m_mobiledesign');
        $this->db->select_sum('m_premiarpro');
        $this->db->select_sum('m_aftereffect');
        $this->db->select_sum('m_animation');
        $this->db->select_sum('m_mobilevideo');
        $this->db->select_sum('m_photovideography');
        $this->db->select_sum('m_micro_oarddoc');
        $this->db->select_sum('m_micro_exel');
        $this->db->select_sum('m_micro_pawerpoint');
        $this->db->select_sum('m_programing');
        $this->db->select_sum('m_web');
        $this->db->select_sum('m_app');
        $this->db->select_sum('m_ethical');
        $this->db->select_sum('m_digitalmarketing');
        $this->db->select_sum('m_game');
        
        $this->db->select_sum('a_it');
        $this->db->select_sum('a_hardware');
        $this->db->select_sum('a_photoshop');
        $this->db->select_sum('a_ilustrator');
        $this->db->select_sum('a_typography');
        $this->db->select_sum('a_uiux');
        $this->db->select_sum('a_mobiledesign');
        $this->db->select_sum('a_premiarpro');
        $this->db->select_sum('a_aftereffect');
        $this->db->select_sum('a_animation');
        $this->db->select_sum('a_mobilevideo');
        $this->db->select_sum('a_photovideography');
        $this->db->select_sum('a_micro_oarddoc');
        $this->db->select_sum('a_micro_exel');
        $this->db->select_sum('a_micro_pawerpoint');
        $this->db->select_sum('a_programing');
        $this->db->select_sum('a_web');
        $this->db->select_sum('a_app');
        $this->db->select_sum('a_ethical');
        $this->db->select_sum('a_digitalmarketing');
        $this->db->select_sum('a_game');


        $this->db->select_sum('w_it');
        $this->db->select_sum('w_hardware');
        $this->db->select_sum('w_photoshop');
        $this->db->select_sum('w_ilustrator');
        $this->db->select_sum('w_typography');
        $this->db->select_sum('w_uiux');
        $this->db->select_sum('w_mobiledesign');
        $this->db->select_sum('w_premiarpro');
        $this->db->select_sum('w_aftereffect');
        $this->db->select_sum('w_animation');
        $this->db->select_sum('w_mobilevideo');
        $this->db->select_sum('w_photovideography');
        $this->db->select_sum('w_micro_oarddoc');
        $this->db->select_sum('w_micro_exel');
        $this->db->select_sum('w_micro_pawerpoint');
        $this->db->select_sum('w_programing');
        $this->db->select_sum('w_web');
        $this->db->select_sum('w_app');
        $this->db->select_sum('w_ethical');
        $this->db->select_sum('w_digitalmarketing');
        $this->db->select_sum('w_game');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_jonosokti_dokkhotota'] = $this->db->get('it_jonosokti_dokkhotota')->first_row('array');


        $this->db->select_sum('m_sorkari');
        $this->db->select_sum('m_besorkari');
        $this->db->select_sum('m_diploma');
        $this->db->select_sum('a_sorkari');
        $this->db->select_sum('a_besorkari');
        $this->db->select_sum('a_diploma');
        $this->db->select_sum('w_sorkari');
        $this->db->select_sum('w_besorkari');
        $this->db->select_sum('w_diploma');
        
        


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_cseit_jonosokti'] = $this->db->get('it_cseit_jonosokti')->first_row('array');
    }
    else{

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_cseit_jonosokti');
        $this->data['it_cseit_jonosokti'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_jonosokti_dokkhotota');
        $this->data['it_jonosokti_dokkhotota'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_shakhar_totto_resource');
        $this->data['it_shakhar_totto_resource'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_ictcenter_prosikkhok');
        $this->data['it_ictcenter_prosikkhok'] = $query->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_category_team_output');
        $this->data['it_category_team_output'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_kajer_biboron');
        $this->data['it_kajer_biboron'] = $query->first_row('array');

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
    function it_bivag_sm($branch_id = NULL)
    {  
        
        // $this->sma->print_arrays(1111);
        
        
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/it-bivag_sm/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/it-bivag_sm/'.$this->session->userdata('branch_id'));
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


        $this->db->select_sum('hardware_s');
        $this->db->select_sum('hardware_upthi');
        $this->db->select_sum('programing_s');
        $this->db->select_sum('programing_upthi');
        $this->db->select_sum('googleform_s');
        $this->db->select_sum('googleform_upthi');
        $this->db->select_sum('mobiledesign_s');
        $this->db->select_sum('mobiledesign_upthi');
        $this->db->select_sum('mobileve_s');
        $this->db->select_sum('mobileve_upthi');
        $this->db->select_sum('pdf_s');
        $this->db->select_sum('pdf_upthi');
        $this->db->select_sum('windows_s');
        $this->db->select_sum('windows_upthi');




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
        $this->data['sm_training_program'] = $this->db->get('sm_training_program')->first_row('array');


        $this->db->select_sum('oard_s');
        $this->db->select_sum('exel_s');
        $this->db->select_sum('powerpoint_s');
        $this->db->select_sum('pdf_s');
        $this->db->select_sum('google_s');
        $this->db->select_sum('poster_s');
        $this->db->select_sum('banner_s');
        $this->db->select_sum('video_s');
        $this->db->select_sum('web_s');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_kajer_biboron'] = $this->db->get('it_kajer_biboron')->first_row('array');


       
        $this->db->select_sum('design_ps');
        $this->db->select_sum('design_ms');
        $this->db->select_sum('design_cs');
        $this->db->select_sum('design_mont');
        $this->db->select_sum('video_ps');
        $this->db->select_sum('video_ms');
        $this->db->select_sum('video_cs');
        $this->db->select_sum('video_mont');
        $this->db->select_sum('web_ps');
        $this->db->select_sum('web_ms');
        $this->db->select_sum('web_cs');
        $this->db->select_sum('web_mont');
        $this->db->select_sum('app_ps');
        $this->db->select_sum('app_ms');
        $this->db->select_sum('app_cs');
        $this->db->select_sum('app_mont');
        $this->db->select_sum('programing_ps');
        $this->db->select_sum('programing_ms');
        $this->db->select_sum('programing_cs');
        $this->db->select_sum('programing_mont');
        $this->db->select_sum('tech_ps');
        $this->db->select_sum('tech_ms');
        $this->db->select_sum('tech_cs');
        $this->db->select_sum('tech_mont');
        $this->db->select_sum('migo_ps');
        $this->db->select_sum('migo_ms');
        $this->db->select_sum('migo_cs');
        $this->db->select_sum('migo_mont');
        $this->db->select_sum('phvi_ps');
        $this->db->select_sum('phvi_ms');
        $this->db->select_sum('phvi_cs');
        $this->db->select_sum('phvi_mont');
        $this->db->select_sum('onse_ps');
        $this->db->select_sum('onse_ms');
        $this->db->select_sum('onse_cs');
        $this->db->select_sum('onse_mont');
        $this->db->select_sum('rede_ps');
        $this->db->select_sum('rede_ms');
        $this->db->select_sum('rede_cs');
        $this->db->select_sum('rede_mont');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_category_team_output'] = $this->db->get('it_category_team_output')->first_row('array');

        $this->db->select_sum('it_presentyn');
        $this->db->select_sum('it_laptopdesktop');
        $this->db->select_sum('it_classworkshoop');
        $this->db->select_sum('it_gor');
        $this->db->select_sum('pro_bisoy');
        $this->db->select_sum('pro_jon');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_ictcenter_prosikkhok'] = $this->db->get('it_ictcenter_prosikkhok')->first_row('array');
    
        $this->db->select_sum('laptopdesktop');
        $this->db->select_sum('smartphone');
        $this->db->select_sum('portabledisk');
        $this->db->select_sum('pendribe');
        $this->db->select_sum('onlinestorage');
        $this->db->select_sum('projector');
        $this->db->select_sum('camera');



        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_shakhar_totto_resource'] = $this->db->get('it_shakhar_totto_resource')->first_row('array');

        $this->db->select_sum('m_it');
        $this->db->select_sum('m_hardware');
        $this->db->select_sum('m_photoshop');
        $this->db->select_sum('m_ilustrator');
        $this->db->select_sum('m_typography');
        $this->db->select_sum('m_uiux');
        $this->db->select_sum('m_mobiledesign');
        $this->db->select_sum('m_premiarpro');
        $this->db->select_sum('m_aftereffect');
        $this->db->select_sum('m_animation');
        $this->db->select_sum('m_mobilevideo');
        $this->db->select_sum('m_photovideography');
        $this->db->select_sum('m_micro_oarddoc');
        $this->db->select_sum('m_micro_exel');
        $this->db->select_sum('m_micro_pawerpoint');
        $this->db->select_sum('m_programing');
        $this->db->select_sum('m_web');
        $this->db->select_sum('m_app');
        $this->db->select_sum('m_ethical');
        $this->db->select_sum('m_digitalmarketing');
        $this->db->select_sum('m_game');
        
        $this->db->select_sum('a_it');
        $this->db->select_sum('a_hardware');
        $this->db->select_sum('a_photoshop');
        $this->db->select_sum('a_ilustrator');
        $this->db->select_sum('a_typography');
        $this->db->select_sum('a_uiux');
        $this->db->select_sum('a_mobiledesign');
        $this->db->select_sum('a_premiarpro');
        $this->db->select_sum('a_aftereffect');
        $this->db->select_sum('a_animation');
        $this->db->select_sum('a_mobilevideo');
        $this->db->select_sum('a_photovideography');
        $this->db->select_sum('a_micro_oarddoc');
        $this->db->select_sum('a_micro_exel');
        $this->db->select_sum('a_micro_pawerpoint');
        $this->db->select_sum('a_programing');
        $this->db->select_sum('a_web');
        $this->db->select_sum('a_app');
        $this->db->select_sum('a_ethical');
        $this->db->select_sum('a_digitalmarketing');
        $this->db->select_sum('a_game');


        $this->db->select_sum('w_it');
        $this->db->select_sum('w_hardware');
        $this->db->select_sum('w_photoshop');
        $this->db->select_sum('w_ilustrator');
        $this->db->select_sum('w_typography');
        $this->db->select_sum('w_uiux');
        $this->db->select_sum('w_mobiledesign');
        $this->db->select_sum('w_premiarpro');
        $this->db->select_sum('w_aftereffect');
        $this->db->select_sum('w_animation');
        $this->db->select_sum('w_mobilevideo');
        $this->db->select_sum('w_photovideography');
        $this->db->select_sum('w_micro_oarddoc');
        $this->db->select_sum('w_micro_exel');
        $this->db->select_sum('w_micro_pawerpoint');
        $this->db->select_sum('w_programing');
        $this->db->select_sum('w_web');
        $this->db->select_sum('w_app');
        $this->db->select_sum('w_ethical');
        $this->db->select_sum('w_digitalmarketing');
        $this->db->select_sum('w_game');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_jonosokti_dokkhotota'] = $this->db->get('it_jonosokti_dokkhotota')->first_row('array');


        $this->db->select_sum('m_sorkari');
        $this->db->select_sum('m_besorkari');
        $this->db->select_sum('m_diploma');
        $this->db->select_sum('a_sorkari');
        $this->db->select_sum('a_besorkari');
        $this->db->select_sum('a_diploma');
        $this->db->select_sum('w_sorkari');
        $this->db->select_sum('w_besorkari');
        $this->db->select_sum('w_diploma');
        
        


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['it_cseit_jonosokti'] = $this->db->get('it_cseit_jonosokti')->first_row('array');
    }
    else{

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_cseit_jonosokti');
        $this->data['it_cseit_jonosokti'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_jonosokti_dokkhotota');
        $this->data['it_jonosokti_dokkhotota'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_shakhar_totto_resource');
        $this->data['it_shakhar_totto_resource'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_ictcenter_prosikkhok');
        $this->data['it_ictcenter_prosikkhok'] = $query->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_category_team_output');
        $this->data['it_category_team_output'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('it_kajer_biboron');
        $this->data['it_kajer_biboron'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('sm_training_program');
        $this->data['sm_training_program'] = $query->first_row('array');	
    
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



		$this->data['m'] = 'sm';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);


        //$this->sma->print_arrays($this->data);
        //exit();
        
		if($branch_id)
		$this->page_construct('departmentsreport/it/sm_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/it/sm_bivag', $meta, $this->data,'leftmenu/departmentsreport');
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
