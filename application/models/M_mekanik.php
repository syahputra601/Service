<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_mekanik extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->mekanik='mekanik';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('mekanik');
        return $db;
    }

	public function getNip(){
		$data = $this->db->get('mekanik');
		$count = $data->num_rows() + 1;
		if ($count < 10 ) {
			$code = "K-00".$count;
		}
		elseif ($count < 100) {
			$code = "BRG-0".$count;
		}
		else{
			$code = "BRG-".$count;
		}
		return $code;
	}

	function addMekanik($nip,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat) {
		// print_r($nip);
		// die();
        $deleted = 0;
        $cek = $this->db->query("SELECT * FROM mekanik where nip ='".$nip."' AND deleted = '".$deleted."'")->num_rows();
        // print_r($this->db->last_query());
        // die();
        //print_r($cek);die();
        // if($cek == 0){//jika data belum ada
        //     $var = 5;
        //     return $var;
        // }
        if($cek == 1 || $cek > 1){//jika data sudah ada
            $var = 1;
            $data=array('var' => 1
                        );
            return $data;
        }
        elseif($cek == 0){//jika data tidak ada
            $data = array(
                    'nip' => $nip,
                    'nama_mekanik' => $nama,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'jk' => $jk,
                    'no_hp' => $no_hp,        
                    'alamat' => $alamat,   
                    'deleted' => 0,         
                    'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                );
            $this->db->insert('mekanik', $data);
            // print_r($this->db->affected_rows());
            // die();
            $x = $this->db->affected_rows();
            if($x == 1){//jika sukses save data
                $data=array('var' => 2
                            );
                // $var = 2;
                // print_r($data);
                // die();
                return $data;
            }else{//jika gagal save data
                $var = 3;
                $data=array('var' => 3
                            );
                return $data;
            }
        }
        // elseif($cek > 1){//jika data lebih dari 1
        //     $var = 2;
        //     return $var;
        // }
        else{//jika process pengecekan gagal
            $var = 4;
            $data=array('var' => 4
                        );
            return $data;
        }
    }

    function data_editMekanik($Id=''){
        $sql = $this->db->query("SELECT a.id_mekanik, a.nip, a.nama_mekanik, a.tempat_lahir, a.tgl_lahir, a.jk, a.no_hp, a.alamat FROM mekanik a WHERE a.id_mekanik='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function editMekanik($id_mekanik,$nip,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat) {
		$data = array(
            'nama_mekanik' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jk' => $jk,
            'no_hp' => $no_hp,
            'alamat' => $alamat
        );
        $this->db->where('id_mekanik', $id_mekanik);
        $this->db->update('mekanik', $data);
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

	function deleteMekanik($id) {
        $data = array(
            'deleted' => 1
        );
        $this->db->where('id_mekanik', $id);
        $this->db->update('mekanik', $data);
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