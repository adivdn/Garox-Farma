<?php
    class admin extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('admin_model');
        }

        public function index(){
            if($this->session->userdata('logged_in') && $this->session->userdata('level') == 'admin' ){    
                $data['title'] = 'Dashboard';
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/index', $data);
                $this->load->view('admin/template/footer');
            }
        }

        public function data(){
            $data['item'] = $this->admin_model->allitem()->result();
            echo json_encode($data);

        }

        public function editItem($item_id){

            if($this->session->userdata('logged_in')){
                $data['title'] = 'Edit Item';
                $data['item'] = $this->admin_model->getitem($item_id);
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/edititem',$data);
                $this->load->view('admin/template/footer');
            }
        }

        public function processEdit(){
            if(isset($_POST['edit'])){
                $item_id = $this->input->post('item_id');
                $this->form_validation->set_rules('nama_barang','Nama Barang','required');
                $this->form_validation->set_rules('harga','Harga','required');
                $this->form_validation->set_rules('stock','Stock','required');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','required');
                
                if($this->form_validation->run() == FALSE){
                    $this->editItem($item_id);
                }else{
                    $config['upload_path']          = './assets/upload/';
                    $config['allowed_types']        = 'gif|jpg|png|jfif';
                    $config['max_size']             = 1024;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 1024;
                    $config['file_name'] 			= $_FILES['gambar']['name'];
            
                    $this->load->library('upload', $config);
                    if ( !$this->upload->do_upload('gambar')){
                        $data['error'] = $this->upload->display_errors();
                        $data['title'] = 'Edit Barang';
                        $data['item'] = $this->admin_model->getitem($item_id);
                        $this->load->view('admin/template/header', $data);
                        $this->load->view('admin/edititem',$data);
                        $this->load->view('admin/template/footer');
                    }else{
                        $gambar = $this->upload->data('file_name');
                        
                        $data = array(
                            'item_id'       => $item_id,
                            'nama_barang'   => $this->input->post('nama_barang'),
                            'harga'         => $this->input->post('harga'),
                            'stock'         => $this->input->post('stock'),
                            'spesifikasi'   => $this->input->post('spesifikasi'),
                            'gambar'        => $gambar
                        );
                        $query = $this->admin_model->editItem($item_id,$data);
                        if($this->db->affected_rows() > 0){
                            $data['flash'] = 'Diubah';
                            $this->session->set_flashdata($data);
                            
                            redirect('admin/index');
                        }
                    }
                }
            }
        }

        public function deleteItem($item_id){

            $del = $this->admin_model->deleteItem($item_id);
            $data['flash'] = 'Dihapus';
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata($data);
                $this->index();
            }
        }

        public function addItem(){

            if($this->session->userdata('logged_in')){
                $data['title'] = 'Tambah Barang';
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/additem');
                $this->load->view('admin/template/footer');
            }
        }

        public function processAdd(){

            $this->form_validation->set_rules('nama_barang','Nama Barang','required');
            $this->form_validation->set_rules('harga','Harga','required');
            $this->form_validation->set_rules('stock','Stock','required');
            $this->form_validation->set_rules('spesifikasi','Spesifikasi','required');
            
            if($this->form_validation->run() == FALSE){
                redirect('admin/addItem');
            }else{
                    $config['upload_path']          = './assets/upload/';
                    $config['allowed_types']        = 'gif|jpg|png|jfif';
                    $config['max_size']             = 2048;
                    $config['max_width']            = 2048;
                    $config['max_height']           = 2048;
                    $config['file_name'] 			= $_FILES['gambar']['name'];
            
                    $this->load->library('upload', $config);
                    if ( !$this->upload->do_upload('gambar')){
                        $data['error_message'] = $this->upload->display_errors();
                        $data['title'] = 'Tambah Barang';
                        $this->load->view('admin/template/header', $data);
                        $this->load->view('admin/additem',$data);
                        $this->load->view('admin/template/footer');
                    }else{
                        $gambar = $this->upload->data('file_name');
                        
                        $data = array(
                            'item_id'       => NULL,
                            'nama_barang'   => $this->input->post('nama_barang'),
                            'harga'         => $this->input->post('harga'),
                            'stock'         => $this->input->post('stock'),
                            'spesifikasi'   => $this->input->post('spesifikasi'),
                            'gambar'        => $gambar
                        );
                        $query = $this->admin_model->addItem($data);
                        if($this->db->affected_rows() > 0){
                            $pesan = ['flash' => 'Ditambahkan'];
                            $this->session->set_flashdata($pesan);

                            redirect('admin/index');
                        }
                    }
                }
        }
    }

?>
