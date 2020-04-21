<?php
    class user_model extends CI_Model{
        
        public function login($email,$password){
            return $this->db->get_where('user',array('email' => $email,'password' => $password));
        }

        public function register($data){
            $this->db->insert('user',$data);
        }
        public function allitem(){
            $query = $this->db->get('item');
            return $query->result_array();
        }
        public function cariData(){
            $keyword = $this->input->post('input', true);
            $this->db->like('nama_barang',$keyword);
            $query =  $this->db->get('item');
            return $query->result_array();
        }
    }

?>