<?php

class Profile extends CI_Controller{

	public function __construct(){
		parent::__construct();

		// loads
		$this->load->model('model_user');
		$this->load->library('form_validation');
	}

	public function index(){
		$userid			= $this->session->userdata('userid');
		$data['user']	= $this->model_user->getUserData('tb_user',$userid)->result_array()[0];

		// load views
		$this->load->view('templates/header');
		$this->load->view('profile',$data);
		$this->load->view('templates/footer');
	
	}

	public function changeImage(){

	}

	public function updateProfile(){
		// get input datas
		$id 				= $this->input->post('id');
		$username		= $this->input->post('username');
		$email			= $this->input->post('email');
		$password_1	= $this->input->post('password_1');
		$password_2 = $this->input->post('password_2');
		$role 			= $this->input->post('role');

		// form validations
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('password_1','Password','required|min_length[12]');
    $this->form_validation->set_rules('password_2','Repeated Password','required|matches[password_1]');

    // check validation
    if($this->form_validation->run() == false){
        $this->session->set_flashdata('update_profile',
        	'<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
        );
        redirect('profile');

    } else {
    	$data = [
				'id'				=> $id,
				'username'	=> $username,
				'email'			=> $email,
				'password'	=> $password_1,
				'role'			=> $role
			];


			// update into tb
			if($this->model_user->updateUser('tb_user',$data)){
				$this->session->set_flashdata('update_profile',
          '<div class="badge badge-success mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Updated Successfully.</h5></div>'
        );
        redirect(base_url('profile/index'));
			}	else {
				$this->session->set_flashdata('update_profile',
        	'<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
        );
        redirect(base_url('profile/index'));
			}

    }

	}

}
