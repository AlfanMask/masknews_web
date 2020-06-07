<?php

class Auth extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // load libraries, models, etc
        $this->load->model('model_user');
        $this->load->library('form_validation');
    }

    // login function -> go to view
    public function login(){
        // load views
        $this->load->view('templates/header');
        $this->load->view('login');
        $this->load->view('templates/footer');

    }

    // login function -> go to view
    public function signup(){
        // load views
        $this->load->view('templates/header');
        $this->load->view('signup');
        $this->load->view('templates/footer');

    }

    // check_login (login) function -> action
    public function check_login(){
        // get datas from inputs
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        // check from tb_user, is there any data match with inputs
        $user = $this->model_user->check_login($email,$password,'tb_user');

        // check if $user true (matched) or false (doesn't matched any data)
        if($user != null){
            // make sessions
            $this->session->set_userdata('userid',$user[0]['id']);
            $this->session->set_userdata('username',$user[0]['username']);
            $this->session->set_userdata('email',$user[0]['email']);
            $this->session->set_userdata('role',$user[0]['role']);

            // go to home page
            redirect(base_url());

        } else {
            // show error message
            $this->session->set_flashdata('register',
                    '<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Email or password wrong!</h5></div>'
            );
            // go to login page (restart)
            redirect(base_url('auth/login'));

        }

    }

    // register (signup) function -> action
    public function register(){
        // get datas from inputs
        $username   = $this->input->post('username');
        $email      = $this->input->post('email');
        $password_1 = $this->input->post('password_1');
        $password_2 = $this->input->post('password_2');

        // form validations
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password_1','Password','required|min_length[12]');
        $this->form_validation->set_rules('password_2','Repeated Password','required|matches[password_1]');

        // if form has no error -> continue
        if($this->form_validation->run() == false){
            // error -> load views (restarted)
            $this->load->view('templates/header');
            $this->load->view('signup');
            $this->load->view('templates/footer');

        } else {
            // put datas
            $data = [
                'id'        => null,
                'username'  => $username,
                'email'     => $email,
                'password'  => $password_1,
                'role'      => 0,
                'image'     => 'default.png',
                'bio_name'  => '',
                'bio_desc'  => '',
                'bio_age'   => 0,
                'bio_address'=> '',
                'bio_hobby' => ''
            ];

            // insert data into tb_user
            if($this->model_user->add($data,'tb_user')){
                $this->session->set_flashdata('register',
                    '<div class="badge badge-success mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Account Registered Successfully. You can login now!</h5></div>'
                );
                redirect(base_url('auth/login'));
            } else {
                $this->session->set_flashdata('register',
                    '<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Account Registration Failed!</h5></div>'
                );
                redirect(base_url('auth/signup'));
            }

        }

    }

    // logout function
    public function logout(){
        // remove all sessions
        $this->session->sess_destroy();

        // go to home page
        redirect(base_url());

    }

}