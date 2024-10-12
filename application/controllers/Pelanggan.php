<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class Pelanggan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_pelanggan');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function List_pelanggan(){
        $Username=$this->session->userdata('username');
        if($this->session->userdata('role') == 2){
            $data['Pelanggan'] = $this->M_pelanggan->tampil_data_pelanggan($Username)->result();
        }else{
            $data['Pelanggan'] = $this->M_pelanggan->tampil_data()->result();    
        }
        $cek = $this->db->query("SELECT * FROM pelanggan where username ='".$Username."'")->num_rows();
        if($cek == 1){//jika data ada satu/lebih (tanggal sudah ada)
            $var_cek = 1;
            $data['cek_data']=1; 
        }elseif($cek == 0){//jika data tidak ada (tida ada data)
            $var_cek = 0;
            $data['cek_data']=0;
        }else{//jika action proses cek gagal
            $var_cek = 2;
            $data['cek_data']=2;
        }
        if($cek == 0 && $this->session->userdata('role') != 0 && $this->session->userdata('role') != 1){
            $this->Form();
        }else{
            $this->load->view('Pelanggan/list_pelanggan',$data);
        }
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['kodePel'] = $this->M_pelanggan->getKodePelanggan();
        $x = $this->M_pelanggan->getKodePelanggan();
        // print_r($x);
        // die();
		$data['url_save'] = base_url().'Pelanggan/save_pelanggan';
		$this->load->view('Pelanggan/form_pelanggan',$data);
	}

	public function save_pelanggan(){
        $kode_pel = $this->input->post('kode_pel', TRUE);
        $username_pel = $this->input->post('username', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('jenis_kelamin', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $var = $this->M_pelanggan->addPelanggan($kode_pel,$username_pel,$nama,$email,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat);
        // print_r($var);
        // die();
        if($var["var"] == 1){
            echo "<script>alert('Gagal, Kode Pelanggan : ".$kode_pel." Sudah terdata.');</script>";
            redirect('Pelanggan/Form','refresh');
        }elseif($var["var"] == 2){
            echo "<script>alert('Sukses Simpan Data Kode Pelanggan : ".$kode_pel.".');</script>";
            if($this->session->userdata('role') == 2){
                redirect('Pelanggan/List_pelanggan');
            }else{
                redirect('Pelanggan/Form','refresh');
            }
        }elseif($var["var"] == 3){
            echo "<script>alert('Gagal, Proses Simpan Gagal.');</script>";
            redirect('Pelanggan/Form','refresh');
        }elseif($var["var"] == 4){
            echo "<script>alert('Gagal, Tidak dapat proses cek Kode Pelanggan.');</script>";
            redirect('Pelanggan/Form','refresh');
        }elseif($var["var"] == 5){
            echo "<script>alert('Gagal, Username : ".$username_pel." Sudah terdata.');</script>";
            redirect('Pelanggan/Form','refresh');
        }elseif($var["var"] == 6){
            echo "<script>alert('Gagal, Tidak dapat proses cek Username.');</script>";
            redirect('Pelanggan/Form','refresh');
        }else{
            echo "<script>alert('Gagal Simpan Pelanggan.');</script>";
            redirect('Pelanggan/Form','refresh');
        }
    }

	public function editPelanggan($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Pelanggan.');</script>";
	            redirect('Pelanggan/List_pelanggan','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_pelanggan->data_editPelanggan($Id);
				$data['url_edit'] = base_url().'Pelanggan/edit_pelanggan';
		        $test = $this->M_pelanggan->data_editPelanggan($Id);
		        //print_r($test);die();
		        $this->load->view("Pelanggan/edit_pelanggan",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_pelanggan(){
		$id_pel = $this->input->post('id_pel', TRUE);
        $kode_pel = $this->input->post('kode_pel', TRUE);
        $username_pel = $this->input->post('username', TRUE);
        $email = $this->input->post('email', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('jenis_kelamin', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $var = $this->M_pelanggan->editPelanggan($id_pel,$kode_pel,$username_pel,$email,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat);
        // print_r($var);
        // die();
        if($var == 1){
            echo "<script>alert('Berhasil Simpan Data Pelanggan dengan Kode Pelanggan : ".$kode_pel." .');</script>";
            redirect('Pelanggan/List_pelanggan','refresh');
        }elseif($var == 2){
            echo "<script>alert('Gagal Simpan Data Pelanggan dengan Kode Pelanggan : ".$kode_pel.".');</script>";
            redirect('Pelanggan/List_pelanggan','refresh');
        }else{
            echo "<script>alert('Gagal Update Pelanggan.');</script>";
            redirect('Pelanggan/List_pelanggan','refresh');
        }
    }

    public function viewPelanggan(){
    	if($this->session->userdata('level') == 1){
            $Id = $_REQUEST['id_pel'];
            $data["id_pel"] = $Id;
            $data["header"] = $this->M_pelanggan->data_editPelanggan($Id);
            $this->load->view("Pelanggan/view_pelanggan",$data);
        }else{
            redirect('login');
        }
    }

	public function deletePelanggan(){
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_pel'];
            $var = $this->M_pelanggan->deletePelanggan($id);
            if($var == 1){
                echo "<script>alert('Success Delete Pelanggan.');</script>";
                redirect('Pelanggan/List_pelanggan','refresh');
            }else{
                echo "<script>alert('Failed Delete Pelanggan.');</script>";
                redirect('Pelanggan/List_pelanggan','refresh');
            }
        }else{
            redirect('login');
        }
    }

}
?>