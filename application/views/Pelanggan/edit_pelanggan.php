<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Edit Pelanggan</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_pel"];
            $Vkode_pel = $row_header["kode_pel"];
            $Vusername = $row_header["username"];
            $Vnama = $row_header["nama_pel"];
            $Vemail = $row_header["email"];
            $Vtempat_lahir = $row_header["tempat_lahir"];
            $Vtgl_lahir = $row_header["tgl_lahir"];
            $Vjk = $row_header["jk"];
            $Vno_hp = $row_header["no_hp"];
            $Valamat = $row_header["alamat"];
        }
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Pelanggan
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_edit; ?>" method="POST">
                                <table>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Kode Pelanggan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Kode Pelanggan" name="kode_pel" id="kode_pel" value="<?= @$Vkode_pel ?>" readonly required>
                                            <input type="hidden" class="form-control" placeholder="ID Pelanggan" name="id_pel" id="id_pel" value="<?= @$Vid ?>" readonly required>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Username</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= @$Vusername ?>" readonly="" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama" id="nama" value="<?= @$Vnama ?>" onkeypress="return /[a-z ]/i.test(event.key)" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Email</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="email" class="form-control" placeholder="xyz@ymail.com" name="email" id="email" value="<?= @$Vemail ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Tempat Lahir</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Jakarta" name="tempat_lahir" id="tempat_lahir" value="<?= @$Vtempat_lahir ?>" onkeypress="return /[a-z ]/i.test(event.key)" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal Lahir</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="tgl_lahir" id="tgl_lahir" placeholder="1991-12-22" value="<?= @$Vtgl_lahir ?>" required="">
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Jenis Kelamin</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <select class="form-control show-tick" id="jenis_kelamin" name="jenis_kelamin">
                                            <?php
                                            if($Vjk == 1){
                                            ?>
                                                <option value="00">-- Pilih Data --</option>
                                                <option value="1" selected="">Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            <?php
                                            }elseif($Vjk == 2){
                                            ?>
                                                <option value="00">-- Pilih Data --</option>
                                                <option value="1">Laki-Laki</option>
                                                <option value="2" selected="">Perempuan</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value="00" selected="">-- Pilih Data --</option>
                                                <option value="1">Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">No Handpone</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="no_hp" id="no_hp" placeholder="08123122121" onkeypress="return hanyaAngka(event)" value="<?= @$Vno_hp ?>" required="">
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
                                            <textarea rows="4" name="alamat" id="alamat" class="form-control no-resize" placeholder="Alamat Tinggal ..."required=""><?= @$Valamat ?></textarea>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
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
                                            <a href="<?php echo base_url('Pelanggan/List_pelanggan')?>">
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

    $('#tgl_lahir').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

