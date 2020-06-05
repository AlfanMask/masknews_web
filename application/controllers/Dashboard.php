<?php

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // loads
        $this->load->model('model_blog');
        $this->load->model('model_user');
        $this->load->library('form_validation');
        $this->load->library('pagination');

    }

    public function index($idp){
        // check wheter admin or not
        if($this->session->userdata('role') != 1){
            redirect(base_url());
        }

        // get blog datas
        $all_blogs      = $this->model_blog->get_all_blog('tb_blog')->result_array();
        
        // setup pagination        
        $total_data     = sizeof($all_blogs);
        $data_perpage   = 5;
        $total_pages    = ceil($total_data/$data_perpage);
        $first_index    = ($idp * $data_perpage) - $data_perpage;
        $last_index     = $first_index + ($data_perpage - 1);

        // if last_index calculation is greater than last_index of real data
        // set last_index to the real last_index from data
        if($last_index >= ($total_data - 1)){
            $last_index = ($total_data - 1);
        }

        $data['idp']                = $idp;
        $data['total_pages']        = $total_pages;
        $data['first_num']          = $first_index + 1;
        $data['blogs_pagination']   = array();
        for($i = $first_index; $i <= $last_index; $i++){
            array_push($data['blogs_pagination'],$all_blogs[$i]);
        }

        // load views
        $this->load->view('templates/header');
        $this->load->view('dashboard/dashboard',$data);
        $this->load->view('templates/footer');

    }

    public function add(){
        // load views
        $this->load->view('templates/header');
        $this->load->view('dashboard/add');
        $this->load->view('templates/footer');

    }

    public function add_blog(){
        // get datas from inputs
        $title      = $this->input->post('title');
        $category   = $this->input->post('category');
        $article    = $this->input->post('article');
        $image      = $_FILES['image'];
        $date       = date('M d, Y ');
        $writer     = $this->session->userdata('username');

        // image encrypt
        $image = str_replace(' ','_',uniqid().strtolower($image['name']));

        // form validations
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('article','Article','required');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('title_blog',$title);
            $this->session->set_flashdata('article_blog',$article);
            if($category == ''){
                $this->session->set_flashdata('add_blog',
                    '<div class="mb-3 pl-2 pr-2 col-12"><p class="text-danger">You must select article category!</p></div>'
                );
            }
            // load views
            $this->load->view('templates/header');
            $this->load->view('dashboard/add');
            $this->load->view('templates/footer');

        } else {
            // if haven't select category yet 
            if($category == ''){
                $this->session->set_flashdata('add_blog',
                    '<div class="mb-3 pl-2 pr-2 col-12"><p class="text-danger">You must select article category!</p></div>'
                );
                $this->session->set_flashdata('title_blog',$title);
                $this->session->set_flashdata('article_blog',$article);
                // load views
                $this->load->view('templates/header');
                $this->load->view('dashboard/add');
                $this->load->view('templates/footer');
            } else {
                // image validation
                $config['upload_path']      = './uploads/';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['file_name']        = $image;
                $config['overwrite']        = true;
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('image')){
                    $this->session->set_flashdata('add_blog','<div class="mb-3 pl-2 pr-2 col-12"><p class="text-danger">'.$this->upload->display_errors().'</p></div>'
                    );
                    $this->session->set_flashdata('title_blog',$title);
                    $this->session->set_flashdata('article_blog',$article);
                    // load views
                    $this->load->view('templates/header');
                    $this->load->view('dashboard/add');
                    $this->load->view('templates/footer');

                } else {
                    // put datas
                    $blog = [
                        'title'     => $title,
                        'category'  => $category,
                        'article'   => $article,
                        'image'     => $image,
                        'date'      => $date,
                        'writer'    => $writer
                    ];

                    if($this->model_blog->add_blog('tb_blog',$blog)){
                        $this->session->set_flashdata('add_blog',
                            '<div class="badge badge-success mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Article Added Successfully!</h5></div>'
                        );
                        redirect(base_url('dashboard'));
                    } else {
                        $this->session->set_flashdata('add_blog',
                            '<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Failed to Add Article!</h5></div>'
                        );
                        redirect(base_url('dashboard'));
                    }

                }
                
            }
            

        }

    }

    public function view($id){
        $data['id']               = $id;
        $data['blog']             = $this->model_blog->get_blog('tb_blog',$id)[0];
        $data['blog_headers']     = $this->model_blog->get_blog_headers('tb_blog');
        $data['parent_comments']  = $this->model_blog->get_all_comments_by_status('tb_komen','0',$id)->result_array(); 
        $data['child_comments']   = $this->model_blog->get_all_comments('tb_komen',$id)->result_array();
        $user_role_admin = (array) $this->model_user->getAdmin('tb_user','1')->result_array();   
        $user_role_admin_allfield = (array) $this->model_user->getAdminAllFields('tb_user','1')->result_array();   

        $data['user_role_admin'] = array();
        foreach ($user_role_admin as $admin) {
          array_push($data['user_role_admin'],$admin['username']);
        }

        // get writer image, desc, and bios
        foreach($user_role_admin_allfield as $admin){
          if($data['blog']['writer'] == $admin['username']){
            $data['writer']       = $admin['image'];
            $data['bio_name']     = $admin['bio_name'];
            $data['bio_desc']     = $admin['bio_desc'];
            $data['bio_age']      = $admin['bio_age'];
            $data['bio_address']  = $admin['bio_address'];
            $data['bio_hobby']    = $admin['bio_hobby'];
          }

        }

        // popular posts
        $data['blogs'] = $this->model_blog->get_all_blog('tb_blog')->result_array();
        // sort popular posts
        $views = array();
        for ($i = 0; $i < sizeof($data['blogs']); $i++) {
          array_push($views,$data['blogs'][$i]['view']);
        }
        
        rsort($views);
        
        $popular_1  = $this->model_blog->getPopularBlog('tb_blog',$views[0]);
        $popular_2  = $this->model_blog->getPopularBlog('tb_blog',$views[1]);
        $popular_3  = $this->model_blog->getPopularBlog('tb_blog',$views[2]);

        $data['populars'] = [$popular_1,$popular_2,$popular_3];
        // end of popular posts sorting

        // load views
        $this->load->view('templates/header');
        $this->load->view('dashboard/blog',$data);
        $this->load->view('templates/footer');

    }

    public function edit($id){
        // get blog data by id
        $data['blog'] = $this->model_blog->get_blog('tb_blog',$id)[0];

        // load views
        $this->load->view('templates/header');
        $this->load->view('dashboard/edit',$data);
        $this->load->view('templates/footer');

    }

    public function update_blog(){
        // get datas from inputs
        $id         = $this->input->post('id');
        $title      = $this->input->post('title');
        $category   = $this->input->post('category');
        $article    = $this->input->post('article');
        $image      = $_FILES['image'];
        $date       = date('M d, Y ');
        $writer     = $this->session->userdata('username');

        // image encrypt
        $_FILES['image']['name'] !== '' ? $image = uniqid().str_replace(' ','_',strtolower($image['name'])) : $image = '';

        // get blog data by id (needed in get data when category not selected)
        $data['blog'] = $this->model_blog->get_blog('tb_blog',$id)[0];

        // form validations
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('article','Article','required');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('title_blog',$title);
            $this->session->set_flashdata('article_blog',$article);
            if($category == ''){
                $this->session->set_flashdata('add_blog',
                    '<div class="mb-3 pl-2 pr-2 col-12"><p class="text-danger">You must select article category!</p></div>'
                );
            }
            // load views
            $this->load->view('templates/header');
            $this->load->view('dashboard/edit',$data);
            $this->load->view('templates/footer');

        } else {
            // if haven't select category yet 
            if($category == ''){
                $this->session->set_flashdata('add_blog',
                    '<div class="mb-3 pl-2 pr-2 col-12"><p class="text-danger">You must select article category!</p></div>'
                );
                $this->session->set_flashdata('title_blog',$title);
                $this->session->set_flashdata('article_blog',$article);
                // load views
                $this->load->view('templates/header');
                $this->load->view('dashboard/edit',$data);
                $this->load->view('templates/footer');
            } else {
                $blog[] = [];
                // get img old
                $image_old = $this->model_blog->get_blog('tb_blog',$id)[0]['image'];

                // if want to update image
                if($image !== ''){
                    // delete image old
                    $delete_path = $_SERVER['DOCUMENT_ROOT'].'/maskblog/uploads/'.$image_old;
                    unlink($delete_path);

                    // image validation
                    $config['upload_path']      = './uploads/';
                    $config['allowed_types']    = 'jpg|jpeg|png|gif';
                    $config['file_name']        = $image;
                    $config['overwrite']        = true;
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('image')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('add_blog','<div class="mb-3 pl-2 pr-2 col-12"><p class="text-danger">Error Upload Image!</p></div>'
                        );
                        $this->session->set_flashdata('title_blog',$title);
                        $this->session->set_flashdata('article_blog',$article);
                        // load views
                        $this->load->view('templates/header');
                        $this->load->view('dashboard/edit',$data);
                        $this->load->view('templates/footer');

                    } else {
                        // put datas
                        $blog = [
                            'id'        => $id,
                            'title'     => $title,
                            'category'  => $category,
                            'article'   => $article,
                            'image'     => $image,
                            'date'      => $date,
                            'writer'    => $writer              
                        ];
                    }
                } else {
                    // put datas
                    $blog = [
                        'id'        => $id,
                        'title'     => $title,
                        'category'  => $category,
                        'article'   => $article,
                        'image'     => $image_old,
                        'date'      => $date,
                        'writer'    => $writer              
                    ];
                }
                // update into tb_blog
                if($this->model_blog->update_blog('tb_blog',$blog)){
                    $this->session->set_flashdata('add_blog',
                    '<div class="badge badge-success mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Article Updated Successfully!</h5></div>'
                    );
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('add_blog',
                        '<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Failed to Update Article!</h5></div>'
                    );
                    redirect(base_url('dashboard'));
                }
            }
                
        }
        
    }

    public function delete($id){
        // get img name
        $image_delete = $this->model_blog->get_blog('tb_blog',$id)[0]['image'];
        // delete image old
        $delete_path = $_SERVER['DOCUMENT_ROOT'].'/maskblog/uploads/'.$image_delete;
        unlink($delete_path);

        // delete current blog by id from tb_blog
        if($this->model_blog->delete_blog('tb_blog',$id)){
            $this->session->set_flashdata('add_blog',
            '<div class="badge badge-success mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Blog Deleted Successfully!</h5></div>'
            );
            redirect(base_url('dashboard'));
        } else {
            $this->session->set_flashdata('add_blog',
                '<div class="badge badge-danger mb-3 pl-2 pr-2 col-12"><h5 class="text-center" style="color:white">Failed to Delete Blog!</h5></div>'
            );
            redirect(base_url('dashboard'));
        }
    }

    public function deleteParentComment($komen_id,$blog_id){
      $this->model_blog->deleteParentComment('tb_komen',$komen_id);
      redirect(base_url('dashboard/view/'.$blog_id));

    }

    public function deleteChildComment($komen_id,$blog_id){
      $this->model_blog->deleteChildComment('tb_komen',$komen_id);
      redirect(base_url('dashboard/view/'.$blog_id));

    }


}