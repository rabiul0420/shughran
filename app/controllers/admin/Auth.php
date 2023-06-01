<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->lang->admin_load('auth', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->admin_model('auth_model');
        $this->load->library('ion_auth');
    }




 function gen_pass()
    {

		
    

$array = array(
// array('user'=>'owner', 'pass'=>'khub@Kothin1971' ),
array('user'=> '1', 'pass'=>'*A3c3uF#'),
array('user'=> '2', 'pass'=>'*A2a4uH#'),
array('user'=> '3', 'pass'=>'*C8f3sC#'),
array('user'=> '4', 'pass'=>'*H8a8uA#'),
array('user'=> '5', 'pass'=>'*C5a6tH#'),
array('user'=> '6', 'pass'=>'*G1e2uC#'),
array('user'=> '7', 'pass'=>'*F7f5tC#'),
array('user'=> '8', 'pass'=>'*H5e3uE#'),
array('user'=> '9', 'pass'=>'*F6g9uD#'),
array('user'=> '10', 'pass'=>'*G5e8uF#'),
array('user'=> '11', 'pass'=>'*C1c9tD#'),
array('user'=> '12', 'pass'=>'*H6f3sE#'),
array('user'=> '13', 'pass'=>'*G4b4sH#'),
array('user'=> '14', 'pass'=>'*B6h6sD#'),
array('user'=> '15', 'pass'=>'*F1g4sG#'),
array('user'=> '16', 'pass'=>'*H2f6uH#'),
array('user'=> '17', 'pass'=>'*E2f2tG#'),
array('user'=> '18', 'pass'=>'*H4f2tF#'),
array('user'=> '19', 'pass'=>'*A2d7tF#'),
array('user'=> '20', 'pass'=>'*F6c2uB#'),
array('user'=> '21', 'pass'=>'*A5c6tH#'),
array('user'=> '22', 'pass'=>'*D8c6uA#'),
array('user'=> '23', 'pass'=>'*B3e7tB#'),
array('user'=> '24', 'pass'=>'*C7f7sF#'),
array('user'=> '25', 'pass'=>'*G3d7uF#'),
array('user'=> '26', 'pass'=>'*D1f3sH#'),
array('user'=> '27', 'pass'=>'*H7f1sC#'),
array('user'=> '28', 'pass'=>'*H9e1uG#'),
array('user'=> '29', 'pass'=>'*D3d4uC#'),
array('user'=> '30', 'pass'=>'*E8b5tE#'),
array('user'=> '31', 'pass'=>'*H6f3uB#'),
array('user'=> '32', 'pass'=>'*G8d3tB#'),
array('user'=> '33', 'pass'=>'*D9a7uB#'),
array('user'=> '34', 'pass'=>'*F3h6sF#'),
array('user'=> '35', 'pass'=>'*B9c2uG#'),
array('user'=> '36', 'pass'=>'*A7e2tG#'),
array('user'=> '37', 'pass'=>'*B1c5tH#'),
array('user'=> '38', 'pass'=>'*G5g3tD#'),
array('user'=> '39', 'pass'=>'*C8f1uD#'),
array('user'=> '40', 'pass'=>'*G1c7sG#'),
array('user'=> '41', 'pass'=>'*C5h4uA#'),
array('user'=> '42', 'pass'=>'*E2c6tG#'),
array('user'=> '43', 'pass'=>'*H7a9uF#'),
array('user'=> '44', 'pass'=>'*C2b5tB#'),
array('user'=> '45', 'pass'=>'*C7h4tA#'),
array('user'=> '46', 'pass'=>'*E3e8tB#'),
array('user'=> '47', 'pass'=>'*H4g5sD#'),
array('user'=> '48', 'pass'=>'*D5a4tD#'),
array('user'=> '49', 'pass'=>'*D9e8tE#'),
array('user'=> '50', 'pass'=>'*A7c5uA#'),
array('user'=> '51', 'pass'=>'*E1a1tG#'),
array('user'=> '52', 'pass'=>'*G1d2sG#'),
array('user'=> '53', 'pass'=>'*B4h3sE#'),
array('user'=> '54', 'pass'=>'*D9a4uE#'),
array('user'=> '55', 'pass'=>'*H4e9sC#'),
array('user'=> '56', 'pass'=>'*D3b1sB#'),
array('user'=> '57', 'pass'=>'*E3c5uC#'),
array('user'=> '58', 'pass'=>'*G1d3tG#'),
array('user'=> '59', 'pass'=>'*B1h1uA#'),
array('user'=> '60', 'pass'=>'*H7b2uE#'),
array('user'=> '61', 'pass'=>'*F5e8uC#'),
array('user'=> '62', 'pass'=>'*F6d9uF#'),
array('user'=> '63', 'pass'=>'*G8a1sC#'),
array('user'=> '64', 'pass'=>'*B5e3sD#'),
array('user'=> '65', 'pass'=>'*A9h9uF#'),
array('user'=> '66', 'pass'=>'*G2c9sD#'),
array('user'=> '67', 'pass'=>'*D3h5uB#'),
array('user'=> '68', 'pass'=>'*C8c1tG#'),
array('user'=> '69', 'pass'=>'*H1b8sH#'),
array('user'=> '70', 'pass'=>'*G8d9sF#'),
array('user'=> '71', 'pass'=>'*F8h6uB#'),
array('user'=> '72', 'pass'=>'*B9e3sD#'),
array('user'=> '73', 'pass'=>'*C7b6tF#'),
array('user'=> '74', 'pass'=>'*E9c3uF#'),
array('user'=> '75', 'pass'=>'*C4b4uC#'),
array('user'=> '76', 'pass'=>'*F9a4sF#'),
array('user'=> '77', 'pass'=>'*A5e4sA#'),
array('user'=> '78', 'pass'=>'*E6b4sB#'),
array('user'=> '79', 'pass'=>'*G1f4tG#'),
array('user'=> '80', 'pass'=>'*D2f2sB#'),
array('user'=> '81', 'pass'=>'*D5f8tA#'),
array('user'=> '82', 'pass'=>'*E2h6tH#'),
array('user'=> '83', 'pass'=>'*D6d3sA#'),
array('user'=> '84', 'pass'=>'*C9f5tA#'),
array('user'=> '85', 'pass'=>'*F2d8uD#'),
array('user'=> '86', 'pass'=>'*B5d7sC#'),
array('user'=> '87', 'pass'=>'*B7h2uB#'),
array('user'=> '88', 'pass'=>'*D7d7uA#'),
array('user'=> '89', 'pass'=>'*A1a7uE#'),
array('user'=> '90', 'pass'=>'*E9e6tC#'),
array('user'=> '91', 'pass'=>'*G4h3sB#'),
array('user'=> '92', 'pass'=>'*D2c1uC#'),
array('user'=> '93', 'pass'=>'*B2c8sE#'),
array('user'=> '94', 'pass'=>'*B5h5tD#'),
array('user'=> '95', 'pass'=>'*B3f5tD#'),
array('user'=> '96', 'pass'=>'*F4b2sC#'),
array('user'=> '97', 'pass'=>'*E2d7sF#'),
array('user'=> '98', 'pass'=>'*C2f5tA#'),
array('user'=> '99', 'pass'=>'*H3g2sE#'),
array('user'=> '100', 'pass'=>'*E1e1uA#'),
array('user'=> '101', 'pass'=>'*D9b6sG#'),
array('user'=> '102', 'pass'=>'*A4h4sB#'),
array('user'=> '103', 'pass'=>'*B7g1uB#'),
array('user'=> '104', 'pass'=>'*E6c2sC#'),
array('user'=> '105', 'pass'=>'*A7b8tF#'),
array('user'=> '106', 'pass'=>'*E3e8uA#'),
array('user'=> '107', 'pass'=>'*B3g1tH#'),
array('user'=> '108', 'pass'=>'*A7f9sG#'),
array('user'=> '109', 'pass'=>'*F3d1tB#'),
array('user'=> '110', 'pass'=>'*A3f5uD#'),
array('user'=> '111', 'pass'=>'*B6b8tE#'),
array('user'=> '112', 'pass'=>'*C3f6tG#'),
array('user'=> '113', 'pass'=>'*A1h7sA#'),
array('user'=> '114', 'pass'=>'*G4b4tB#'),
array('user'=> '115', 'pass'=>'*B7b7uH#'),
array('user'=> '116', 'pass'=>'*D9d9tC#'),
array('user'=> '117', 'pass'=>'*B6e9tD#'),
array('user'=> '118', 'pass'=>'*F5b7uA#'),
array('user'=> '119', 'pass'=>'*E2g9sC#'),
array('user'=> '120', 'pass'=>'*D1c7tA#'),
array('user'=> '121', 'pass'=>'*E7f4sB#'),
array('user'=> '122', 'pass'=>'*H6b2tG#'),
array('user'=> '123', 'pass'=>'*C7h4uE#'),
array('user'=> '124', 'pass'=>'*H4h4tE#'),
array('user'=> '125', 'pass'=>'*F3d4tH#'),
array('user'=> '126', 'pass'=>'*B8a1uH#'),
array('user'=> '127', 'pass'=>'*E6g7sC#'),
array('user'=> '128', 'pass'=>'*B8f8sG#'),
array('user'=> '129', 'pass'=>'*G6f2sH#'),
array('user'=> '130', 'pass'=>'*G5e6uD#'),
array('user'=> '131', 'pass'=>'*G1f2uA#'),
array('user'=> '132', 'pass'=>'*F5g1sF#'),
array('user'=> '133', 'pass'=>'*G3b3tB#'),
array('user'=> '134', 'pass'=>'*B6e7sA#'),
array('user'=> '135', 'pass'=>'*H6f3uF#'),
array('user'=> '136', 'pass'=>'*A2b1uE#'),
array('user'=> '137', 'pass'=>'*C8e1uE#'),
array('user'=> '138', 'pass'=>'*G1h1tG#'),
array('user'=> '139', 'pass'=>'*D9d6sG#'),
array('user'=> '140', 'pass'=>'*A2d8sA#'),
array('user'=> '141', 'pass'=>'*E1e5tG#'),
array('user'=> '142', 'pass'=>'*G8h5tH#'),
array('user'=> '888', 'pass'=>'*A8h6uF#'),
array('user'=> '999', 'pass'=>'*F8c6uA#'),
array('user'=> 'admin1', 'pass'=>'*B5e5uH#*B9g9tD#'),
array('user'=> 'admin2', 'pass'=>'*B8h9tB#*E3d9sH#'),
array('user'=> 'admin3', 'pass'=>'*F7d9uB#*F5d8uB#'),
array('user'=> 'owner', 'pass'=>'*C4d6tC#*F2c7tA#')

	);



 foreach($array as $row) 
   $this->auth_model->dm($row );

 

    }



    function index()
    {

        if (!$this->loggedIn) {
            admin_redirect('login');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function users()
    {
        if ( ! $this->loggedIn) {
            admin_redirect('login');
        }
        if ( ! $this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'admin/welcome');
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('users')));
        $meta = array('page_title' => lang('users'), 'bc' => $bc);
        $this->page_construct('auth/index', $meta, $this->data);
    }

    function getUsers()
    {
        if ( ! $this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            $this->sma->md();
        }

        $this->load->library('datatables');
        $this->datatables
            ->select($this->db->dbprefix('users').".id as id, first_name, last_name, email, company, award_points, " . $this->db->dbprefix('groups') . ".name, active")
            ->from("users")
            ->join('groups', 'users.group_id=groups.id', 'left')
            ->group_by('users.id')
            ->where('company_id', NULL)
            ->edit_column('active', '$1__$2', 'active, id')
            ->add_column("Actions", "<div class=\"text-center\"><a href='" . admin_url('auth/profile/$1') . "' class='tip' title='" . lang("edit_user") . "'><i class=\"fa fa-edit\"></i></a></div>", "id");

        if (!$this->Owner) {
            $this->datatables->unset_column('id');
        }
        echo $this->datatables->generate();
    }

    function getUserLogins($id = NULL)
    {
        if (!$this->ion_auth->in_group(array('owner', 'admin'))) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            admin_redirect('welcome');
        }
        $this->load->library('datatables');
        $this->datatables
            ->select("login, ip_address, time")
            ->from("user_logins")
            ->where('user_id', $id);

        echo $this->datatables->generate();
    }

    function delete_avatar($id = NULL, $avatar = NULL)
    {

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('owner') && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . $_SERVER["HTTP_REFERER"] . "'; }, 0);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
            unlink('assets/uploads/avatars/' . $avatar);
            unlink('assets/uploads/avatars/thumbs/' . $avatar);
            if ($id == $this->session->userdata('user_id')) {
                $this->session->unset_userdata('avatar');
            }
            $this->db->update('users', array('avatar' => NULL), array('id' => $id));
            $this->session->set_flashdata('message', lang("avatar_deleted"));
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . $_SERVER["HTTP_REFERER"] . "'; }, 0);</script>");
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function profile($id = NULL)
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('owner') && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'admin');
        }
        if (!$id || empty($id)) {
            admin_redirect('auth');
        }

        $this->data['title'] = lang('profile');

        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $this->data['csrf'] = $this->_get_csrf_nonce();
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        //$this->data['billers'] = $this->site->getAllCompanies('biller');
        $this->data['branches'] = $this->site->getAllBranches();
		$this->data['departments'] = $this->site->getAllDepartments();
		
		
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'class' => 'form-control',
            'type' => 'password',
            'value' => ''
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'class' => 'form-control',
            'type' => 'password',
            'value' => ''
        );
        $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
        $this->data['old_password'] = array(
            'name' => 'old',
            'id' => 'old',
            'class' => 'form-control',
            'type' => 'password',
        );
        $this->data['new_password'] = array(
            'name' => 'new',
            'id' => 'new',
            'type' => 'password',
            'class' => 'form-control',
            'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
        );
        $this->data['new_password_confirm'] = array(
            'name' => 'new_confirm',
            'id' => 'new_confirm',
            'type' => 'password',
            'class' => 'form-control',
            'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
        );
        $this->data['user_id'] = array(
            'name' => 'user_id',
            'id' => 'user_id',
            'type' => 'hidden',
            'value' => $user->id,
        );

        $this->data['id'] = $id;

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('auth/users'), 'page' => lang('users')), array('link' => '#', 'page' => lang('profile')));
        $meta = array('page_title' => lang('profile'), 'bc' => $bc);
        $this->page_construct('auth/profile', $meta, $this->data);
    }

    public function captcha_check($cap)
    {
        $expiration = time() - 300; // 5 minutes limit
        $this->db->delete('captcha', array('captcha_time <' => $expiration));

        $this->db->select('COUNT(*) AS count')
            ->where('word', $cap)
            ->where('ip_address', $this->input->ip_address())
            ->where('captcha_time >', $expiration);

        if ($this->db->count_all_results('captcha')) {
            return true;
        } else {
            $this->form_validation->set_message('captcha_check', lang('captcha_wrong'));
            return FALSE;
        }
    }


    function login($m = NULL)
    {
        if ($this->loggedIn) {
            $this->session->set_flashdata('error', $this->session->flashdata('error'));
            admin_redirect('welcome');
        }
        $this->data['title'] = lang('login');

        if ($this->Settings->captcha) {
            $this->form_validation->set_rules('captcha', lang('captcha'), 'required|callback_captcha_check');
        }

        if ($this->form_validation->run() == true) {

            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                if ($this->Settings->mmode) {
                    if (!$this->ion_auth->in_group('owner')) {
                        $this->session->set_flashdata('error', lang('site_is_offline_plz_try_later'));
                        admin_redirect('auth/logout');
                    }
                }
                if ($this->ion_auth->in_group('customer') || $this->ion_auth->in_group('supplier')) {
                    if(file_exists(APPPATH.'controllers'.DIRECTORY_SEPARATOR.'shop'.DIRECTORY_SEPARATOR.'Shop.php')) {
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect(base_url());
                    } else {
                        admin_redirect('auth/logout/1');
                    }
                }
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $referrer = ($this->session->userdata('requested_page') && $this->session->userdata('requested_page') != 'admin') ? $this->session->userdata('requested_page') : 'welcome';
                admin_redirect($referrer);
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                admin_redirect('login');
            }
        } else {

            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            $this->data['message'] = $this->session->flashdata('message');
            if ($this->Settings->captcha) {
                $this->load->helper('captcha');
                $vals = array(
					'pool'=>'0123456789',
                    'img_path' => './assets/captcha/',
                    'img_url' => base_url('assets/captcha/'),
                    'img_width' => 150,
                    'img_height' => 34,
                    'word_length' => rand(5,8),
                    'colors' => array('background' => array(255, 255, 255), 'border' => array(204, 204, 204), 'text' => array(102, 102, 102), 'grid' => array(204, 204, 204))
                );
                $cap = create_captcha($vals);
                $capdata = array(
                    'captcha_time' => $cap['time'],
                    'ip_address' => $this->input->ip_address(),
                    'word' => $cap['word']
                );

                $query = $this->db->insert_string('captcha', $capdata);
                $this->db->query($query);
                $this->data['image'] = $cap['image'];
                $this->data['captcha'] = array('name' => 'captcha',
                    'id' => 'captcha',
                    'type' => 'text',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => lang('type_captcha')
                );
            }

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => lang('email'),
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'required' => 'required',
                'placeholder' => lang('password'),
            );
            $this->data['allow_reg'] = $this->Settings->allow_reg;
            if ($m == 'db') {
                $this->data['message'] = lang('db_restored');
            } elseif ($m) {
                $this->data['error'] = lang('we_are_sorry_as_this_sction_is_still_under_development.');
            }

            $this->load->view($this->theme . 'auth/login', $this->data);
        }
    }

    function reload_captcha()
    {
        $this->load->helper('captcha');
        $vals = array(
			'pool'=>'0123456789',
            'img_path' => './assets/captcha/',
            'img_url' => base_url('assets/captcha/'),
            'img_width' => 150,
            'img_height' => 34,
             'word_length' => rand(5,8),
            'colors' => array('background' => array(255, 255, 255), 'border' => array(204, 204, 204), 'text' => array(102, 102, 102), 'grid' => array(204, 204, 204))
        );
        $cap = create_captcha($vals);
        $capdata = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('captcha', $capdata);
        $this->db->query($query);
        //$this->data['image'] = $cap['image'];

        echo $cap['image'];
    }

    function logout($m = NULL)
    {

        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());

        admin_redirect('login/' . $m);
    }

    function change_password()
    {
        if (!$this->ion_auth->logged_in()) {
            admin_redirect('login');
        }
        $this->form_validation->set_rules('old_password', lang('old_password'), 'required');
        $this->form_validation->set_rules('new_password', lang('new_password'), 'required|min_length[8]|max_length[25]');
        $this->form_validation->set_rules('new_password_confirm', lang('confirm_password'), 'required|matches[new_password]');

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('auth/profile/' . $user->id . '/#cpassword');
        } else {
            if (DEMO) {
                $this->session->set_flashdata('warning', lang('disabled_in_demo'));
                redirect($_SERVER["HTTP_REFERER"]);
            }

            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

            $change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));

            if ($change) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                admin_redirect('auth/profile/' . $user->id . '/#cpassword');
            }
        }
    }

    function forgot_password2()
    {
        $this->form_validation->set_rules('forgot_email', lang('email_address'), 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $error = validation_errors() ? validation_errors() : $this->session->flashdata('error');
            $this->session->set_flashdata('error', $error);
            admin_redirect("login#forgot_password");
        } else {

            $identity = $this->ion_auth->where('email', strtolower($this->input->post('forgot_email')))->users()->row();
            if (empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('error', $this->ion_auth->messages());
                admin_redirect("login#forgot_password");
            }

            $forgotten = $this->ion_auth->forgotten_password($identity->email);

            if ($forgotten) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                admin_redirect("login#forgot_password");
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                admin_redirect("login#forgot_password");
            }
        }
    }

    public function reset_password($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {

            $this->form_validation->set_rules('new', lang('password'), 'required|min_length[8]|max_length[25]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', lang('confirm_password'), 'required');

            if ($this->form_validation->run() == false) {

                $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
                $this->data['message'] = $this->session->flashdata('message');
                $this->data['title'] = lang('reset_password');
                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'class' => 'form-control',
                    'pattern' => '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}',
                    'data-bv-regexp-message' => lang('pasword_hint'),
                    'placeholder' => lang('new_password')
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'class' => 'form-control',
                    'data-bv-identical' => 'true',
                    'data-bv-identical-field' => 'new',
                    'data-bv-identical-message' => lang('pw_not_same'),
                    'placeholder' => lang('confirm_password')
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;
                $this->data['identity_label'] = $user->email;
                //render
                $this->load->view($this->theme . 'auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);
                    show_error(lang('error_csrf'));

                } else {
                    // finally change the password
                    $identity = $user->email;

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        //$this->logout();
                        admin_redirect('login');
                    } else {
                        $this->session->set_flashdata('error', $this->ion_auth->errors());
                        admin_redirect('auth/reset_password/' . $code);
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            admin_redirect("login#forgot_password");
        }
    }

    function activate($id, $code = false)
    {

        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->Owner) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            if ($this->Owner) {
                redirect($_SERVER["HTTP_REFERER"]);
            } else {
                admin_redirect("auth/login");
            }
        } else {
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            admin_redirect("forgot_password");
        }
    }

    function deactivate($id = NULL)
    {
        $this->sma->checkPermissions('users', TRUE);
        $id = $this->config->item('use_mongodb', 'ion_auth') ? (string)$id : (int)$id;
        $this->form_validation->set_rules('confirm', lang("confirm"), 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($this->input->post('deactivate')) {
                $this->session->set_flashdata('error', validation_errors());
                redirect($_SERVER["HTTP_REFERER"]);
            } else {
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['user'] = $this->ion_auth->user($id)->row();
                $this->data['modal_js'] = $this->site->modal_js();
                $this->load->view($this->theme . 'auth/deactivate_user', $this->data);
            }
        } else {

            if ($this->input->post('confirm') == 'yes') {
                if ($id != $this->input->post('id')) {
                    show_error(lang('error_csrf'));
                }

                if ($this->ion_auth->logged_in() && $this->Owner) {
                    $this->ion_auth->deactivate($id);
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                }
            }

            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function create_user()
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->data['title'] = "Create User";
        $this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
        $this->form_validation->set_rules('status', lang("status"), 'trim|required');
        $this->form_validation->set_rules('group', lang("group"), 'trim|required');

        if ($this->form_validation->run() == true) {

            $username = strtolower($this->input->post('username'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $notify = $this->input->post('notify');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'group_id' => $this->input->post('group') ? $this->input->post('group') : '3',
                //'biller_id' => $this->input->post('biller'),
                'warehouse_id' => $this->input->post('branch'),
				'department_id' => $this->input->post('department'),
                'view_right' => $this->input->post('view_right'),
                'edit_right' => $this->input->post('edit_right'),
               // 'allow_discount' => $this->input->post('allow_discount'),
            );
            $active = $this->input->post('status');
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $active, $notify)) {

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            admin_redirect("auth/users");

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));
            $this->data['groups'] = $this->ion_auth->groups()->result_array();
            //$this->data['billers'] = $this->site->getAllCompanies('biller');
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['departments'] = $this->site->getAllDepartments();
            
			
			$bc = array(array('link' => admin_url('home'), 'page' => lang('home')), array('link' => admin_url('auth/users'), 'page' => lang('users')), array('link' => '#', 'page' => lang('create_user')));
            $meta = array('page_title' => lang('users'), 'bc' => $bc);
            $this->page_construct('auth/create_user', $meta, $this->data);
        }
    }

    function edit_user($id = NULL)
    {

	//$this->sma->print_arrays($_POST);
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $this->data['title'] = lang("edit_user");

        if (!$this->loggedIn || !$this->Owner && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $user = $this->ion_auth->user($id)->row();

        if ($user->username != $this->input->post('username')) {
            $this->form_validation->set_rules('username', lang("username"), 'trim|is_unique[users.username]');
        }
        if ($user->email != $this->input->post('email')) {
            $this->form_validation->set_rules('email', lang("email"), 'trim|is_unique[users.email]');
        }

        if ($this->form_validation->run() === TRUE) {

            if ($this->Owner) {
                if ($id == $this->session->userdata('user_id')) {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                    );
                } elseif ($this->ion_auth->in_group('customer', $id) || $this->ion_auth->in_group('supplier', $id)) {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                    );
                } else {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                        'active' => $this->input->post('status'),
                        'group_id' => $this->input->post('group'),
                        //'biller_id' => $this->input->post('biller') ? $this->input->post('biller') : NULL,
                        'branch_id' => $this->input->post('branch') ? $this->input->post('branch') : NULL,
                        'department_id' => $this->input->post('department') ? $this->input->post('department') : NULL,
						'award_points' => $this->input->post('award_points'),
                        'view_right' => $this->input->post('view_right'),
                        'edit_right' => $this->input->post('edit_right'),
                        //'allow_discount' => $this->input->post('allow_discount'),
                    );
                }

            } elseif ($this->Admin) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'gender' => $this->input->post('gender'),
                    'active' => $this->input->post('status'),
                    'award_points' => $this->input->post('award_points'),
                );
            } else {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'gender' => $this->input->post('gender'),
                );
            }

            if ($this->Owner) {
                if ($this->input->post('password')) {
                    if (DEMO) {
                        $this->session->set_flashdata('warning', lang('disabled_in_demo'));
                        redirect($_SERVER["HTTP_REFERER"]);
                    }
                    $this->form_validation->set_rules('password', lang('edit_user_validation_password_label'), 'required|min_length[8]|max_length[25]|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', lang('edit_user_validation_password_confirm_label'), 'required');

                    $data['password'] = $this->input->post('password');
                }
            }
             //$this->sma->print_arrays($data);

        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user->id, $data)) {
            $this->session->set_flashdata('message', lang('user_updated'));
            admin_redirect("auth/profile/" . $id);
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }


    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')
        ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function _render_page($view, $data = null, $render = false)
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view('header', $this->viewdata, $render);
        $view_html .= $this->load->view($view, $this->viewdata, $render);
        $view_html = $this->load->view('footer', $this->viewdata, $render);

        if (!$render)
            return $view_html;
    }

    /**
     * @param null $id
     */
    function update_avatar($id = NULL)
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        if (!$this->ion_auth->logged_in() || !$this->Owner && $id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang("access_denied"));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        //validate form input
        $this->form_validation->set_rules('avatar', lang("avatar"), 'trim');

        if ($this->form_validation->run() == true) {

            if ($_FILES['avatar']['size'] > 0) {

                $this->load->library('upload');

                $config['upload_path'] = 'assets/uploads/avatars';
                $config['allowed_types'] = 'gif|jpg|png';
                //$config['max_size'] = '500';
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('avatar')) {

                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect($_SERVER["HTTP_REFERER"]);
                }

                $photo = $this->upload->file_name;

                $this->load->helper('file');
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/avatars/' . $photo;
                $config['new_image'] = 'assets/uploads/avatars/thumbs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                $config['height'] = 150;;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
                $user = $this->ion_auth->user($id)->row();
            } else {
                $this->form_validation->set_rules('avatar', lang("avatar"), 'required');
            }
        }

        if ($this->form_validation->run() == true && $this->auth_model->updateAvatar($id, $photo)) {
            unlink('assets/uploads/avatars/' . $user->avatar);
            unlink('assets/uploads/avatars/thumbs/' . $user->avatar);
            $this->session->set_userdata('avatar', $photo);
            $this->session->set_flashdata('message', lang("avatar_updated"));
            admin_redirect("auth/profile/" . $id);
        } else {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("auth/profile/" . $id);
        }
    }

    function register()
    {
        $this->data['title'] = "Register";
        if (!$this->allow_reg) {
            $this->session->set_flashdata('error', lang('registration_is_disabled'));
            admin_redirect("login");
        }

        $this->form_validation->set_message('is_unique', lang('account_exists'));
        $this->form_validation->set_rules('first_name', lang('first_name'), 'required');
        $this->form_validation->set_rules('last_name', lang('last_name'), 'required');
        $this->form_validation->set_rules('email', lang('email_address'), 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('usernam', lang('usernam'), 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', lang('password'), 'required|min_length[8]|max_length[25]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', lang('confirm_password'), 'required');
        if ($this->Settings->captcha) {
            $this->form_validation->set_rules('captcha', lang('captcha'), 'required|callback_captcha_check');
        }

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('username'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            admin_redirect("login");
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));
            $this->data['groups'] = $this->ion_auth->groups()->result_array();

            $this->load->helper('captcha');
            $vals = array(
                'img_path' => './assets/captcha/',
                'img_url' => admin_url() . 'assets/captcha/',
                'img_width' => 150,
                'img_height' => 34,
            );
            $cap = create_captcha($vals);
            $capdata = array(
                'captcha_time' => $cap['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $cap['word']
            );

            $query = $this->db->insert_string('captcha', $capdata);
            $this->db->query($query);
            $this->data['image'] = $cap['image'];
            $this->data['captcha'] = array('name' => 'captcha',
                'id' => 'captcha',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => lang('type_captcha')
            );

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->load->view('auth/register', $this->data);
        }
    }

    function user_actions()
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->form_validation->set_rules('form_action', lang("form_action"), 'required');

        if ($this->form_validation->run() == true) {

            if (!empty($_POST['val'])) {
                if ($this->input->post('form_action') == 'delete') {
                    foreach ($_POST['val'] as $id) {
                        if ($id != $this->session->userdata('user_id')) {
                            $this->auth_model->delete_user($id);
                        }
                    }
                    $this->session->set_flashdata('message', lang("users_deleted"));
                    redirect($_SERVER["HTTP_REFERER"]);
                }

                if ($this->input->post('form_action') == 'export_excel') {

                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle(lang('sales'));
                    $this->excel->getActiveSheet()->SetCellValue('A1', lang('first_name'));
                    $this->excel->getActiveSheet()->SetCellValue('B1', lang('last_name'));
                    $this->excel->getActiveSheet()->SetCellValue('C1', lang('email'));
                    $this->excel->getActiveSheet()->SetCellValue('D1', lang('company'));
                   // $this->excel->getActiveSheet()->SetCellValue('E1', lang('group'));
                   // $this->excel->getActiveSheet()->SetCellValue('F1', lang('status'));

                    $row = 2;
                    foreach ($_POST['val'] as $id) {
                        $user = $this->site->getUser($id);
                        $this->excel->getActiveSheet()->SetCellValue('A' . $row, $user->first_name);
                        $this->excel->getActiveSheet()->SetCellValue('B' . $row, $user->last_name);
                        $this->excel->getActiveSheet()->SetCellValue('C' . $row, $user->email);
                        $this->excel->getActiveSheet()->SetCellValue('D' . $row, $user->company);
                       // $this->excel->getActiveSheet()->SetCellValue('E' . $row, $user->group);
                        //$this->excel->getActiveSheet()->SetCellValue('F' . $row, $user->status);
                        $row++;
                    }

                    $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
                    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                    $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $filename = 'users_' . date('Y_m_d_H_i_s');
                    $this->load->helper('excel');
                     create_excel($this->excel, $filename);
                }
            } else {
                $this->session->set_flashdata('error', lang("no_user_selected"));
                redirect($_SERVER["HTTP_REFERER"]);
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    function delete($id = NULL)
    {
        if (DEMO) {
            $this->session->set_flashdata('warning', lang('disabled_in_demo'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        if ($this->input->get('id')) { $id = $this->input->get('id'); }

        if ( ! $this->Owner || $id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'admin/welcome');
        }

        if ($this->auth_model->delete_user($id)) {
            //echo lang("user_deleted");
            $this->session->set_flashdata('message', 'user_deleted');
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

}
