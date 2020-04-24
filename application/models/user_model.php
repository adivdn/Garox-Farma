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
        public function getitem($item_id){
            $query = $this->db->get_where('item',array('item_id' => $item_id));
            return $query->row_array();
        }
        public function insertPesanan($data){
            $this->db->insert('pesanan',$data);
            $id = $this->db->insert_id();
            return $id;
        }
        public function insertDetail($data){
            $this->db->insert('pesanan_detail',$data);
        }
        public function pembayaran($data){
            $this->db->insert('pembayaran',$data);
        }
        public function cariPesanan($id){
            $query = $this->db->get_where('pesanan',array('id' => $id));
            
            return $query->row_array();
        }
    }

?>