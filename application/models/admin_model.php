<?php
    class admin_model extends CI_Model{
        
        public function allitem(){
            $query = $this->db->get('item');
            return $query->result_array();
        }
        public function cariData(){
            $keyword = $this->input->post('keyword', true);
            
            $this->db->like('nama_barang',$keyword);
            $query =  $this->db->get('item');
            return $query->result_array();
        }
        public function addItem($data){
            $this->db->insert('item',$data);
        }

        public function editItem($item_id,$data){
            $this->db->where('item_id',$item_id);
            $this->db->update('item',$data);
        }
        public function deleteItem($item_id){
            $this->db->where('item_id',$item_id);
            $this->db->delete('item');
        }

        public function getitem($item_id){
            $query = $this->db->get_where('item',array('item_id' => $item_id));

            return $query->row_array();
        }
    }

?>