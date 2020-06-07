<?php

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // load libraries, models, etc
        $this->load->model('model_blog');
        $this->load->model('model_user');

    }
    
    // default function of Home class
    public function index(){
        // get all blogs and blog as headers
        $data['blog_headers']    = $this->model_blog->get_blog_headers('tb_blog');
        $data['blogs']           = $this->model_blog->get_all_blog('tb_blog')->result_array();
        // get all admins datas
        $user_role_admin_allfield = (array) $this->model_user->getAdminAllFields('tb_user','1')->result_array();

        // === SORT RECENT BLOG POSTS ===
        // push all blog ids into $recents array
        $recents = array();
        for ($i = 0; $i < sizeof($data['blogs']); $i++) {
          array_push($recents,$data['blogs'][$i]['id']);
        }
        
        // sort recents post ids descendingly to get newest id first
        rsort($recents);
        
        // push all blog datas into $data['recents'] array
        // first load will be 6 posts shown
        $data['recents'] = array();
        for($i = 0; $i < 6; $i++){
          array_push($data['recents'],$this->model_blog->getRecentBlog('tb_blog',$recents[$i]));
        }

        // convert $data['recents'] obj to array
        $data['recents'] = json_decode(json_encode($data['recents']),true);
        // add each recent post with their own writer image
        foreach ($user_role_admin_allfield as $admin) {
          for($i = 0; $i < 6; $i++){
            if($data['recents'][$i]['writer'] == $admin['username']){
              $data['recents'][$i]['image_writer'] = $admin['image'];
            }

          }

        }

        // === END OF SORT RECENT BLOG POSTS ===

        // load views
        $this->load->view('templates/header');
        $this->load->view('home',$data);
        $this->load->view('templates/footer');

    }

    // load more recent posts with ajax
    public function loadMore($load_more_index){
        // get all blog and all admins datas
        $data['blogs'] = $this->model_blog->get_all_blog('tb_blog')->result_array();
        $user_role_admin_allfield = (array) $this->model_user->getAdminAllFields('tb_user','1')->result_array();   

        // === SORT RECENT BLOG POSTS LOADED ===
        // push all blog ids into $recents array
        $recents = array();
        for ($i = 0; $i < sizeof($data['blogs']); $i++) {
          array_push($recents,$data['blogs'][$i]['id']);
        }
    
        // get 3 more recent posts each triggered
        $length = sizeof($recents);
        $last_index = $length - 1;
        if($load_more_index == 1){
            $get_first_index = $last_index - ($load_more_index * 6) + 1;    
        } else {
            $get_first_index = $last_index - (3 + $load_more_index * 3) + 1;    
        }

        $recent_more = array();
        if(($get_first_index - 3) >= 0){
            for($i = $get_first_index - 1; $i > (($get_first_index - 1) - 3); $i--){
                array_push($recent_more,$recents[$i]);
            } 
        } else if (($get_first_index - 3) == -1){
            for($i = $get_first_index - 1; $i > (($get_first_index - 1) - 2); $i--){
                array_push($recent_more,$recents[$i]);
            } 
        } else if (($get_first_index - 3) == -2){
            for($i = $get_first_index - 1; $i > (($get_first_index - 1) - 1); $i--){
                array_push($recent_more,$recents[$i]);
            } 
        }        

        // add loaded recent datas into $data['recents']
        $data['recents'] = array();
        if(sizeof($recent_more) == 3){
          for($i = 0; $i < 3; $i++){
              array_push($data['recents'],$this->model_blog->getRecentBlog('tb_blog',$recent_more[$i]));
          } 
        } else if (sizeof($recent_more) == 2) {
          for($i = 0; $i < 2; $i++){
              array_push($data['recents'],$this->model_blog->getRecentBlog('tb_blog',$recent_more[$i]));
          }
        } else if (sizeof($recent_more) == 1) {
          for($i = 0; $i < 1; $i++){
              array_push($data['recents'],$this->model_blog->getRecentBlog('tb_blog',$recent_more[$i]));
          }
        } 
        
        // convert $data['recents'] obj to array
        $data['recents'] = json_decode(json_encode($data['recents']),true);
        // add each recent post with writer image
        foreach ($user_role_admin_allfield as $admin) {
          for($i = 0; $i < sizeof($recent_more); $i++){
            if($data['recents'][$i]['writer'] == $admin['username']){
              $data['recents'][$i]['image_writer'] = $admin['image'];
            }

          }

        }

        // convert $data['recents'] array to obj
        $data['recents'] = json_decode(json_encode($data['recents']),false);
        // === END OF SORT RECENT BLOG POSTS LOADED ===

        if(empty($recent_more)){
          echo json_encode('no_more_data');
        } else {
          // return $data['recents'] into ajax success
          echo json_encode($data['recents']);
        }

    }

}