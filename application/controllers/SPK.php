<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class SPK extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_SPK');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['url_save'] = base_url().'SPK/save_spk';
		$this->load->view('SPK/form_spk',$data);
	}

}

?>