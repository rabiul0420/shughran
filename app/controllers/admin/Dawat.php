<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dawat extends MY_Controller
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
        $this->load->admin_model('manpower_model');
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
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
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


        $report_type_get = $this->report_type();
       
		if( $report_type_get ==false) 
        admin_redirect();
        
        $this->data['report_info'] = $report_type_get;

        
         

     
            $report_start =$report_type_get['start'];
            $report_end = $report_type_get['end'];
            $report_type = $report_type_get['type'];
            $report_year = $report_type_get['year'];
        




       // $this->sma->print_arrays( $report_start, $report_end ,$report_type);
       
       $this->data['lastyeardawat'] = $this->getLastDawat('annual', $report_type_get['last_year'], $branch_id);
           
       //$this->sma->print_arrays($this->data['lastyeardawat']);



        $this->data['dawatgroupsend'] = $this->getdawatgroupsendSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['school_dawat_report'] = $this->getschool_dawat_reportSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['madrasha_dawat_report'] = $this->getmadrasha_dawat_reportSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['college_dawat_report'] = $this->getcollege_dawat_reportSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['university_dawat_report'] = $this->getuniversity_dawat_reportSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['fortnight_dawat_report'] = $this->getfortnight_dawat_reportSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['letgotovillage'] = $this->getletgotovillageSum($report_type, $report_start, $report_end, $branch_id);
        $this->data['dawat_summary'] = $this->getdawat_summarySum($report_type, $report_start, $report_end, $branch_id);

        if ($branch_id) {
            $dawat_personal_n_group = $this->getEntryInfoExtra($report_type_get,$branch_id);
            // $this->sma->print_arrays($dawat_personal_n_group['extra_dawatinfo'] );
            $this->data['dawat_personal_n_group'] =  array(0 => (array) $dawat_personal_n_group['extra_dawatinfo']);
        } else
            $this->data['dawat_personal_n_group'] = $this->getEntryInfoExtraSUM($report_type_get);


          //$this->data['m'] = 'manpowersummary';

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Dawat'));
        $meta = array('page_title' => lang('dawat'), 'bc' => $bc);

        // $this->sma->print_arrays($this->data );

        if ($branch_id) {
            $this->data['detailinfo'] = $this->getEntryInfodawat_summary($branch_id);


            //  $this->sma->print_arrays($this->data['detailinfo']);
            $this->page_construct('dawat/index_entry', $meta, $this->data, 'leftmenu/dawat');
        } else
            $this->page_construct('dawat/index', $meta, $this->data, 'leftmenu/dawat');
    }




    function getEntryInfodawat_summary($branch_id = NULL)
    {

        
        $report_type_get = $this->report_type();
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];
    

       
        if ($report_type == 'half_yearly') {


            ///half_yearly starts
            $dawat_summaryinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$dawat_summaryinfo) {
                $this->site->insertData('dawat_summary', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                $dawat_summaryinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id), 'id desc', 1, 0);
     
           
            }


           
            ///half_yearly ends


        } else if ($report_type == 'annual') {

 

             ///annual starts
            $dawat_summaryinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);
           
            if (!$dawat_summaryinfo) {
                $this->site->insertData('dawat_summary', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                $dawat_summaryinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'annual', 'branch_id' => $branch_id), 'id desc', 1, 0);
            }
           

        } 
        
        
        else {


            ///annual starts
            $dawat_summaryinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);
           
            if (!$dawat_summaryinfo) {
                $this->site->insertData('dawat_summary', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                $dawat_summaryinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'annual', 'branch_id' => $branch_id), 'id desc', 1, 0);
     
           
            }


           
            ///annual ends

        }


       // $this->sma->print_arrays($dawat_summaryinfo);
        return array(
            'dawat_summaryinfo' => $dawat_summaryinfo
        );
    }




    function getLastDawat($report_type, $last_year, $branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));

        else
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));

// $this->sma->print_arrays($this->db->last_query());

        return $result;
    }






    function getdawatgroupsendSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
            SUM(`group_number`) as group_number , SUM(`member_number`) as member_number , SUM(`dawat_received_std`) as dawat_received_std , SUM(`dawat_received_people`) as dawat_received_people , SUM(`gather_number`) as gather_number , SUM(`gather_avg`) as gather_avg , SUM(`supporter_increase`) as supporter_increase , SUM(`friend_increase`) as friend_increase , SUM(`organization_increase`) as organization_increase , SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase , SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase , SUM(`ww_increase`) as ww_increase 
            from sma_dawatgroupsend where   branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
            SUM(`group_number`) as group_number , SUM(`member_number`) as member_number , SUM(`dawat_received_std`) as dawat_received_std , SUM(`dawat_received_people`) as dawat_received_people , SUM(`gather_number`) as gather_number , SUM(`gather_avg`) as gather_avg , SUM(`supporter_increase`) as supporter_increase , SUM(`friend_increase`) as friend_increase , SUM(`organization_increase`) as organization_increase , SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase , SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase , SUM(`ww_increase`) as ww_increase from sma_dawatgroupsend where   date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }




    function getschool_dawat_reportSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase from sma_school_dawat_report where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase from sma_school_dawat_report where  date BETWEEN ? AND ? ", array($start_date, $end_date));

        return $result;
    }



    function getmadrasha_dawat_reportSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase 
from sma_madrasha_dawat_report where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase 
from sma_madrasha_dawat_report where  date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }



    function getcollege_dawat_reportSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase
 FROM sma_college_dawat_report where branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase
 FROM sma_college_dawat_report where  date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }




    function getuniversity_dawat_reportSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase
 FROM sma_university_dawat_report  where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase
 FROM sma_university_dawat_report  where  date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }


    function getfortnight_dawat_reportSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase
 FROM sma_fortnight_dawat_report  where branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
SUM(`supporter_increase`) as supporter_increase, SUM(`friend_increase`) as friend_increase , SUM(`number_general_gather`) as number_general_gather, SUM(`avg_presence`) as avg_presence, SUM(`number_other_meeting`) as number_other_meeting, SUM(`other_avg`) as other_avg, SUM(`card_booklet`) as card_booklet, SUM(`porichiti`) as porichiti, SUM(`kishore`) as kishore, SUM(`kishore_client_increase`) as kishore_client_increase, SUM(`kishore_eng`) as kishore_eng, SUM(`kishore_eng_increase`) as kishore_eng_increase, SUM(`chhatrasongbad`) as chhatrasongbad, SUM(`chhatrasongbad_increase`) as chhatrasongbad_increase, SUM(`group_sent`) as group_sent, SUM(`supporter_org_increase`) as supporter_org_increase, SUM(`nonmuslim_supporter_increase`) as nonmuslim_supporter_increase, SUM(`nonmuslim_friend_increase`) as nonmuslim_friend_increase, SUM(`ww_increase`) as  ww_increase
 FROM sma_fortnight_dawat_report  where  date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }



    function getletgotovillageSum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT 
SUM(`number_went`) as number_went,SUM(`worker_communication`) as worker_communication,SUM(`ww_communication`) as ww_communication,SUM(`ww_increase`) as ww_increase, SUM(`friend_increase`) as friend_increase,SUM(`supporter_increase`) as  supporter_increase from sma_letgotovillage  where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT  
SUM(`number_went`) as number_went,SUM(`worker_communication`) as worker_communication,SUM(`ww_communication`) as ww_communication,SUM(`ww_increase`) as ww_increase, SUM(`friend_increase`) as friend_increase,SUM(`supporter_increase`) as  supporter_increase from sma_letgotovillage  where date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }



    function getdawat_summarySum($report_type, $start_date, $end_date, $branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`personal_dawat_supporter`) as personal_dawat_supporter, SUM(`personal_dawat_supporter`) as personal_dawat_supporter, SUM(`group_dawat_supporter`) as group_dawat_supporter, SUM(`personal_dawat_friend`) as personal_dawat_friend, SUM(`group_dawat_friend`) as group_dawat_friend , SUM(`personal_dawat_non_sup`) as personal_dawat_non_sup, SUM(`group_dawat_non_sup`) as group_dawat_non_sup, SUM(`personal_dawat_non_friend`) as personal_dawat_non_friend, SUM(`group_dawat_non_friend`) as group_dawat_non_friend, SUM(`personal_dawat_ww`) as personal_dawat_ww, SUM(`group_dawat_ww`) as group_dawat_ww, SUM(`letvillage_non_sup`) as letvillage_non_sup, SUM(`letvillage_non_friend`) as letvillage_non_friend, SUM(`supporter_decrease`) as supporter_decrease, SUM(`friend_decrease`) as friend_decrease, SUM(`non_sup_decrease`) as non_sup_decrease, SUM(`non_friend_decrease`) as non_friend_decrease, SUM(`ww_decrease`) as ww_decrease, SUM(`non_supporter_target`) as non_supporter_target, SUM(`non_friend_target`) as non_friend_target, SUM(`ww_target`) as ww_target from sma_dawat_summary WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT SUM(`personal_dawat_supporter`) as personal_dawat_supporter, SUM(`personal_dawat_supporter`) as personal_dawat_supporter, SUM(`group_dawat_supporter`) as group_dawat_supporter, SUM(`personal_dawat_friend`) as personal_dawat_friend, SUM(`group_dawat_friend`) as group_dawat_friend , SUM(`personal_dawat_non_sup`) as personal_dawat_non_sup, SUM(`group_dawat_non_sup`) as group_dawat_non_sup, SUM(`personal_dawat_non_friend`) as personal_dawat_non_friend, SUM(`group_dawat_non_friend`) as group_dawat_non_friend, SUM(`personal_dawat_ww`) as personal_dawat_ww, SUM(`group_dawat_ww`) as group_dawat_ww, SUM(`letvillage_non_sup`) as letvillage_non_sup, SUM(`letvillage_non_friend`) as letvillage_non_friend, SUM(`supporter_decrease`) as supporter_decrease, SUM(`friend_decrease`) as friend_decrease, SUM(`non_sup_decrease`) as non_sup_decrease, SUM(`non_friend_decrease`) as non_friend_decrease, SUM(`ww_decrease`) as ww_decrease, SUM(`non_supporter_target`) as non_supporter_target, SUM(`non_friend_target`) as non_friend_target, SUM(`ww_target`) as ww_target from sma_dawat_summary  WHERE  date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
    }


    function detail($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/detail/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/detail/' . $this->session->userdata('branch_id'));
        }


        $report_type = $this->report_type();
       
		if($report_type ==false) 
        admin_redirect();
        
        $this->data['report_info'] = $report_type;



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

        if ($branch_id) {
            $this->data['detailinfo'] = $this->getEntryInfo($report_type,$branch_id);
        } else
            $this->data['detailinfo'] = $this->getEntryInfoSUM($report_type,$branch_id);



        //$this->data['m'] = 'manpowersummary';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Dawat Detail'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        if ($branch_id)
            $this->page_construct('dawat/detail_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/detail', $meta, $this->data, 'leftmenu/dawat');
    }





    function getEntryInfoSUM($report_type_get,$branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        }


        
        
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];



        $param = array($report_start, $report_end);
        $madrasha_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_madrasha_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $dawatgroupsendinfo = $this->site->query_binding("SELECT * FROM sma_dawatgroupsend WHERE  date BETWEEN ? AND ? ", $param);
        $letgotovillageinfo = $this->site->query_binding("SELECT * FROM sma_letgotovillage WHERE  date BETWEEN ? AND ? ", $param);
        $school_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_school_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $college_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_college_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $fortnight_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_fortnight_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $university_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_university_dawat_report WHERE  date BETWEEN ? AND ? ", $param);





        return  array(
            "madrasha_dawat_reportinfo" => $madrasha_dawat_reportinfo,
            "dawatgroupsendinfo" => $dawatgroupsendinfo,
            "letgotovillageinfo" => $letgotovillageinfo,
            "school_dawat_reportinfo" => $school_dawat_reportinfo,
            "college_dawat_reportinfo" => $college_dawat_reportinfo,
            "fortnight_dawat_reportinfo" => $fortnight_dawat_reportinfo,
            "university_dawat_reportinfo" => $university_dawat_reportinfo
        );
    }





    function getEntryInfo($report_type_get,$branch_id = NULL)
    {
        
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if($report_type_get['is_current']!=false  && (  $report_type_get['last_half'] || $report_type == 'half_yearly' ) ){


            $type =   ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';
            
            $madrashainfo = $this->site->getOneRecord('madrasha_dawat_report', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$madrashainfo) {
                $this->site->insertData('madrasha_dawat_report', array('branch_id' => $branch_id, 'report_type' =>  $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }


            $dawatgroupsendinfo = $this->site->getOneRecord('dawatgroupsend', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$dawatgroupsendinfo) {
                $this->site->insertData('dawatgroupsend', array('branch_id' => $branch_id, 'report_type' =>  $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            $letgotovillageinfo = $this->site->getOneRecord('letgotovillage', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$letgotovillageinfo) {
                $this->site->insertData('letgotovillage', array('branch_id' => $branch_id, 'report_type' =>  $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            $school_dawat_reportinfo = $this->site->getOneRecord('school_dawat_report', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);


             
            if (!$school_dawat_reportinfo) {
                $this->site->insertData('school_dawat_report', array('branch_id' => $branch_id, 'report_type' =>  $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }


            $college_dawat_reportinfo = $this->site->getOneRecord('college_dawat_report', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$college_dawat_reportinfo) {
                $this->site->insertData('college_dawat_report', array('branch_id' => $branch_id, 'report_type' =>  $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }

            $fortnight_dawat_reportinfo = $this->site->getOneRecord('fortnight_dawat_report', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$fortnight_dawat_reportinfo) {
                $this->site->insertData('fortnight_dawat_report', array('branch_id' => $branch_id, 'report_type' =>  $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }

            $university_dawat_reportinfo = $this->site->getOneRecord('university_dawat_report', '*', array('report_type' =>  $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$university_dawat_reportinfo) {
                $this->site->insertData('university_dawat_report', array('branch_id' => $branch_id, 'report_type' =>  $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }


        }


       

        if($report_type == 'annual' && $report_type_get['last_half']) {
            $start = $report_start;
            $end = $report_end;

            $madrashainfo = $this->site->getOneRecord('madrasha_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $dawatgroupsendinfo = $this->site->getOneRecord('dawatgroupsend', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $letgotovillageinfo = $this->site->getOneRecord('letgotovillage', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $school_dawat_reportinfo = $this->site->getOneRecord('school_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $college_dawat_reportinfo = $this->site->getOneRecord('college_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $fortnight_dawat_reportinfo = $this->site->getOneRecord('fortnight_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $university_dawat_reportinfo = $this->site->getOneRecord('university_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
        }
        else if ($report_type && $report_type  == 'annual') {

            $param = array($branch_id, $report_start, $report_end);
            $result = $this->site->query_binding("SELECT * FROM sma_madrasha_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });
            $madrashainfo = (object)$final;
            $madrashainfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_dawatgroupsend WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });
            $dawatgroupsendinfo = (object)$final;
            $dawatgroupsendinfo->id = 999999999999;

            $result = $this->site->query_binding("SELECT * FROM sma_letgotovillage WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });
            $letgotovillageinfo = (object)$final;
            $letgotovillageinfo->id = 999999999999;

            $result = $this->site->query_binding("SELECT * FROM sma_school_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });
            $school_dawat_reportinfo = (object)$final;
            $school_dawat_reportinfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_college_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });
            $college_dawat_reportinfo = (object)$final;
            $college_dawat_reportinfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_fortnight_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });
            $fortnight_dawat_reportinfo = (object)$final;
            $fortnight_dawat_reportinfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_university_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);


            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ?  $item + $final[$key] : $item;
            });

            //$this->sma->print_arrays($final);



            $university_dawat_reportinfo = (object)$final;
            $university_dawat_reportinfo->id = 999999999999;

            
        } else if ($report_type  && $report_type   == 'half_yearly') {

            $start = $report_start;
            $end = $report_end;

            $madrashainfo = $this->site->getOneRecord('madrasha_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $dawatgroupsendinfo = $this->site->getOneRecord('dawatgroupsend', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $letgotovillageinfo = $this->site->getOneRecord('letgotovillage', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $school_dawat_reportinfo = $this->site->getOneRecord('school_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $college_dawat_reportinfo = $this->site->getOneRecord('college_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $fortnight_dawat_reportinfo = $this->site->getOneRecord('fortnight_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $university_dawat_reportinfo = $this->site->getOneRecord('university_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
        } 








        return array(
            'madrashainfo' => $madrashainfo,
            'dawatgroupsendinfo' => $dawatgroupsendinfo,
            'letgotovillageinfo' => $letgotovillageinfo,
            'school_dawat_reportinfo' => $school_dawat_reportinfo,
            'college_dawat_reportinfo' => $college_dawat_reportinfo,
            'fortnight_dawat_reportinfo' => $fortnight_dawat_reportinfo,
            'university_dawat_reportinfo' => $university_dawat_reportinfo
        );
    }



    function increased_output($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/increased_output/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/increased_output/' . $this->session->userdata('branch_id'));
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
       
		if($report_type ==false) 
        admin_redirect();
        
        $this->data['report_info'] = $report_type;

        if ($branch_id)   //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoOutput($report_type,$branch_id);
           

        } else {
            $this->data['detailinfo'] = $this->getEntryInfoOutputSUM($report_type,$branch_id);
            
        }




        $this->data['assooutput'] = $this->getAssoOutput($report_type,$branch_id);
        $this->data['memberoutput'] = $this->getMemberOutput($report_type,$branch_id);




        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'বৃদ্ধিকৃতদের আউটপুট'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/increased_output_entry', $meta, $this->data, 'leftmenu/manpower');
        else
            $this->page_construct('dawat/increased_output', $meta, $this->data, 'leftmenu/manpower');
    }

     





    function getEntryInfoOutput($report_type_get,$branch_id = NULL)
    {

        
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

        if($report_type_get['is_current']!=false){
        if ($report_type == 'half_yearly') {


            ///half_yearly starts
            $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$increase_outputinfo) {
                $this->site->insertData('increase_output', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///half_yearly ends


        } else {


            ///annual starts
            $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$increase_outputinfo) {
                $this->site->insertData('increase_output', array('branch_id' => $branch_id, 'report_type' => 'annual', 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///annual ends

        }
    }


    if($report_type == 'annual' && $report_type_get['last_half']){ 
        $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
    
    }
    else if (  $report_type && $report_type == 'annual') {



            $increaseoutputinfo =  $this->site->query_binding("SELECT 
        SUM(`member_single_digit`) as member_single_digit ,SUM(`member_jsc_jdc`) as member_jsc_jdc,SUM(`member_ssc_dhakil`) as member_ssc_dhakil,SUM(`member_hsc_alim`) as member_hsc_alim,SUM(`member_science`) as member_science,SUM(`member_arts`) as member_arts, SUM(`member_business`) as member_business, SUM(`member_madrasha`) as member_madrasha,SUM(`member_department_position`) as member_department_position, SUM(`member_medical_college`) as member_medical_college, SUM(`member_engineeering`) as member_engineeering, SUM(`member_public_university`) as member_public_university,
        SUM(`asso_single_digit`) as asso_single_digit ,SUM(`asso_jsc_jdc`) as asso_jsc_jdc,SUM(`asso_ssc_dhakil`) as asso_ssc_dhakil,SUM(`asso_hsc_alim`) as asso_hsc_alim,SUM(`asso_science`) as asso_science,SUM(`asso_arts`) as asso_arts, SUM(`asso_business`) as asso_business, SUM(`asso_madrasha`) as asso_madrasha,SUM(`asso_department_position`) as asso_department_position, SUM(`asso_medical_college`) as asso_medical_college, SUM(`asso_engineeering`) as asso_engineeering, SUM(`asso_public_university`) as asso_public_university,
        SUM(`worker_single_digit`) as worker_single_digit ,SUM(`worker_jsc_jdc`) as worker_jsc_jdc,SUM(`worker_ssc_dhakil`) as worker_ssc_dhakil,SUM(`worker_hsc_alim`) as worker_hsc_alim,SUM(`worker_science`) as worker_science,SUM(`worker_arts`) as worker_arts, SUM(`worker_business`) as worker_business, SUM(`worker_madrasha`) as worker_madrasha,SUM(`worker_department_position`) as worker_department_position, SUM(`worker_medical_college`) as worker_medical_college, SUM(`worker_engineeering`) as worker_engineeering, SUM(`worker_public_university`) as worker_public_university,
        SUM(`supporter_single_digit`) as supporter_single_digit ,SUM(`supporter_jsc_jdc`) as supporter_jsc_jdc,SUM(`supporter_ssc_dhakil`) as supporter_ssc_dhakil,SUM(`supporter_hsc_alim`) as supporter_hsc_alim,SUM(`supporter_science`) as supporter_science,SUM(`supporter_arts`) as supporter_arts, SUM(`supporter_business`) as supporter_business, SUM(`supporter_madrasha`) as supporter_madrasha,SUM(`supporter_department_position`) as supporter_department_position, SUM(`supporter_medical_college`) as supporter_medical_college, SUM(`supporter_engineeering`) as supporter_engineeering, SUM(`supporter_public_university`) as supporter_public_university, SUM(`member_influential`) as member_influential, SUM(`asso_influential`) as asso_influential,SUM(`worker_influential`) as worker_influential,SUM(`supporter_influential`) as supporter_influential, SUM(`member_hc_science`) as member_hc_science, SUM(`asso_hc_science`) as asso_hc_science,SUM(`worker_hc_science`) as worker_hc_science,SUM(`supporter_hc_science`) as supporter_hc_science,SUM(`member_agri`) as member_agri, SUM(`asso_agri`) as asso_agri,SUM(`worker_agri`) as worker_agri,SUM(`supporter_agri`) as supporter_agri,SUM(`member_improvement`) as member_improvement,SUM(`asso_improvement`) as asso_improvement,SUM(`worker_improvement`) as worker_improvement,SUM(`supporter_improvement`) as supporter_improvement,SUM(`member_department_position_private`) as member_department_position_private, SUM(`asso_department_position_private`) as asso_department_position_private, SUM(`worker_department_position_private`) as worker_department_position_private, SUM(`supporter_department_position_private`) as supporter_department_position_private,SUM(`member_ideal_college`) as member_ideal_college, SUM(`asso_ideal_college`) as asso_ideal_college, SUM(`worker_ideal_college`) as worker_ideal_college, SUM(`supporter_ideal_college`) as supporter_ideal_college
        FROM `sma_increase_output` where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
            //$increase_outputinfo = $this->site->getOneRecord('increase_output','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);	


            $increase_outputinfo = (object)$increaseoutputinfo[0];
            $increase_outputinfo->id = 999999999999;

            //    $increase_outputinfo = $this->site->getOneRecord('increase_output','*',array('branch_id'=>$branch_id,'date <= '=>$entrytimeinfo->enddate_annual,'date >= '=>$entrytimeinfo->startdate_half),'id desc',1,0);	

        }  else if ($report_type  && $report_type  == 'half_yearly') {

            $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }




        return array(
            'increase_outputinfo' => isset($increase_outputinfo) ? $increase_outputinfo : ''
        );
    }



    function detailupdate($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);


        $flag = 1;

        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
        $msg = '';

        if ($is_changeable) {
            $flag = 100;
            $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
        } else
            $msg = 'failed';




        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }










    


    function getManpower($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        if ($branch_id) {
        } else {
        }

        return "mok";
    }


    

    function getAssoOutput($report_type_get,$branch_id = NULL)
    {

        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`asso_single_digit`) AS single_digit , 
            SUM(`asso_jsc_jdc`) AS `jsc_jdc` ,
            SUM(`asso_ssc_dhakil`) AS  `ssc_dhakil`,
            SUM(`asso_hsc_alim`)  AS `hsc_alim`,
            SUM(`asso_department_position`)  AS `department_position`,
            SUM(`asso_department_position_private`)  AS `department_position_private`,
            SUM(`asso_influential`)  AS `influential`,
            SUM(`asso_hc_science`)  AS `hc_science`,
            SUM(`asso_madrasha`)  AS `madrasha`,
            SUM(`asso_medical_college`)  AS `medical_college`,
            SUM(`asso_ideal_college`)  AS `ideal_college`,
            SUM(`asso_engineeering`)  AS `engineeering`,
            SUM(`asso_agri`)  AS `agri`,
            SUM(`asso_science`)  AS `science`,
            SUM(`asso_business`)  AS `business`,
            SUM(`asso_arts`)  AS `arts` FROM `sma_associatelog` where  branch  = ? AND process_date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
        $result =  $this->site->query_binding("SELECT SUM(`asso_single_digit`) AS single_digit , 
        SUM(`asso_jsc_jdc`) AS `jsc_jdc` ,
        SUM(`asso_ssc_dhakil`) AS  `ssc_dhakil`,
        SUM(`asso_hsc_alim`)  AS `hsc_alim`,
        SUM(`asso_department_position`)  AS `department_position`,
        SUM(`asso_department_position_private`)  AS `department_position_private`,
        SUM(`asso_influential`)  AS `influential`,
        SUM(`asso_hc_science`)  AS `hc_science`,
        SUM(`asso_madrasha`)  AS `madrasha`,
        SUM(`asso_medical_college`)  AS `medical_college`,
        SUM(`asso_ideal_college`)  AS `ideal_college`,
        SUM(`asso_engineeering`)  AS `engineeering`,
        SUM(`asso_agri`)  AS `agri`,
        SUM(`asso_science`)  AS `science`,
        SUM(`asso_business`)  AS `business`,
        SUM(`asso_arts`)  AS `arts` FROM `sma_associatelog` where    process_date BETWEEN ? AND ? ", array( $report_start, $report_end));
  



        return $result;
    }

    function getMemberOutput($report_type_get,$branch_id = NULL)
    {

       
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`member_single_digit`) AS single_digit , 
            SUM(`member_jsc_jdc`) AS `jsc_jdc` ,
            SUM(`member_ssc_dhakil`) AS  `ssc_dhakil`,
            SUM(`member_hsc_alim`)  AS `hsc_alim`,
            SUM(`member_department_position`)  AS `department_position`,
            SUM(`member_department_position_private`)  AS `department_position_private`,
            SUM(`member_influential`)  AS `influential`,
            SUM(`member_hc_science`)  AS `hc_science`,
            SUM(`member_madrasha`)  AS `madrasha`,
            SUM(`member_medical_college`)  AS `medical_college`,
            SUM(`member_ideal_college`)  AS `ideal_college`,
            SUM(`member_engineeering`)  AS `engineeering`,
            SUM(`member_agri`)  AS `agri`,
            SUM(`member_science`)  AS `science`,
            SUM(`member_business`)  AS `business`,
            SUM(`member_arts`)  AS `arts` FROM `sma_memberlog` where  branch  = ? AND process_date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
        $result =  $this->site->query_binding("SELECT SUM(`member_single_digit`) AS single_digit , 
        SUM(`member_jsc_jdc`) AS `jsc_jdc` ,
        SUM(`member_ssc_dhakil`) AS  `ssc_dhakil`,
        SUM(`member_hsc_alim`)  AS `hsc_alim`,
        SUM(`member_department_position`)  AS `department_position`,
        SUM(`member_department_position_private`)  AS `department_position_private`,
        SUM(`member_influential`)  AS `influential`,
        SUM(`member_hc_science`)  AS `hc_science`,
        SUM(`member_madrasha`)  AS `madrasha`,
        SUM(`member_medical_college`)  AS `medical_college`,
        SUM(`member_ideal_college`)  AS `ideal_college`,
        SUM(`member_engineeering`)  AS `engineeering`,
        SUM(`member_agri`)  AS `agri`,
        SUM(`member_science`)  AS `science`,
        SUM(`member_business`)  AS `business`,
        SUM(`member_arts`)  AS `arts` FROM `sma_memberlog` where    process_date BETWEEN ? AND ? ", array( $report_start, $report_end));
  



        return $result;
    }


    function getEntryInfoOutputSUM($report_type_get,$branch_id = NULL)
    {

        
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

 
            $result =  $this->site->query_binding("SELECT 
SUM(`member_single_digit`) as member_single_digit ,SUM(`member_jsc_jdc`) as member_jsc_jdc,SUM(`member_ssc_dhakil`) as member_ssc_dhakil,SUM(`member_hsc_alim`) as member_hsc_alim,SUM(`member_science`) as member_science,SUM(`member_arts`) as member_arts, SUM(`member_business`) as member_business, SUM(`member_madrasha`) as member_madrasha,SUM(`member_department_position`) as member_department_position,SUM(`member_department_position_private`) as member_department_position_private, SUM(`member_medical_college`) as member_medical_college, SUM(`member_ideal_college`) as member_ideal_college, SUM(`asso_ideal_college`) as asso_ideal_college, SUM(`worker_ideal_college`) as worker_ideal_college, SUM(`supporter_ideal_college`) as supporter_ideal_college,  SUM(`member_engineeering`) as member_engineeering, SUM(`member_public_university`) as member_public_university,
SUM(`asso_single_digit`) as asso_single_digit ,SUM(`asso_jsc_jdc`) as asso_jsc_jdc,SUM(`asso_ssc_dhakil`) as asso_ssc_dhakil,SUM(`asso_hsc_alim`) as asso_hsc_alim,SUM(`asso_science`) as asso_science,SUM(`asso_arts`) as asso_arts, SUM(`asso_business`) as asso_business, SUM(`asso_madrasha`) as asso_madrasha,SUM(`asso_department_position`) as asso_department_position, SUM(`asso_department_position_private`) as asso_department_position_private, SUM(`asso_medical_college`) as asso_medical_college, SUM(`asso_engineeering`) as asso_engineeering, SUM(`asso_public_university`) as asso_public_university,
SUM(`worker_single_digit`) as worker_single_digit ,SUM(`worker_jsc_jdc`) as worker_jsc_jdc,SUM(`worker_ssc_dhakil`) as worker_ssc_dhakil,SUM(`worker_hsc_alim`) as worker_hsc_alim,SUM(`worker_science`) as worker_science,SUM(`worker_arts`) as worker_arts, SUM(`worker_business`) as worker_business, SUM(`worker_madrasha`) as worker_madrasha,SUM(`worker_department_position`) as worker_department_position, SUM(`worker_department_position_private`) as worker_department_position_private,  SUM(`worker_medical_college`) as worker_medical_college, SUM(`worker_engineeering`) as worker_engineeering, SUM(`worker_public_university`) as worker_public_university,
SUM(`supporter_single_digit`) as supporter_single_digit ,SUM(`supporter_jsc_jdc`) as supporter_jsc_jdc,SUM(`supporter_ssc_dhakil`) as supporter_ssc_dhakil,SUM(`supporter_hsc_alim`) as supporter_hsc_alim,SUM(`supporter_science`) as supporter_science,SUM(`supporter_arts`) as supporter_arts, SUM(`supporter_business`) as supporter_business, SUM(`supporter_madrasha`) as supporter_madrasha,SUM(`supporter_department_position`) as supporter_department_position,  SUM(`supporter_department_position_private`) as supporter_department_position_private, SUM(`supporter_medical_college`) as supporter_medical_college, SUM(`supporter_engineeering`) as supporter_engineeering, SUM(`supporter_public_university`) as supporter_public_university, SUM(`member_influential`) as member_influential, SUM(`asso_influential`) as asso_influential,SUM(`worker_influential`) as worker_influential,SUM(`supporter_influential`) as supporter_influential, SUM(`member_hc_science`) as member_hc_science, SUM(`asso_hc_science`) as asso_hc_science,SUM(`worker_hc_science`) as worker_hc_science,SUM(`supporter_hc_science`) as supporter_hc_science,SUM(`member_agri`) as member_agri, SUM(`asso_agri`) as asso_agri,SUM(`worker_agri`) as worker_agri,SUM(`supporter_agri`) as supporter_agri,SUM(`member_improvement`) as member_improvement,SUM(`asso_improvement`) as asso_improvement,SUM(`worker_improvement`) as worker_improvement,SUM(`supporter_improvement`) as supporter_improvement
FROM `sma_increase_output` where   date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }








    function extra($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/extra/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/extra/' . $this->session->userdata('branch_id'));
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
       
		if($report_type ==false) 
        admin_redirect();
        
        $this->data['report_info'] = $report_type;


        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoExtra($report_type,$branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoExtraSUM($report_type,$branch_id);
        }



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'অতিরিক্ত দাওয়াত'));
        $meta = array('page_title' => 'Dawat', 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/extra_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/extra', $meta, $this->data, 'leftmenu/dawat');
            
    }




    function getEntryInfoExtra($report_type_get,$branch_id = NULL)
    {
       
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if($report_type_get['is_current']!=false){
        if ($report_type == 'half_yearly') {

           
            ///half_yearly starts
            $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);


            
            if (!$extra_dawatinfo) {
                $this->site->insertData('extra_dawat', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///half_yearly ends


        } else {


            ///annual starts
            $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);
            
            if (!$extra_dawatinfo) {
                $this->site->insertData('extra_dawat', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///annual ends

        }



    }

      if($report_type == 'annual' && $report_type_get['last_half']){
            $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
       
       
       
        }

        else if ($report_type && $report_type == 'annual') {
            $result1 =  $this->site->query_binding("SELECT  SUM(id) id,  SUM(`personal_dawat_increase`) as  personal_dawat_increase, SUM(`personal_dawat_person`) as personal_dawat_person , SUM(`personal_dawat_friend`) as personal_dawat_friend , SUM(`personal_dawat_supporter`) as personal_dawat_supporter ,    SUM(`group_dawat_increase`) as group_dawat_increase , SUM(`group_dawat_person`) as group_dawat_person , SUM(`group_dawat_friend`) as  group_dawat_friend, SUM(`group_dawat_supporter`) as group_dawat_supporter ,  SUM(`muharrama_dawat_increase`) as muharrama_dawat_increase , SUM(`muharrama_dawat_person`) as muharrama_dawat_person , SUM(`muharrama_dawat_friend`) as  muharrama_dawat_friend, SUM(`muharrama_dawat_supporter`) as muharrama_dawat_supporter ,   SUM(`relative_dawat_increase`) as relative_dawat_increase , SUM(`relative_dawat_person`) as  relative_dawat_person, SUM(`relative_dawat_friend`) as  relative_dawat_friend,SUM(`relative_dawat_supporter`) as relative_dawat_supporter , SUM(`dawat_group_increase`) as dawat_group_increase , SUM(`muharram_number_increase`) as muharram_number_increase , SUM(`relative_number_increase`) as relative_number_increase FROM `sma_extra_dawat` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));


        //last half
            $result2 =  $this->site->query_binding("SELECT SUM(id) id,  SUM(`personal_dawat_prev`) as personal_dawat_prev ,SUM(`group_dawat_prev`) as group_dawat_prev,
		 SUM(`muharrama_dawat_prev`) as  muharrama_dawat_prev,
		 SUM(`relative_dawat_prev`) as relative_dawat_prev , SUM(`personal_dawat_current`) as personal_dawat_current , SUM(`group_dawat_current`) as group_dawat_current,		 
        SUM(`muharrama_dawat_current`) as muharrama_dawat_current,  SUM(`relative_dawat_current`) as relative_dawat_current, SUM(`dawat_group`) as dawat_group,  SUM(`muharram_number`) as muharram_number,  SUM(`relative_number`) as relative_number   FROM `sma_extra_dawat` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));

            $result = array_replace_recursive($result1, $result2);

            $extra_dawatinfo = (object)$result[0];
            $extra_dawatinfo->id = 999999999999;
        } else if ($report_type  && $report_type  == 'half_yearly') {

            $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        } 
       

        //$extra_dawatinfo = $this->site->getOneRecord('extra_dawat','*',array('report_type'=>$report_type,'branch_id'=>$branch_id),'id desc',1,0);	

     //   $this->sma->print_arrays($extra_dawatinfo);
        return array(
            'extra_dawatinfo' => $extra_dawatinfo
        );
    }




    function getEntryInfoExtraSUM($report_type_get, $branch_id = NULL)
    {

       
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`personal_dawat_prev`) as personal_dawat_prev ,SUM(`personal_dawat_current`) as personal_dawat_current , SUM(`personal_dawat_increase`) as  personal_dawat_increase, SUM(`personal_dawat_person`) as personal_dawat_person , SUM(`personal_dawat_friend`) as personal_dawat_friend , SUM(`personal_dawat_supporter`) as personal_dawat_supporter , SUM(`group_dawat_prev`) as group_dawat_prev , SUM(`group_dawat_current`) as group_dawat_current , SUM(`group_dawat_increase`) as group_dawat_increase , SUM(`group_dawat_person`) as group_dawat_person , SUM(`group_dawat_friend`) as  group_dawat_friend, SUM(`group_dawat_supporter`) as group_dawat_supporter ,
 SUM(`muharrama_dawat_prev`) as muharrama_dawat_prev , SUM(`muharrama_dawat_current`) as muharrama_dawat_current , SUM(`muharrama_dawat_increase`) as muharrama_dawat_increase , SUM(`muharrama_dawat_person`) as muharrama_dawat_person , SUM(`muharrama_dawat_friend`) as  muharrama_dawat_friend, SUM(`muharrama_dawat_supporter`) as muharrama_dawat_supporter , SUM(`relative_dawat_prev`) as  relative_dawat_prev, SUM(`relative_dawat_current`) as  relative_dawat_current, SUM(`relative_dawat_increase`) as relative_dawat_increase , SUM(`relative_dawat_person`) as  relative_dawat_person, SUM(`relative_dawat_friend`) as  relative_dawat_friend,SUM(`relative_dawat_supporter`) as relative_dawat_supporter ,SUM(`dawat_group`) as dawat_group ,SUM(`dawat_group_increase`) as dawat_group_increase ,SUM(`muharram_number`) as muharram_number ,SUM(`muharram_number_increase`) as muharram_number_increase ,SUM(`relative_number`) as relative_number ,SUM(`relative_number_increase`) as relative_number_increase FROM `sma_extra_dawat` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result =  $this->site->query_binding("SELECT SUM(`personal_dawat_prev`) as personal_dawat_prev ,SUM(`personal_dawat_current`) as personal_dawat_current , SUM(`personal_dawat_increase`) as  personal_dawat_increase, SUM(`personal_dawat_person`) as personal_dawat_person , SUM(`personal_dawat_friend`) as personal_dawat_friend , SUM(`personal_dawat_supporter`) as personal_dawat_supporter , SUM(`group_dawat_prev`) as group_dawat_prev , SUM(`group_dawat_current`) as group_dawat_current , SUM(`group_dawat_increase`) as group_dawat_increase , SUM(`group_dawat_person`) as group_dawat_person , SUM(`group_dawat_friend`) as  group_dawat_friend, SUM(`group_dawat_supporter`) as group_dawat_supporter ,
 SUM(`muharrama_dawat_prev`) as muharrama_dawat_prev , SUM(`muharrama_dawat_current`) as muharrama_dawat_current , SUM(`muharrama_dawat_increase`) as muharrama_dawat_increase , SUM(`muharrama_dawat_person`) as muharrama_dawat_person , SUM(`muharrama_dawat_friend`) as  muharrama_dawat_friend, SUM(`muharrama_dawat_supporter`) as muharrama_dawat_supporter , SUM(`relative_dawat_prev`) as  relative_dawat_prev, SUM(`relative_dawat_current`) as  relative_dawat_current, SUM(`relative_dawat_increase`) as relative_dawat_increase , SUM(`relative_dawat_person`) as  relative_dawat_person, SUM(`relative_dawat_friend`) as  relative_dawat_friend,SUM(`relative_dawat_supporter`) as relative_dawat_supporter ,SUM(`dawat_group`) as dawat_group ,SUM(`dawat_group_increase`) as dawat_group_increase ,SUM(`muharram_number`) as muharram_number ,SUM(`muharram_number_increase`) as muharram_number_increase ,SUM(`relative_number`) as relative_number ,SUM(`relative_number_increase`) as relative_number_increase FROM `sma_extra_dawat` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }













    function mosque($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);


        $report_type = $this->report_type();
       
		if( $report_type ==false) 
        admin_redirect();
        
        $this->data['report_info'] = $report_type;


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/mosque/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/mosque/' . $this->session->userdata('branch_id'));
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

        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoMosque($report_type,$branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoMosqueSUM($report_type,$branch_id);
        }

   //    $this->sma->print_arrays($this->data['detailinfo']);


        $report_type_get = $this->report_type(); 
        
        $report_type = $report_type_get['type'];
        
 


      
         
            $this->data['lastyearmosque'] = $this->prevmosque('annual',  $report_type_get['last_year'], $branch_id);
            $cal_type = 'annual';
				 
        

    //  $this->sma->print_arrays($this->data['lastyearmosque']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'মসজিদ ভিত্তিক কাজ'));
        $meta = array('page_title' => 'Dawat', 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/mosque_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/mosque', $meta, $this->data, 'leftmenu/dawat');
    }




    
    function prevmosque($report_type, $last_year, $branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`mosque_number`) as  mosque_number          
FROM `sma_mosque_calculated` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));

        else
            $result =  $this->site->query_binding("SELECT SUM(`mosque_number`) as  mosque_number FROM `sma_mosque_calculated` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));

// $this->sma->print_arrays($this->db->last_query());

        return $result;
    }
    

    function getEntryInfoMosque($report_type_get,$branch_id = NULL)
    {     
       
        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];   
         
        if($report_type_get['is_current']!=false){
        if ($report_type && $report_type == 'half_yearly') {
            
            ///half_yearly starts
            $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

          //  $this->sma->print_arrays($mosquebaseworkinfo);
            
            if (!$mosquebaseworkinfo  ) {
                $this->site->insertData('mosquebasework', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
              //  $this->sma->print_arrays($mosquebaseworkinfo);
           
            }



            ///half_yearly ends


        } else {

         
            ///annual starts
            $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$mosquebaseworkinfo) {
               
                $this->site->insertData('mosquebasework', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///annual ends

        }
    }

// echo $report_type.' >> '.$report_type_get['last_half'];
// exit();

        if($report_type == 'annual' && $report_type_get['last_half']){
            $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
         }

        else if ($report_type && $report_type == 'annual') {
            //work_increase_mosque,work_decrease_mosque,dars_quran,dars_hadith,lecture,other

          
            $result1 =  $this->site->query_binding("SELECT  sum(id) id, SUM(`work_increase_mosque`) as work_increase_mosque , SUM(`work_decrease_mosque`) as work_decrease_mosque , SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
        FROM `sma_mosquebasework` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_type_get['info']->startdate_half, $report_type_get['info']->enddate_annual));


//last half
            $result2 =  $this->site->query_binding("SELECT sum(id) id, SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active  
        FROM `sma_mosquebasework` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));


            $result = array_replace_recursive($result1, $result2);


            $mosquebaseworkinfo = (object)$result[0];
            $mosquebaseworkinfo->id = 999999999999;
        } else  if ($report_type  && $report_type == 'half_yearly' ) {

            
            $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }  

      //  $this->sma->print_arrays($mosquebaseworkinfo);
       
        return array(
            'mosquebaseworkinfo' => $mosquebaseworkinfo
        );
    }



    function getEntryInfoMosqueSUM($report_type_get,$branch_id = NULL)
    {

      
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

        $report_info = $report_type_get['info'];



 
 



        if($report_type == 'annual' && $report_type_get['last_half']){

            $result =  $this->site->query_binding("SELECT SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active , SUM(`work_increase_mosque`) as work_increase_mosque ,SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
        }

        if ($report_type && $this->input->get('type')=='annual') {
//full
            $result1 =  $this->site->query_binding("SELECT  SUM(id) id,  SUM(`work_increase_mosque`) as work_increase_mosque ,SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
//last half
            $result2 =  $this->site->query_binding("SELECT  SUM(id) id,  SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active  
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_type_get['info']->startdate_annual,  $report_type_get['info']->enddate_annual));
 


            $result = array_replace_recursive($result1, $result2);
        } else if ($report_type  && $report_type  == 'half_yearly') {
            $result =  $this->site->query_binding("SELECT SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active , SUM(`work_increase_mosque`) as work_increase_mosque ,SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
      
    
    }  

 //$this->sma->print_arrays($this->db->last_query());


        return $result;
    }


    function element($branch_id = NULL)
    {
        
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/element/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/element/' . $this->session->userdata('branch_id'));
        }

        $report_type = $this->report_type();
       
		if( $report_type ==false) 
        admin_redirect();
        
        $this->data['report_info'] = $report_type;


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

        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        
        {
            $this->data['detailinfo'] = $this->getEntryInfoElement($report_type,$branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoElementSUM($report_type,$branch_id);
        }



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'দাওয়াতী উপকরণ'));
        $meta = array('page_title' => 'Dawat Element', 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/element_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/element', $meta, $this->data, 'leftmenu/dawat');
    }




    function getEntryInfoElement($report_type_get,$branch_id = NULL)
    {
        
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if($report_type_get['is_current']!=false){
        if ($report_type == 'half_yearly') {


            ///half_yearly starts
            $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$dawatelementinfo) {
                $this->site->insertData('dawatelement', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///half_yearly ends


        } else {


            ///annual starts
            $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$dawatelementinfo) {
                $this->site->insertData('dawatelement', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            ///annual ends

        }
    }


    if($report_type == 'annual' && $report_type_get['last_half']){
            $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        
        }
        
        else if  ($report_type == 'annual'){

 
            $result =  $this->site->query_binding("SELECT 
        SUM(`quran_sale`)  as quran_sale, SUM(`quran_distribution`)  as quran_distribution, SUM(`hadith_sale`)  as hadith_sale, SUM(`hadith_distribution`)  as hadith_distribution, SUM(`porichiti_sale`)  as porichiti_sale, SUM(`porichiti_distribution`)  as porichiti_distribution, SUM(`literature_sale`)  as literature_sale, SUM(`literature_distribution`)  as literature_distribution , SUM(`sticker_sale`)  as sticker_sale, SUM(`sticker_distribution`)  as sticker_distribution, SUM(`routine_sale`)  as routine_sale, SUM(`routine_distribution`)  as routine_distribution, SUM(`calendar_sale`)  as calendar_sale, SUM(`calendar_distribution`)  as calendar_distribution, SUM(`diary_sale`)  as diary_sale, SUM(`diary_distribution`)  as diary_distribution, SUM(`cd_sale`)  as cd_sale, SUM(`cd_distribution`)  as cd_distribution, SUM(`kishore_bn_number`)  as kishore_bn_number, SUM(`kishore_bn_sale`)  as kishore_bn_sale, SUM(`kishore_bn_distribution`)  as kishore_bn_distribution, SUM(`kishore_bn_client`)  as kishore_bn_client, SUM(`kishore_en_number`)  as kishore_en_number, SUM(`kishore_en_sale`)  as kishore_en_sale, SUM(`kishore_en_distribution`)  as kishore_en_distribution, SUM(`kishore_en_client`)  as kishore_en_client , SUM(`chhatrasangbad_number`)  as chhatrasangbad_number, SUM(`chhatrasangbad_sale`)  as chhatrasangbad_sale, SUM(`chhatrasangbad_distribution`)  as chhatrasangbad_distribution, SUM(`chhatrasangbad_client`)  as chhatrasangbad_client, SUM(`eng_mag_number`)  as eng_mag_number, SUM(`eng_mag_sale`)  as eng_mag_sale, SUM(`eng_mag_distribution`)  as eng_mag_distribution , SUM(`eng_mag_client`)  as eng_mag_client, SUM(`sosas_number`)  as sosas_number, SUM(`sosas_sale`)  as sosas_sale, SUM(`sosas_distribution`)  as sosas_distribution, SUM(`sosas_client`)  as sosas_client, SUM(`madrasha_number`)  as madrasha_number, SUM(`madrasha_sale`)  as madrasha_sale, SUM(`madrasha_distribution`)  as madrasha_distribution, SUM(`madrasha_client`)  as madrasha_client, SUM(`std_view_number`)  as std_view_number, SUM(`std_view_sale`)  as std_view_sale, SUM(`std_view_distribution`)  as std_view_distribution, SUM(`std_view_client`)  as std_view_client, SUM(`sci_mag_number`)  as sci_mag_number, SUM(`sci_mag_sale`)  as sci_mag_sale, SUM(`sci_mag_distribution`)  as sci_mag_distribution, SUM(`sci_mag_client`)  as sci_mag_client, SUM(`branch_paper_number`)  as branch_paper_number, SUM(`branch_paper_sale`)  as branch_paper_sale, SUM(`branch_paper_distribution`)  as branch_paper_distribution, SUM(`branch_paper_client`)  as branch_paper_client
        FROM `sma_dawatelement` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
            $dawatelementinfo = (object)$result[0];
            $dawatelementinfo->id = 999999999999;
        } else if ($report_type  == 'half_yearly') {

            $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }  


        //$dawatelementinfo = $this->site->getOneRecord('dawatelement','*',array('report_type'=>$report_type,'branch_id'=>$branch_id),'id desc',1,0);	

        return array(
            'dawatelementinfo' => $dawatelementinfo
        );
    }




    function getEntryInfoElementSUM($report_type_get,$branch_id = NULL)
    {
         
        $report_start =$report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

 
            $result =  $this->site->query_binding("SELECT 
SUM(`quran_sale`)  as quran_sale, SUM(`quran_distribution`)  as quran_distribution, SUM(`hadith_sale`)  as hadith_sale, SUM(`hadith_distribution`)  as hadith_distribution, SUM(`porichiti_sale`)  as porichiti_sale, SUM(`porichiti_distribution`)  as porichiti_distribution, SUM(`literature_sale`)  as literature_sale, SUM(`literature_distribution`)  as literature_distribution , SUM(`sticker_sale`)  as sticker_sale, SUM(`sticker_distribution`)  as sticker_distribution, SUM(`routine_sale`)  as routine_sale, SUM(`routine_distribution`)  as routine_distribution, SUM(`calendar_sale`)  as calendar_sale, SUM(`calendar_distribution`)  as calendar_distribution, SUM(`diary_sale`)  as diary_sale, SUM(`diary_distribution`)  as diary_distribution, SUM(`cd_sale`)  as cd_sale, SUM(`cd_distribution`)  as cd_distribution, SUM(`kishore_bn_number`)  as kishore_bn_number, SUM(`kishore_bn_sale`)  as kishore_bn_sale, SUM(`kishore_bn_distribution`)  as kishore_bn_distribution, SUM(`kishore_bn_client`)  as kishore_bn_client, SUM(`kishore_en_number`)  as kishore_en_number, SUM(`kishore_en_sale`)  as kishore_en_sale, SUM(`kishore_en_distribution`)  as kishore_en_distribution, SUM(`kishore_en_client`)  as kishore_en_client , SUM(`chhatrasangbad_number`)  as chhatrasangbad_number, SUM(`chhatrasangbad_sale`)  as chhatrasangbad_sale, SUM(`chhatrasangbad_distribution`)  as chhatrasangbad_distribution, SUM(`chhatrasangbad_client`)  as chhatrasangbad_client, SUM(`eng_mag_number`)  as eng_mag_number, SUM(`eng_mag_sale`)  as eng_mag_sale, SUM(`eng_mag_distribution`)  as eng_mag_distribution , SUM(`eng_mag_client`)  as eng_mag_client, SUM(`sosas_number`)  as sosas_number, SUM(`sosas_sale`)  as sosas_sale, SUM(`sosas_distribution`)  as sosas_distribution, SUM(`sosas_client`)  as sosas_client, SUM(`madrasha_number`)  as madrasha_number, SUM(`madrasha_sale`)  as madrasha_sale, SUM(`madrasha_distribution`)  as madrasha_distribution, SUM(`madrasha_client`)  as madrasha_client, SUM(`std_view_number`)  as std_view_number, SUM(`std_view_sale`)  as std_view_sale, SUM(`std_view_distribution`)  as std_view_distribution, SUM(`std_view_client`)  as std_view_client, SUM(`sci_mag_number`)  as sci_mag_number, SUM(`sci_mag_sale`)  as sci_mag_sale, SUM(`sci_mag_distribution`)  as sci_mag_distribution, SUM(`sci_mag_client`)  as sci_mag_client, SUM(`branch_paper_number`)  as branch_paper_number, SUM(`branch_paper_sale`)  as branch_paper_sale, SUM(`branch_paper_distribution`)  as branch_paper_distribution, SUM(`branch_paper_client`)  as branch_paper_client
FROM `sma_dawatelement` WHERE date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }














    function check_member($member_id, $branch)
    {


        $info = $this->site->getcolumn('postpone', 'id', array('manpower_id' => $member_id, 'orgstatus_id' => 1, 'end_date' => '2050-12-31', 'branch' => $branch), 'id DESC', 1, 0);


        if ($info != NULL) {
            $this->form_validation->set_message('check_member', 'Already postponed!');
            return false;
        } else {

            return true;
        }
    }




    /* ------------------------------------------------------- */









    /* -------------------------------------------------------- */

    function edit($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);




        $this->load->helper('security');
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $branches = $this->site->getAllBranches();
        $manpower = $this->site->getManpowerByID($id);
        if (!$id || !$manpower) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }


        $this->form_validation->set_rules('product_image', lang("product_image"), 'xss_clean');

        if ($this->form_validation->run('manpower/add') == true) {

            $data = array(
                'name' => $this->input->post('name'),
                'studentlife' => $this->input->post('studentlife'),
                'education' => $this->input->post('education'),
                'sessionyear' => $this->input->post('sessionyear')
            );

            $this->load->library('upload');




            if ($_FILES['manpower_image']['size'] > 0) {

                $config['upload_path'] = $this->upload_path;
                $config['allowed_types'] = $this->image_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('manpower_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("manpower/edit/" . $id);
                }
                $photo = $this->upload->file_name;
                $data['image'] = $photo;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload_path . $photo;
                $config['new_image'] = $this->thumbs_path . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $this->Settings->twidth;
                $config['height'] = $this->Settings->theight;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $this->image_lib->clear();
                $config = NULL;
            }
        }
        // $this->sma->print_arrays($data,$_POST);
        if ($this->form_validation->run() == true && $this->manpower_model->updateManpower($id, $data)) {
            $this->session->set_flashdata('message', lang("manpower_updated"));
            admin_redirect('manpower/member');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'member'), array('link' => '#', 'page' => lang('edit_manpower')));
            $meta = array('page_title' => lang('edit_manpower'), 'bc' => $bc);
            $this->page_construct('manpower/edit', $meta, $this->data);
        }
    }



    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {
        $this->sma->checkPermissions(NULL, TRUE);

        admin_redirect('manpower');

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->products_model->deleteProduct($id)) {
            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("manpower_deleted")));
            }
            $this->session->set_flashdata('message', lang('manpower_deleted'));
            admin_redirect('welcome');
        }
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

    function view($id = NULL)
    {
        $this->sma->checkPermissions('index');

        $pr_details = $this->products_model->getProductByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('prduct_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['barcode'] = "<img src='" . admin_url('products/gen_barcode/' . $pr_details->code . '/' . $pr_details->barcode_symbology . '/40/0') . "' alt='" . $pr_details->code . "' class='pull-left' />";
        if ($pr_details->type == 'combo') {
            $this->data['combo_items'] = $this->products_model->getProductComboItems($id);
        }
        $this->data['product'] = $pr_details;
        $this->data['unit'] = $this->site->getUnitByID($pr_details->unit);
        $this->data['brand'] = $this->site->getBrandByID($pr_details->brand);
        $this->data['images'] = $this->products_model->getProductPhotos($id);
        $this->data['category'] = $this->site->getCategoryByID($pr_details->category_id);
        $this->data['subcategory'] = $pr_details->subcategory_id ? $this->site->getCategoryByID($pr_details->subcategory_id) : NULL;
        $this->data['tax_rate'] = $pr_details->tax_rate ? $this->site->getTaxRateByID($pr_details->tax_rate) : NULL;
        $this->data['popup_attributes'] = $this->popup_attributes;
        $this->data['warehouses'] = $this->products_model->getAllWarehousesWithPQ($id);
        $this->data['options'] = $this->products_model->getProductOptionsWithWH($id);
        $this->data['variants'] = $this->products_model->getProductOptions($id);
        $this->data['sold'] = $this->products_model->getSoldQty($id);
        $this->data['purchased'] = $this->products_model->getPurchasedQty($id);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => $pr_details->name));
        $meta = array('page_title' => $pr_details->name, 'bc' => $bc);
        $this->page_construct('products/view', $meta, $this->data);
    }

    function pdf($id = NULL, $view = NULL)
    {
        $this->sma->checkPermissions('index');

        $pr_details = $this->products_model->getProductByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('prduct_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['barcode'] = "<img src='" . admin_url('products/gen_barcode/' . $pr_details->code . '/' . $pr_details->barcode_symbology . '/40/0') . "' alt='" . $pr_details->code . "' class='pull-left' />";
        if ($pr_details->type == 'combo') {
            $this->data['combo_items'] = $this->products_model->getProductComboItems($id);
        }
        $this->data['product'] = $pr_details;
        $this->data['unit'] = $this->site->getUnitByID($pr_details->unit);
        $this->data['brand'] = $this->site->getBrandByID($pr_details->brand);
        $this->data['images'] = $this->products_model->getProductPhotos($id);
        $this->data['category'] = $this->site->getCategoryByID($pr_details->category_id);
        $this->data['subcategory'] = $pr_details->subcategory_id ? $this->site->getCategoryByID($pr_details->subcategory_id) : NULL;
        $this->data['tax_rate'] = $pr_details->tax_rate ? $this->site->getTaxRateByID($pr_details->tax_rate) : NULL;
        $this->data['popup_attributes'] = $this->popup_attributes;
        $this->data['warehouses'] = $this->products_model->getAllWarehousesWithPQ($id);
        $this->data['options'] = $this->products_model->getProductOptionsWithWH($id);
        $this->data['variants'] = $this->products_model->getProductOptions($id);

        $name = $pr_details->code . '_' . str_replace('/', '_', $pr_details->name) . ".pdf";
        if ($view) {
            $this->load->view($this->theme . 'products/pdf', $this->data);
        } else {
            $html = $this->load->view($this->theme . 'products/pdf', $this->data, TRUE);
            if (!$this->Settings->barcode_img) {
                $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
            }
            $this->sma->generate_pdf($html, $name);
        }
    }


    function memberincreaseexport($process_id, $branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $process = $this->site->getByID('process', 'id', $process_id);


        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('memberlog')
            ->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
            ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1)
            ->join('branches', 'branches.id=memberlog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('manpower.member_oath_date ASC');

        /*
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    
			if ($branch)
			    $this->db->where($this->db->dbprefix('branches') . ".id", $branch);
            
             */
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member Increase list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'member_increase_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }





    function memberdecreaseexport($process_id, $branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $process = $this->site->getByID('process', 'id', $process_id);


        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('memberlog')
            ->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
            ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2)
            ->join('branches', 'branches.id=memberlog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('manpower.member_oath_date ASC');

        /*
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    
			if ($branch)
			    $this->db->where($this->db->dbprefix('branches') . ".id", $branch);
            
             */
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member Increase list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'member_increase_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }






    function export($branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }






        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('member')}.oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('member')
            ->join('manpower', 'manpower.id=member.manpower_id', 'left')
            ->join('branches', 'branches.id=member.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('manpower.member_oath_date ASC');


        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);


        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'member_report';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function exportpostpone($branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('postpone')
            ->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
            ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1)
            ->join('branches', 'branches.id=postpone.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('postpone.id ASC');

        //  $this->db->where($this->db->dbprefix('postpone') . ".end_date", '2050-12-31');
        $this->db->where($this->db->dbprefix('manpower') . ".orgstatus_id", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);


        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Postpone list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->start_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'postpone_report';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }






    public function qa_suggestions()
    {
        $term = $this->input->get('term', true);

        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $analyzed = $this->sma->analyze_term($term);
        $sr = $analyzed['term'];
        $option_id = $analyzed['option_id'];

        $rows = $this->products_model->getQASuggestions($sr);
        if ($rows) {
            foreach ($rows as $row) {
                $row->qty = 1;
                $options = $this->products_model->getProductOptions($row->id);
                $row->option = $option_id;
                $row->serial = '';
                $c = sha1(uniqid(mt_rand(), true));
                $pr[] = array(
                    'id' => $c, 'item_id' => $row->id, 'label' => $row->name . " (" . $row->code . ")",
                    'row' => $row, 'options' => $options
                );
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }
}
