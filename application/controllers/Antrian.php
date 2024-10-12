<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class Antrian extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('M_Antrian');
		// $this->load->library('../controllers/Secutiry');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		// echo "No exist Coding";
		// die();
	}

	public function token()
	{
		// load helper
		$this->load->helper('string');
		$token = random_string('alnum', 10);
		return $token;
	}

	function List_antrian(){
		$Username=$this->session->userdata('username');
        if($this->session->userdata('role') == 2){
            $data['Antrian'] = $this->M_Antrian->tampil_data_pelanggan($Username)->result();
        }else{
            $data['Antrian'] = $this->M_Antrian->tampil_data()->result();
        }
		$this->load->view('Antrian/list_antrian',$data);
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$this->load->view('Antrian/form',$data);
	}

	function antrian_bengkel(){
		$username = $this->session->userdata('username');
		$kode_token = $this->token();
		$FixToken = $username.$kode_token;
		$data['get_token']=$FixToken;
		// print_r($this->token());
		// die();
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['url_save'] = base_url().'Antrian/save_antrian';
		$data['username']=$this->session->userdata('username');
		$tipe_antrian = 'Bengkel';
		$data['antrian_kode'] = $this->M_Antrian->getKodeAntrian($tipe_antrian);
		$this->load->view('Antrian/form_antrian',$data);
	}

	function antrian_homeservice(){
		$username = $this->session->userdata('username');
		$kode_token = $this->token();
		$FixToken = $username.$kode_token;
		$data['get_token']=$FixToken;
		// print_r($this->token());
		// die();
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['JustTime'] = date('H:i');
		// $data['JustTime'] = "08:01";//Testing
		$data['url_save'] = base_url().'Antrian/save_antrian_homeservice';
		$data['username']=$this->session->userdata('username');
		$tipe_antrian = 'HomeService';
		$data['antrian_HomeService_kode'] = $this->M_Antrian->getKodeAntrianHomeService($tipe_antrian);
		$this->load->view('Antrian/form_antrian_homeservice',$data);
	}

	public function save_antrian(){
        $kode_antrian = $this->input->post('kode_antrian', TRUE);
        $username = $this->input->post('username', TRUE);
        $token = $this->input->post('token', TRUE);
        $date_in = $this->input->post('date_in', TRUE);
        $time_in = $this->input->post('time_in', TRUE);
        $start_work = "08:00";
        $last_work = "17:00";
        if($time_in >= $last_work){//di cancel
        	// print_r("1");
        	// die();
        	echo "<script>alert('Failed, Antrian bengkel dibuka kembali pada saat jam kerja (08:00 - 17:00), Terimakasih.');</script>";
            redirect('Antrian/antrian_bengkel','refresh');
        }
        if($time_in <= $start_work){//di cancel
        	// print_r("2");
        	// die();
        	echo "<script>alert('Failed, Antrian bengkel dibuka kembali pada saat jam kerja (08:00 - 17:00), Terimakasih.');</script>";
            redirect('Antrian/antrian_bengkel','refresh');
        }
        $var = $this->M_Antrian->addAntrian($kode_antrian,$username,$token,$date_in,$time_in);
        // print_r($var);
        // die();
        if($var["var"] == 1){
            echo "<script>alert('Gagal, Kode Atrian : ".$kode_antrian." Sudah di ambil');</script>";
            redirect('Antrian/antrian_bengkel','refresh');
        }elseif($var["var"] == 2){
        	$IDAntrian = $var["AntrianID"];
        	// print_r($test);
        	// die();
            echo "<script>alert('Sukses Ambil Kode Antrian : ".$kode_antrian."');</script>";
            $this->viewAntrian_now($IDAntrian);
            // redirect('Antrian','refresh');
        }elseif($var["var"] == 3){
            echo "<script>alert('Gagal, Action Simpan Gagal.');</script>";
            redirect('Antrian/antrian_bengkel','refresh');
        }elseif($var["var"] == 4){
            echo "<script>alert('Failed, Cannot Process Check Antrian.');</script>";
            redirect('Antrian/antrian_bengkel','refresh');
        }else{
            echo "<script>alert('Gagal Pengecekan Kode Antrian.');</script>";
            redirect('Antrian/antrian_bengkel','refresh');
        }
    }

    public function save_antrian_homeservice(){
        $kode_antrian = $this->input->post('kode_antrian', TRUE);
        $username = $this->input->post('username', TRUE);
        $token = $this->input->post('token', TRUE);
        $date_in = $this->input->post('date_in', TRUE);
        $time_in = $this->input->post('time_in', TRUE);
        $kode_jam_antrian = $this->input->post('kode_jam_antrian', TRUE);
        $var = $this->M_Antrian->addAntrianHomeService($kode_antrian,$username,$token,$date_in,$time_in,$kode_jam_antrian);
        // print_r($var);
        // die();
        if($var["var"] == 1){
            echo "<script>alert('Gagal, Kode Atrian Home Service : ".$kode_antrian." Sudah di ambil');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }elseif($var["var"] == 2){
        	$IDAntrian = $var["AntrianID"];
        	// print_r($test);
        	// die();
            echo "<script>alert('Sukses Ambil Kode Antrian Home Service : ".$kode_antrian."');</script>";
            $this->viewAntrian_now($IDAntrian);
            // redirect('Antrian','refresh');
        }elseif($var["var"] == 3){
            echo "<script>alert('Gagal, Action Simpan Gagal.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }elseif($var["var"] == 4){
            echo "<script>alert('Failed, Cannot Process Check Antrian Home Service.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }elseif($var["var"] == 5){
            echo "<script>alert('Maaf, Waktu Reservasi Home Service Sudah di booking semua.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }elseif($var["var"] == 6){
            echo "<script>alert('Gagal, Pengecekan Waktu Jam Antrian.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }elseif($var["var"] == 7){
            echo "<script>alert('Maaf, Sudah Lewat dari jam kerja. Reservasi dapat dilakukan kembali pada besok dini hari.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }elseif($var["var"] == 8){
            echo "<script>alert('Maaf, tidak bisa reservasi karena sudah lewat dari batas waktu reservasi.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }else{
            echo "<script>alert('Gagal Pengecekan Kode Antrian Home Service.');</script>";
            redirect('Antrian/antrian_homeservice','refresh');
        }
    }

	function viewAntrian(){
		$id_antrian = $_REQUEST['id_antrian'];
		$data['Antrian']=$this->M_Antrian->viewStrukAntrian($id_antrian);
		$this->load->view('Antrian/preview_antrian',$data);
	}

	public function viewAntrian_now($IDAntrian='') {
		$id_antrian = $IDAntrian;
		$data['Antrian']=$this->M_Antrian->viewStrukAntrian($id_antrian);
		$this->load->view('Antrian/preview_antrian',$data);
	 }

	public function cetak_pdf() {
		$id_antrian = $_REQUEST['id_antrian'];
	    $GetDataAntrian = $this->M_Antrian->viewStrukAntrian($id_antrian);
	    foreach ($GetDataAntrian as $row) {
		    $Vkode_antrian= $row["kode_antrian"];
		    $Vusername = $row["username"];
		    $Vtanggal_masuk = $row["tanggal_masuk"];
		    $Vwaktu_masuk = $row["waktu_masuk"];
		    $Vstatus = $row["status"];
		}
		$data['Antrian']=$this->M_Antrian->viewStrukAntrian($id_antrian);
	    $this->load->view('Antrian/print_struk_antrian',$data);
	    // dapatkan output html
	    $html = $this->output->get_output();
	    // Load/panggil library dompdfnya
	    $this->load->library('dompdf_gen');
	    // Convert to PDF
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    //utk menampilkan preview pdf
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("struk_antrian".$sekarang.".pdf",array('Attachment'=>0));
	}

	public function deleteAntrian() {
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_antrian'];
            $var = $this->M_Antrian->deleteAntrian($id);
            if($var == 1){
                echo "<script>alert('Success Delete Antrian.');</script>";
                redirect('Antrian/List_antrian','refresh');
            }else{
                echo "<script>alert('Failed Delete Antrian.');</script>";
                redirect('Antrian/List_antrian','refresh');
            }
        }else{
            redirect('login');
        }
    }

	public function cetak(){//Not used
	    ob_start();
	    $id_antrian = $_REQUEST['id_antrian'];
	    $GetDataAntrian = $this->M_Antrian->viewStrukAntrian($id_antrian);
	    foreach ($Antrian as $row) {
		    $Vkode_antrian= $row["kode_antrian"];
		    $Vusername = $row["username"];
		    $Vtanggal_masuk = $row["tanggal_masuk"];
		    $Vwaktu_masuk = $row["waktu_masuk"];
		    $Vstatus = $row["status"];
		}
		$DateTimeNow = date('Y-m-d H:i:s');
		$NameFileAntrian = $Vusername.$DateTimeNow.".pdf";
	    $data['Antrian']=$this->M_Antrian->viewStrukAntrian($id_antrian);
	    $this->load->view('Antrian/print_struk_antrian',$data);
	    $html = ob_get_contents();
	        ob_end_clean();
	        
	        require_once('./assets/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output($NameFileAntrian, 'D');
	}

	public function aksi_upload($NameFileAntrian=''){
		$config['upload_path']          = './assets/File/';
		$config['allowed_types']        = 'pdf';//gif|jpg|png|
		$config['max_size']             = 2024;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$config['file_name'] = $$NameFileAntrian; 
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('v_upload_sukses', $data);
		}
	}

	public function editAntrian($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Antrian.');</script>";
	            redirect('Antrian/List_antrian','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_Antrian->data_editAtrian($Id);
				$data['url_edit'] = base_url().'Antrian/edit_antrian';
		        $test = $this->M_Antrian->data_editAtrian($Id);
		        //print_r($test);die();
		        $this->load->view("Antrian/edit_antrian",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_antrian(){
		$id_antrian = $this->input->post('id_antrian', TRUE);
		$kode_antrian = $this->input->post('kode_antrian', TRUE);
        $status = $this->input->post('status', TRUE);
        $var = $this->M_Antrian->editAntrian($id_antrian,$status);
        // print_r($var);
        // die();
        if($var == 1){
            echo "<script>alert('Berhasil Simpan Data Antrian dengan Kode Antrian : ".$kode_antrian." .');</script>";
            redirect('Antrian/List_antrian','refresh');
        }else{
            echo "<script>alert('Gagal Update Antrian.');</script>";
            redirect('Antrian/List_antrian','refresh');
        }
    }

    function Report_antrian(){
		$data['Antrian'] = $this->M_Antrian->tampil_data()->result();
		$data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['time_now'] = date('H:i:s');
		$data['url_save'] = base_url().'Antrian/get_report_antrian';
		$data['username']=$this->session->userdata('username');
		$this->load->view('Antrian/report_antrian',$data);
	}

	function get_report_antrian(){
		$date_start = $this->input->post('date_start', TRUE);
		$date_end = $this->input->post('date_end', TRUE);
		// $date_start = "2020-01-07";
		// $date_end = "2020-05-08";
		// $data['Antrian']=$this->M_Antrian->viewReportAntrian($date_start,$date_end);
		$dataAntrian[0] = $this->M_Antrian->viewReportAntrian($date_start,$date_end);
		$data['JumlahTerlayani'] = $this->M_Antrian->getSumTerlayani($date_start,$date_end);
		$data['JumlahLost'] = $this->M_Antrian->getSumLost($date_start,$date_end);
		$data['Antrian'] = $dataAntrian[0];
		$data['date_start'] = $date_start;
		$data['date_end'] = $date_end;
		$data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$this->load->view('Antrian/preview_report_antrian',$data);
	}

	public function cetak_report_antrian() {
		$date_start = $_REQUEST['date_start'];
		$date_end = $_REQUEST['date_end'];
	    $dataAntrian[0] = $this->M_Antrian->viewReportAntrian($date_start,$date_end);
	    $data['JumlahTerlayani'] = $this->M_Antrian->getSumTerlayani($date_start,$date_end);
		$data['JumlahLost'] = $this->M_Antrian->getSumLost($date_start,$date_end);
		$data['Antrian']=$dataAntrian[0];
		$data['date_start'] = $date_start;
		$data['date_end'] = $date_end;
		$data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
	    $this->load->view('Antrian/print_report_antrian',$data);
	    // dapatkan output html
	    $html = $this->output->get_output();
	    // Load/panggil library dompdfnya
	    $this->load->library('dompdf_gen');
	    // Convert to PDF
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    //utk menampilkan preview pdf
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Report_antrian".$sekarang.".pdf",array('Attachment'=>0));
	    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
	    //$this->dompdf->stream("welcome.pdf");
	}

}

?>