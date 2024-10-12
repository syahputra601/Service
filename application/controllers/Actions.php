<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Actions extends CI_Controller{
	private $filename_voice = "import_data_voice"; // Kita tentukan nama filenya

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('MasterModel');
		// $this->load->model('SenderModel');
		$this->load->library('form_validation');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}
		// if($this->session->userdata('level') == 2){
		// 	redirect(base_url("login"));
		// }
	}

	//START CODING BAGIAN PT
    public function pt_save(){
		$kodePT = $this->input->post('kode_pt', TRUE);
		$namaPT = $this->input->post('nama_pt', TRUE);
		$alamatPT = $this->input->post('alamat_pt', TRUE);
		// print_r($_POST);die();
		$var = $this->MasterModel->addPT($kodePT, $namaPT, $alamatPT);
		if($var == 1){
            echo "<script>alert('Success Insert PT. ".@$namaPT."');</script>";
            redirect('PT','refresh');
		}else{
		    echo "<script>alert('Failed Insert PT. ".@$namaPT."');</script>";
		    redirect('PT','refresh');
		}
	}

	function editPT($Id='') {
        $data["Id"]=$Id;
        $data["header"] = $this->MasterModel->data_editPT($Id);
        $test = $this->MasterModel->data_editPT($Id);
        //print_r($Id);die();
        $this->load->view("PT/edit_pt",$data);
    }

    function edit_pt(){
		//print_r($_POST);die();
		$idPT=$this->input->post('EditPTID', TRUE);
		$kodePT=$this->input->post('EditKodePT', TRUE);
		$namaPT=$this->input->post('EditNamaPT', TRUE);
		$alamatPT=$this->input->post('EditAlamatPT', TRUE);
		$joinNama_KodePT = $namaPT." (Kode PT : ".$kodePT.")";
		$var = $this->MasterModel->editPT($idPT,$kodePT,$namaPT,$alamatPT);
		//redirect('Divisi');
		if($var == 1){
            echo "<script>alert('Success Update PT. ".$joinNama_KodePT.".');</script>";
            redirect('PT','refresh');
        }elseif($var == 2){
        	echo "<script>alert('Failed, Update PT. ".$joinNama_KodePT.". Data Already Axist.');</script>";
            redirect('PT','refresh');
        }elseif($var == 3){
            echo "<script>alert('Failed, Update PT. ".$joinNama_KodePT.".');</script>";
            redirect('PT','refresh');
        }elseif($var == 4){
        	echo "<script>alert('Failed, Cannot Process Check Data PT. ".$joinNama_KodePT.".');</script>";
            redirect('PT','refresh');
        }elseif($var == 5) {
			echo "<script>alert('Sucess Added PT. ".$joinNama_KodePT.", Data Already Added in database.');</script>";
            redirect('PT','refresh');
		}else{
			echo "<script>alert('Failed Process Update PT. ".$joinNama_KodePT."');</script>";
            redirect('PT','refresh');
		}
	}

	public function deletePT() {
        $id = $_REQUEST['id_pt'];
        $var = $this->MasterModel->deletePT($id);
        if($var == 1){
            echo "<script>alert('Success Delete PT.');</script>";
            redirect('PT','refresh');
        }else{
        	echo "<script>alert('Failed Delete PT.');</script>";
            redirect('PT','refresh');
        }
    }
    //END CODING BAGIAN PT

	//START CODING BAGIAN DIVISI
	public function divisi_save(){
		$kodeDivisi = $this->input->post('kode_divisi', TRUE);
		$namaDivisi = $this->input->post('nama_divisi', TRUE);
		// print_r($_POST);die();
		$var = $this->MasterModel->addDivisi($kodeDivisi, $namaDivisi);
		if($var == 1){
            echo "<script>alert('Success Insert Divisi.');</script>";
            redirect('Divisi','refresh');
		}else{
		    echo "<script>alert('Failed Insert Divisi.');</script>";
		    redirect('Divisi','refresh');
		}
	}

	function editDivisi($Id='') {
        $data["Id"]=$Id;
        $data["header"] = $this->MasterModel->data_editDivisi($Id);
        $test = $this->MasterModel->data_editDivisi($Id);
        //print_r($Id);die();
        $this->load->view("Divisi/edit_divisi",$data);
    }

    function edit_divisi(){
		//print_r($_POST);die();
		$idDivisi=$this->input->post('EditDivisiID', TRUE);
		$kodeDivisi=$this->input->post('EditKodeDivisi', TRUE);
		$namaDivisi=$this->input->post('EditNamaDivisi', TRUE);
		$joinNama_KodeDivisi = $namaDivisi." (".$kodeDivisi.")";
		$var = $this->MasterModel->editDivisi($idDivisi,$kodeDivisi,$namaDivisi);
		//redirect('Divisi');
		if($var == 1){
            echo "<script>alert('Success Update Divisi : ".$joinNama_KodeDivisi.".');</script>";
            redirect('Divisi','refresh');
        }elseif($var == 2){
        	echo "<script>alert('Failed, Update Divisi : ".$joinNama_KodeDivisi.". Data Already Axist.');</script>";
            redirect('Divisi','refresh');
        }elseif($var == 3){
            echo "<script>alert('Failed, Update Divisi : ".$joinNama_KodeDivisi.".');</script>";
            redirect('Divisi','refresh');
        }elseif($var == 4){
        	echo "<script>alert('Failed, Cannot Process Check Data Divisi : ".$joinNama_KodeDivisi.".');</script>";
            redirect('Divisi','refresh');
        }elseif($var == 5) {
			echo "<script>alert('Sucess Added Divisi. ".$joinNama_KodeDivisi.", Data Already Added in database.');</script>";
            redirect('Divisi','refresh');
		}elseif($var == 6) {
			echo "<script>alert('Failed, Update Divisi : ".$joinNama_KodeDivisi.". Data Code Division Already Axist.');</script>";
            redirect('Divisi','refresh');
		}elseif($var == 7) {
			echo "<script>alert('Failed Process Cek Kode Divisi.');</script>";
            redirect('Divisi','refresh');
		}else{
			echo "<script>alert('Failed Process Update Divisi.');</script>";
            redirect('Divisi','refresh');
		}
	}

	public function deleteDivisi() {
        $id = $_REQUEST['id_divisi'];
        $var = $this->MasterModel->deleteDivisi($id);
        if($var == 1){
            echo "<script>alert('Success Delete Divisi.');</script>";
            redirect('Divisi','refresh');
        }else{
        	echo "<script>alert('Failed Delete Divisi.');</script>";
            redirect('Divisi','refresh');
        }
    }
	//END CODING BAGIAN DIVISI

    //START CODING BAGIAN JABATAN
    public function jabatan_save(){
		$kodeJabatan = $this->input->post('kode_jabatan', TRUE);
		$namaJabatan = $this->input->post('nama_jabatan', TRUE);
		// print_r($_POST);die();
		$var = $this->MasterModel->addJabatan($kodeJabatan, $namaJabatan);
		if($var == 1){
            echo "<script>alert('Success Insert Jabatan.');</script>";
            redirect('Jabatan','refresh');
		}else{
		    echo "<script>alert('Failed Insert Jabatan.');</script>";
		    redirect('Jabatan','refresh');
		}
	}

	function editJabatan($Id='') {
        $data["Id"]=$Id;
        $data["header"] = $this->MasterModel->data_editJabatan($Id);
        $test = $this->MasterModel->data_editJabatan($Id);
        //print_r($Id);die();
        $this->load->view("Jabatan/edit_jabatan",$data);
    }

    function edit_jabatan(){
		//print_r($_POST);die();
		$idJabatan=$this->input->post('EditJabatanID', TRUE);
		$kodeJabatan=$this->input->post('EditKodeJabatan', TRUE);
		$namaJabatan=$this->input->post('EditNamaJabatan', TRUE);
		$joinKode_NamaJabatan = $kodeJabatan." (".$namaJabatan.")";
		$var = $this->MasterModel->editJabatan($idJabatan,$kodeJabatan,$namaJabatan);
		//redirect('Divisi');
		if($var == 1){
            echo "<script>alert('Success Update Jabatan : ".$joinKode_NamaJabatan.".');</script>";
            redirect('Jabatan','refresh');
        }elseif($var == 2){
        	echo "<script>alert('Failed, Update Jabatan : ".$joinKode_NamaJabatan.". Data Already Axist.');</script>";
            redirect('Jabatan','refresh');
        }elseif($var == 3){
            echo "<script>alert('Failed, Update Jabatan : ".$joinKode_NamaJabatan.".');</script>";
            redirect('Jabatan','refresh');
        }elseif($var == 4){
        	echo "<script>alert('Failed, Cannot Process Check Data Jabatan : ".$joinKode_NamaJabatan.".');</script>";
            redirect('Jabatan','refresh');
        }elseif($var == 5) {
			echo "<script>alert('Failed Jabatan : ".$joinKode_NamaJabatan.", Data belum di input.');</script>";
            redirect('Jabatan','refresh');
		}else{
			echo "<script>alert('Failed Process Update Jabatan.');</script>";
            redirect('Jabatan','refresh');
		}
	}

	// public function deleteJabatan() {
 //        $id = $_REQUEST['id_jabatan'];
 //        $var = $this->MasterModel->deleteJabatan($id);
 //        if($var == 1){
 //            echo "<script>alert('Success Delete Jabatan.');</script>";
 //            redirect('Jabatan','refresh');
 //        }else{
 //        	echo "<script>alert('Failed Delete Jabatan.');</script>";
 //            redirect('Jabatan','refresh');
 //        }
 //    }
    //END CODING BAGIAN JABATAN


	//START CODING NOT USED//////////////////////


	//START CODING MENU TARGET
  	function editTarget($Id='') {
        $data["Id"]=$Id;
        $data["header"] = $this->MasterModel->data_editTarget($Id);
        $test = $this->MasterModel->data_editTarget($Id);
        //print_r($Id);die();
        $this->load->view("Menu/Target/v_edit_target",$data);
    }

	function edit_target(){
		//print_r($_POST);die();
		$id=$this->input->post('EditTargetID', TRUE);
		$phone=$this->input->post('EditTargetPhone', TRUE);
		$email=$this->input->post('EditTargetEmail', TRUE);
		$name=$this->input->post('EditTargetName', TRUE);
		$group=$this->input->post('EditTargetGroup', TRUE);
		$description=$this->input->post('EditTargetDescription', TRUE);

		$var = $this->MasterModel->editTarget($id,$phone,$email,$name,$group,$description);
		//redirect('Voucher');
		if($var == 1){
            //$this->session->set_flashdata('flashSuccess', 'Success Update Data Voucher Code '.$code);
            echo "<script>alert('Success Update Target Phone : ".$phone.".');</script>";
            redirect('Menu/target_list','refresh');
        }elseif($var == 2){
        	//$this->session->set_flashdata('flashError', 'Failed, Voucher Code '.$code.' Sudah Terdata.');
        	echo "<script>alert('Failed, Update Target Phone : ".$phone.". Data Already Axist.');</script>";
            redirect('Menu/target_list','refresh');
        }elseif($var == 3){
            //$this->session->set_flashdata('flashError', 'Failed Update Data Voucher Code '.$code);
            echo "<script>alert('Failed, Update Target Phone : ".$phone.".');</script>";
            redirect('Menu/target_list','refresh');
        }elseif($var == 4){
        	//$this->session->set_flashdata('flashError', 'Cannot Process Action Edit Data Voucher Code '.$code);
        	echo "<script>alert('Failed, Cannot Process Check Data Target : ".$phone.".');</script>";
            redirect('Menu/target_list','refresh');
        }elseif($var == 5) {
			echo "<script>alert('Failed Target Phone : ".$phone.", Data belum di input.');</script>";
            redirect('Menu/target_list','refresh');
		}else{
			echo "<script>alert('Failed Process Update Target.');</script>";
            redirect('Menu/target_list','refresh');
		}
        //$data['voucher'] = $this->M_voucher->tampil_data()->result();
        //$this->load->view('Voucher/v_voucher',$data); 
	}

    public function deleteTarget() {
        $id = $_REQUEST['id'];
        $var = $this->MasterModel->deleteTarget($id);
        if($var == 1){
            echo "<script>alert('Success Delete Target Phone.');</script>";
            redirect('Menu/target_list','refresh');
        }else{
        	echo "<script>alert('Failed Delete Target Phone.');</script>";
            redirect('Menu/target_list','refresh');
        }
    }
	//END CODING MENU TARGET

	//START CODING MENU MESSAGE
	public function message_save(){
			$froms = $this->input->post('froms', TRUE);
			$subject = $this->input->post('subject', TRUE);
			$body = $this->input->post('body', TRUE);
			$status = $this->input->post('status', TRUE);
			$counter = $this->input->post('counter', TRUE);
			$var = $this->MasterModel->addMassage($froms, $subject, $body, $status, $counter);
			if($var == 1){
            	echo "<script>alert('Success Insert Message.');</script>";
                redirect('Menu/message_list');
		    }else{
		    	echo "<script>alert('Failed Insert Message.');</script>";
                redirect('Menu/message_list');
		    }	
			//redirect('Menu/message_list');
	}

  	function editMessage($Id='') {
        $data["Id"]=$Id;
        $data["header"] = $this->MasterModel->data_editMessage($Id);
        $test = $this->MasterModel->data_editMessage($Id);
        //print_r($Id);die();
        $this->load->view("Menu/Message/v_edit_message",$data);
    }

	function edit_message(){
		//print_r($_POST);die();
		$id=$this->input->post('EditMessageID', TRUE);
		$froms=$this->input->post('EditMessageFroms', TRUE);
		$subject=$this->input->post('EditMessageSubject', TRUE);
		$body=$this->input->post('EditMessageBody', TRUE);
		$status=$this->input->post('EditMessageStatus', TRUE);
		$counter=$this->input->post('EditMessageCounter', TRUE);

		$var = $this->MasterModel->editMessage($id,$froms,$subject,$body,$status,$counter);
		//redirect('Voucher');
		if($var == 1){
            //$this->session->set_flashdata('flashSuccess', 'Success Update Data Voucher Code '.$code);
            echo "<script>alert('Success Update Message Froms : ".$froms.".');</script>";
            redirect('Menu/message_list','refresh');
        }elseif($var == 2){
        	//$this->session->set_flashdata('flashError', 'Failed, Voucher Code '.$code.' Sudah Terdata.');
        	echo "<script>alert('Failed, Update Message Froms : ".$froms.". Data Already Axist.');</script>";
            redirect('Menu/message_list','refresh');
        }elseif($var == 3){
            //$this->session->set_flashdata('flashError', 'Failed Update Data Voucher Code '.$code);
            echo "<script>alert('Failed, Update Message Froms : ".$froms.".');</script>";
            rredirect('Menu/message_list','refresh');
        }elseif($var == 4){
        	//$this->session->set_flashdata('flashError', 'Cannot Process Action Edit Data Voucher Code '.$code);
        	echo "<script>alert('Failed, Cannot Process Check Data Message Froms : ".$froms.".');</script>";
            redirect('Menu/message_list','refresh');
        }elseif($var == 5) {
			echo "<script>alert('Failed Message Froms : ".$froms.", Data belum di input.');</script>";
            redirect('Menu/message_list','refresh');
		}else{
			echo "<script>alert('Failed Process Message Froms.');</script>";
            redirect('Menu/message_list','refresh');
		}
        //$data['voucher'] = $this->M_voucher->tampil_data()->result();
        //$this->load->view('Voucher/v_voucher',$data); 
	}

	//END CODING MENU MESSAGE


	public function preview_import(){//FUNCTION NOT USED
		if($this->input->post('preview') == 'Preview'){
			$data = array(); // Buat variabel $data sebagai array
		
			if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
				// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
				$upload = $this->MasterModel->upload_file($this->filename);
				
				if($upload['result'] == "success"){ // Jika proses upload sukses
					// Load plugin PHPExcel nya
					include APPPATH.'third_party/PHPExcel/PHPExcel.php';
					
					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('Format/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
					
					// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
					// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
					$data['sheet'] = $sheet; 
				}else{ // Jika proses upload gagal
					$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				}
			}
		$data['email'] = $this->MasterModel->tampil_data()->result();
		$this->load->view('Menu/v_email', $data);

		}else{
		$data['email'] = $this->MasterModel->tampil_data()->result();
		$this->load->view('Menu/v_email', $data);	
		}
		
	}

	public function form(){//FUNCTION NOT USED
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->MasterModel->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('Format/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$data['email'] = $this->MasterModel->tampil_data()->result();
		$this->load->view('Menu/v_import_email', $data);
	}
	
	public function import(){// FUNCTION NOT USED
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('Format/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'email_code'=>$row['A'], // Insert data nis dari kolom A di excel
					'email_name'=>$row['B'], // Insert data nama dari kolom B di excel
					'email_category'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'email_description'=>$row['D'], // Insert data alamat dari kolom D di excel
					'email_price'=>$row['E'],
					'email_price_outlet'=>$row['F'],
					'email_price_partner'=>$row['G'],
					'user_fee'=>$row['H'],
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->MasterModel->insert_multiple($data);
		
		redirect("email"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}

?>