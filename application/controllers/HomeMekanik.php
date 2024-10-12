<?php
defined('BASEPATH') OR exit('No direct sript allowed');

Class HomeMekanik extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('M_HomeMekanik');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}
		// if($this->session->userdata('role') == 1){
			// redirect(base_url("login"));
		// }
	}

	function index(){
		$data["color"]=$this->mixColor();
		$this->load->view('Tamplates/header');
		$this->load->view('v_Mekanik',$data);
		$this->load->view('Tamplates/footer');
	}

	public function mixColor(){
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