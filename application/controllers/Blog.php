<?php

class Blog extends CI_Controller{

    public function __construct(){
      parent::__construct();

      // load libraries, models, etc
      $this->load->model('model_blog');
      $this->load->model('model_user');
      $this->load->helper('date');

    }

    // default function of Home class
    public function index($id_blog){
      // load views
      $this->load->view('templates/header');
      $this->load->view('blog',$data);
      $this->load->view('templates/footer');

    }

    public function article($id_blog){
      // get all datas needed in blog view
      $data['id']               = $id_blog;
      $data['blog']             = $this->model_blog->get_blog('tb_blog',$id_blog)[0];
      $data['blogs']            = $this->model_blog->get_all_blog('tb_blog')->result_array();
      $data['blog_headers']     = $this->model_blog->get_blog_headers('tb_blog');
      $data['parent_comments']  = $this->model_blog->get_all_comments_by_status('tb_komen','0',$id_blog)->result_array(); 
      $data['child_comments']   = $this->model_blog->get_all_comments('tb_komen',$id_blog)->result_array();
      
      // get admins usernames and all admins datas 
      $user_role_admin          = (array) $this->model_user->getAdmin('tb_user','1')->result_array();    
      $user_role_admin_allfield = (array) $this->model_user->getAdminAllFields('tb_user','1')->result_array();   

      // push $data['user_role_admin'] with admins usernames
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

      // === SORT POPULAR POSTS ===
      // sort by their views
      $views = array();
      for ($i = 0; $i < sizeof($data['blogs']); $i++) {
        array_push($views,$data['blogs'][$i]['view']);
      }
      
      // sort popular post views descendingly to get greatest views first and next
      rsort($views);
      
      // get popular 1, 2, and 3 post
      $popular_1  = $this->model_blog->getPopularBlog('tb_blog',$views[0]);
      $popular_2  = $this->model_blog->getPopularBlog('tb_blog',$views[1]);
      $popular_3  = $this->model_blog->getPopularBlog('tb_blog',$views[2]);

      $data['populars'] = [$popular_1,$popular_2,$popular_3];
      // === END OF SORT POPULAR POSTS ===

      // increment current article view by 1
      $cur_view = $this->model_blog->getView('tb_blog',$id_blog)->result_array()[0]['view'];
      $this->model_blog->updateView('tb_blog',$id_blog,$cur_view + 1);

      // load views
      $this->load->view('templates/header');
      $this->load->view('blog',$data);
      $this->load->view('templates/footer');
    }

    // search blog by its title name
    public function searchBlog(){
      $search = $this->input->get('search');

      // get searched blogs
      $data['searchedBlogs'] = $this->model_blog->searchBlog('tb_blog',$search)->result_array();
      // get all admins datas
      $user_role_admin_allfield = (array) $this->model_user->getAdminAllFields('tb_user','1')->result_array();

      // add each recent post with their own writer image
      foreach ($user_role_admin_allfield as $admin) {
        for($i = 0; $i < sizeof($data['searchedBlogs']); $i++){
          if($data['searchedBlogs'][$i]['writer'] == $admin['username']){
            $data['searchedBlogs'][$i]['image_writer'] = $admin['image'];
          }

        }

      }

      // load views
      $this->load->view('templates/header');
      $this->load->view('search',$data);
      $this->load->view('templates/footer');

    }

    // === COMMENT SECTIONS ===
    // get all comments with ajax
    public function getAllComments(){
      $comments = $this->model_blog->get_all_comments('tb_komen','15');

      echo json_encode($comments);
    }

    // get all parent comments with ajax
    public function getParentComments($id_blog){
      $parent_comments = $this->model_blog->get_all_comments_by_status('tb_komen',0,$id_blog)->result();
      echo json_encode($parent_comments);
    }

    // get all child comments with ajax
    public function getChildComments($id_blog){
      $child_comments = $this->model_blog->get_all_comments('tb_komen',$id_blog)->result();
      echo json_encode($child_comments);
    }

    // add parent comment with ajax
    public function addParentComment(){
      // get input datas
      $komen_blog   = $this->input->post('komen_blog');
      $komen_nama   = $this->session->userdata('username');
      $komen_email  = $this->session->userdata('email');
      $komen_isi    = $this->input->post('komen_isi');
      $komen_waktu  = date('M d, Y ').'AT'.date(' H:i');

      // check if $komen_isi is null or not
      if($komen_isi == ''){
        $result['msg'] = 'You must type any comment before sending it';
      } else {
        $result['msg'] = '';
      }

      // push input datas into $data array
      $data = [
        'komen_id'      => null,
        'komen_status'  => '0',
        'komen_blog'    => $komen_blog,
        'komen_nama'    => $komen_nama,
        'komen_email'   => $komen_email,
        'komen_isi'     => $komen_isi,
        'komen_waktu'   => $komen_waktu
      ];

      // insert parent comment into tb_komen
      $this->model_blog->add_parent_comment('tb_komen',$data);
      echo json_encode($result);
      

    }

    // add parent comment with ajax
    public function addChildComment(){
      // get input datas
      $komen_blog   = $this->input->post('komen_blog');
      $komen_status = $this->input->post('komen_id');
      $komen_nama   = $this->session->userdata('username');
      $komen_email  = $this->session->userdata('email');
      $reply_isi    = $this->input->post('reply_isi');
      $komen_waktu  = date('M d, Y ').'AT'.date(' H:i');

      // check if $reply_isi is null or not
      if($reply_isi == ''){
        $result['msg'] = 'You must type any comment before sending it';
      } else {
        $result['msg'] = '';
      }

      // push input datas into $data array
      $data = [
        'komen_id'      => null,
        'komen_status'  => $komen_status,
        'komen_blog'    => $komen_blog,
        'komen_nama'    => $komen_nama,
        'komen_email'   => $komen_email,
        'komen_isi'     => $reply_isi,
        'komen_waktu'   => $komen_waktu
      ];

      // insert child comment into tb_komen
      $this->model_blog->add_child_comment('tb_komen',$data);
      echo json_encode($result);      
      

    }

    // delete parent comment (accesable only for admins)
    public function deleteParentComment($komen_id,$id_blog){
      $this->model_blog->deleteParentComment('tb_komen',$komen_id);
      redirect(base_url('blog/article/'.$id_blog));

    }

    // delete child comment (accesable only for admins)
    public function deleteChildComment($komen_id,$id_blog){
      $this->model_blog->deleteChildComment('tb_komen',$komen_id);
      redirect(base_url('blog/article/'.$id_blog));

    }
    // === END OF COMMENT SECTIONS ===

} // end controller