<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Edit Mekanik</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_penitipan"];
            $Vno_penitipan = $row_header["no_penitipan"];
            $Vno_kendaraan = $row_header["no_kendaraan"];
            $Vnama_pemilik = $row_header["nama_pemilik"];
            $Vno_telp = $row_header["no_telp"];
            $Vnama_penerima = $row_header["nama_penerima"];
            $Vtgl_penitipan = $row_header["tgl_penitipan"];
            $Vtgl_ambil = $row_header["tgl_ambil"];
            $Vstatus = $row_header["status"];
        }
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Penitipan Motor
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_edit; ?>" method="POST">
                                <table>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nomor Penitipan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="No Penitipan" name="no_penitipan" id="no_penitipan" value="<?= @$Vno_penitipan ?>" readonly required>
                                            <input type="hidden" class="form-control" placeholder="ID Penitipan" name="id_penitipan" id="id_penitipan" value="<?= @$Vid ?>" readonly required>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nomor Kendaraan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Nomor Kendaraan" name="no_kendaraan" id="no_kendaraan" required="" value="<?= @$Vno_kendaraan ?>" onkeypress="return /[a-z 0-9]/i.test(event.key)">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama Pemilik</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik" required="" value="<?= @$Vnama_penerima ?>" onkeypress="return /[a-z ]/i.test(event.key)">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">No Telepon</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="no_telp" id="no_telp" onkeypress="return hanyaAngka(event)" required="" value="<?= @$Vno_telp ?>">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama Penerima</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Nama Penerima" name="nama_penerima" id="nama_penerima" required="" value="<?= @$Vnama_penerima ?>" onkeypress="return /[a-z ]/i.test(event.key)">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal Penitipan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="tgl_penitipan" id="tgl_penitipan" placeholder="2020-12-22" required="" value="<?= @$Vtgl_penitipan ?>">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal Ambil</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="tgl_ambil" id="tgl_ambil" placeholder="2020-12-22" required="" value="<?= @$Vtgl_ambil ?>">
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
                                                <option value="0">Sudah di ambil</option>
                                                <option value="1" selected="">Belum di ambil</option>
                                            <?php
                                            }elseif($Vstatus == 0){
                                            ?>
                                                <option value="00">-- Pilih Data --</option>
                                                <option value="0" selected="">Sudah di ambil</option>
                                                <option value="1">Belum di ambil</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value="00" selected="">-- Pilih Data --</option>
                                                <option value="0">Sudah di ambil</option>
                                                <option value="1">Belum di ambil</option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
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
                                            <a href="<?php echo base_url('PenitipanMotor/List_penitipan')?>">
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

    $('#tgl_penitipan, #tgl_ambil').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

