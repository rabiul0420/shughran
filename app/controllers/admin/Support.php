<?php defined('BASEPATH') or exit('No direct script access allowed');

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
        $this->digital_upload_path = $this->config->item('upload_location') . 'files/pages/';
        $this->upload_path = $this->config->item('upload_location') . 'files/pages/';
        $this->thumbs_path = $this->config->item('upload_location') . 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function index($branch_id = NULL)
    {
        // $this->sma->checkPermissions();

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


        $this->data['supports'] = $this->site->query_binding('SELECT id, title from sma_pages where status = ? order by priority desc', array(1));
       
        $this->data['tickets'] = $this->site->query_binding('SELECT sma_support_ticket.*,  sma_branches.code from sma_support_ticket left join sma_branches on sma_branches.id = sma_support_ticket.branch_id  where is_status != ? order by id desc limit 20', array('Closed'));
       

        //$this->sma->print_arrays($this->data['tickets']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সহায়িকা')));
        $meta = array('page_title' => lang('সহায়িকা'), 'bc' => $bc);
        $this->page_construct('support/index', $meta, $this->data);
    }





    function detail($id)
    {
        // $this->sma->checkPermissions();

        $this->data['supportdetail'] = $this->site->getOneRecord('pages', '*', array('id' => $id, 'status' => 1), 'id asc', 1, 0);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('support'), 'page' => lang('সহায়িকা')), array('link' => '#', 'page' => $this->data['supportdetail']->title));

        $meta = array('page_title' => lang('সহায়িকা'), 'bc' => $bc);
        $this->page_construct('support/detail', $meta, $this->data);
    }









    function add($branch_id = null)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');





        $this->form_validation->set_rules('ticket_caption', 'Ticket caption', 'required');
        $this->form_validation->set_rules('note', 'Ticket detail', 'required');


        if ($this->form_validation->run() == true) {





            $ticket_caption = $this->input->post('ticket_caption');
            $ticket_detail = $this->input->post('note');
            $page = $this->input->post('page');
            $is_status = 'New';
            $department_id = $this->input->post('department');
            $user_id = $this->session->userdata('user_id');
            $branch_id = $this->session->userdata('branch_id') ? $this->session->userdata('branch_id') : $branch_id;



            $ticket_data = array(
                'ticket_caption' => $ticket_caption,
                'ticket_detail' => $this->sma->clear_tags($ticket_detail),
                'page' => $page,
                'is_status' => $is_status,
                //'department_id' => $department_id,
                'category' =>   $department_id,
                'user_id' => $user_id,
                'branch_id' => $branch_id
            );
        } elseif ($this->input->post('ticket')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("support" . ($branch_id ? '/' . $branch_id : ''));
        }

        if ($this->form_validation->run() == true && $this->site->insertData('support_ticket', $ticket_data)) {



            $this->session->set_flashdata('message', 'Submitted successfully');
            admin_redirect("support" . ($branch_id ? '/' . $branch_id : ''));
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['branch_id'] = $branch_id;
            $this->data['departments'] = $this->site->getAll('ticket_category');



            $this->load->view($this->theme . 'support/add', $this->data);
        }
    }
}
