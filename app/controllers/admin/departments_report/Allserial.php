<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Allserial extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        // $this->departmentuser = false;
        $this->departmentuser = TRUE;
		
		// if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=18) {
		// 	admin_redirect('welcome');
		// }
		//  $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		//  if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==18) {  //literature
		// 	$this->departmentuser = true; 
		// }

		$this->data['branch_id'] = $this->session->userdata('branch_id');		
        $this->load->admin_model('serial_model'); // load serial model
		
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

    function all_serials($branch_id = NULL)
    {  
        // $this->sma->checkPermissions();

		$branch_id = $this->session->userdata('branch_id');
		// get all department serials 
        $this->data['all_serials'] = $this->serial_model->getAllSerial();

		// print_r($this->data['all_serial']);
		// print_r($branch_id);		

		$this->data['m'] = 'All serials';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('All serials'), 'bc' => $bc);
        
		if($branch_id){
		$this->page_construct('departmentsreport/serials/allserial', $meta, $this->data,'leftmenu/departmentsreport');
		}else{
		$this->page_construct('departmentsreport/serials/allserial', $meta, $this->data,'leftmenu/departmentsreport');
		}
	}

}
