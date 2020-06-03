<?php

class Blog extends CI_Controller{

    // public $current_blog;

    public function __construct(){
      parent::__construct();

      // loads
      $this->load->model('model_blog');
      $this->load->model('model_user');
      $this->load->helper('date');

    }

    public function index($id){
      // load views
      $this->load->view('templates/header');
      $this->load->view('blog',$data);
      $this->load->view('templates/footer');

    }

    public function article($id){
      $data['id']               = $id;
      $data['blog']             = $this->model_blog->get_blog('tb_blog',$id)[0];
      $data['blogs']            = $this->model_blog->get_all_blog('tb_blog')->result_array();
      $data['blog_headers']     = $this->model_blog->get_blog_headers('tb_blog');
      $data['parent_comments']  = $this->model_blog->get_all_comments_by_status('tb_komen','0',$id)->result_array(); 
      $data['child_comments']   = $this->model_blog->get_all_comments('tb_komen',$id)->result_array();
      $data['user_role_admin']  = $this->model_user->getAdmin('tb_user','1')->result_array();      

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

      // add 1 view to current article
      $cur_view = $this->model_blog->getView('tb_blog',$id)->result_array()[0]['view'];
      $this->model_blog->updateView('tb_blog',$id,$cur_view + 1);

      // load views
      $this->load->view('templates/header');
      $this->load->view('blog',$data);
      $this->load->view('templates/footer');
    }

    // search blog by its title name
    public function searchBlog(){
      $search = $this->input->get('search');

      $data['searchedBlogs'] = $this->model_blog->searchBlog('tb_blog',$search)->result_array();

      // load views
      $this->load->view('templates/header');
      $this->load->view('search',$data);
      $this->load->view('templates/footer');

    }

    // get parentComments
    public function getParentComments($id_blog){
      $parent_comments = $this->model_blog->get_all_comments_by_status('tb_komen',0,$id_blog)->result();
      echo json_encode($parent_comments);
    }

    // get childComments
    public function getChildComments($id_blog){
      $child_comments = $this->model_blog->get_all_comments('tb_komen',$id_blog)->result();
      echo json_encode($child_comments);
    }

    // get allComments with ajax
    public function getAllComments(){
      $comments = $this->model_blog->get_all_comments('tb_komen','15');

      echo json_encode($comments);
    } // end getAllComments

    // addParentComment with ajax
    public function addParentComment(){
      // get input datas
      $komen_blog   = $this->input->post('komen_blog');
      $komen_nama   = $this->session->userdata('username');
      $komen_email  = $this->session->userdata('email');
      $komen_isi    = $this->input->post('komen_isi');
      $komen_waktu  = date('M d, Y ').'AT'.date(' H:i');

      if($komen_isi == ''){
        $result['msg'] = 'You must type any comment before sending it';
      } else {
        $result['msg'] = '';
      }

      $data = [
        'komen_id'      => null,
        'komen_status'  => '0',
        'komen_blog'    => $komen_blog,
        'komen_nama'    => $komen_nama,
        'komen_email'   => $komen_email,
        'komen_isi'     => $komen_isi,
        'komen_waktu'   => $komen_waktu
      ];

      $this->model_blog->add_parent_comment('tb_komen',$data);
      echo json_encode($result);
      

    } // end addParentComment

    // addChildComment with ajax
    public function addChildComment(){
      // get input datas
      $komen_blog   = $this->input->post('komen_blog');
      $komen_status = $this->input->post('komen_id');
      $komen_nama   = $this->session->userdata('username');
      $komen_email  = $this->session->userdata('email');
      $reply_isi    = $this->input->post('reply_isi');
      $komen_waktu  = date('M d, Y ').'AT'.date(' H:i');

      if($reply_isi == ''){
        $result['msg'] = 'You must type any comment before sending it';
      } else {
        $result['msg'] = '';
      }

      $data = [
        'komen_id'      => null,
        'komen_status'  => $komen_status,
        'komen_blog'    => $komen_blog,
        'komen_nama'    => $komen_nama,
        'komen_email'   => $komen_email,
        'komen_isi'     => $reply_isi,
        'komen_waktu'   => $komen_waktu
      ];

      $this->model_blog->add_child_comment('tb_komen',$data);
      echo json_encode($result);      
      

    } // end addChildComment

    public function deleteChildComment($komen_id){
      $this->model_blog->deleteChildComment('tb_komen',$komen_id);
      redirect('');

    }

     public function deleteParentComment($komen_id){
      $this->model_blog->deleteParentComment('tb_komen',$komen_id);
      redirect('');

    }

} // end controller