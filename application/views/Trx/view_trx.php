<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Transaction</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Report Trx All</a>
                  </li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">View Transaction</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_transaksi"];
            $Vno_invoice = $row_header["no_invoice"];
            $Vtgl = $row_header["tanggal"];
            $Vno_nota = $row_header["no_nota"];
            $Vnama_pel = $row_header["nama_pel"];
            $Vjenis_service = $row_header["jenis_service"];
            $Vnip = $row_header["nip"];
            $Vbiaya_jasa = $row_header["biaya_jasa"];
            $Vketerangan = $row_header["keterangan"];
            $Vmerk_motor = $row_header["merk_motor"];
            $Vmodel_motor = $row_header["model_motor"];
            $Vtipe_motor = $row_header["tipe_motor"];
            $Vtotal = $row_header["total"];
            $Vstatus = $row_header["status"];
            $Vkode_antrian = $row_header["kode_antrian"];
        }
if($Vstatus == 0){
    $Status = "Pending";
}else{  
    $Status = "Undifined";
}
if($Vjenis_service == 'ServiceUmum'){
    $JenisService = "Service Umum";
}elseif($Vjenis_service == 'HomeService'){
    $JenisService = "Home Service";
}else{
    $JenisService = "Undifined";
}
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                View Transaction
                            </h2>
                        </div>
                        <div class="body">
                            <div style="padding-left: 3%;">
                               <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">No Invoice</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vno_invoice ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Tanggal</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vtgl ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">No Nota</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vno_nota ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Nama Pelanggan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vnama_pel ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Jenis Transaksi</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$JenisService ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Nama Mekanik</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vnip ?></label>
                                        </td>
                                    </tr>
                                    <!-- <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Biaya Jasa Service</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vbiaya_jasa ?></label>
                                        </td>
                                    </tr> -->
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Merk Motor</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vmerk_motor ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Model Motor</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vmodel_motor ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tipe Motor</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vtipe_motor ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                </table>
                                <table style="width: 55%;" border="0">
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Keterangan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vketerangan ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 25px;"></tr>
                                </table> 
                            </div>
                            
                            <!-- Hover Rows -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="header">
                                        <h2>
                                            Detail Transaction
                                        </h2>
                                    </div>
                                    <div class="body table-responsive">
                                        <table class="table table-hover" style="text-align: center;">
                                            <thead>
                                                <tr >
                                                    <th style="text-align: center;">No</th>
                                                    <th style="text-align: center;">SKU</th>
                                                    <th style="text-align: center;">Nama Sparepart</th>
                                                    <th style="text-align: center;">Jumlah</th>
                                                    <th style="text-align: center;">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no=0;
                                            foreach($detail as $row){
                                              $no++;
                                            ?>
                                            <tr>
                                              <td><?php echo $no ?></td>
                                              <td><?php echo $row->sku ?></td>
                                              <td><?php echo $row->nama_sparepart ?></td>
                                              <td><?php echo $row->qty ?></td>
                                              <td><?php echo $row->total_harga ?></td>
                                            </tr>
                                            <?php }?> 
                                            <tr>
                                                <td colspan="4" style="text-align: center;">
                                                    Biaya Jasa :
                                                </td>
                                                <td>
                                                    <?= @$Vbiaya_jasa ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <!-- <th></th> -->
                                                    <!-- <th></th> -->
                                                    <th colspan="4" style="text-align: center;"><label class="form-label" for="total" style="padding-top: 6px;">Total :</label></th>
                                                    <th style="text-align: center;">
                                                        <div class="form-group">
                                                            <!-- <?php
                                                            $total = array(
                                                                "name" => "total",
                                                                "id" => "total",
                                                                "type" => "text",
                                                                "class" => "form-control",
                                                                "readonly" => "true",
                                                                "value" => @$Vtotal,
                                                            );
                                                            echo form_input($total);
                                                            ?> -->
                                                            <label class="form-label" for="total" style="padding-top: 6px; text-align: center;">Rp. <?= @$Vtotal ?></label>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Hover Rows -->
                            <table style="width: 100%;">
                                <tr style="height: 5px;"></tr>
                                <tr>
                                    <td style="width: 100%;">
                                        <a href="<?php echo base_url('Trx/TrxAll')?>">
                                            <button class="btn btn-danger waves-effect pull-right" type="button">
                                                Back
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                      <!-- #END# Exportable Table -->
                    </div>
                </div>
            </div>

<script>
        function hanyaAngka(evt) {//START CODING LOCK NUMBER IN TEXTBOX
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }//END CODING LOCK NUMBER IN TEXTBOX

    $('#tgl_lahir').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

