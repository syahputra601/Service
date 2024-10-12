<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_Antrian extends CI_Model{

	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->antrian='antrian';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('antrian');
        return $db;
    }

    function tampil_data_pelanggan($Username=''){
        $this->db->where('deleted', 0);
        $this->db->where('username', $Username);
        $db = $this->db->get('antrian');
        return $db;
    }

    public function getKodeAntrian($tipe_antrian=''){
    	//start logic reset kode antrian
    	$dateNow = date('Y-m-d');//date('Y-m-d H:i:s')
    	$cek = $this->db->query("SELECT * FROM antrian where tanggal_masuk ='".$dateNow."'")->num_rows();
    	// print_r($this->db->last_query());
    	if($cek == 1){//jika data ada satu/lebih (tanggal sudah ada)
    		$var_cek = 1;
    	}elseif($cek == 0){//jika data tidak ada (tida ada data)
    		$var_cek = 0;
    	}else{//jika action proses cek gagal
    		$var_cek = 2;
    	}
    	// print_r($var_cek);die();
    	//end logic reset kode antrian
    	if($var_cek == 1 || $var_cek == 2){//jika data tanggal sekarang sudah ada
    		$this->db->where('tanggal_masuk', $dateNow);
            $this->db->where('tipe_antrian', $tipe_antrian);
    		$data = $this->db->get('antrian');
	        $count = $data->num_rows() + 1;
	        if ($count < 10 ) {
	            $code = "A00".$count;
	        }
	        elseif ($count < 100) {
	            $code = "A0".$count;
	        }
	       	else{
	           	$code = "A".$count;
	        }
    	}elseif($var_cek == 0){//jika data tanggal sekarang tidak ada
    		$this->db->where('tanggal_masuk', $dateNow);
            $this->db->where('tipe_antrian', $tipe_antrian);
    		$data = $this->db->get('antrian');
	        $count = $data->num_rows() + 1;
	        if ($count < 10 ) {
	            $code = "A00".$count;
	        }
	        elseif ($count < 100) {
	            $code = "A0".$count;
	        }
	       	else{
	           	$code = "A".$count;
	        }
    	}else{
    		$code = "Cek_Error";
    	}
       	return $code;
    }

    public function getKodeAntrianHomeService($tipe_antrian=''){
        //start logic reset kode antrian
        $dateNow = date('Y-m-d');//date('Y-m-d H:i:s')
        $cek = $this->db->query("SELECT * FROM antrian where tanggal_masuk ='".$dateNow."'")->num_rows();
        // print_r($this->db->last_query());
        if($cek == 1){//jika data ada satu/lebih (tanggal sudah ada)
            $var_cek = 1;
        }elseif($cek == 0){//jika data tidak ada (tida ada data)
            $var_cek = 0;
        }else{//jika action proses cek gagal
            $var_cek = 2;
        }
        // print_r($var_cek);die();
        //end logic reset kode antrian
        if($var_cek == 1 || $var_cek == 2){//jika data tanggal sekarang sudah ada
            $this->db->where('tanggal_masuk', $dateNow);
            $this->db->where('tipe_antrian', $tipe_antrian);
            $data = $this->db->get('antrian');
            $count = $data->num_rows() + 1;
            if ($count < 10 ) {
                $code = "B00".$count;
            }
            elseif ($count < 100) {
                $code = "B0".$count;
            }
            else{
                $code = "B".$count;
            }
        }elseif($var_cek == 0){//jika data tanggal sekarang tidak ada
            $this->db->where('tanggal_masuk', $dateNow);
            $this->db->where('tipe_antrian', $tipe_antrian);
            $data = $this->db->get('antrian');
            $count = $data->num_rows() + 1;
            if ($count < 10 ) {
                $code = "B00".$count;
            }
            elseif ($count < 100) {
                $code = "B0".$count;
            }
            else{
                $code = "B".$count;
            }
        }else{
            $code = "Cek_Error";
        }
        return $code;
    }

    function viewStrukAntrian($id_antrian=''){
    	$sql = $this->db->query("SELECT a.id_antrian, a.kode_antrian, a.username, a.tanggal_masuk, a.waktu_masuk, a.tipe_antrian, a.kode_jam_antrian, a.status FROM antrian a WHERE a.id_antrian='".$id_antrian."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();
    }

    function getIDAntrian($kode_antrian,$username,$date_in,$time_in,$tipe_antrian,$token){
        $sql = $this->db->query("SELECT id_antrian FROM antrian WHERE kode_antrian='".$kode_antrian."' AND username='".$username."' AND tanggal_masuk='".$date_in."' AND waktu_masuk='".$time_in."' AND token='".$token."' AND tipe_antrian ='".$tipe_antrian."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();
    }

    function getIDAntrianHomeService($kode_antrian,$username,$date_in,$time_in,$tipe_antrian,$token,$kode_jam_antrian){
        $sql = $this->db->query("SELECT id_antrian FROM antrian WHERE kode_antrian='".$kode_antrian."' AND username='".$username."' AND tanggal_masuk='".$date_in."' AND waktu_masuk='".$time_in."' AND token='".$token."' AND tipe_antrian ='".$tipe_antrian."' AND kode_jam_antrian = '".$kode_jam_antrian."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();
    }

    function addAntrian($kode_antrian,$username,$token,$date_in,$time_in) {
        $tipe_antrian = 'Bengkel';
        $deleted = 0;
        $cek = $this->db->query("SELECT * FROM antrian where kode_antrian ='".$kode_antrian."' AND tanggal_masuk = '".$date_in."' AND tipe_antrian = '".$tipe_antrian."' AND deleted = '".$deleted."'")->num_rows();
        //print_r($cek);die();
        // if($cek == 0){//jika data belum ada
        //     $var = 5;
        //     return $var;
        // }
        if($cek == 1 || $cek > 0){//jika data sudah ada
            $var = 1;
            $data=array('var' => 1,
                        'AntrianID' => 0
                        );
            return $data;
        }
        elseif($cek == 0){//jika data tidak ada
            $data = array(
                    'kode_antrian' => $kode_antrian,
                    'username' => $username,
                    'tanggal_masuk' => $date_in,
                    'waktu_masuk' => $time_in,
                    'tipe_antrian' => $tipe_antrian,
                    'status' => 0,        
                    'token' => $token,            
                    'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                );
            $this->db->insert('antrian', $data);
            // print_r($this->db->affected_rows());
            // die();
            $x = $this->db->affected_rows();
            if($x == 1){//jika sukses save data
                $get_idAntrian = $this->getIDAntrian($kode_antrian,$username,$date_in,$time_in,$tipe_antrian,$token);
                foreach ($get_idAntrian as $row) {
                    $ID= $row["id_antrian"];
                }
                $data=array('var' => 2,
                            'AntrianID' => $ID
                            );
                // $var = 2;
                // print_r($data);
                // die();
                return $data;
            }else{//jika gagal save data
                $var = 3;
                $data=array('var' => 3,
                            'AntrianID' => 0
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
            $data=array('var' => 4,
                        'AntrianID' => 0
                        );
            return $data;
        }
    }

    function addAntrianHomeService($kode_antrian,$username,$token,$date_in,$time_in,$kode_jam_antrian) {
        $tipe_antrian = 'HomeService';
        $deleted = 0;
        //start get waktu dari kode jam antrian
        if($kode_jam_antrian == "A1"){
            $WaktuReservasi = "08:00";
        }elseif($kode_jam_antrian == "A2"){
            $WaktuReservasi = "08:30";
        }elseif($kode_jam_antrian == "B1"){
            $WaktuReservasi = "09:00";
        }elseif($kode_jam_antrian == "B2"){
            $WaktuReservasi = "09:30";
        }elseif($kode_jam_antrian == "C1"){
            $WaktuReservasi = "10:00";
        }elseif($kode_jam_antrian == "C2"){
            $WaktuReservasi = "10:30";
        }elseif($kode_jam_antrian == "D1"){
            $WaktuReservasi = "11:00";
        }elseif($kode_jam_antrian == "D2"){
            $WaktuReservasi = "11:30";
        }elseif($kode_jam_antrian == "E1"){
            $WaktuReservasi = "13:00";
        }elseif($kode_jam_antrian == "E2"){
            $WaktuReservasi = "13:30";
        }elseif($kode_jam_antrian == "F1"){
            $WaktuReservasi = "14:00";
        }elseif($kode_jam_antrian == "F2"){
            $WaktuReservasi = "14:30";
        }elseif($kode_jam_antrian == "G1"){
            $WaktuReservasi = "15:00";
        }elseif($kode_jam_antrian == "G2"){
            $WaktuReservasi = "15:30";
        }elseif($kode_jam_antrian == "H1"){
            $WaktuReservasi = "16:00";
        }elseif($kode_jam_antrian == "H2"){
            $WaktuReservasi = "16:30";
        }else{
            $WaktuReservasi = "17:00";
        }
        //end get waktu dari kode jam antrian
        $TimeNow = date('H:i');
        // $TimeNow = date('08:01');//Testing
        $valid_time = "17:00";
        $start_valid_time = "08:00";
        //start Cek level zero condition
        if($TimeNow > $valid_time){
            $data=array('var' => 7,
                        'AntrianID' => 0
                        );
            return $data;
        }else{
            //start cek waktu validasi new
            // if($TimeNow < $WaktuReservasi){//$TimeNow > $start_valid_time
            //$WaktuReservasi < $start_valid_time || $TimeNow < $WaktuReservasi
            if($WaktuReservasi >= $start_valid_time){//$start_valid_time < $WaktuReservasi
               //start Cek Level 1
                $cek_kodeJamAntrian = $this->db->query("SELECT * FROM antrian where tanggal_masuk = '".$date_in."' AND tipe_antrian = '".$tipe_antrian."' AND kode_jam_antrian = '".$kode_jam_antrian."' AND deleted = '".$deleted."'")->num_rows();
                //Cek Level 1
                if($cek_kodeJamAntrian == 3){//jika data sudah ada 3
                    $var = 5;
                    $data=array('var' => 5,
                                'AntrianID' => 0
                                );
                    return $data;
                }elseif($cek_kodeJamAntrian < 3){//jika data tidak ada
                    $cek = $this->db->query("SELECT * FROM antrian where kode_antrian ='".$kode_antrian."' AND tanggal_masuk = '".$date_in."' AND tipe_antrian = '".$tipe_antrian."' AND deleted = '".$deleted."'")->num_rows();
                    // print_r($this->db->last_query());
                    // print_r($cek);
                    // die();
                    if($cek == 1 || $cek > 0){//jika data sudah ada
                        $var = 1;
                        $data=array('var' => 1,
                                    'AntrianID' => 0
                                    );
                        return $data;
                    }
                    elseif($cek == 0){//jika data tidak ada
                        $data = array(
                                'kode_antrian' => $kode_antrian,
                                'username' => $username,
                                'tanggal_masuk' => $date_in,
                                'waktu_masuk' => $time_in,
                                'tipe_antrian' => $tipe_antrian,
                                'kode_jam_antrian' => $kode_jam_antrian,
                                'status' => 0,        
                                'token' => $token,            
                                'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                            );
                        $this->db->insert('antrian', $data);
                        // print_r($this->db->affected_rows());
                        // die();
                        $x = $this->db->affected_rows();
                        if($x == 1){//jika sukses save data
                            $get_idAntrian = $this->getIDAntrianHomeService($kode_antrian,$username,$date_in,$time_in,$tipe_antrian,$token,$kode_jam_antrian);
                            foreach ($get_idAntrian as $row) {
                                $ID= $row["id_antrian"];
                            }
                            $data=array('var' => 2,
                                        'AntrianID' => $ID
                                        );
                            // $var = 2;
                            // print_r($data);
                            // die();
                            return $data;
                        }else{//jika gagal save data
                            $var = 3;
                            $data=array('var' => 3,
                                        'AntrianID' => 0
                                        );
                            return $data;
                        }
                    }else{//jika process pengecekan gagal
                        $var = 4;
                        $data=array('var' => 4,
                                    'AntrianID' => 0
                                    );
                        return $data;
                    }
                }else{
                    $var = 6;
                        $data=array('var' => 6,
                                    'AntrianID' => 0
                                    );
                        return $data;
                }//end cek level 1
            }else{
                $data=array('var' => 8,
                        'AntrianID' => 0
                        );
                return $data; 
            }
            //end cek waktu validasi new
            
        }
        //end Cek level zero condition
    }

    function deleteAntrian($id) {
        // $delete_antrian= "DELETE FROM antrian WHERE id_antrian = '" . $this->db->escape_str($id) . "'";
        // $this->db->query($delete_antrian);
        $data = array(
            'deleted' => 1
        );
        $this->db->where('id_antrian', $id);
        $this->db->update('antrian', $data);
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

    function data_editAtrian($Id=''){
        $sql = $this->db->query("SELECT * FROM antrian WHERE id_antrian = '".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function editAntrian($id_antrian,$status) {
        $data = array(
            'status' => $status
        );
        $this->db->where('id_antrian', $id_antrian);
        $this->db->update('antrian', $data);
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

    function viewReportAntrian($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM antrian AS a INNER JOIN user AS u ON a.username = u.Username WHERE tanggal_masuk >= '".$date_start."' AND tanggal_masuk <= '".$date_end."' AND deleted = 0 ORDER BY id_antrian DESC ")->result();
        // echo $this->db->last_query();die();
        return $sql; 
    }

    function getSumTerlayani($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM antrian WHERE tanggal_masuk >= '".$date_start."' AND tanggal_masuk <= '".$date_end."' AND status = 1 AND deleted = 0")->num_rows();
        // echo $this->db->last_query();die();
        return $sql;
    }

    function getSumLost($date_start='',$date_end=''){
        $sql = $this->db->query("SELECT * FROM antrian WHERE tanggal_masuk >= '".$date_start."' AND tanggal_masuk <= '".$date_end."' AND status = 0 AND deleted = 0")->num_rows();
        // echo $this->db->last_query();die();
        return $sql;
    }

}

?>