<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'auth/login' => array(
        array(
            'field' => 'identity',
            'label' => lang('username'),
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => lang('password'),
            'rules' => 'required'
        )
    ),
    'auth/create_user' => array(
        array(
            'field' => 'first_name',
            'label' => lang('first_name'),
            'rules' => 'required'
        ),
        array(
            'field' => 'last_name',
            'label' => lang('last_name'),
            'rules' => 'required'
        ),
        array(
            'field' => 'username',
            'label' => lang('username'),
            'rules' => 'required|alpha_dash'
        ),
        array(
            'field' => 'email',
            'label' => lang('email'),
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'phone',
            'label' => lang('phone'),
            'rules' => 'required'
        ),
        array(
            'field' => 'company',
            'label' => lang('company'),
            'rules' => 'required'
        ),
        array(
            'field' => 'gender',
            'label' => lang('gender'),
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => lang('password'),
            'rules' => 'required|min_length[7]|max_length[20]'
        ),
        array(
            'field' => 'confirm_password',
            'label' => lang('confirm_password'),
            'rules' => 'required|min_length[7]|max_length[20]|matches[password]'
        ),
    ),
    'auth/edit_user' => array(
        array(
            'field' => 'first_name',
            'label' => lang('first_name'),
            'rules' => 'required'
        ),
        array(
            'field' => 'last_name',
            'label' => lang('last_name'),
            'rules' => 'required'
        ),
        array(
            'field' => 'username',
            'label' => lang('username'),
            'rules' => 'required|alpha_dash'
        ),
        array(
            'field' => 'email',
            'label' => lang('email'),
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'phone',
            'label' => lang('phone'),
            'rules' => 'required'
        ),
        array(
            'field' => 'company',
            'label' => lang('company'),
            'rules' => 'required'
        ),
        array(
            'field' => 'gender',
            'label' => lang('gender'),
            'rules' => 'required'
        ),
    ),
    'manpower/add' => array(
        array(
            'field' => 'name',
            'label' => lang('manpower_name'),
            'rules' => 'trim|min_length[2]|max_length[100]|required|alpha_dash'
        ),
        
        array(
            'field' => 'sessionyear',
            'label' => 'sessionyear',
            'rules' => 'required'
        ),
        array(
            'field' => 'studentlife',
            'label' => 'studentlife',
            'rules' => 'required'
        ),
        array(
            'field' => 'education',
            'label' => 'education',
            'rules' => 'required'
        ) 
    ),
    'companies/add' => array(
        array(
            'field' => 'name',
            'label' => lang('contact_person'),
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'company',
            'label' => lang('company'),
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => lang('email_address'),
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'address',
            'label' => lang('address'),
            'rules' => 'required'
        ),
        array(
            'field' => 'city',
            'label' => lang('city'),
            'rules' => 'required'
        ),
        array(
            'field' => 'phone',
            'label' => lang('phone'),
            'rules' => 'required'
        )
    ),
    'companies/add_user' => array(
        array(
            'field' => 'first_name',
            'label' => lang('first_name'),
            'rules' => 'required'
        ),
        array(
            'field' => 'last_name',
            'label' => lang('last_name'),
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => lang('email'),
            'rules' => 'required|valid_email'
        )
    ),
);

