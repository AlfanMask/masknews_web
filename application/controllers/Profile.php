<?php

class Profile extends CI_Controller{

	public function __construct(){
		parent::__construct();

		// load libraries, models, etc
		$this->load->model('model_user');
		$this->load->library('form_validation');
	}

	// default function of Profile class
	public function index(){
		// get user data
		$userid			= $this->session->userdata('userid');
		$data['user']	= $this->model_user->getUserData('tb_user',$userid)->result_array()[0];

		// load views
		$this->load->view('templates/header');
		$this->load->view('profile',$data);
		$this->load->view('templates/footer');
	
	}

	// update profile: admin
	public function updateProfileAdmin(){
		// get input datas
		// account inputs
		$id 				= $this->input->post('id');
		$username		= $this->input->post('username');
		$email			= $this->input->post('email');
		$password_1	= $this->input->post('password_1');
		$password_2 = $this->input->post('password_2');
		$role 			= $this->input->post('role');
		// bio inputs
		$image			= $_FILES['image'];
		$bio_name		= $this->input->post('name');
		$bio_desc		= $this->input->post('desc');
		$bio_age		= $this->input->post('age');
		$bio_address= $this->input->post('address');
		$bio_hobby	= $this->input->post('hobby');

		// image encrypt
    $_FILES['image']['name'] !== '' ? $image = uniqid().str_replace(' ','_',strtolower($image['name'])) : $image = '';
    // set image to old image
		$userid			= $this->session->userdata('userid');
		$user				= $this->model_user->getUserData('tb_user',$userid)->result_array()[0];
		$image_old 	= $user['image'];

		// form validations account data
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('password_1','Password','required|min_length[12]');
    $this->form_validation->set_rules('password_2','Repeated Password','required|matches[password_1]');

    // form validations bio data
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('desc','Description','required');
    $this->form_validation->set_rules('age','Age','required|numeric');
    $this->form_validation->set_rules('address','Address','required');
    $this->form_validation->set_rules('hobby','Hobby','required');

    // if form has no error -> continue
    if($this->form_validation->run() == false){
    		// session for showing error messages
        $this->session->set_flashdata('update_profile',
        	'<div class="badge badge-danger mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
        );
        
        redirect(base_url('profile'));

    } else {
    	// if there is any file uploaded
    	if($image != ''){
    		// delete image old
        $delete_path = $_SERVER['DOCUMENT_ROOT'].'/maskblog/uploads/admins/'.$image_old;
        unlink($delete_path);

	      // image validation
	      $config['upload_path']      = './uploads/admins/';
	      $config['allowed_types']    = 'jpg|jpeg|png|gif';
	      $config['file_name']        = $image;
	      $config['overwrite']        = true;
	      $this->load->library('upload',$config);

	      // if failed upload image
	      if(!$this->upload->do_upload('image')){
	          $this->session->set_flashdata('update_profile',
	        		'<div class="badge badge-danger mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
	        	);

						redirect(base_url('profile'));

	      } else {
	      	// put datas
		    	$data = [
						'id'					=> $id,
						'username'		=> $username,
						'email'				=> $email,
						'password'		=> $password_1,
						'role'				=> $role,
						'image'				=> $image,
						'bio_name'		=> $bio_name,
						'bio_desc'		=> $bio_desc,
						'bio_age'			=> $bio_age,
						'bio_address'	=> $bio_address,
						'bio_hobby'		=> $bio_hobby
					];

					// update into tb_user
					if($this->model_user->updateUser('tb_user',$data)){
						$this->session->set_flashdata('update_profile',
		          '<div class="badge badge-success mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Updated Successfully.</h5></div>'
		        );
		        redirect(base_url('profile/index'));
					}	else {
						$this->session->set_flashdata('update_profile',
		        	'<div class="badge badge-danger mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
		        );
		        redirect(base_url('profile/index'));
					}

				}
			
			// if there are NO any file uploaded
    	} else {
    		// put datas
    		$data = [
						'id'					=> $id,
						'username'		=> $username,
						'email'				=> $email,
						'password'		=> $password_1,
						'role'				=> $role,
						'image'				=> $image_old,
						'bio_name'		=> $bio_name,
						'bio_desc'		=> $bio_desc,
						'bio_age'			=> $bio_age,
						'bio_address'	=> $bio_address,
						'bio_hobby'		=> $bio_hobby
					];

					// update into tb_user
					if($this->model_user->updateUser('tb_user',$data)){
						$this->session->set_flashdata('update_profile',
		          '<div class="badge badge-success mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Updated Successfully.</h5></div>'
		        );
		        redirect(base_url('profile/index'));
					}	else {
						$this->session->set_flashdata('update_profile',
		        	'<div class="badge badge-danger mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
		        );
		        redirect(base_url('profile/index'));
					}
    	}


    }

	}

	// update profile: admin
	public function updateProfileUser(){
		// get input datas
		// account data
		$id 				= $this->input->post('id');
		$username		= $this->input->post('username');
		$email			= $this->input->post('email');
		$password_1	= $this->input->post('password_1');
		$password_2 = $this->input->post('password_2');
		$role 			= $this->input->post('role');

		// form validations account data
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('password_1','Password','required|min_length[12]');
    $this->form_validation->set_rules('password_2','Repeated Password','required|matches[password_1]');

    // if form has no error -> continue
    if($this->form_validation->run() == false){
    	// session for showing error messages
        $this->session->set_flashdata('update_profile',
        	'<div class="badge badge-danger mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
        );
        
        redirect(base_url('profile'));

    } else {
    	// put datas
  		$data = [
				'id'					=> $id,
				'username'		=> $username,
				'email'				=> $email,
				'password'		=> $password_1,
				'role'				=> $role,
				'image'				=> 'default.png',
				'bio_name'		=> '',
				'bio_desc'		=> '',
				'bio_age'			=> '',
				'bio_address'	=> '',
				'bio_hobby'		=> ''
			];

			// update into tb_user
			if($this->model_user->updateUser('tb_user',$data)){
				$this->session->set_flashdata('update_profile',
          '<div class="badge badge-success mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Updated Successfully.</h5></div>'
        );
        redirect(base_url('profile/index'));
			}	else {
				$this->session->set_flashdata('update_profile',
        	'<div class="badge badge-danger mt-4 mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Profile Update Failed!</h5></div>'
        );
        redirect(base_url('profile/index'));
			}
			
    }

	}

}
