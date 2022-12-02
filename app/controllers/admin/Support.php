<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->lang->admin_load('pages', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('pages_model');
        $this->digital_upload_path = $this->config->item('upload_location').'files/pages/';
        $this->upload_path = $this->config->item('upload_location').'files/pages/';
        $this->thumbs_path = $this->config->item('upload_location').'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function index($warehouse_id = NULL)
    {
       // $this->sma->checkPermissions();

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('warehouse_id')) {
           // $this->data['warehouses'] = $this->site->getAllWarehouses();
          //  $this->data['warehouse_id'] = $warehouse_id;
           // $this->data['warehouse'] = $warehouse_id ? $this->site->getWarehouseByID($warehouse_id) : NULL;
        } else {
          //  $this->data['warehouses'] = NULL;
           // $this->data['warehouse_id'] = $this->session->userdata('warehouse_id');
           // $this->data['warehouse'] = $this->session->userdata('warehouse_id') ? $this->site->getWarehouseByID($this->session->userdata('warehouse_id')) : NULL;
        }
        $this->data['supports'] = $this->site->query_binding('SELECT id, title from sma_pages where status = ? order by priority desc', array(1));
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সহায়িকা')));
        $meta = array('page_title' => lang('সহায়িকা'), 'bc' => $bc);
        $this->page_construct('support/index', $meta, $this->data);
    }

     

     

     function detail($id)
    {
       // $this->sma->checkPermissions();
 
        $this->data['supportdetail'] = $this->site->getOneRecord('pages','*',array('id'=>$id,'status'=>1),'id asc',1,0 );
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('support'), 'page' => lang('সহায়িকা')), array('link' => '#', 'page' => $this->data['supportdetail']->title));
        
		$meta = array('page_title' => lang('সহায়িকা'), 'bc' => $bc);
        $this->page_construct('support/detail', $meta, $this->data);
    }


      
    
    

     

    
 
    

}
