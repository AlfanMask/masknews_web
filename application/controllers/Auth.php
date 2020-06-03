<?php

class Auth extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // loads
        $this->load->model('model_user');
        $this->load->library('form_validation');
    }

    public function login(){
        $this->load->view('templates/header');
        $this->load->view('login');
        $this->load->view('templates/footer');

    }

    public function signup(){
        $this->load->view('templates/header');
        $this->load->view('signup');
        $this->load->view('templates/footer');

    }

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

        // check validation
        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('signup');
            $this->load->view('templates/footer');

        } else {
            // put datas
            $data = [
                'id'        => '',
                'username'  => $username,
                'email'     => $email,
                'password'  => $password_1,
                'role'      => 0 
            ];

            // insert tb_user
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
    
    public function check_login(){
        // get datas from inputs
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        // check from tb_user
        $user = $this->model_user->check_login($email,$password,'tb_user');
        if($user != null){
            // make session
            $this->session->set_userdata('userid',$user[0]['id']);
            $this->session->set_userdata('username',$user[0]['username']);
            $this->session->set_userdata('email',$user[0]['email']);
            $this->session->set_userdata('role',$user[0]['role']);
            redirect(base_url());
        } else {
            $this->session->set_flashdata('register',
                    '<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Email or password wrong!</h5></div>'
            );
            redirect(base_url('auth/login'));
        }

    }

    public function logout(){
        // remove session
        $this->session->sess_destroy();

        redirect(base_url());

    }


}