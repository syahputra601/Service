<?php
defined('BASEPATH') or exit('no direct script allowed');

Class Trx extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->model('M_trx');
		$this->load->model('M_po');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url('login'));
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	function index(){
		echo "Error 404";
		die();
	}

	function Form(){
		$data['url_next'] = base_url().'Trx/next_step';
		$this->load->view('Trx/form_trx', $data);
	}

	function next_step(){
		$Username = $this->session->userdata('username');
		$kode_antrian = $this->input->post('kode_antrian', TRUE);
		$var = $this->M_trx->nextStep($kode_antrian,$Username);
		if($var == 0){
            echo "<script>alert('Gagal Update status Antrian : ".$kode_antrian.".');</script>";
            redirect('Trx/Form','refresh');
        }elseif($var == 1){
            $this->step_next($kode_antrian);
        }elseif($var == 2){
            echo "<script>alert('Kode Antrian : ".$kode_antrian." tidak ada. Harap Masukkan Kode Antrian Yang Valid');</script>";
            redirect('Trx/Form','refresh');
        }elseif($var == 3){
            echo "<script>alert('Gagal Melakukan Pengecekan Kode Antrian : ".$kode_antrian.".');</script>";
            redirect('Trx/Form','refresh');
        }elseif($var == 4){
            echo "<script>alert('Kode Antrian : ".$kode_antrian." Sudah Terlayani. Harap gunakan Kode Antrian yang belum terlayani.');</script>";
            redirect('Trx/Form','refresh');
        }else{
            echo "<script>alert('Gagal Semua Action.');</script>";
            redirect('Trx/Form','refresh');
        }
	}

	function step_next_old($kode_antrian=''){//yang akan digunakan
		if($kode_antrian == '' || $kode_antrian == NULL){
			echo "<script>alert('Gagal Get Kode Antrian.');</script>";
            redirect('Trx/Form','refresh');
		}else{
			$Username = $this->session->userdata('username');
			$data['username'] = $Username;
			$data['kode_antrian'] = $kode_antrian;
			$data['url_save'] = base_url().'Trx/save_trx';
			$this->load->view('Trx/next_step_trx', $data);
		}
	}

	function step_next($kode_antrian=''){//hanya testing
		$kode_antrian = "A001";//Testing
		if($kode_antrian == '' || $kode_antrian == NULL){
			echo "<script>alert('Gagal Get Kode Antrian.');</script>";
            redirect('Trx/Form','refresh');
		}else{
			$Username = $this->session->userdata('username');
			$data['username'] = $Username;
			$data['kode_antrian'] = $kode_antrian;
			$data['url_save'] = base_url().'Trx/save_trx';
			$data['no_invoice'] = $this->M_trx->getNoInvoice();
			$data['date_in'] = date('Y-m-d');
			$data['time_in'] = date('H:i:s');
			$data['select_mekanik'] = $this->M_trx->listMekanik();
			$data['created_by'] = "Created by - ".$this->session->userdata('nama')." (".$this->session->userdata('username').")";
			// $test = $this->M_trx->getNoInvoice();
			// print_r($test);
			// die();
			$this->load->view('Trx/next_step_trx', $data);
		}
	}

    function getDetailSparepart($idbarang){
        if ($idbarang != null){
            $brg = $this->M_trx->ambil($idbarang) ;
            echo json_encode($brg);
            exit ;
        }
    }

	function save_trx(){
		$details = $this->input->post("detail");
        $header = $this->input->post("header");
        $Username = $this->session->userdata('username');
        // var_dump($header);exit();
        // print_r($header);die();
        if ($header != null){
            if($header['biaya_jasa'] == 0 && $header['total'] == 0){
                $kode_antrian = $header['kode_antrian'];
                $this->M_trx->nextStepBack($kode_antrian,$Username);
                echo "<script>alert('Gagal, Biaya Jasa dan Spare Part Tidak Boleh Kosong/Nol.');</script>";
                $this->step_next($kode_antrian);
            }else{
                $saveHeader = $this->M_trx->saveHeader($header);
                if ($saveHeader){
                    foreach (@$details as $detail) {
                        $detail["no_invoice"] = $header['no_invoice'];
                        //start update stok
                        $databarang = $this->M_trx->getbysku($detail['sku']);
                        $stok = $databarang['qty'];
                        $newstok = $stok-$detail['qty'];
                        // print_r($newstok);die();
                        if($stok == 0 || $stok < 0){
                            echo "<script>alert('Gagal, Stok Sparepart ".$detail['sku']." Kosong. ');</script>";
                            redirect('Trx/Form','refresh');
                        }
                        if($detail['qty'] > $stok){
                            echo "<script>alert('Gagal, Jumlah order Sparepart ".$detail['sku'].". melebihi jumlah Stok Sparepart');</script>";
                            redirect('Trx/Form','refresh');
                        }
                        $where = array(
                            'sku' => $detail['sku'] );
                        $dataup=array('qty'=>$newstok);
                        $updatestok = $this->M_trx->update_data_stok($where,$dataup,'spare_part');
                        //end update stok
                        $id_sparepart = $detail["sku"];
                        $getsparepart = $this->M_trx->getbyID($id_sparepart);
                        $sku = $getsparepart['sku'];
                        $detail["sku"] = $sku;
                        $detail["created_by"] = $header['created_by'];
                        $saveDetail = $this->M_trx->saveDetail($detail);
                    }
                    echo "<script>alert('Sukses Simpan data Transaksi.');</script>";
                    redirect('Trx/Form','refresh');
                }else{
                    echo "<script>alert('Gagal Simpan data Transaksi.');</script>";
                    redirect('Trx/Form','refresh');
                }
            }
        }
	}

	function TrxAll(){
        $Username=$this->session->userdata('username');
        if($this->session->userdata('role') == 2){
            $data['transction_all'] = $this->M_trx->tampil_data_pelanggan($Username)->result();
        }else{
            $data['transction_all'] = $this->M_trx->tampil_data()->result();
        }
		$this->load->view('Trx/list_trx',$data);
	}

    function viewTrxCetak(){
        $id_transaksi = $_REQUEST['id_transaksi'];
        $no_invoice = $_REQUEST['no_invoice'];
        // print_r($no_invoice);
        // die();
        $data['TrxHeader']=$this->M_trx->viewTrxHeader($id_transaksi);
        $data['TrxDetail']=$this->M_trx->viewTrxDetail($no_invoice);
        $GetTotal=$this->M_trx->GetGrandTotal($no_invoice);
        foreach ($GetTotal as $row) {
            $TotalGrand = $row->grand_total;
        }
        $data['id_transaksi']=$id_transaksi;
        $data['no_invoice']=$no_invoice;
        $data['TotalGrand']=$TotalGrand;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['time_now'] = date('H:i:s');
        $data['username']=$this->session->userdata('username');
        $data['nama']=$this->session->userdata('nama');
        $this->load->view('Trx/preview_trx',$data);
    }

    public function cetak_report_nota_pembayaran() {
        $id_transaksi = $_REQUEST['id_transaksi'];
        $no_invoice = $_REQUEST['no_invoice'];
        // print_r($no_invoice);
        // die();
        $data['TrxHeader']=$this->M_trx->viewTrxHeader($id_transaksi);
        $data['TrxDetail']=$this->M_trx->viewTrxDetail($no_invoice);
        $GetTotal=$this->M_trx->GetGrandTotal($no_invoice);
        foreach ($GetTotal as $row) {
            $TotalGrand = $row->grand_total;
        }
        $data['id_transaksi']=$id_transaksi;
        $data['no_invoice']=$no_invoice;
        $data['TotalGrand']=$TotalGrand;
        $data['date_now'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['time_now'] = date('H:i:s');
        $data['username']=$this->session->userdata('username');
        $data['nama']=$this->session->userdata('nama');
        $this->load->view('Trx/print_report_nota',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_NotaPembayaran".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
    }

	public function viewTrx(){
    	if($this->session->userdata('level') == 1){
            $Id = $_REQUEST['id_transaksi'];
            $No_invoice = $_REQUEST['no_invoice'];
            // print($_REQUEST['No_invoice']);
            // die();
            $data["id_transaksi"] = $Id;
            $data["no_invoice"] = $No_invoice;
            $data["header"] = $this->M_trx->dataHeaderTrx($Id);
            $data["detail"] = $this->M_trx->dataDetailTrx($No_invoice);
            $test = $this->M_trx->dataDetailTrx($No_invoice);
            // print_r($test);
            // die();
            $this->load->view("Trx/view_trx",$data);
        }else{
            redirect('login');
        }
    }

    function Report_transaksi(){
        // $data['Antrian'] = $this->M_trx->tampil_data()->result();
        $data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['timeNow'] = date('H:i:s');
        $data['url_save'] = base_url().'Trx/get_report_trx';
        $data['username']=$this->session->userdata('username');
        $this->load->view('Trx/report_trx',$data);
    }

    function get_report_trx(){
        $date_start = $this->input->post('date_start', TRUE);
        $date_end = $this->input->post('date_end', TRUE);
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        $dataTrx[0] = $this->M_trx->viewReportTrx($date_start,$date_end);
        $data['Trx'] = $this->M_trx->viewReportTrx($date_start,$date_end);
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $this->load->view('Trx/preview_report_trx',$data);
    }

    public function cetak_report_trx() {
        $date_start = $_REQUEST['date_start'];
        $date_end = $_REQUEST['date_end'];
        $dataTrx[0] = $this->M_trx->viewReportTrx($date_start,$date_end);
        $data['Trx']=$this->M_trx->viewReportTrx($date_start,$date_end);
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $this->load->view('Trx/print_report_trx',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_transaction".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    }

    function Report_keuangan(){
        $data['dateNow'] = date('Y-m-d');//date('Y-m-d H:i:s')
        $data['timeNow'] = date('H:i:s');
        $data['YearNow'] = date('Y');
        $data['url_save_day'] = base_url().'Trx/Report_keuangan_day';
        $data['url_save_month'] = base_url().'Trx/Report_keuangan_month';
        $data['url_save_year'] = base_url().'Trx/Report_keuangan_year';
        $data['username']=$this->session->userdata('username');
        $this->load->view('Trx/report_keuangan',$data);
    }

    function Report_keuangan_year(){
        $Year = $this->input->post('year', TRUE);
        // $Year = "2020";
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        $getTotalYearDebit = $this->M_trx->viewReportKeuanganYearDebit($Year);
        foreach($getTotalYearDebit as $row_debit){
            $TotalYearDebit = $row_debit->total_debit;
        }
        $getTotalYearKredit = $this->M_trx->viewReportKeuanganYearKredit($Year);
        foreach($getTotalYearKredit as $row_kredit){
            $TotalYearKredit = $row_kredit->total_kredit;
        }
        $TotalAllYear = $TotalYearDebit - $TotalYearKredit;
        $data['DebitYearTotal'] = $TotalYearDebit;
        $data['KreditYearTotal'] = $TotalYearKredit;
        $data['YearAllTotal'] = $TotalAllYear;
        // $data['date_start'] = $date_start;
        // $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $data['year_now'] = $Year;
        $this->load->view('Trx/preview_report_keuangan_year',$data);  
    }

    public function cetak_report_keuangan_year(){
        $Year = $_REQUEST['Year'];
        $getTotalYearDebit = $this->M_trx->viewReportKeuanganYearDebit($Year);
        foreach($getTotalYearDebit as $row_debit){
            $TotalYearDebit = $row_debit->total_debit;
        }
        $getTotalYearKredit = $this->M_trx->viewReportKeuanganYearKredit($Year);
        foreach($getTotalYearKredit as $row_kredit){
            $TotalYearKredit = $row_kredit->total_kredit;
        }
        $TotalAllYear = $TotalYearDebit - $TotalYearKredit;
        $data['DebitYearTotal'] = $TotalYearDebit;
        $data['KreditYearTotal'] = $TotalYearKredit;
        $data['YearAllTotal'] = $TotalAllYear;
        // $data['date_start'] = $date_start;
        // $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $data['year_now'] = $Year;
        $this->load->view('Trx/print_report_keuangan_year',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_transaction_year".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    }

    function Report_keuangan_day(){
        $date_start = $this->input->post('date_start_day', TRUE);
        $date_end = $this->input->post('date_end_day', TRUE);
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        $dataDebit[0] = $this->M_trx->viewReportKeuanganDayDebit($date_start,$date_end);
        $data['Debit'] = $this->M_trx->viewReportKeuanganDayDebit($date_start,$date_end);
        $dataKredit[0] = $this->M_trx->viewReportKeuanganDayKredit($date_start,$date_end);
        $data['Kredit'] = $this->M_trx->viewReportKeuanganDayKredit($date_start,$date_end);
        $getTotalDebit = $this->M_trx->viewReportKeuanganDayDebitTotal($date_start,$date_end);
        foreach($getTotalDebit as $row_debit){
            $TotalDebit = $row_debit->total_debit;
        }
        $getTotalKredit = $this->M_trx->viewReportKeuanganDayKreditTotal($date_start,$date_end);
        foreach($getTotalKredit as $row_kredit){
            $TotalKredit = $row_kredit->total_kredit;
        }
        $data['DebitTotal'] = $TotalDebit;
        $data['KreditTotal'] = $TotalKredit;
        $data['KasTotal'] = $TotalDebit - $TotalKredit;
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $this->load->view('Trx/preview_report_keuangan_day',$data);
    }

    function Report_keuangan_month(){
        $Year = $this->input->post('year_month', TRUE);
        // $Year = "2020";
        // $date_end = $this->input->post('date_end_month', TRUE);
        // print_r($date_start);
        // print_r($date_end);
        // // print_r("Test");
        // die();
        // $date_start = "2020-01-07";
        // $date_end = "2020-05-08";
        //START CODING BAGIAN DEBIT
        $Month = "01";
        $getTotalJanuari = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalJanuari as $row_Januari){
            $TotalJanuariDebit = $row_Januari->total_debit;
        }
        if($TotalJanuariDebit != NULL || $TotalJanuariDebit != ""){
            $FixTotalJanuariDebit = $TotalJanuariDebit;
        }else{
            $FixTotalJanuariDebit = 0;
        }
        $data['TotalDebitJanuari'] = $FixTotalJanuariDebit;
        $Month = "02";
        $getTotalFebruari = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalFebruari as $row_Februari){
            $TotalFebruariDebit = $row_Februari->total_debit;
        }
        if($TotalFebruariDebit != NULL || $TotalFebruariDebit != ""){
            $FixTotalFebruariDebit = $TotalFebruariDebit;
        }else{
            $FixTotalFebruariDebit = 0;
        }
        $data['TotalDebitFebruari'] = $FixTotalFebruariDebit;
        $Month = "03";
        $getTotalMaret = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalMaret as $row_Maret){
            $TotalMaretDebit = $row_Maret->total_debit;
        }
        if($TotalMaretDebit != NULL || $TotalMaretDebit != ""){
            $FixTotalMaretDebit = $TotalMaretDebit;
        }else{
            $FixTotalMaretDebit = 0;
        }
        $data['TotalDebitMaret'] = $FixTotalMaretDebit;
        $Month = "04";
        $getTotalApril = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalApril as $row_April){
            $TotalAprilDebit = $row_April->total_debit;
        }
        if($TotalAprilDebit != NULL || $TotalAprilDebit != ""){
            $FixTotalAprilDebit = $TotalAprilDebit;
        }else{
            $FixTotalAprilDebit = 0;
        }
        $data['TotalDebitApril'] = $FixTotalAprilDebit;
        $Month = "05";
        $getTotalMei = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalMei as $row_Mei){
            $TotalMeiDebit = $row_Mei->total_debit;
        }
        if($TotalMeiDebit != NULL || $TotalMeiDebit != ""){
            $FixTotalMeiDebit = $TotalMeiDebit;
        }else{
            $FixTotalMeiDebit = 0;
        }
        $data['TotalDebitMei'] = $FixTotalMeiDebit;
        $Month = "06";
        $getTotalJuni = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalJuni as $row_Juni){
            $TotalJuniDebit = $row_Juni->total_debit;
        }
        if($TotalJuniDebit != NULL || $TotalJuniDebit != ""){
            $FixTotalJuniDebit = $TotalJuniDebit;
        }else{
            $FixTotalJuniDebit = 0;
        }
        $data['TotalDebitJuni'] = $FixTotalJuniDebit;
        $Month = "07";
        $getTotalJuli = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalJuli as $row_Juli){
            $TotalJuliDebit = $row_Juli->total_debit;
        }
        if($TotalJuliDebit != NULL || $TotalJuliDebit != ""){
            $FixTotalJuliDebit = $TotalJuliDebit;
        }else{
            $FixTotalJuliDebit = 0;
        }
        $data['TotalDebitJuli'] = $FixTotalJuliDebit;
        $Month = "08";
        $getTotalAgustus = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalAgustus as $row_Agustus){
            $TotalAgustusDebit = $row_Agustus->total_debit;
        }
        if($TotalAgustusDebit != NULL || $TotalAgustusDebit != ""){
            $FixTotalAgustusDebit = $TotalAgustusDebit;
        }else{
            $FixTotalAgustusDebit = 0;
        }
        $data['TotalDebitAgustus'] = $FixTotalAgustusDebit;
        $Month = "09";
        $getTotalSeptember = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalSeptember as $row_September){
            $TotalSeptemberDebit = $row_September->total_debit;
        }
        if($TotalSeptemberDebit != NULL || $TotalSeptemberDebit != ""){
            $FixTotalSeptemberDebit = $TotalSeptemberDebit;
        }else{
            $FixTotalSeptemberDebit = 0;
        }
        $data['TotalDebitSeptember'] = $FixTotalSeptemberDebit;
        $Month = "10";
        $getTotalOktober = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalOktober as $row_Oktober){
            $TotalOktoberDebit = $row_Oktober->total_debit;
        }
        if($TotalOktoberDebit != NULL || $TotalOktoberDebit != ""){
            $FixTotalOktoberDebit = $TotalOktoberDebit;
        }else{
            $FixTotalOktoberDebit = 0;
        }
        $data['TotalDebitOktober'] = $FixTotalOktoberDebit;
        $Month = "11";
        $getTotalNovember = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalNovember as $row_November){
            $TotalNovemberDebit = $row_November->total_debit;
        }
        if($TotalNovemberDebit != NULL || $TotalNovemberDebit != ""){
            $FixTotalNovemberDebit = $TotalNovemberDebit;
        }else{
            $FixTotalNovemberDebit = 0;
        }
        $data['TotalDebitNovember'] = $FixTotalNovemberDebit;
        $Month = "12";
        $getTotalDesember = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalDesember as $row_Desember){
            $TotalDesemberDebit = $row_Desember->total_debit;
        }
        if($TotalDesemberDebit != NULL || $TotalDesemberDebit != ""){
            $FixTotalDesemberDebit = $TotalDesemberDebit;
        }else{
            $FixTotalDesemberDebit = 0;
        }
        $data['TotalDebitDesember'] = $FixTotalDesemberDebit;
        //END CODING BAGIAN DEBIT
        //START CODING BAGIAN KREDIT
        $Month = "01";
        $getTotalJanuariKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalJanuariKredit as $row_Januari){
            $TotalJanuariKredit = $row_Januari->total_kredit;
        }
        if($TotalJanuariKredit != NULL || $TotalJanuariKredit != ""){
            $FixTotalJanuariKredit = $TotalJanuariKredit;
        }else{
            $FixTotalJanuariKredit = 0;
        }
        $data['TotalKreditJanuari'] = $FixTotalJanuariKredit;
        $Month = "02";
        $getTotalFebruariKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalFebruariKredit as $row_Februari){
            $TotalFebruariKredit = $row_Februari->total_kredit;
        }
        if($TotalFebruariKredit != NULL || $TotalFebruariKredit != ""){
            $FixTotalFebruariKredit = $TotalFebruariKredit;
        }else{
            $FixTotalFebruariKredit = 0;
        }
        $data['TotalKreditFebruari'] = $FixTotalFebruariKredit;
        $Month = "03";
        $getTotalMaretKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalMaretKredit as $row_Maret){
            $TotalMaretKredit = $row_Maret->total_kredit;
        }
        if($TotalMaretKredit != NULL || $TotalMaretKredit != ""){
            $FixTotalMarerKredit = $TotalMaretKredit;
        }else{
            $FixTotalMarerKredit = 0;
        }
        $data['TotalKreditMaret'] = $FixTotalMarerKredit;
        $Month = "04";
        $getTotalAprilKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalAprilKredit as $row_April){
            $TotalAprilKredit = $row_April->total_kredit;
        }
        if($TotalAprilKredit != NULL || $TotalAprilKredit != ""){
            $FixTotalAprilKredit = $TotalAprilKredit;
        }else{
            $FixTotalAprilKredit = 0;
        }
        $data['TotalKreditApril'] = $FixTotalAprilKredit;
        $Month = "05";
        $getTotalMeiKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalMeiKredit as $row_Mei){
            $TotalMeiKredit = $row_Mei->total_kredit;
        }
        if($TotalMeiKredit != NULL || $TotalMeiKredit != ""){
            $FixTotalMeiKredit = $TotalMeiKredit;
        }else{
            $FixTotalMeiKredit = 0;
        }
        $data['TotalKreditMei'] = $FixTotalMeiKredit;
        $Month = "06";
        $getTotalJuniKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalJuniKredit as $row_Juni){
            $TotalJuniKredit = $row_Juni->total_kredit;
        }
        if($TotalJuniKredit != NULL || $TotalJuniKredit != ""){
            $FixTotalJuniKredit = $TotalJuniKredit;
        }else{
            $FixTotalJuniKredit = 0;
        }
        $data['TotalKreditJuni'] = $FixTotalJuniKredit;
        $Month = "07";
        $getTotalJuliKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalJuliKredit as $row_Juli){
            $TotalJuliKredit = $row_Juli->total_kredit;
        }
        if($TotalJuliKredit != NULL || $TotalJuliKredit != ""){
            $FixTotalJuliKredit = $TotalJuliKredit;
        }else{
            $FixTotalJuliKredit = 0;
        }
        $data['TotalKreditJuli'] = $FixTotalJuliKredit;
        $Month = "08";
        $getTotalAgustusKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalAgustusKredit as $row_Agustus){
            $TotalAgustusKredit = $row_Agustus->total_kredit;
        }
        if($TotalAgustusKredit != NULL || $TotalAgustusKredit != ""){
            $FixTotalAgustusKredit = $TotalAgustusKredit;
        }else{
            $FixTotalAgustusKredit = 0;
        }
        $data['TotalKreditAgustus'] = $FixTotalAgustusKredit;
        $Month = "09";
        $getTotalSeptemberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalSeptemberKredit as $row_September){
            $TotalSeptemberKredit = $row_September->total_kredit;
        }
        if($TotalSeptemberKredit != NULL || $TotalSeptemberKredit != ""){
            $FixTotalSeptemberKredit = $TotalSeptemberKredit;
        }else{
            $FixTotalSeptemberKredit = 0;
        }
        $data['TotalKreditSeptember'] = $FixTotalSeptemberKredit;
        $Month = "10";
        $getTotalOktoberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalOktoberKredit as $row_Oktober){
            $TotalOktoberKredit = $row_Oktober->total_kredit;
        }
        if($TotalOktoberKredit != NULL || $TotalOktoberKredit != ""){
            $FixTotalOktoberKredit = $TotalOktoberKredit;
        }else{
            $FixTotalOktoberKredit = 0;
        }
        $data['TotalKreditOktober'] = $FixTotalOktoberKredit;
        $Month = "11";
        $getTotalNovemberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalNovemberKredit as $row_November){
            $TotalNovemberKredit = $row_November->total_kredit;
        }
        if($TotalNovemberKredit != NULL || $TotalNovemberKredit != ""){
            $FixTotalNovemberKredit = $TotalNovemberKredit;
        }else{
            $FixTotalNovemberKredit = 0;
        }
        $data['TotalKreditNovember'] = $FixTotalNovemberKredit;
        $Month = "12";
        $getTotalDesemberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalDesemberKredit as $row_Desember){
            $TotalDesemberKredit = $row_Desember->total_kredit;
        }
        if($TotalDesemberKredit != NULL || $TotalDesemberKredit != ""){
            $FixTotalDesemberKredit = $TotalDesemberKredit;
        }else{
            $FixTotalDesemberKredit = 0;
        }
        $data['TotalKreditDesember'] = $FixTotalDesemberKredit;
        //END CODING BAGIAN KREDIT
        $TotalAllDebit = $FixTotalJanuariDebit + $FixTotalFebruariDebit + $FixTotalMaretDebit + $FixTotalAprilDebit + $FixTotalMeiDebit + $FixTotalJuniDebit + $FixTotalJuliDebit + $FixTotalAgustusDebit + $FixTotalSeptemberDebit + $FixTotalOktoberDebit + $FixTotalNovemberDebit + $FixTotalDesemberDebit;
        $TotalAllKredit = $FixTotalJanuariKredit + $FixTotalFebruariKredit + $FixTotalMarerKredit + $FixTotalAprilKredit + $FixTotalMeiKredit + $FixTotalJuniKredit + $FixTotalJuliKredit + $FixTotalAgustusKredit + $FixTotalSeptemberKredit + $FixTotalOktoberKredit + $FixTotalNovemberKredit + $FixTotalDesemberKredit;
        // $data['date_start'] = $date_start;
        // $data['date_end'] = $date_end;
        $data['TotalDebitAlll'] = $TotalAllDebit;
        $data['TotalKreditAlll'] = $TotalAllKredit;
        $TotalKas = $TotalAllDebit - $TotalAllKredit;
        $data['date_now'] = date('Y-m-d');
        $data['year_now'] = $Year;//date('Y');
        $data['TotalKas'] = $TotalKas;
        $this->load->view('Trx/preview_report_keuangan_month',$data);
    }

    public function cetak_report_keuangan_day(){
        $date_start = $_REQUEST['date_start'];
        $date_end = $_REQUEST['date_end'];
        $dataDebit[0] = $this->M_trx->viewReportKeuanganDayDebit($date_start,$date_end);
        $data['Debit'] = $this->M_trx->viewReportKeuanganDayDebit($date_start,$date_end);
        $dataKredit[0] = $this->M_trx->viewReportKeuanganDayKredit($date_start,$date_end);
        $data['Kredit'] = $this->M_trx->viewReportKeuanganDayKredit($date_start,$date_end);
        $getTotalDebit = $this->M_trx->viewReportKeuanganDayDebitTotal($date_start,$date_end);
        foreach($getTotalDebit as $row_debit){
            $TotalDebit = $row_debit->total_debit;
        }
        $getTotalKredit = $this->M_trx->viewReportKeuanganDayKreditTotal($date_start,$date_end);
        foreach($getTotalKredit as $row_kredit){
            $TotalKredit = $row_kredit->total_kredit;
        }
        $data['DebitTotal'] = $TotalDebit;
        $data['KreditTotal'] = $TotalKredit;
        $data['KasTotal'] = $TotalDebit - $TotalKredit;
        $data['date_start'] = $date_start;
        $data['date_end'] = $date_end;
        $data['date_now'] = date('Y-m-d');
        $this->load->view('Trx/print_report_keuangan_day',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_transaction_day".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    }

    public function cetak_report_keuangan_month(){
        $Year = $_REQUEST['Year'];
        //START CODING BAGIAN DEBIT
        $Month = "01";
        $getTotalJanuari = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalJanuari as $row_Januari){
            $TotalJanuariDebit = $row_Januari->total_debit;
        }
        if($TotalJanuariDebit != NULL || $TotalJanuariDebit != ""){
            $FixTotalJanuariDebit = $TotalJanuariDebit;
        }else{
            $FixTotalJanuariDebit = 0;
        }
        $data['TotalDebitJanuari'] = $FixTotalJanuariDebit;
        $Month = "02";
        $getTotalFebruari = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalFebruari as $row_Februari){
            $TotalFebruariDebit = $row_Februari->total_debit;
        }
        if($TotalFebruariDebit != NULL || $TotalFebruariDebit != ""){
            $FixTotalFebruariDebit = $TotalFebruariDebit;
        }else{
            $FixTotalFebruariDebit = 0;
        }
        $data['TotalDebitFebruari'] = $FixTotalFebruariDebit;
        $Month = "03";
        $getTotalMaret = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalMaret as $row_Maret){
            $TotalMaretDebit = $row_Maret->total_debit;
        }
        if($TotalMaretDebit != NULL || $TotalMaretDebit != ""){
            $FixTotalMaretDebit = $TotalMaretDebit;
        }else{
            $FixTotalMaretDebit = 0;
        }
        $data['TotalDebitMaret'] = $FixTotalMaretDebit;
        $Month = "04";
        $getTotalApril = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalApril as $row_April){
            $TotalAprilDebit = $row_April->total_debit;
        }
        if($TotalAprilDebit != NULL || $TotalAprilDebit != ""){
            $FixTotalAprilDebit = $TotalAprilDebit;
        }else{
            $FixTotalAprilDebit = 0;
        }
        $data['TotalDebitApril'] = $FixTotalAprilDebit;
        $Month = "05";
        $getTotalMei = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalMei as $row_Mei){
            $TotalMeiDebit = $row_Mei->total_debit;
        }
        if($TotalMeiDebit != NULL || $TotalMeiDebit != ""){
            $FixTotalMeiDebit = $TotalMeiDebit;
        }else{
            $FixTotalMeiDebit = 0;
        }
        $data['TotalDebitMei'] = $FixTotalMeiDebit;
        $Month = "06";
        $getTotalJuni = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalJuni as $row_Juni){
            $TotalJuniDebit = $row_Juni->total_debit;
        }
        if($TotalJuniDebit != NULL || $TotalJuniDebit != ""){
            $FixTotalJuniDebit = $TotalJuniDebit;
        }else{
            $FixTotalJuniDebit = 0;
        }
        $data['TotalDebitJuni'] = $FixTotalJuniDebit;
        $Month = "07";
        $getTotalJuli = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalJuli as $row_Juli){
            $TotalJuliDebit = $row_Juli->total_debit;
        }
        if($TotalJuliDebit != NULL || $TotalJuliDebit != ""){
            $FixTotalJuliDebit = $TotalJuliDebit;
        }else{
            $FixTotalJuliDebit = 0;
        }
        $data['TotalDebitJuli'] = $FixTotalJuliDebit;
        $Month = "08";
        $getTotalAgustus = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalAgustus as $row_Agustus){
            $TotalAgustusDebit = $row_Agustus->total_debit;
        }
        if($TotalAgustusDebit != NULL || $TotalAgustusDebit != ""){
            $FixTotalAgustusDebit = $TotalAgustusDebit;
        }else{
            $FixTotalAgustusDebit = 0;
        }
        $data['TotalDebitAgustus'] = $FixTotalAgustusDebit;
        $Month = "09";
        $getTotalSeptember = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalSeptember as $row_September){
            $TotalSeptemberDebit = $row_September->total_debit;
        }
        if($TotalSeptemberDebit != NULL || $TotalSeptemberDebit != ""){
            $FixTotalSeptemberDebit = $TotalSeptemberDebit;
        }else{
            $FixTotalSeptemberDebit = 0;
        }
        $data['TotalDebitSeptember'] = $FixTotalSeptemberDebit;
        $Month = "10";
        $getTotalOktober = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalOktober as $row_Oktober){
            $TotalOktoberDebit = $row_Oktober->total_debit;
        }
        if($TotalOktoberDebit != NULL || $TotalOktoberDebit != ""){
            $FixTotalOktoberDebit = $TotalOktoberDebit;
        }else{
            $FixTotalOktoberDebit = 0;
        }
        $data['TotalDebitOktober'] = $FixTotalOktoberDebit;
        $Month = "11";
        $getTotalNovember = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalNovember as $row_November){
            $TotalNovemberDebit = $row_November->total_debit;
        }
        if($TotalNovemberDebit != NULL || $TotalNovemberDebit != ""){
            $FixTotalNovemberDebit = $TotalNovemberDebit;
        }else{
            $FixTotalNovemberDebit = 0;
        }
        $data['TotalDebitNovember'] = $FixTotalNovemberDebit;
        $Month = "12";
        $getTotalDesember = $this->M_trx->viewReportKeuanganMonthDebit($Month,$Year);
        foreach($getTotalDesember as $row_Desember){
            $TotalDesemberDebit = $row_Desember->total_debit;
        }
        if($TotalDesemberDebit != NULL || $TotalDesemberDebit != ""){
            $FixTotalDesemberDebit = $TotalDesemberDebit;
        }else{
            $FixTotalDesemberDebit = 0;
        }
        $data['TotalDebitDesember'] = $FixTotalDesemberDebit;
        //END CODING BAGIAN DEBIT
        //START CODING BAGIAN KREDIT
        $Month = "01";
        $getTotalJanuariKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalJanuariKredit as $row_Januari){
            $TotalJanuariKredit = $row_Januari->total_kredit;
        }
        if($TotalJanuariKredit != NULL || $TotalJanuariKredit != ""){
            $FixTotalJanuariKredit = $TotalJanuariKredit;
        }else{
            $FixTotalJanuariKredit = 0;
        }
        $data['TotalKreditJanuari'] = $FixTotalJanuariKredit;
        $Month = "02";
        $getTotalFebruariKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalFebruariKredit as $row_Februari){
            $TotalFebruariKredit = $row_Februari->total_kredit;
        }
        if($TotalFebruariKredit != NULL || $TotalFebruariKredit != ""){
            $FixTotalFebruariKredit = $TotalFebruariKredit;
        }else{
            $FixTotalFebruariKredit = 0;
        }
        $data['TotalKreditFebruari'] = $FixTotalFebruariKredit;
        $Month = "03";
        $getTotalMaretKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalMaretKredit as $row_Maret){
            $TotalMaretKredit = $row_Maret->total_kredit;
        }
        if($TotalMaretKredit != NULL || $TotalMaretKredit != ""){
            $FixTotalMarerKredit = $TotalMaretKredit;
        }else{
            $FixTotalMarerKredit = 0;
        }
        $data['TotalKreditMaret'] = $FixTotalMarerKredit;
        $Month = "04";
        $getTotalAprilKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalAprilKredit as $row_April){
            $TotalAprilKredit = $row_April->total_kredit;
        }
        if($TotalAprilKredit != NULL || $TotalAprilKredit != ""){
            $FixTotalAprilKredit = $TotalAprilKredit;
        }else{
            $FixTotalAprilKredit = 0;
        }
        $data['TotalKreditApril'] = $FixTotalAprilKredit;
        $Month = "05";
        $getTotalMeiKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalMeiKredit as $row_Mei){
            $TotalMeiKredit = $row_Mei->total_kredit;
        }
        if($TotalMeiKredit != NULL || $TotalMeiKredit != ""){
            $FixTotalMeiKredit = $TotalMeiKredit;
        }else{
            $FixTotalMeiKredit = 0;
        }
        $data['TotalKreditMei'] = $FixTotalMeiKredit;
        $Month = "06";
        $getTotalJuniKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalJuniKredit as $row_Juni){
            $TotalJuniKredit = $row_Juni->total_kredit;
        }
        if($TotalJuniKredit != NULL || $TotalJuniKredit != ""){
            $FixTotalJuniKredit = $TotalJuniKredit;
        }else{
            $FixTotalJuniKredit = 0;
        }
        $data['TotalKreditJuni'] = $FixTotalJuniKredit;
        $Month = "07";
        $getTotalJuliKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalJuliKredit as $row_Juli){
            $TotalJuliKredit = $row_Juli->total_kredit;
        }
        if($TotalJuliKredit != NULL || $TotalJuliKredit != ""){
            $FixTotalJuliKredit = $TotalJuliKredit;
        }else{
            $FixTotalJuliKredit = 0;
        }
        $data['TotalKreditJuli'] = $FixTotalJuliKredit;
        $Month = "08";
        $getTotalAgustusKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalAgustusKredit as $row_Agustus){
            $TotalAgustusKredit = $row_Agustus->total_kredit;
        }
        if($TotalAgustusKredit != NULL || $TotalAgustusKredit != ""){
            $FixTotalAgustusKredit = $TotalAgustusKredit;
        }else{
            $FixTotalAgustusKredit = 0;
        }
        $data['TotalKreditAgustus'] = $FixTotalAgustusKredit;
        $Month = "09";
        $getTotalSeptemberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalSeptemberKredit as $row_September){
            $TotalSeptemberKredit = $row_September->total_kredit;
        }
        if($TotalSeptemberKredit != NULL || $TotalSeptemberKredit != ""){
            $FixTotalSeptemberKredit = $TotalSeptemberKredit;
        }else{
            $FixTotalSeptemberKredit = 0;
        }
        $data['TotalKreditSeptember'] = $FixTotalSeptemberKredit;
        $Month = "10";
        $getTotalOktoberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalOktoberKredit as $row_Oktober){
            $TotalOktoberKredit = $row_Oktober->total_kredit;
        }
        if($TotalOktoberKredit != NULL || $TotalOktoberKredit != ""){
            $FixTotalOktoberKredit = $TotalOktoberKredit;
        }else{
            $FixTotalOktoberKredit = 0;
        }
        $data['TotalKreditOktober'] = $FixTotalOktoberKredit;
        $Month = "11";
        $getTotalNovemberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalNovemberKredit as $row_November){
            $TotalNovemberKredit = $row_November->total_kredit;
        }
        if($TotalNovemberKredit != NULL || $TotalNovemberKredit != ""){
            $FixTotalNovemberKredit = $TotalNovemberKredit;
        }else{
            $FixTotalNovemberKredit = 0;
        }
        $data['TotalKreditNovember'] = $FixTotalNovemberKredit;
        $Month = "12";
        $getTotalDesemberKredit = $this->M_trx->viewReportKeuanganMonthKredit($Month,$Year);
        foreach($getTotalDesemberKredit as $row_Desember){
            $TotalDesemberKredit = $row_Desember->total_kredit;
        }
        if($TotalDesemberKredit != NULL || $TotalDesemberKredit != ""){
            $FixTotalDesemberKredit = $TotalDesemberKredit;
        }else{
            $FixTotalDesemberKredit = 0;
        }
        $data['TotalKreditDesember'] = $FixTotalDesemberKredit;
        //END CODING BAGIAN KREDIT
        $TotalAllDebit = $FixTotalJanuariDebit + $FixTotalFebruariDebit + $FixTotalMaretDebit + $FixTotalAprilDebit + $FixTotalMeiDebit + $FixTotalJuniDebit + $FixTotalJuliDebit + $FixTotalAgustusDebit + $FixTotalSeptemberDebit + $FixTotalOktoberDebit + $FixTotalNovemberDebit + $FixTotalDesemberDebit;
        $TotalAllKredit = $FixTotalJanuariKredit + $FixTotalFebruariKredit + $FixTotalMarerKredit + $FixTotalAprilKredit + $FixTotalMeiKredit + $FixTotalJuniKredit + $FixTotalJuliKredit + $FixTotalAgustusKredit + $FixTotalSeptemberKredit + $FixTotalOktoberKredit + $FixTotalNovemberKredit + $FixTotalDesemberKredit;
        // $data['date_start'] = $date_start;
        // $data['date_end'] = $date_end;
        $data['TotalDebitAlll'] = $TotalAllDebit;
        $data['TotalKreditAlll'] = $TotalAllKredit;
        $TotalKas = $TotalAllDebit - $TotalAllKredit;
        $data['TotalKas'] = $TotalKas;
        $data['date_now'] = date('Y-m-d');
        $data['year_now'] = $Year;//date('Y');
        $this->load->view('Trx/print_report_keuangan_month',$data);
        // dapatkan output html
        $html = $this->output->get_output();
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $sekarang=date("d:F:Y:h:m:s");
        $this->dompdf->stream("Report_transaction_month".$sekarang.".pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    }

}

?>