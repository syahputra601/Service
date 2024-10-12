<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class Mekanik extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_mekanik');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function List_mekanik(){
		$data['Mekanik'] = $this->M_mekanik->tampil_data()->result();
		$this->load->view('Mekanik/list_mekanik',$data);
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['NIP'] = $this->M_mekanik->getNip();
		$data['url_save'] = base_url().'Mekanik/save_mekanik';
		$this->load->view('Mekanik/form_mekanik',$data);
	}

	public function save_mekanik(){
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('jenis_kelamin', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $var = $this->M_mekanik->addMekanik($nip,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat);
        // print_r($var);
        // die();
        if($var["var"] == 1){
            echo "<script>alert('Gagal, NIP : ".$nip." Sudah di terdata.');</script>";
            redirect('Mekanik/Form','refresh');
        }elseif($var["var"] == 2){
            echo "<script>alert('Sukses Simpan Data NIP : ".$nip.".');</script>";
            redirect('Mekanik/Form','refresh');
        }elseif($var["var"] == 3){
            echo "<script>alert('Gagal, Action Simpan Gagal.');</script>";
            redirect('Mekanik/Form','refresh');
        }elseif($var["var"] == 4){
            echo "<script>alert('Failed, Cannot Process Check NIP Mekanik.');</script>";
            redirect('Mekanik/Form','refresh');
        }else{
            echo "<script>alert('Gagal Pengecekan Mekanik.');</script>";
            redirect('Mekanik/Form','refresh');
        }
    }

	public function editMekanik($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Mekanik.');</script>";
	            redirect('Mekanik/List_mekanik','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_mekanik->data_editMekanik($Id);
				$data['url_edit'] = base_url().'Mekanik/edit_mekanik';
		        $test = $this->M_mekanik->data_editMekanik($Id);
		        //print_r($test);die();
		        $this->load->view("Mekanik/edit_mekanik",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_mekanik(){
		$id_mekanik = $this->input->post('id_mekanik', TRUE);
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('jenis_kelamin', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $var = $this->M_mekanik->editMekanik($id_mekanik,$nip,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat);
        // print_r($var);
        // die();
        if($var == 1){
            echo "<script>alert('Berhasil Simpan Data Mekanik dengan NIP : ".$nip." .');</script>";
            redirect('Mekanik/List_mekanik','refresh');
        }elseif($var == 2){
            echo "<script>alert('Gagal Simpan Data Mekanik dengan NIP : ".$nip.".');</script>";
            redirect('Mekanik/List_mekanik','refresh');
        }else{
            echo "<script>alert('Gagal Update Mekanik.');</script>";
            redirect('Mekanik/List_mekanik','refresh');
        }
    }

    public function viewMekanik(){
    	if($this->session->userdata('level') == 1){
            $Id = $_REQUEST['id_mekanik'];
            $data["id_mekanik"] = $Id;
            $data["header"] = $this->M_mekanik->data_editMekanik($Id);
            $this->load->view("Mekanik/view_mekanik",$data);
        }else{
            redirect('login');
        }
    }

	public function deleteMekanik(){
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_mekanik'];
            $var = $this->M_mekanik->deleteMekanik($id);
            if($var == 1){
                echo "<script>alert('Success Delete Mekanik.');</script>";
                redirect('Mekanik/List_mekanik','refresh');
            }else{
                echo "<script>alert('Failed Delete Mekanik.');</script>";
                redirect('Mekanik/List_mekanik','refresh');
            }
        }else{
            redirect('login');
        }
    }

}

?>