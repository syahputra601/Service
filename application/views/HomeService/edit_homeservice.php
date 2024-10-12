<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Edit Home Service</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_home_service"];
            $Vnama = $row_header["nama"];
            $Vno_hp = $row_header["no_hp"];
            $Vtgl = $row_header["tgl_reservasi"];
            $Vwaktu = $row_header["waktu_reservasi"];
            $Valamat = $row_header["alamat"];
            $Vkeluhan = $row_header["keluhan"];
        }
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Home Service
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_edit; ?>" method="POST">
                                <table>
                                   <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" value="<?= @$Vnama ?>" required onkeypress="return /[a-z ]/i.test(event.key)">
                                            <input type="hidden" class="form-control" placeholder="Nama" name="id_home_service" id="id_home_service" value="<?= @$Vid ?>" required readonly>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">No HP</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="no_hp" id="no_hp" placeholder="08123122121" onkeypress="return hanyaAngka(event)" value="<?= @$Vno_hp ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal Reservasi</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="tgl" id="tgl" placeholder="1991-12-22" value="<?= @$Vtgl ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Waktu Reservasi</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="timepicker form-control"  name="waktu" id="waktu" placeholder="00:00:00" value="<?= @$Vwaktu ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                </table>
                                <table style="width: 55%;" border="0">
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Alamat</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <textarea rows="4" name="alamat" id="alamat" class="form-control no-resize" placeholder="Alamat Tinggal Lengkap ..."required=""><?= @$Valamat ?></textarea>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Keluhan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <textarea rows="4" name="keluhan" id="keluhan" class="form-control no-resize" placeholder="Keluhan ..."required=""><?= @$Vkeluhan ?></textarea>
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
                                            <a href="<?php echo base_url('HomeService/List_homeservice')?>">
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

