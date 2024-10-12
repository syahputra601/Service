<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_sparepart extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->spare_part='spare_part';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('spare_part');
        return $db;
    }

	public function getKodeSparepart(){
		$data = $this->db->get('spare_part');
		$count = $data->num_rows() + 1;
		if ($count < 10 ) {
			$code = "SKU-00".$count;
		}
		elseif ($count < 100) {
			$code = "SKU-0".$count;
		}
		else{
			$code = "SKU-".$count;
		}
		return $code;
	}

	function addSparepart($sku,$nama,$qty,$harga,$status,$tgl,$sku_suplier) {
		// print_r($sku);
		// die();
        $deleted = 0;
        $cek = $this->db->query("SELECT * FROM spare_part where sku ='".$sku."' AND deleted = '".$deleted."'")->num_rows();
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
                    'sku' => $sku,
                    'nama_sparepart' => $nama,
                    'qty' => $qty,
                    'harga' => $harga,
                    'status' => $status,
                    'tanggal' => $tgl,        
                    'sku_suplier' => $sku_suplier,   
                    'deleted' => 0,         
                    'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                );
            $this->db->insert('spare_part', $data);
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

    function data_editSparepart($Id=''){
        $sql = $this->db->query("SELECT a.id_sparepart, a.sku, a.nama_sparepart, a.qty, a.harga, a.status, a.tanggal, a.sku_suplier FROM spare_part a WHERE a.id_sparepart='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function editSparepart($id_sparepart,$sku,$nama,$qty,$harga,$status,$tgl,$sku_suplier) {
		$data = array(
            'nama_sparepart' => $nama,
            'qty' => $qty,
            'harga' => $harga,
            'status' => $status,
            'tanggal' => $tgl,
            'sku_suplier' => $sku_suplier
        );
        $this->db->where('id_sparepart', $id_sparepart);
        $this->db->update('spare_part', $data);
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

	function deleteSparepart($id) {
        $data = array(
            'deleted' => 1
        );
        $this->db->where('id_sparepart', $id);
        $this->db->update('spare_part', $data);
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

    function viewReportSparepart($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM spare_part WHERE tanggal >= '".$date_start."' AND tanggal <= '".$date_end."' AND deleted = 0 ORDER BY id_sparepart ASC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function getSumTersedia($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM spare_part WHERE tanggal >= '".$date_start."' AND tanggal <= '".$date_end."' AND status = 1 AND deleted = 0 ")->num_rows();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function getSumTidakTersedia($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM spare_part WHERE tanggal >= '".$date_start."' AND tanggal <= '".$date_end."' AND status = 0 AND deleted = 0 ")->num_rows();
        // echo $this->db->last_query();die();
        return $sql;
    }

}

?>