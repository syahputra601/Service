<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_HomeService extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->home_service='home_service';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('home_service');
        return $db;
    }

    function tampil_data_pelanggan($Username=''){
        $this->db->where('deleted', 0);
        $this->db->where('username', $Username);
        $db = $this->db->get('home_service');
        return $db;
    }

	public function getKodeHomeService(){
		$data = $this->db->get('home_service');
		$count = $data->num_rows() + 1;
		if ($count < 10 ) {
			$code = "HS-00".$count;
		}
		elseif ($count < 100) {
			$code = "HS-0".$count;
		}
		else{
			$code = "HS-".$count;
		}
		return $code;
	}

	function addHomeService($nama,$no_hp,$tgl,$waktu,$alamat,$keluhan,$username) {
		// print_r($nip);
		// die();
        $data = array(
                'nama' => $nama,
                'no_hp' => $no_hp,
                'tgl_reservasi' => $tgl,
                'waktu_reservasi' => $waktu,
                'alamat' => $alamat,
                'keluhan' => $keluhan, 
                'username' => $username,
                'deleted' => 0,         
                'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
            );
        $this->db->insert('home_service', $data);
        // print_r($this->db->affected_rows());
        // die();
        $x = $this->db->affected_rows();
        if($x == 1){//jika sukses save data
            $data=array('var' => 1
                        );
            return $data;
        }else{//jika gagal save data
            $var = 2;
            $data=array('var' => 2
                        );
            return $data;
        }
    }

    function data_editHomeService($Id=''){
        $sql = $this->db->query("SELECT a.id_home_service, a.nama, a.no_hp, a.tgl_reservasi, a.waktu_reservasi, a.alamat, a.keluhan FROM home_service a WHERE a.id_home_service='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function editHomeService($id,$nama,$no_hp,$tgl,$waktu,$alamat,$keluhan) {
		$data = array(
            'nama' => $nama,
            'no_hp' => $no_hp,
            'tgl_reservasi' => $tgl,
            'waktu_reservasi' => $waktu,
            'alamat' => $alamat,
            'keluhan' => $keluhan
        );
        $this->db->where('id_home_service', $id);
        $this->db->update('home_service', $data);
        //echo $this->db->last_query();die();
        $var = $this->db->affected_rows();
        if($var == 1){
            $var = 1;
            return $var;
        }else{
            $var = 2;
            return $var;
        }
    }

	function deleteHomeService($id) {
        $data = array(
            'deleted' => 1
        );
        $this->db->where('id_home_service', $id);
        $this->db->update('home_service', $data);
        //echo $this->db->last_query();die();
        $var = $this->db->affected_rows();
        if($var == 1){//jika berhasil
            $var = 1;
            return $var;
        }else{
            $var = 0;//jika gagal
            return $var;
        }
    }

}

?>