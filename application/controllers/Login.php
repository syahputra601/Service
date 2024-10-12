<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('Login/v_login');
	}

	function login_hakakses()
        {
            // $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run()==FALSE) {
                // $data['phonenumber'] = set_value('phonenumber');
                $data['username'] = set_value('username');
                $data['passowrd'] = set_value('password');
                redirect('login');
            }

            else{
                //$pass=md5($_POST['password']);
                //$password = $_POST['password'];
                // $data = array('phonenumber' => $_POST['phonenumber'],
                //               'password' => $password = $_POST['password']);
              $data = array('username' => $_POST['username'],
                            'password' => $password = $_POST['password']);
                $hasil = $this->M_login->getuser($data);
                if (!empty($hasil)) {

                    foreach ($hasil as $key) {
                       
                    $sesi = array('nama' => $key->Name,
                                  'username' => $key->Username,
                                  'Emailaddress' => $key->Emailaddress,
                                  'masuk' => TRUE,
                                  'role' => $key->Role,
                                  'level' => 1 );//$key->status
                    $level=1;//$key->status;
                    $role = $key->Role;//Status Hak Akses
                    }
                    // var_dump($sesi);exit();
                    $this->session->set_userdata($sesi,true);
                    // if ($level==1) {//For Access Admin
                    //     //echo "Berhasil Login.";
                    //     redirect ('Home');
                    // }

                    if($role==0){//Untuk role 0 hak akses admin kasir
                        redirect('HomeAdminKasir');
                    }elseif($role==1){//Untuk role 1 hak akses pemilik
                        redirect('HomePemilik');
                    }elseif($role==2){//Untuk role 2 hak akses pelanggan
                        redirect('HomePelanggan');
                    }else{//Nothing
                        redirect('login');
                    }
                    
                }else{
                    $this->session->set_flashdata('failed', 'Username atau Password Salah!');
                    redirect('login');
                }
           
            }
        }

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}