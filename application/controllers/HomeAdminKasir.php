<?php
defined('BASEPATH') or exit('no direct script allowed');

Class HomeAdminKasir extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('M_HomeAdminKasir');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}

	}

	function index(){
		$data["color"]=$this->mixColor();
		$data["nama_user"]=$this->session->userdata('nama');
		$this->load->view('Tamplates/header');
		$this->load->view('v_AdminKasir',$data);
		$this->load->view('Tamplates/footer');
	}

	function mixColor(){
		$color = array("red",
					   "blue",
					   "pink",
					   "purple",
					   "brown"
						);
		shuffle($color);
		$mixColorFix = array_shift($color);//array_shufle
		return $mixColorFix;
	}

}

?>