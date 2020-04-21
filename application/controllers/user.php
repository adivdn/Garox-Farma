<?php
    class user extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('user_model');
        }

        public function index(){
            $this->load->view('user/index');
        }
        
        public function login(){
            $this->load->view('user/login');
        }

        public function route(){
            $this->load->view('user/route');
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
                        $data = ['user_id' => $role['user_id'],
                                 'level'   => $role['role']
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

        public function logout(){
            $dataLogin = ['user_id','level'];
            $this->session->unset_userdata($dataLogin);
            $this->load->view('user/garox');
            
            
        }

    }



?>