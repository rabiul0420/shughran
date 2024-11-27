<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends MY_Controller
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
        $this->load->admin_model('organization_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    } 



    
    function index_BK($branch_id = NULL)
    {


        $this->sma->checkPermissions();
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/' . $this->session->userdata('branch_id'));
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



        $this->data['institutions'] = $this->organization_model->getAllInstitution();

        $where = " ";


        if ($branch_id) {
            $where = " branch = $branch_id AND ";
        }


        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        $this->data['org_summary_sma'] = $this->getorg_summary_prev('annual', $prev, $branch_id);


        //$this->sma->print_arrays( $this->data['org_summary_sma']);


        if ($branch_id) {


            $this->data['institution_number'] = $this->site->query("SELECT institution_type_child,  v3_prev_institution(institution_type_child, " . $prev . ", " . $branch_id . ") prev_institution, SUM(increase_institution) increase,  SUM(decrease_institution) decrease FROM   ( SELECT     
      institution_type_child,  COUNT(`id`) increase_institution, 0 decrease_institution
     FROM `sma_institutionlist`
     WHERE `date` BETWEEN '" . $start . "' AND '" . $end . "' AND branch_id = " . $branch_id . "
     GROUP BY institution_type_child 
     
     UNION ALL 
     
     SELECT     
      institution_type_child,  0 increase_institution, COUNT(`id`) decrease_institution
     FROM `sma_institutionlist`
     WHERE `close_date` BETWEEN '" . $start . "' AND '" . $end . "' AND branch_id = " . $branch_id . " 
     GROUP BY institution_type_child 
     
     UNION ALL 

SELECT `id` institution_type_child, 0 increase_institution,0 decrease_institution FROM `sma_institution` WHERE  `type` = 1 GROUP BY id 

     
     ) a GROUP BY institution_type_child ,prev_institution");




            $this->data['institution_info'] = $this->site->query("SELECT     
     institution_type_child ,  SUM( v3_organization_prev( sma_institutionlist.id, '" . $prev . "', 2," . $branch_id . ")) unit_prev, SUM(current_unit) current_unit, 
    SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 1, " . $branch_id . ")) unit_increase, 
    SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 2, " . $branch_id . ")) unit_decrease ,
    SUM( total_student_number ) total_student_number, SUM( supporter) supporter, 
    SUM(other_org_worker) other_org_worker, 
    SUM(total_female_student) total_female_student, 
    SUM(female_student_supporter) female_student_supporter, 
    SUM(non_muslim_student) non_muslim_student, 
    SUM(total_student_number) total_student_number, 
     SUM( CASE WHEN org_type = 'unit' THEN 1 ELSE 0 END ) AS count_unit, 
      SUM(CASE WHEN org_type = 'thana' THEN 1 ELSE 0 END ) AS count_thana,
     SUM( CASE WHEN org_type = 'ward' THEN 1 ELSE 0 END ) AS count_ward,
     SUM( CASE WHEN org_type = 'branch' THEN 1 ELSE 0 END ) AS count_branch,
    SUM( CASE WHEN is_organization != 1 THEN 1 ELSE 0 END ) AS no_organization 
    FROM `sma_institutionlist` WHERE   branch_id = " . $branch_id . "  
    GROUP BY institution_type_child");  //AND is_active = 1



            $this->data['organization_info'] = $this->site->query("SELECT     
    t2.institution_type_child ,     SUM(CASE WHEN org_change_type = 1 THEN 1 ELSE 0 END) increase_organization, SUM(CASE WHEN org_change_type = 2 THEN 1 ELSE 0 END) decrease_organization
   FROM `sma_institution_organization`
   LEFT JOIN `sma_institutionlist` `t2` ON t2.id=`sma_institution_organization`.`institution_id` 
   WHERE sma_institution_organization.`date` BETWEEN '" . $start . "' AND '" . $end . "' AND t2.branch_id = " . $branch_id . "
   GROUP BY institution_type_child ");



            $this->data['supporter_org_but_org_info'] = $this->site->query("SELECT a.institution_type_child, v3_prev_support_but_org(a.institution_type_child,'" . $prev . "', " . $branch_id . ") prev_, SUM(a.support_increase_but_org) support_increase_but_org, SUM(a.support_decrease_but_org) support_decrease_but_org
   FROM
   (SELECT `institution_type_child`, COUNT(`sma_institution_supporter_organization`.id) support_increase_but_org, 
   0  support_decrease_but_org
   FROM  `sma_institution_supporter_organization` 
   LEFT JOIN  sma_institutionlist
   ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
   WHERE sma_institution_supporter_organization.change_type = 1 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "' AND sma_institution_supporter_organization.branch_id = " . $branch_id . " 
   GROUP BY institution_type_child
    
   UNION ALL 
    
   SELECT `institution_type_child`, 0 support_increase_but_org, 
   COUNT(`sma_institution_supporter_organization`.id) support_decrease_but_org
   FROM  `sma_institution_supporter_organization` 
   LEFT JOIN  sma_institutionlist
   ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
   WHERE sma_institution_supporter_organization.change_type = 2 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "'  AND sma_institution_supporter_organization.branch_id = " . $branch_id . "
    GROUP BY institution_type_child)a
   GROUP BY a.institution_type_child ");
        } else {

            $this->data['institution_number'] = $this->site->query("SELECT institution_type_child,  v3_prev_institution(institution_type_child, " . $prev . ", -1) prev_institution, SUM(increase_institution) increase,  SUM(decrease_institution) decrease FROM   ( SELECT     
        institution_type_child,  COUNT(`id`) increase_institution, 0 decrease_institution
       FROM `sma_institutionlist`
       WHERE `date` BETWEEN '" . $start . "' AND '" . $end . "' 
       GROUP BY institution_type_child 
       
       UNION ALL 
       
       SELECT     
        institution_type_child,  0 increase_institution, COUNT(`id`) decrease_institution
       FROM `sma_institutionlist`
       WHERE `close_date` BETWEEN '" . $start . "' AND '" . $end . "' 
       GROUP BY institution_type_child 
       
       UNION ALL 

SELECT `id` institution_type_child, 0 increase_institution,0 decrease_institution FROM `sma_institution` WHERE  `type` = 1 GROUP BY id 
       ) a GROUP BY institution_type_child ,prev_institution");




            $this->data['institution_info'] = $this->site->query("SELECT     
       institution_type_child,  SUM( v3_organization_prev( sma_institutionlist.id, '" . $prev . "', 2,-1)) unit_prev, SUM(current_unit) current_unit, 
      SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 1, -1)) unit_increase, 
      SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 2, -1)) unit_decrease ,
      SUM( total_student_number ) total_student_number, SUM( supporter) supporter, 
      SUM(other_org_worker) other_org_worker, 
      SUM(total_female_student) total_female_student, 
      SUM(female_student_supporter) female_student_supporter, 
      SUM(non_muslim_student) non_muslim_student, 
      SUM(total_student_number) total_student_number, 
       SUM( CASE WHEN org_type = 'unit' THEN 1 ELSE 0 END ) AS count_unit, 
        SUM(CASE WHEN org_type = 'thana' THEN 1 ELSE 0 END ) AS count_thana,
       SUM( CASE WHEN org_type = 'ward' THEN 1 ELSE 0 END ) AS count_ward,
       SUM( CASE WHEN org_type = 'branch' THEN 1 ELSE 0 END ) AS count_branch,
      SUM( CASE WHEN is_organization != 1 THEN 1 ELSE 0 END ) AS no_organization 
      FROM `sma_institutionlist` where is_active = 1 
      GROUP BY institution_type_child");



            $this->data['organization_info'] = $this->site->query("SELECT     
      t2.institution_type_child ,     SUM(CASE WHEN org_change_type = 1 THEN 1 ELSE 0 END) increase_organization, SUM(CASE WHEN org_change_type = 2 THEN 1 ELSE 0 END) decrease_organization
     FROM `sma_institution_organization`
     LEFT JOIN `sma_institutionlist` `t2` ON t2.id=`sma_institution_organization`.`institution_id` 
     WHERE sma_institution_organization.`date` BETWEEN '" . $start . "' AND '" . $end . "'
     GROUP BY institution_type_child ");



            $this->data['supporter_org_but_org_info'] = $this->site->query("SELECT a.institution_type_child, v3_prev_support_but_org(a.institution_type_child,'" . $prev . "', -1) prev_, SUM(a.support_increase_but_org) support_increase_but_org, SUM(a.support_decrease_but_org) support_decrease_but_org
     FROM
     (SELECT `institution_type_child`, COUNT(`sma_institution_supporter_organization`.id) support_increase_but_org, 
     0  support_decrease_but_org
     FROM  `sma_institution_supporter_organization` 
     LEFT JOIN  sma_institutionlist
     ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
     WHERE sma_institution_supporter_organization.change_type = 1 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "' 
     GROUP BY institution_type_child
      
     UNION ALL 
      
     SELECT `institution_type_child`, 0 support_increase_but_org, 
     COUNT(`sma_institution_supporter_organization`.id) support_decrease_but_org
     FROM  `sma_institution_supporter_organization` 
     LEFT JOIN  sma_institutionlist
     ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
     WHERE sma_institution_supporter_organization.change_type = 2 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "'  
      GROUP BY institution_type_child)a
     GROUP BY a.institution_type_child ");
        }





        if ($branch_id) {

            $this->data['detailinfo'] = $this->getEntryInfo($this->data['institutions'], $branch_id);
        } else
            $this->data['detailinfo'] = '';


        $this->data['report_info'] = $report_type;

        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);



        $this->data['institution_manpower_record'] = $this->site->query("SELECT   
      SUM(CASE WHEN orgstatus_id = 2 OR orgstatus_id = 12 THEN 1 ELSE 0 END) associate ,  
      SUM(CASE WHEN orgstatus_id = 1 THEN 1 ELSE 0 END ) `member` ,  institution_type_child
      FROM `sma_manpower`  WHERE $where  `orgstatus_id` IN (1,2,12) GROUP BY `institution_type_child`");


        $this->data['org_summary'] = $this->getorg_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);





        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization'));
        $meta = array('page_title' => 'Organization', 'bc' => $bc);
        if ($branch_id) {
            $this->page_construct2('organization/index_entry', $meta, $this->data, 'leftmenu/organization');
        } else
            $this->page_construct2('organization/index', $meta, $this->data, 'leftmenu/organization');
    }


}
