<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class HomePemilik extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('M_HomePemilik');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
	}

	function index(){
		$data['color']=$this->mixColor();
		$data["nama_user"]=$this->session->userdata('nama');
		$this->load->view('Tamplates/header');
		$this->load->view('v_pemilik',$data);
		$this->load->view('Tamplates/footer');
	}

	function mixColor(){
		$color=array("blue",
					 "red",
					 "pink",
					 "purle",
					 "brown"
					);
		shuffle($color);
		$mixColorFix = array_shift($color);//array_shuffle
		return $mixColorFix;

	}

}


?>