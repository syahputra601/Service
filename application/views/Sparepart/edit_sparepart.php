<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Edit Sparepart</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_sparepart"];
            $Vsku = $row_header["sku"];
            $Vnama = $row_header["nama_sparepart"];
            $Vqty = $row_header["qty"];
            $Vharga = $row_header["harga"];
            $Vstatus = $row_header["status"];
            $Vtanggal = $row_header["tanggal"];
            $Vsku_suplier = $row_header["sku_suplier"];
        }
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Suplier
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_edit; ?>" method="POST">
                                <table>
                                   <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">SKU</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="SKU" name="sku" id="sku" value="<?= @$Vsku ?>" readonly required>
                                            <input type="hidden" class="form-control" placeholder="SKU" name="id_sparepart" id="id_sparepart" value="<?= @$Vid ?>" readonly required>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Nama Sparepart" name="nama" id="nama" value="<?= @$Vnama ?>" required="" onkeypress="return /[a-z ]/i.test(event.key)">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Qty</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="number" class="form-control" placeholder="12" name="qty" id="qty" onkeypress="return hanyaAngka(event)" value="<?= @$Vqty ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Harga</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="number" class="form-control" placeholder="45000" name="harga" id="harga" onkeypress="return hanyaAngka(event)" value="<?= @$Vharga ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Status</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <select class="form-control show-tick" id="status" name="status">
                                            <?php
                                            if($Vstatus == 1){
                                            ?>
                                                <option value="00">-- Pilih Data --</option>
                                                <option value="1" selected="">Stok Tersedia</option>
                                                <option value="0">Stok Kosong</option>
                                            <?php
                                            }elseif ($Vstatus == 0) {
                                            ?>
                                                <option value="00">-- Pilih Data --</option>
                                                <option value="1">Stok Tersedia</option>
                                                <option value="0" selected="">Stok Kosong</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value="00" selected="">-- Pilih Data --</option>
                                                <option value="1">Stok Tersedia</option>
                                                <option value="0">Stok Kosong</option>
                                            <?php
                                            }
                                            ?>    
                                            </select> 
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="tgl" id="tgl" placeholder="2020-12-22" value="<?= @$Vtanggal ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">SKU Suplier</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="SKU Suplier" name="sku_suplier" id="sku_suplier" value="<?= @$Vsku_suplier ?>" required>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                </table>
                                <table style="width: 55%;" border="0">
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary waves-effect pull-left" type="submit">
                                                Simpan
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                <table style="width: 100%;">
                                    <tr style="height: 5px;"></tr>
                                    <tr>
                                        <td style="width: 100%;">
                                            <a href="<?php echo base_url('Sparepart/List_sparepart')?>">
                                                <button class="btn btn-danger waves-effect pull-right" type="button">
                                                    Back
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
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

    $('#tgl').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

