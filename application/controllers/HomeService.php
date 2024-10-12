<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class HomeService extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_HomeService');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function List_homeservice(){
        $Username=$this->session->userdata('username');
        if($this->session->userdata('role') == 2){
            $data['HomeService'] = $this->M_HomeService->tampil_data_pelanggan($Username)->result();
        }else{
            $data['HomeService'] = $this->M_HomeService->tampil_data()->result();
        }
		$this->load->view('HomeService/list_homeservice',$data);
	}

	function Form(){
		$username = $this->session->userdata('username');
        $data['username'] = $username;
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		// $data['KodeHS'] = $this->M_HomeService->getKodeHomeService();//No used
		$data['url_save'] = base_url().'HomeService/save_homeservice';
		$this->load->view('HomeService/form_homeservice',$data);
	}

	public function save_homeservice(){
        $nama = $this->input->post('nama', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $tgl = $this->input->post('tgl', TRUE);
        $waktu = $this->input->post('waktu', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $keluhan = $this->input->post('keluhan', TRUE);
        $username = $this->input->post('username', TRUE);
        $start_work = "08:00";
        $last_work = "17:00";
        if($waktu >= $last_work){//di cancel
            // print_r("1");
            // die();
            echo "<script>alert('Failed, Hanya melayani pada saat jam kerja (08:00 - 17:00), Terimakasih.');</script>";
            redirect('HomeService/Form','refresh');
        }
        if($waktu <= $start_work){//di cancel
            // print_r("2");
            // die();
            echo "<script>alert('Failed, Hanya melayani pada saat jam kerja (08:00 - 17:00), Terimakasih.');</script>";
            redirect('HomeService/Form','refresh');
        }
        $var = $this->M_HomeService->addHomeService($nama,$no_hp,$tgl,$waktu,$alamat,$keluhan,$username);
        // print_r($var);
        // die();
        if($var["var"] == 1){
            echo "<script>alert('Sukses, Melakukan Reservasi Home Service.');</script>";
            redirect('HomeService/Form','refresh');
        }elseif($var["var"] == 2){
            echo "<script>alert('Gagal Simpan Data Reservasi Home Service.');</script>";
            redirect('HomeService/Form','refresh');
        }else{
            echo "<script>alert('Gagal Semua.');</script>";
            redirect('HomeService/Form','refresh');
        }
    }

	public function editHomeService($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Home Service.');</script>";
	            redirect('HomeService/List_homeservice','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_HomeService->data_editHomeService($Id);
				$data['url_edit'] = base_url().'HomeService/edit_homeservice';
		        $test = $this->M_HomeService->data_editHomeService($Id);
		        //print_r($test);die();
		        $this->load->view("HomeService/edit_homeservice",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_homeservice(){
		$id = $this->input->post('id_home_service', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $tgl = $this->input->post('tgl', TRUE);
        $waktu = $this->input->post('waktu', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $keluhan = $this->input->post('keluhan', TRUE);
        $start_work = "08:00";
        $last_work = "17:00";
        if($waktu >= $last_work){//di cancel
            // print_r("1");
            // die();
            echo "<script>alert('Failed, Hanya melayani pada saat jam kerja (08:00 - 17:00), Terimakasih.');</script>";
            redirect('HomeService/List_homeservice','refresh');
        }
        if($waktu <= $start_work){//di cancel
            // print_r("2");
            // die();
            echo "<script>alert('Failed, Hanya melayani pada saat jam kerja (08:00 - 17:00), Terimakasih.');</script>";
            redirect('HomeService/List_homeservice','refresh');
        }
        $var = $this->M_HomeService->editHomeService($id,$nama,$no_hp,$tgl,$waktu,$alamat,$keluhan);
        // print_r($var);
        // die();
        if($var == 1){
            echo "<script>alert('Berhasil Simpan Data Home Service.');</script>";
            redirect('HomeService/List_homeservice','refresh');
        }elseif($var == 2){
            echo "<script>alert('Gagal Simpan Data Home Service.');</script>";
            redirect('HomeService/List_homeservice','refresh');
        }else{
            echo "<script>alert('Gagal Update Home Service.');</script>";
            redirect('HomeService/List_homeservice','refresh');
        }
    }

    public function viewHomeService(){
    	if($this->session->userdata('level') == 1){
            $Id = $_REQUEST['id_home_service'];
            $data["id_home_service"] = $Id;
            $data["header"] = $this->M_HomeService->data_editHomeService($Id);
            $this->load->view("HomeService/view_homeservice",$data);
        }else{
            redirect('login');
        }
    }

	public function deleteHomeService(){
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_home_service'];
            $var = $this->M_HomeService->deleteHomeService($id);
            if($var == 1){
                echo "<script>alert('Success Delete Home Service.');</script>";
                redirect('HomeService/List_homeservice','refresh');
            }else{
                echo "<script>alert('Failed Delete Home Service.');</script>";
                redirect('HomeService/List_homeservice','refresh');
            }
        }else{
            redirect('login');
        }
    }

}

?>