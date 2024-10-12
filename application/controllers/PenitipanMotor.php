<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class PenitipanMotor extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_penitipan');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function List_penitipan(){
		$data['Penitipan'] = $this->M_penitipan->tampil_data()->result();
		$this->load->view('PenitipanMotor/list_penitipan',$data);
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['NoPenitipan'] = $this->M_penitipan->getNoPenitipan();
		$data['url_save'] = base_url().'PenitipanMotor/save_penitipan';
		$this->load->view('PenitipanMotor/form_penitipan',$data);
	}

	public function save_penitipan(){
        $no_penitipan = $this->input->post('no_penitipan', TRUE);
        $no_kendaraan = $this->input->post('no_kendaraan', TRUE);
        $nama_pemilik = $this->input->post('nama_pemilik', TRUE);
        $no_telp = $this->input->post('no_telp', TRUE);
        $nama_penerima = $this->input->post('nama_penerima', TRUE);
        $tgl_penitipan = $this->input->post('tgl_penitipan', TRUE);
        $tgl_ambil = $this->input->post('tgl_ambil', TRUE);
        $status = $this->input->post('status', TRUE);
        if($tgl_penitipan > $tgl_ambil){
            echo "<script>alert('Gagal, Tanggal Penitipan Tidak boleh lebih dari tanggal ambil.');</script>";
            redirect('PenitipanMotor/Form','refresh');
            // die();
        }else{
            $var = $this->M_penitipan->addPenitipan($no_penitipan,$no_kendaraan,$nama_pemilik,$no_telp,$nama_penerima,$tgl_penitipan,$tgl_ambil,$status);
            // print_r($var);
            // die();
            if($var["var"] == 1){
                echo "<script>alert('Gagal, No Penitipan : ".$no_penitipan." Sudah terdata.');</script>";
                redirect('PenitipanMotor/Form','refresh');
            }elseif($var["var"] == 2){
                echo "<script>alert('Sukses Simpan Data No Penitipan : ".$no_penitipan.".');</script>";
                redirect('PenitipanMotor/Form','refresh');
            }elseif($var["var"] == 3){
                echo "<script>alert('Gagal, Action Simpan Gagal.');</script>";
                redirect('PenitipanMotor/Form','refresh');
            }elseif($var["var"] == 4){
                echo "<script>alert('Failed, Cannot Process Check No Penitipan.');</script>";
                redirect('PenitipanMotor/Form','refresh');
            }else{
                echo "<script>alert('Gagal Pengecekan Penitipan Motor.');</script>";
                redirect('PenitipanMotor/Form','refresh');
            }
        }
    }

	public function editPenitipan($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Penitipan Motor.');</script>";
	            redirect('PenitipanMotor/List_penitipan','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_penitipan->data_editPenitipan($Id);
				$data['url_edit'] = base_url().'PenitipanMotor/edit_penitipan';
		        $test = $this->M_penitipan->data_editPenitipan($Id);
		        //print_r($test);die();
		        $this->load->view("PenitipanMotor/edit_penitipan",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_penitipan(){
		$id_penitipan = $this->input->post('id_penitipan', TRUE);
        $no_penitipan = $this->input->post('no_penitipan', TRUE);
        $no_kendaraan = $this->input->post('no_kendaraan', TRUE);
        $nama_pemilik = $this->input->post('nama_pemilik', TRUE);
        $no_telp = $this->input->post('no_telp', TRUE);
        $nama_penerima = $this->input->post('nama_penerima', TRUE);
        $tgl_penitipan = $this->input->post('tgl_penitipan', TRUE);
        $tgl_ambil = $this->input->post('tgl_ambil', TRUE);
        $status = $this->input->post('status', TRUE);
        // print_r($status);
        // die();
        if($tgl_penitipan > $tgl_ambil){
            echo "<script>alert('Gagal, Tanggal Penitipan Tidak boleh lebih dari tanggal ambil.');</script>";
            redirect('PenitipanMotor/List_penitipan','refresh');
            // die();
        }else{
            $var = $this->M_penitipan->editPenitipan($id_penitipan,$no_penitipan,$no_kendaraan,$nama_pemilik,$no_telp,$nama_penerima,$tgl_penitipan,$tgl_ambil,$status);
            // print_r($var);
            // die();
            if($var == 1){
                echo "<script>alert('Berhasil Simpan Data Penitipan Motor dengan No Penitipan : ".$no_penitipan." .');</script>";
                redirect('PenitipanMotor/List_penitipan','refresh');
            }elseif($var == 2){
                echo "<script>alert('Gagal Simpan Data Penitipan Motor dengan No Penitipan : ".$no_penitipan.".');</script>";
                redirect('PenitipanMotor/List_penitipan','refresh');
            }else{
                echo "<script>alert('Gagal Update Penitipan .');</script>";
                redirect('PenitipanMotor/List_penitipan','refresh');
            }
        }
    }

    public function viewPenitipan(){
    	if($this->session->userdata('level') == 1){
            $Id = $_REQUEST['id_penitipan'];
            $data["id_penitipan"] = $Id;
            $data["header"] = $this->M_penitipan->data_editPenitipan($Id);
            $this->load->view("PenitipanMotor/view_penitipan",$data);
        }else{
            redirect('login');
        }
    }

	public function deletePenitipan(){
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_penitipan'];
            $var = $this->M_penitipan->deletePenitipan($id);
            if($var == 1){
                echo "<script>alert('Success Delete Penitipan Motor.');</script>";
                redirect('PenitipanMotor/List_penitipan','refresh');
            }else{
                echo "<script>alert('Failed Delete Penitipan Motor.');</script>";
                redirect('PenitipanMotor/List_penitipan','refresh');
            }
        }else{
            redirect('login');
        }
    }

    function viewPenitipanCetak(){
        $id_penitipan = $_REQUEST['id_penitipan'];
        $data['Penitipan']=$this->M_penitipan->viewPenitipan($id_penitipan);
        $data['id_penitipan']=$id_penitipan;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['time_now'] = date('H:i:s');
        $this->load->view('PenitipanMotor/preview_penitipan',$data);
    }

    function cetak_report_tandaterima_penitipan(){
        $id_penitipan = $_REQUEST['id_penitipan'];
        $data['Penitipan']=$this->M_penitipan->viewPenitipan($id_penitipan);
        $data['id_penitipan']=$id_penitipan;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['time_now'] = date('H:i:s');
        $this->load->view('PenitipanMotor/print_tandaterima_penitipan',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_TandaTerima_PenitipanMotor".$sekarang.".pdf",array('Attachment'=>0));
    }

    function Report_penitipan(){
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['time_now'] = date('H:i:s');
        $data['url_save'] = base_url().'PenitipanMotor/get_report_penitipan';
        $data['username']=$this->session->userdata('username');
        $this->load->view('PenitipanMotor/report_penitipan',$data);
    }

    function get_report_penitipan(){
        $date_start = $this->input->post('date_start', TRUE);
        $date_end = $this->input->post('date_end', TRUE);
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        $data['Penitipan'] = $this->M_penitipan->viewReportPenitipan($date_start,$date_end);
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $this->load->view('PenitipanMotor/preview_report_penitipan',$data);
    }

    public function cetak_report_penitipan_motor() {
        $date_start = $_REQUEST['date_start'];
        $date_end = $_REQUEST['date_end'];
        $data['Penitipan'] = $this->M_penitipan->viewReportPenitipan($date_start,$date_end);
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $this->load->view('PenitipanMotor/print_report_penitipan',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_PenitipanMotor".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
    }

}

?>