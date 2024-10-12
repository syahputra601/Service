<?php
defined('BASEPATH') OR exit('no direct script allowed');

Class PO extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('M_po');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
	}

	function List_po(){
		$data['PO'] = $this->M_po->tampil_data()->result();
		$this->load->view('PO/list_po',$data);
	}

	function Form(){
		$username = $this->session->userdata('username');
		$data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
		$data['timeNow'] = date('H:i:s');
		$data['PO'] = $this->M_po->getNomorPO();
		$data['url_save'] = base_url().'PO/save_po';
        $data['created_by'] = "Created by - ".$this->session->userdata('nama')." (".$this->session->userdata('username').")";
		$this->load->view('PO/form_po',$data);
	}

    public function getSparepart(){
        $data = $this->M_po->list_sparepart();
        echo json_encode($data);
    }

    function getDetailSparepart($idbarang){
        if ($idbarang != null){
            $brg = $this->M_po->ambil($idbarang) ;
            echo json_encode($brg);
            exit ;
        }
    }

    public function save_po() {
        $details = $this->input->post("detail");
        $header = $this->input->post("header");
        // var_dump($header);exit();
        // print_r($header);die();
        // print_r($details[0]);
        // die();
        if ($header != null){
            $saveHeader = $this->M_po->saveHeader($header);
            if ($saveHeader){
                foreach ($details as $detail) {
                    // print_r($detail);
                    // die();
                    $detail["nomor_po"] = $header['nomor_po'];
                    $id_sparepart = $detail["sku"];
                    $getsparepart = $this->M_po->getbyID($id_sparepart);
                    $sku = $getsparepart['sku'];
                    $detail["sku"] = $sku;
                    $detail["created_by"] = $header['created_by'];
                    $saveDetail = $this->M_po->saveDetail($detail);
                }
                echo "<script>alert('Sukses Simpan data PO.');</script>";
                redirect('PO/Form','refresh');
            }else{
                echo "<script>alert('Gagal Simpan data PO.');</script>";
                redirect('PO/Form','refresh');
            }
        }
    }

	public function save_mekanik(){
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('jenis_kelamin', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $var = $this->M_mekanik->addMekanik($nip,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat);
        // print_r($var);
        // die();
        if($var["var"] == 1){
            echo "<script>alert('Gagal, NIP : ".$nip." Sudah di terdata.');</script>";
            redirect('Mekanik/Form','refresh');
        }elseif($var["var"] == 2){
            echo "<script>alert('Sukses Simpan Data NIP : ".$nip.".');</script>";
            redirect('Mekanik/Form','refresh');
        }elseif($var["var"] == 3){
            echo "<script>alert('Gagal, Action Simpan Gagal.');</script>";
            redirect('Mekanik/Form','refresh');
        }elseif($var["var"] == 4){
            echo "<script>alert('Failed, Cannot Process Check NIP Mekanik.');</script>";
            redirect('Mekanik/Form','refresh');
        }else{
            echo "<script>alert('Gagal Pengecekan Mekanik.');</script>";
            redirect('Mekanik/Form','refresh');
        }
    }

	public function editPO($Id=''){//Not used
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID Mekanik.');</script>";
	            redirect('Mekanik/List_mekanik','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_mekanik->data_editMekanik($Id);
				$data['url_edit'] = base_url().'Mekanik/edit_mekanik';
		        $test = $this->M_mekanik->data_editMekanik($Id);
		        //print_r($test);die();
		        $this->load->view("Mekanik/edit_mekanik",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	}

	public function edit_po(){//not used
		$id_mekanik = $this->input->post('id_mekanik', TRUE);
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tempat_lahir = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('jenis_kelamin', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $var = $this->M_mekanik->editMekanik($id_mekanik,$nip,$nama,$tempat_lahir,$tgl_lahir,$jk,$no_hp,$alamat);
        // print_r($var);
        // die();
        if($var == 1){
            echo "<script>alert('Berhasil Simpan Data Mekanik dengan NIP : ".$nip." .');</script>";
            redirect('Mekanik/List_mekanik','refresh');
        }elseif($var == 2){
            echo "<script>alert('Gagal Simpan Data Mekanik dengan NIP : ".$nip.".');</script>";
            redirect('Mekanik/List_mekanik','refresh');
        }else{
            echo "<script>alert('Gagal Update Mekanik.');</script>";
            redirect('Mekanik/List_mekanik','refresh');
        }
    }

    public function viewPO(){
    	if($this->session->userdata('level') == 1){
            $Id = $_REQUEST['id_po'];
            $Nomor_po = $_REQUEST['nomor_po'];
            // print($_REQUEST['nomor_po']);
            // die();
            $data["id_po"] = $Id;
            $data["nomor_po"] = $Nomor_po;
            $data["header"] = $this->M_po->dataHeaderPO($Id);
            $data["detail"] = $this->M_po->dataDetailPO($Nomor_po);
            $test = $this->M_po->dataDetailPO($Nomor_po);
            // print_r($test);
            // die();
            $this->load->view("PO/view_po",$data);
        }else{
            redirect('login');
        }
    }

	public function deletePO(){
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id_po'];
            $var = $this->M_po->deletePO($id);
            if($var == 1){
                echo "<script>alert('Success Delete PO.');</script>";
                redirect('PO/List_po','refresh');
            }else{
                echo "<script>alert('Failed Delete PO.');</script>";
                redirect('PO/List_po','refresh');
            }
        }else{
            redirect('login');
        }
    }

    function Report_po(){
        $data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['timeNow'] = date('H:i:s');
        $data['url_save'] = base_url().'PO/get_report_po';
        $data['username']=$this->session->userdata('username');
        $this->load->view('PO/report_po',$data);
    }

    function get_report_po(){
        $date_start = $this->input->post('date_start', TRUE);
        $date_end = $this->input->post('date_end', TRUE);
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        $dataTrx[0] = $this->M_po->viewReportPO($date_start,$date_end);
        $data['PO'] = $this->M_po->viewReportPO($date_start,$date_end);
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $this->load->view('PO/preview_report_po',$data);
    }

    public function cetak_report_po() {
        $date_start = $_REQUEST['date_start'];
        $date_end = $_REQUEST['date_end'];
        $dataPO[0] = $this->M_po->viewReportPO($date_start,$date_end);
        $data['PO'] = $this->M_po->viewReportPO($date_start,$date_end);
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $this->load->view('PO/print_report_po',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_pengajuan_po".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    }

}

?>