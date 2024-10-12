<?php 

class Register extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_register');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('Register/v_register');
	}

	public function save(){
		$username = $this->input->post('username', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $password = $this->input->post('password', TRUE);
        $var = $this->M_register->addUser($username,$nama,$password);
        if($var == 1){
            echo "<script>alert('Sukses Simpan Username : ".$username.".');</script>";
            redirect('Login','refresh');
        }elseif($var == 2){
            echo "<script>alert('Gagal, Simpan Username : ".$username.". Data Already Exist.');</script>";
            redirect('Register','refresh');
        }elseif($var == 3){
            echo "<script>alert('Gagal, Simpan Username : ".$username.".');</script>";
            redirect('Register','refresh');
        }elseif($var == 4){
            echo "<script>alert('Gagal, Tidak dapat cek data Username : ".$username.".');</script>";
            redirect('Register','refresh');
        }else{
            echo "<script>alert('Gagal Proses Simpan.');</script>";
            redirect('Register','refresh');
        }
    }

}