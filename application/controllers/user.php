<?php
    class user extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('user_model');
        }

        public function index(){
            if($this->session->userdata('logged_in') && $this->session->userdata('level') == 'admin'){
                redirect('admin');
            }else if($this->session->userdata('logged_in') && $this->session->userdata('level') == 'user'){
                redirect('user/route');
            }else{
                $this->load->view('user/index');
            }
        }       
        
        public function login(){
            $this->load->view('user/login');
        }

        public function route(){

            if($this->session->userdata('logged_in') && $this->session->userdata('level') == 'user'){
                $this->load->view('user/route');
            }
        }
        public function prosesPembayaran(){
            $data['title']  = 'Proses Pembayaran';
            $this->load->view('user/proses',$data);
        }
        public function notifikasi(){
            $data['title']  = 'Notifikasi';
            $this->load->view('user/notifikasi',$data);
        }
        
        public function bayar($id){
            $data['title'] = 'Pembayaran';
            $data['item']   = $this->user_model->cariPesanan($id);
            $this->load->view('user/bayar',$data);
        }
        public function prosesLogin(){
            if(isset($_POST['login'])){
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('password','Password','required');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('user/login');
                }else{
                    
                    $email = $this->input->post('email');
                    $password = md5($this->input->post('password'));

                    $role = $this->user_model->login($email,$password)->row_array();
                    if($role > 0){
                        $data = ['user_id'     => $role['user_id'],
                                 'level'       => $role['role'],
                                 'logged_in'   => TRUE  
                                ];
                        $this->session->set_userdata($data);
                        if($this->session->userdata('level') == 'admin'){
                            redirect('admin');
                        }else{
                            echo "<script type = 'text/javascript'>";
                            echo "alert('Login berhasil')";
                            echo "</script>";
                            redirect('user/route');
                        }
                    }
                }
            }
        }

        public function register(){
            $this->load->view('user/registrasi');
        }

        public function prosesRegister(){
            if(isset($_POST['proses'])){
                $this->form_validation->set_rules('nama','Nama','required');
                $this->form_validation->set_rules('password','Password','required');
                $this->form_validation->set_rules('email','Email','required');
                $this->form_validation->set_rules('alamat','Alamat','required');

                    if($this->form_validation->run() == false){
                            $this->load->view('user/register');
                    }else{

                    
                        $data = array(
                            'nama'      => $this->input->post('nama'),
                            'password'  => md5($this->input->post('password')),
                            'email'     => $this->input->post('email'),
                            'alamat'    => $this->input->post('alamat'),
                            'role'      => 'user'
                        );

                        $this->user_model->register($data);
                        if($this->db->affected_rows() > 0){
                            echo "<script type = 'text/javascript'>";
                            echo "alert('Registrasi berhasil silahkan Login')";
                            echo "</script>";

                            redirect('user/login');
                        }
                    }
            }
        }

        public function menuBarang(){
            $data['title'] = 'Menu Barang';
            $data['item']  = $this->user_model->allitem();
            if($this->input->post('input')){
                $data['item'] = $this->user_model->cariData();
            }
            $this->load->view('user/barang',$data);
        }

        public function addCart($item_id){
            $item = $this->user_model->getitem($item_id);

            $data = array(
                'id'        => $item_id,
                'qty'       => 1,
                'price'     => $item['harga'],
                'name'      => $item['nama_barang']
            );

            $this->cart->insert($data);
            $this->menuBarang();
        }
        public function updateCart(){

            $cart_info = $_POST['cart'];
            foreach($cart_info as $cart){

                $id = $cart['id'];
                $qty = $cart['qty'];
                $data = array(
                    'id'    => $id,
                    'qty'   => $qty
                );
                $this->cart->update($cart);
            }
            redirect('user/showCart');
            
        }

        public function deleteCart($item_id){
            
            if($item_id === "all"){

                $this->cart->destroy();
                redirect('user/showCart');
            }else{
                $data = array(
                    'rowid'    => $item_id,
                    'qty'   => 0
                );
                $this->cart->update($data);
                redirect('user/showCart');
            }

        }

        public function showCart(){
            $data['title'] = 'Checkout';
            $data['item']   = $this->cart->contents();
            $this->load->view('user/checkout',$data);
        }
        public function prosesPesanan(){
            $items = $this->cart->contents();
            $user_id = $this->session->userdata('user_id');
            $total = $this->cart->total();

            $data = array(
                'id'    => NULL,
                'user_id'       => $user_id,
                'harga'         => $total
            );
            $id = $this->user_model->insertPesanan($data);

            foreach($items as $value){
                    
                $barang = array(
                    'id'    => $id,
                    'item_id'       => $value['id'],
                    'harga'         => $value['price'],
                    'qty'           => $value['qty']
                );

                $this->user_model->insertDetail($barang);
            }
            $this->bayar($id);
        }
        public function prosesBayar(){
            if(isset($_POST['button'])){
                $metode = $this->input->post('pilih');
                $pesanan_id = $this->input->post('pesanan_id');
                $data = array(
                    'bayar_id'      => NULL,
                    'id'            => $pesanan_id,
                    'metode'        => $metode
                );
                $this->user_model->pembayaran($data);
                if($this->db->affected_rows() > 0){
                    $this->cart->destroy();
                    redirect('user/prosesPembayaran');
                }
            }
        }

        public function logout(){
            $dataLogin = ['user_id','level','logged_in'];
            $this->session->unset_userdata($dataLogin);
            $this->load->view('user/garox');
            
            
        }

    }



?>
