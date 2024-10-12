<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class Sparepart extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_sparepart');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function List_sparepart(){
		$data['Sparepart'] = $this->M_sparepart->tampil_data()->result();
		$this->load->view('Sparepart/list_sparepart',$data);
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['KodeSpartpart'] = $this->M_sparepart->getKodeSparepart();
		$data['url_save'] = base_url().'Sparepart/save_sparepart';
		$this->load->view('Sparepart/form_sparepart',$data);
	}

	public function save_sparepart(){
        $sku = $this->input->post('sku', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $qty = $this->input->post('qty', TRUE);
        $harga = $this->input->post('harga', TRUE);
        $status = $this->input->post('status', TRUE);
        $tgl = $this->input->post('tgl', TRUE);
        $sku_suplier = $this->input->post('sku_suplier', TRUE);
        if($harga == 0 || $harga < 0 || $harga == ''){
            echo "<script>alert('Gagal, Harga Sparepart Tidak boleh kosong / nol(0).');</script>";
            redirect('Sparepart/Form','refresh');
        }else{
            $var = $this->M_sparepart->addSparepart($sku,$nama,$qty,$harga,$status,$tgl,$sku_suplier);
            // print_r($var);
            // die();
            if($var["var"] == 1){
                echo "<script>alert('Gagal, SKU Sparepart : ".$sku." Sudah terdata.');</script>";
                redirect('Sparepart/Form','refresh');
            }elseif($var["var"] == 2){
                echo "<script>alert('Sukses Simpan Data SKU Sparepart : ".$sku.".');</script>";
                redirect('Sparepart/Form','refresh');
            }elseif($var["var"] == 3){
                echo "<script>alert('Gagal, Action Simpan Gagal.');</script>";
                redirect('Sparepart/Form','refresh');
            }elseif($var["var"] == 4){
                echo "<script>alert('Gaggal, Tidak dapat proses cek SKU Sparepart.');</script>";
                redirect('Sparepart/Form','refresh');
            }else{
                echo "<script>alert('Gagal Pengecekan Sparepart.');</script>";
                redirect('Sparepart/Form','refresh');
            }
        }
    }

	public function editSparepart($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Sparepart.');</script>";
	            redirect('Sparepart/List_sparepart','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_sparepart->data_editSparepart($Id);
				$data['url_edit'] = base_url().'Sparepart/edit_sparepart';
		        $test = $this->M_sparepart->data_editSparepart($Id);
		        //print_r($test);die();
		        $this->load->view("Sparepart/edit_sparepart",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_sparepart(){
		$id_sparepart = $this->input->post('id_sparepart', TRUE);
        $sku = $this->input->post('sku', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $qty = $this->input->post('qty', TRUE);
        $harga = $this->input->post('harga', TRUE);
        $status = $this->input->post('status', TRUE);
        $tgl = $this->input->post('tgl', TRUE);
        $sku_suplier = $this->input->post('sku_suplier', TRUE);
        if($harga == 0 || $harga < 0 || $harga == ''){
            echo "<script>alert('Gagal, Harga Sparepart Tidak boleh kosong / nol(0).');</script>";
            redirect('Sparepart/List_sparepart','refresh');
        }else{
            $var = $this->M_sparepart->editSparepart($id_sparepart,$sku,$nama,$qty,$harga,$status,$tgl,$sku_suplier);
            // print_r($var);
            // die();
            if($var == 1){
                echo "<script>alert('Berhasil Simpan Data Sparepart dengan SKU : ".$sku." .');</script>";
                redirect('Sparepart/List_sparepart','refresh');
            }elseif($var == 2){
                echo "<script>alert('Gagal Simpan Data Sparepart dengan SKU : ".$sku.".');</script>";
                redirect('Sparepart/List_sparepart','refresh');
            }else{
                echo "<script>alert('Gagal Update Sparepart.');</script>";
                redirect('Sparepart/List_sparepart','refresh');
            }
        }
    }

    // public function viewSparepart(){
    // 	if($this->session->userdata('level') == 1){
    //         $Id = $_REQUEST['id_sparepart'];
    //         $data["id_sparepart"] = $Id;
    //         $data["header"] = $this->M_sparepart->data_editSparepart($Id);
    //         $this->load->view("Sparepart/view_sparepart",$data);
    //     }else{
    //         redirect('login');
    //     }
    // }

    public function deleteSparepart(){
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_sparepart'];
            $var = $this->M_sparepart->deleteSparepart($id);
            if($var == 1){
                echo "<script>alert('Success Delete Sparepart.');</script>";
                redirect('Sparepart/List_sparepart','refresh');
            }else{
                echo "<script>alert('Failed Delete Sparepart.');</script>";
                redirect('Sparepart/List_sparepart','refresh');
            }
        }else{
            redirect('login');
        }
    }

    function Report_sparepart(){
        $data['Antrian'] = $this->M_sparepart->tampil_data()->result();
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['time_now'] = date('H:i:s');
        $data['url_save'] = base_url().'Sparepart/get_report_sparepart';
        $data['username']=$this->session->userdata('username');
        $this->load->view('Sparepart/report_sparepart',$data);
    }

    function get_report_sparepart(){
        $date_start = $this->input->post('date_start', TRUE);
        $date_end = $this->input->post('date_end', TRUE);
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        // $data['Antrian']=$this->M_sparepart->viewReportAntrian($date_start,$date_end);
        $dataSparepart[0] = $this->M_sparepart->viewReportSparepart($date_start,$date_end);
        $data['JumlahTersedia'] = $this->M_sparepart->getSumTersedia($date_start,$date_end);
        $data['JumlahTidakTersedia'] = $this->M_sparepart->getSumTidakTersedia($date_start,$date_end);
        $data['Sparepart'] = $dataSparepart[0];
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $this->load->view('Sparepart/preview_report_sparepart',$data);
    }

    public function cetak_report_sparepart() {
        $date_start = $_REQUEST['date_start'];
        $date_end = $_REQUEST['date_end'];
        $dataSparepart[0] = $this->M_sparepart->viewReportSparepart($date_start,$date_end);
        $data['JumlahTersedia'] = $this->M_sparepart->getSumTersedia($date_start,$date_end);
        $data['JumlahTidakTersedia'] = $this->M_sparepart->getSumTidakTersedia($date_start,$date_end);
        $data['Sparepart']=$dataSparepart[0];
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $this->load->view('Sparepart/print_report_sparepart',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_sparepart".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
    }

}
?>