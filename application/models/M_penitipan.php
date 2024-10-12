<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_penitipan extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->penitipan='penitipan_motor';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('penitipan_motor');
        return $db;
    }

	public function getNoPenitipan(){
		$data = $this->db->get('penitipan_motor');
		$count = $data->num_rows() + 1;
		if ($count < 10 ) {
			$code = "P00".$count;
		}
		elseif ($count < 100) {
			$code = "P0".$count;
		}
		else{
			$code = "P".$count;
		}
		return $code;
	}

	function addPenitipan($no_penitipan,$no_kendaraan,$nama_pemilik,$no_telp,$nama_penerima,$tgl_penitipan,$tgl_ambil,$status) {
		// print_r($no_penitipan);
		// die();
        $deleted = 0;
        $cek = $this->db->query("SELECT * FROM penitipan_motor where no_penitipan ='".$no_penitipan."' AND deleted = '".$deleted."'")->num_rows();
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
            $data = array(
                    'no_penitipan' => $no_penitipan,
                    'no_kendaraan' => $no_kendaraan,
                    'nama_pemilik' => $nama_pemilik,
                    'no_telp' => $no_telp,
                    'nama_penerima' => $nama_penerima,
                    'tgl_penitipan' => $tgl_penitipan,        
                    'tgl_ambil' => $tgl_ambil,  
                    'status' => $status,
                    'deleted' => 0,         
                    'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                );
            $this->db->insert('penitipan_motor', $data);
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

    function data_editPenitipan($Id=''){
        $sql = $this->db->query("SELECT a.id_penitipan, a.no_penitipan, a.no_kendaraan, a.nama_pemilik, a.no_telp, a.nama_penerima, a.tgl_penitipan, a.tgl_ambil, a.status FROM penitipan_motor a WHERE a.id_penitipan='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function editPenitipan($id_penitipan,$no_penitipan,$no_kendaraan,$nama_pemilik,$no_telp,$nama_penerima,$tgl_penitipan,$tgl_ambil,$status) {
		$data = array(
            'no_penitipan' => $no_penitipan,
            'no_kendaraan' => $no_kendaraan,
            'nama_pemilik' => $nama_pemilik,
            'no_telp' => $no_telp,
            'nama_penerima' => $nama_penerima,
            'tgl_penitipan' => $tgl_penitipan,
            'tgl_ambil' => $tgl_ambil,
            'status' => $status
        );
        $this->db->where('id_penitipan', $id_penitipan);
        $this->db->update('penitipan_motor', $data);
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

	function deletePenitipan($id) {
        $data = array(
            'deleted' => 1
        );
        $this->db->where('id_penitipan', $id);
        $this->db->update('penitipan_motor', $data);
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

    function viewPenitipan($id_penitipan=''){
        $sql = $this->db->query("SELECT * FROM penitipan_motor WHERE id_penitipan = '".$id_penitipan."' ")->result_array();
        // echo $this->db->last_query();die();
        return $sql; 
    }

    function viewReportPenitipan($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM penitipan_motor WHERE tgl_penitipan >= '".$date_start."' AND tgl_penitipan <= '".$date_end."' ORDER BY id_penitipan ASC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

}

?>