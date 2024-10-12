<?php
defined('BASEPATH') or exit('no direct script allowed');

Class M_trx extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
			$this->transaksi='transaksi';
			$this->detail_transaksi='detail_transaksi';
            date_default_timezone_set("Asia/Jakarta");
	}

	function tampil_data(){
        // $this->db->where('deleted', 0);
        $db = $this->db->get('transaksi');
        return $db;
    }

    function tampil_data_pelanggan($Username=''){
        $this->db->where('username', $Username);
        $db = $this->db->get('transaksi');
        return $db;
    }

	function nextStep($kode_antrian,$Username) {
		$tipe_antrian = 'HomeService';
        $deleted = 0;
        $status = 0;
        $date_in = date('Y-m-d');
		//start coding cek kode antrian
		//AND tipe_antrian = '".$tipe_antrian."'
		$cek_level1 = $this->db->query("SELECT * FROM antrian where kode_antrian ='".$kode_antrian."' AND tanggal_masuk = '".$date_in."' AND deleted = '".$deleted."'")->num_rows();
		if($cek_level1 == 1){//jika data ada
			//start cek jika kode antrian sudah terlayani/status berubah jadi 1
			$cek_level2 = $this->db->query("SELECT * FROM antrian where kode_antrian ='".$kode_antrian."' AND tanggal_masuk = '".$date_in."' AND deleted = '".$deleted."' AND status = '".$status."' ")->num_rows();
			if($cek_level2 == 1){
				//start update status data antrian
				$data = array(
		            'status' => 1,
		            'updated_by' => 'Updated Status by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').') At '.date('Y-m-d H:i:s')
		        );
		        $this->db->where('tanggal_masuk', $date_in);
		        // $this->db->where('tipe_antrian', $tipe_antrian);
		        $this->db->where('kode_antrian', $kode_antrian);
		        $this->db->update('antrian', $data);
	        	// echo $this->db->last_query();die();
				//end update status data antrian
				$var2 = $this->db->affected_rows();
				// print_r($var2);die();
		        if($var2 == 1){//jika berhasil
		            $var2 = 1;
		            return $var2;
		        }else{
		            $var2 = 0;//jika gagal
		            return $var2;
		        }
			}else{
				$var = 4;
	            return $var;
			}
			//end cek jika kode antrian sudah terlayani/status berubah jadi 1
        }elseif($cek_level1 == 0){//jika data tidak ada
        	$var = 2;
            return $var;
        }else{//jika pengecekan gagal
        	$var = 3;
            return $var;
        }
		//end coding cek kode antrian
    }

    function nextStepBack($kode_antrian,$Username) {
        $tipe_antrian = 'HomeService';
        $deleted = 0;
        $status = 0;
        $date_in = date('Y-m-d');
        //start coding cek kode antrian
        //AND tipe_antrian = '".$tipe_antrian."'
        $cek_level1 = $this->db->query("SELECT * FROM antrian where kode_antrian ='".$kode_antrian."' AND tanggal_masuk = '".$date_in."' AND deleted = '".$deleted."'")->num_rows();
        if($cek_level1 == 1){//jika data ada
            //start cek jika kode antrian sudah terlayani/status berubah jadi 1
            $cek_level2 = $this->db->query("SELECT * FROM antrian where kode_antrian ='".$kode_antrian."' AND tanggal_masuk = '".$date_in."' AND deleted = '".$deleted."' AND status = '".$status."' ")->num_rows();
            if($cek_level2 == 1){
                //start update status data antrian
                $data = array(
                    'status' => 0,
                    'updated_by' => 'Updated Status by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').') At '.date('Y-m-d H:i:s')
                );
                $this->db->where('tanggal_masuk', $date_in);
                // $this->db->where('tipe_antrian', $tipe_antrian);
                $this->db->where('kode_antrian', $kode_antrian);
                $this->db->update('antrian', $data);
                // echo $this->db->last_query();die();
                //end update status data antrian
                $var2 = $this->db->affected_rows();
                // print_r($var2);die();
                if($var2 == 1){//jika berhasil
                    $var2 = 1;
                    return $var2;
                }else{
                    $var2 = 0;//jika gagal
                    return $var2;
                }
            }else{
                $var = 4;
                return $var;
            }
            //end cek jika kode antrian sudah terlayani/status berubah jadi 1
        }elseif($cek_level1 == 0){//jika data tidak ada
            $var = 2;
            return $var;
        }else{//jika pengecekan gagal
            $var = 3;
            return $var;
        }
        //end coding cek kode antrian
    }

    function getNoInvoice(){
    	$YearNow = date('Y');
        // $this->db->where('tipe_antrian', $tipe_antrian);
		$data = $this->db->get('transaksi');
        $count = $data->num_rows() + 1;
        if ($count < 10 ) {
        	$code = "INV/".$YearNow."/IV/"."000".$count;
        }
        elseif ($count < 100) {
            $code = "INV/".$YearNow."/IV/"."00".$count;
        }
        elseif ($count < 1000) {
            $code = "INV/".$YearNow."/IV/"."0".$count;
        }
       	else{
           	$code = "INV/".$YearNow."/IV/".$count;
        }
        return $code;
    }

    function listMekanik(){  
        $sql = $this->db->query("SELECT id_mekanik, nip, nama_mekanik FROM mekanik WHERE deleted = 0 ORDER BY id_mekanik ASC");
        //print_r($this->db->last_query());die();
        return $sql->result_array(); 
    }

    public function getbysku($kode = null){
		$this->db->where('sku',$kode);
		$sql = $this->db->get('spare_part');
		if ($sql->num_rows() > 0)
		{
			return $sql->row_array(); 
		}
	}

	public function saveHeader($data){
        if ($data != null) {
            $sql = $this->db->insert('transaksi', $data);
            return $sql;
        }
    }

    function ambil($idbarang=null){
        if ($idbarang != null){
            $this->db->select("*");
            $this->db->from('spare_part');
            $this->db->where("sku",$idbarang);
            $sql = $this->db->get();
            if ($sql->num_rows() > 0) {
                return $sql->result_array() ;
            }else {
                return null ;
            }
        }
    }

	function update_data_stok($where,$data,$table){
		$this->db->where($where);
		$this->db->update('spare_part',$data);
	}

	public function saveDetail($data){
        if ($data != null) {
            $sql = $this->db->insert('detail_transaksi', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getbyID($kode = null){
        $this->db->where('id_sparepart',$kode);
        $sql = $this->db->get('spare_part');
        if ($sql->num_rows() > 0)
        {
            return $sql->row_array(); 
        }
    }

    function dataHeaderTrx($Id=''){
        $sql = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi = '".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function dataDetailTrx($No_invoice=''){
        $hasil=$this->db->query("SELECT * FROM detail_transaksi WHERE no_invoice = '$No_invoice'");
        return $hasil->result();
    }

    function viewReportTrx($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM transaksi WHERE tanggal >= '".$date_start."' AND tanggal <= '".$date_end."' ORDER BY id_transaksi ASC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganDay($date_start='',$date_end=''){//not used
        $sql = $this->db->query("SELECT t.tanggal as tanggal_trans, p.tanggal_po as tanggal_po, t.total as total_trans, p.total as total_po FROM transaksi as t INNER JOIN po as p WHERE t.tanggal >= '".$date_start."' AND t.tanggal <= '".$date_end."' ORDER BY t.tanggal, p.tanggal_po DESC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganDayDebit($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM transaksi WHERE tanggal >= '".$date_start."' AND tanggal <= '".$date_end."' ORDER BY id_transaksi ASC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganDayKredit($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM po WHERE tanggal_po >= '".$date_start."' AND tanggal_po <= '".$date_end."' ORDER BY id_po ASC ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganDayDebitTotal($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT id_transaksi, SUM(total) as total_debit FROM transaksi WHERE tanggal >= '".$date_start."' AND tanggal <= '".$date_end."' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganDayKreditTotal($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT id_po, SUM(total) as total_kredit FROM po WHERE tanggal_po >= '".$date_start."' AND tanggal_po <= '".$date_end."' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganMonthDebit($Month='',$Year=''){
        // $Year = date('Y');
        $YearMonth = $Year."-".$Month;
        $sql = $this->db->query("SELECT id_transaksi, SUM(total) as total_debit FROM transaksi WHERE tanggal LIKE '%".$YearMonth."%' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganMonthKredit($Month='',$Year=''){
        // $Year = date('Y');
        $YearMonth = $Year."-".$Month;
        $sql = $this->db->query("SELECT id_po, SUM(total) as total_kredit FROM po WHERE tanggal_po LIKE '%".$YearMonth."%' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganYearDebit($Year=''){
        // $Year = date('Y');
        $sql = $this->db->query("SELECT id_transaksi, SUM(total) as total_debit FROM transaksi WHERE tanggal LIKE '%".$Year."%' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewReportKeuanganYearKredit($Year=''){
        // $Year = date('Y');
        $sql = $this->db->query("SELECT id_po, SUM(total) as total_kredit FROM po WHERE tanggal_po LIKE '%".$Year."%' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function viewTrxHeader($id_transaksi=''){
        $sql = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi = '".$id_transaksi."' ")->result_array();
        // echo $this->db->last_query();die();
        return $sql; 
    }

    function viewTrxDetail($no_invoice=''){
        $sql = $this->db->query("SELECT d.id_detail_transaksi, d.sku, d.nama_sparepart as nama_sparepart_detail, d.qty as qty_detail, d.total_harga as harga_total FROM detail_transaksi AS d WHERE d.no_invoice LIKE '".$no_invoice."' ORDER BY d.id_detail_transaksi ASC ")->result();
        // echo $this->db->last_query();die();
        return $sql; 
    }

    function GetGrandTotal($no_invoice=''){
        // $Year = date('Y');
        $sql = $this->db->query("SELECT id_detail_transaksi, SUM(total_harga) as grand_total FROM detail_transaksi WHERE no_invoice LIKE '".$no_invoice."' ")->result();
        // echo $this->db->last_query();die();
        return $sql;
    }

}

?>