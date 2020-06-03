<?php

class Model_user extends CI_Model{

    public function add($data,$table){
        // insert data into tb_user
        return $this->db->insert($table,$data);
    }

    public function check_login($email,$password,$table){
        // check field from tb
        $this->db->where(array('email' => $email, 'password' => $password));
        return $this->db->get($table,1)->result_array();

    }

    public function getAdmin($table,$role){
    	$this->db->where('role',$role);
    	return $this->db->get($table);
    }

    public function getUserData($table,$id){
        $this->db->where('id',$id);
        return $this->db->get($table);
    }

    public function updateUser($table,$data){
        $this->db->where('id',$data['id']);
        return $this->db->update($table,$data);
    }

}