<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_po extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->po='po';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('po');
        return $db;
    }

    function list_sparepart(){
        $this->db->where('deleted', 0);
        $sql = $this->db->get('spare_part');
        // if ($sql->num_rows() > 0) {
            return $sql->result_array();
        // }    
    }

    function ambil($idbarang=null){
        if ($idbarang != null){
            $this->db->select("*");
            $this->db->from('spare_part');
            $this->db->where("id_sparepart",$idbarang);
            $sql = $this->db->get();
            if ($sql->num_rows() > 0) {
                return $sql->result_array() ;
            }else {
                return null ;
            }
        }
    }

	public function getNomorPO(){
		$data = $this->db->get('po');
		$count = $data->num_rows() + 1;
		if ($count < 10 ) {
			$code = "PO-00".$count;
		}
		elseif ($count < 100) {
			$code = "PO-0".$count;
		}
		else{
			$code = "PO-".$count;
		}
		return $code;
	}

    public function getbyID($kode = null){
        $this->db->where('id_sparepart',$kode);
        $sql = $this->db->get('spare_part');
        if ($sql->num_rows() > 0)
        {
            return $sql->row_array(); 
        }
    }

    public function saveHeader($data){
        if ($data != null) {
            $sql = $this->db->insert('po', $data);
            return $sql;
        }
    }

    public function saveDetail($data){
        if ($data != null) {
            $sql = $this->db->insert('detail_po', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
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

    function dataHeaderPO($Id=''){
        $sql = $this->db->query("SELECT a.id_po, a.nomor_po, a.tanggal_po, a.nama_po, a.keterangan, a.status, a.total FROM po a WHERE a.id_po='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function dataDetailPO($Nomor_po=''){
        $hasil=$this->db->query("SELECT * FROM detail_po WHERE nomor_po='$Nomor_po'");
        return $hasil->result();
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

	function deletePO($id) {
        $data = array(
            'deleted' => 1,
            'deleted_by' => 'Deleted by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').') At '.date('Y-m-d H:i:s')
        );
        $this->db->where('id_po', $id);
        $this->db->update('po', $data);
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

    function viewReportPO($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT p.nomor_po as nomor_po, p.tanggal_po as tanggal_po, d.sku as sku_detail, d.qty as qty_detail, d.total_harga as total_harga FROM po AS p INNER JOIN detail_po AS d ON p.nomor_po = d.nomor_po INNER JOIN spare_part AS s ON d.sku = s.sku WHERE tanggal_po >= '".$date_start."' AND tanggal_po <= '".$date_end."' ORDER BY p.tanggal_po DESC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

}

?>