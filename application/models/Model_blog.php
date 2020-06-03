<?php

class Model_blog extends CI_Model{

    public function __construct(){
        parent::__construct();

        // loads

    }

    public function get_all_blog($table){
        return $this->db->get($table);

    }

    public function get_all_blog_pagination($table,$per_page,$offset){
        return $this->db->get($table,$per_page,$offset);

    }

    public function get_blog($table,$id){
        $this->db->where('id',$id);
        return $this->db->get($table)->result_array();

    }

    public function getPopularBlog($table,$view){
        $this->db->where('view',$view);
        return $this->db->get($table)->row();
    }

    public function searchBlog($table,$search){
        $this->db->like('title',$search);
        return $this->db->get($table);
    }

    public function add_blog($table,$blog){
        return $this->db->insert($table,$blog);

    }

    public function update_blog($table,$blog){
        $this->db->where('id',$blog['id']);
        return $this->db->update($table,$blog);

    }

    public function delete_blog($table,$id){
        $this->db->where('id',$id);
        return $this->db->delete($table);

    }

    public function get_blog_by_category($table,$category){
        $this->db->where('category',$category);
        return $this->db->get($table)->result_array();
    }

    // get blog headers -> get 1 blog of each categories 
    public function get_blog_headers($table){
        // get politic blog
        $this->db->where('category','Politic');
        $politic = $this->db->get($table,1)->result_array();
        // get tech blog
        $this->db->where('category','Tech');
        $tech = $this->db->get($table,1)->result_array();
        // get entertainment blog
        $this->db->where('category','Entertainment');
        $entertainment = $this->db->get($table,1)->result_array();
        // get travel blog
        $this->db->where('category','Travel');
        $travel = $this->db->get($table,1)->result_array();
        // get sport blog
        $this->db->where('category','Sport');
        $sport = $this->db->get($table,1)->result_array();

        // group all of these
        $blogs = [
            'politic'           => (!sizeof($politic)<=0) ? $politic[0] : $politic,
            'tech'              => (!sizeof($tech)<=0) ? $tech[0] : $tech,
            'entertainment'     => (!sizeof($entertainment)<=0) ? $entertainment[0] : $entertainment,
            'travel'            => (!sizeof($travel)<=0) ? $travel[0] : $travel,
            'sport'             => (!sizeof($sport)<=0) ? $sport[0] : $sport
        ];

        return $blogs;
    }

    public function getRecentBlog($table,$id_blog){
        $this->db->where('id',$id_blog);
        return $this->db->get($table)->row();
    }

    // get blog view
    public function getView($table, $id){
        $this->db->where('id',$id);
        return $this->db->get($table);
    }

    // update view by add it by 1
    public function updateView($table,$id,$view){
        $this->db->set('view',$view);
        $this->db->where('id',$id);
        $this->db->update($table);
    }

    // insert parent comment
    public function add_parent_comment($table,$data){
        return $this->db->insert($table,$data);

    }

    // insert parent comment
    public function add_child_comment($table,$data){
        return $this->db->insert($table,$data);

    }

    // get all comments
    public function get_all_comments($table,$komen_blog){
        $this->db->where('komen_blog',$komen_blog);
        return $this->db->get($table);
    }

    // get all comments by komen_status
    public function get_all_comments_by_status($table,$komen_status,$komen_blog){
        $this->db->where('komen_status',$komen_status);
        $this->db->where('komen_blog',$komen_blog);
        return $this->db->get($table);
    }

    // delete comment by komen_id
    public function deleteChildComment($table,$komen_id){
        $this->db->where('komen_id',$komen_id);
        return $this->db->delete($table);
    }

    // delete comment by komen_id
    public function deleteParentComment($table,$komen_id){
        // delete parent
        $this->db->where('komen_id',$komen_id);
        $this->db->delete($table);

        // delete child
        $this->db->where('komen_status',$komen_id);
        $this->db->delete($table);

    }

}