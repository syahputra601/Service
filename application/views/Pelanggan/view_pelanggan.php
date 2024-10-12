<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Form</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">View Pelanggan</a>
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
if($Vjk == 1){
    $JenisKelamin = "Laki-Laki";
}elseif($Vjk == 2){
    $JenisKelamin = "Perempuan";
}else{  
    $JenisKelamin = "Undifined";
}
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                View Pelanggan
                            </h2>
                        </div>
                        <div class="body">
                            <!-- <form id="" action="<?php echo @$url_save; ?>" method="POST"> -->
                                <table>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Kode Pelanggan</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vkode_pel ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Username</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vusername ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Nama</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vnama ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Email</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vemail ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Tempat Lahir</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vtempat_lahir ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal Lahir</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vtgl_lahir ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Jenis Kelamin</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$JenisKelamin ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">No Handpone</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <label class="form-label"><?= @$Vno_hp ?></label>
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
                                            <label class="form-label"><?= @$Valamat ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <!-- <tr>
                                        <td>
                                            <button class="btn btn-primary waves-effect pull-left" type="submit">
                                                Simpan
                                            </button>
                                        </td>
                                    </tr> -->
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
                            <!-- </form> -->
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

