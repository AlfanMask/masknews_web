<?php

class Category extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // loads
        $this->load->model('model_blog');

    }

    public function index(){
        // load views
        $this->load->view('templates/header');
        $this->load->view('category');
        $this->load->view('templates/footer');
    }

    public function politic(){
        // load politic blogs
        $data['blogs'] = $this->model_blog->get_blog_by_category('tb_blog','Politic');

        // load views
        $this->load->view('templates/header');
        $this->load->view('category',$data);
        $this->load->view('templates/footer');

    }

    public function tech(){
        // load politic blogs
        $data['blogs'] = $this->model_blog->get_blog_by_category('tb_blog','Tech');

        // load views
        $this->load->view('templates/header');
        $this->load->view('category',$data);
        $this->load->view('templates/footer');

    }

    public function entertainment(){
        // load politic blogs
        $data['blogs'] = $this->model_blog->get_blog_by_category('tb_blog','Entertainment');

        // load views
        $this->load->view('templates/header');
        $this->load->view('category',$data);
        $this->load->view('templates/footer');

    }

    public function travel(){
        // load politic blogs
        $data['blogs'] = $this->model_blog->get_blog_by_category('tb_blog','Travel');

        // load views
        $this->load->view('templates/header');
        $this->load->view('category',$data);
        $this->load->view('templates/footer');

    }

    public function sport(){
        // load politic blogs
        $data['blogs'] = $this->model_blog->get_blog_by_category('tb_blog','Sport');

        // load views
        $this->load->view('templates/header');
        $this->load->view('category',$data);
        $this->load->view('templates/footer');

    }

}