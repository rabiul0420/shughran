<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reportsubmit extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
		 
		
		 
		if(  !($this->session->userdata('group_id')== 8 || $this->Owner || $this->Admin)) {   
			admin_redirect('welcome');
		}
		
         
        $this->lang->admin_load('notifications', $this->Settings->user_language);
        $this->load->library('form_validation');
        

    }

    function index()
    {
       

        $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Report Submit'));
        $meta = array('page_title' => 'Report Submit', 'bc' => $bc);
		$this->data['branches'] = $this->site->getAllBranches();
		
		 
          


         if($this->input->get('type') !=null || !empty($this->input->get('type'))){
            //$branch = $this->input->get('branch');
            $report_type = $this->input->get('type');
            $year = $this->input->get('year');
           }else {
            $report_type_info = $this->report_type();  
            $report_type =  $report_type_info['type']; 
            $year =  $report_type_info['year']; 
   
            $check = $this->site->getOneRecord('reportsubmit', "*", array( 'year'=>$year,'report_type'=>$report_type));
             $this->sma->print_arrays($check);
            if ($check == false) {
               //insert
               $branches = $this->site->getAllBranches();
               foreach($branches as $row) {
                   $this->sma->print_arrays($row);
                   $this->site->insertData('reportsubmit', array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$branch, 'report_type'=>$report_type, 'year'=>$year));
               }
               }
   
   
   
           }
   




         
		
		if( $branch){
		 	
		 $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id'=>$branch,'year'=>$year,'report_type'=>$report_type));
    
		}
		
		$this->data['departments'] = $this->site->getAllDepartments();
             
		 
        $this->page_construct('reportsubmit/index', $meta, $this->data);
    }

     
	
	function check_confirm() {
   $branch = $this->input->post('branch_id');
   $report_type = $this->input->post('report_type');
  $year = $this->input->post('year');
   
   
   $check = $this->site->getOneRecord('confirmreport', "*", array('branch_id'=>$branch,'year'=>$year,'report_type'=>$report_type));
    
   
   if ($check == false) {
       return TRUE;
   }
   $this->form_validation->set_message('check_confirm','Already confirmed');
   return FALSE;
}
	
	
    function add()
    {
		$this->sma->checkPermissions('index', TRUE);


        $this->form_validation->set_rules('branch_id', lang("branch"), 'required');
		$this->form_validation->set_rules('report_type', 'Type', 'required|callback_check_confirm');
		$this->form_validation->set_rules('year', 'Year', 'required');

		
		
        if ($this->form_validation->run() == true) {
            $data = array(
			    'comment' => $this->input->post('comment'),
				'user_id' => $this->session->userdata('user_id') ,
				 'year' => $this->input->post('year'),
                'branch_id' => $this->input->post('branch_id'),
                'report_type' => $this->input->post('report_type')
				);
        } elseif ($this->input->post('confirm')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("confirmreport");
        }

        if ($this->form_validation->run() == true && $this->site->insertData('confirmreport',$data)) {
            $this->session->set_flashdata('message', 'Added');
            admin_redirect("confirmreport");
        } else {

           $this->data['comment'] = array('name' => 'comment',
                'id' => 'comment',
                'type' => 'textarea',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('comment'),
            ); 

            $this->data['error'] = validation_errors();
            $this->data['modal_js'] = $this->site->modal_js();
			 $this->data['branches'] = $this->site->getAllBranches();

			 
			$report_type = $this->report_type();  
			$this->data['report_type'] =  $report_type['type']; 
			$this->data['year'] =  $report_type['year']; 
			 
			 
			 
            $this->load->view($this->theme . 'confirmreport/add', $this->data);

        }
    }

    

    function delete($id = NULL)
    {
		 $this->sma->checkPermissions('index', TRUE);
		 
        if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->site->delete('confirmreport', array('id'=>$id))) {
            $this->sma->send_json(array('error' => 0, 'msg' => 'Deleted'));
        }
    }
	
	
	
	
	
	
	
	
		 
	
		
function report_type_old()
{

    $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

    $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')-1), 'id desc', 1, 0);

     $type =  $this->input->get('type')=='annual' ?  'annual' : 'half_yearly';

    if ($type == 'half_yearly')
        return array('info'=>$entrytimeinfo, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
    else
        return array('info'=>$entrytimeinfo2, 'type' => 'annual', 'start' => $entrytimeinfo2->startdate_half, 'end' => $entrytimeinfo2->enddate_annual, 'year' => $entrytimeinfo2->year);
}	
	
	

}
