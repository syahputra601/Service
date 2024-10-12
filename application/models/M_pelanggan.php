<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_pelanggan extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->pelanggan='pelanggan';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('pelanggan');
        return $db;
    }

    function tampil_data_pelanggan($Username=''){
        $this->db->where('deleted', 0);
        $this->db->where('username', $Username);
        $db = $this->db->get('pelanggan');
        return $db;
    }

	public function getKodePelanggan(){//not used
		$data = $this->db->get('pelanggan');
		$count = $data->num_rows() + 2;
		if ($count < 10 ) {
			$code = "PL-00".$count;
		}
		elseif ($count < 100) {
			$code = "PL-0".$count;
		}
		else{
			$code = "PL-".$count;
		}
		return $code;
	}

	function addPelanggan($kode_pel,$username_pel,$nama,$email,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat) {
		// print_r($kode_pel);
		// die();
        $deleted = 0;
        $cek = $this->db->query("SELECT * FROM pelanggan where kode_pel ='".$kode_pel."' AND deleted = '".$deleted."'")->num_rows();
        // print_r($this->db->last_query());
        // die();
        //print_r($cek);die();
        if($cek == 1 || $cek > 1){//jika data sudah ada
            $var = 1;
            $data=array('var' => 1
                        );
            return $data;
        }
        elseif($cek == 0){//jika data tidak ada
            $cek2 = $this->db->query("SELECT * FROM pelanggan where username ='".$username_pel."' AND deleted = '".$deleted."'")->num_rows();
            // print_r($this->db->last_query());
            // die();
            if($cek2 == 1 || $cek2 > 1){//jika data username sudah ada
                $var = 5;
                $data=array('var' => 5
                            );
                return $data;
            }elseif($cek2 == 0 || $cek2 < 1){
                $data = array(
                    'kode_pel' => $kode_pel,
                    'username' => $username_pel,
                    'nama_pel' => $nama,
                    'email' => $email,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'jk' => $jk,
                    'no_hp' => $no_hp,        
                    'alamat' => $alamat,   
                    'deleted' => 0,         
                    'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                );
                $this->db->insert('pelanggan', $data);
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
            }else{
                $var = 6;
                $data=array('var' => 6
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

    function data_editPelanggan($Id=''){
        $sql = $this->db->query("SELECT a.id_pel, a.kode_pel, a.username, a.nama_pel, a.email, a.tempat_lahir, a.tgl_lahir, a.jk, a.no_hp, a.alamat FROM pelanggan a WHERE a.id_pel='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function editPelanggan($id_pel,$kode_pel,$username_pel,$email,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat) {
		$data = array(
            'nama_pel' => $nama,
            'email' => $email,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jk' => $jk,
            'no_hp' => $no_hp,
            'alamat' => $alamat
        );
        $this->db->where('id_pel', $id_pel);
        $this->db->update('pelanggan', $data);
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

	function deletePelanggan($id) {
        $data = array(
            'deleted' => 1
        );
        $this->db->where('id_pel', $id);
        $this->db->update('pelanggan', $data);
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