<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">View PO</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_po"];
            $Vnomor_po = $row_header["nomor_po"];
            $Vtgl_po = $row_header["tanggal_po"];
            $Vnama_po = $row_header["nama_po"];
            $Vketerangan = $row_header["keterangan"];
            // $Vstatus = $row_header["status"];
            $Vtotal = $row_header["total"];
        }
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                View PO
                            </h2>
                        </div>
                        <div class="body">
                            <div style="padding-left: 3%;">
                               <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nomor PO</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vnomor_po ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Tanggal PO</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vtgl_po ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama PO</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vnama_po ?></label>
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
                                            Detail PO
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
                                        <a href="<?php echo base_url('PO/List_po')?>">
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

