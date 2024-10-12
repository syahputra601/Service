<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Edit Antrian</a>
                  </li>
              </ol>
            </div>
<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id_antrian"];
            $Vkode_antrian = $row_header["kode_antrian"];
            $Vusername = $row_header["username"];
            $Vtgl_masuk = $row_header["tanggal_masuk"];
            $Vwaktu_masuk = $row_header["waktu_masuk"];
            $Vtipe_antrian = $row_header["tipe_antrian"];
            $kode_jam_antrian = $row_header["kode_jam_antrian"];
            $Vstatus= $row_header["status"];
            $Vtoken = $row_header["token"];
        }
if($Vtipe_antrian == "Bengkel"){
    $TipeAntrian = "Bengkel";
}elseif($Vtipe_antrian == "HomeService"){
    $TipeAntrian = "Antrian Online";
}else{
    $TipeAntrian = "Undified";
}
//start get waktu dari kode jam antrian
if($kode_jam_antrian == "A1"){
    $WaktuReservasi = "08:00";
}elseif($kode_jam_antrian == "A2"){
    $WaktuReservasi = "08:30";
}elseif($kode_jam_antrian == "B1"){
    $WaktuReservasi = "09:00";
}elseif($kode_jam_antrian == "B2"){
    $WaktuReservasi = "09:30";
}elseif($kode_jam_antrian == "C1"){
    $WaktuReservasi = "10:00";
}elseif($kode_jam_antrian == "C2"){
    $WaktuReservasi = "10:30";
}elseif($kode_jam_antrian == "D1"){
    $WaktuReservasi = "11:00";
}elseif($kode_jam_antrian == "D2"){
    $WaktuReservasi = "11:30";
}elseif($kode_jam_antrian == "E1"){
    $WaktuReservasi = "13:00";
}elseif($kode_jam_antrian == "E2"){
    $WaktuReservasi = "13:30";
}elseif($kode_jam_antrian == "F1"){
    $WaktuReservasi = "14:00";
}elseif($kode_jam_antrian == "F2"){
    $WaktuReservasi = "14:30";
}elseif($kode_jam_antrian == "G1"){
    $WaktuReservasi = "15:00";
}elseif($kode_jam_antrian == "G2"){
    $WaktuReservasi = "15:30";
}elseif($kode_jam_antrian == "H1"){
    $WaktuReservasi = "16:00";
}elseif($kode_jam_antrian == "H2"){
    $WaktuReservasi = "16:30";
}else{
    $WaktuReservasi = "17:00";
}

if(@$WaktuReservasi == "08:00"){
    $KetWaktuReservasi = "Jam 8-9 (08.00 - 08.30)";
}elseif(@$WaktuReservasi == "08:30"){
    $KetWaktuReservasi = "Jam 8-9 (08.30 - 09.00)";
}
elseif(@$WaktuReservasi == "09:00"){
    $KetWaktuReservasi = "Jam 9-10 (09.00 - 09.30)";
}
elseif(@$WaktuReservasi == "09:30"){
    $KetWaktuReservasi = "Jam 9-10 (09.30 - 10.00)";
}
elseif(@$WaktuReservasi == "10:00"){
    $KetWaktuReservasi = "Jam 10-11 (10.00 - 10.30)";
}
elseif(@$WaktuReservasi == "10:30"){
    $KetWaktuReservasi = "Jam 10-11 (10.30 - 11.00)";
}
elseif(@$WaktuReservasi == "11:00"){
    $KetWaktuReservasi = "Jam 11-12 (11.00 - 11.30)";
}
elseif(@$WaktuReservasi == "11:30"){
    $KetWaktuReservasi = "Jam 11-12 (11.30 - 12.00)";
}
elseif(@$WaktuReservasi == "13:00"){
    $KetWaktuReservasi = "Jam 13-14 (13.00 - 13.30)";
}
elseif(@$WaktuReservasi == "13:30"){
    $KetWaktuReservasi = "Jam 13-14 (13.30 - 14.00)";
}
elseif(@$WaktuReservasi == "14:00"){
    $KetWaktuReservasi = "Jam 14-15 (14.00 - 14.30)";
}
elseif(@$WaktuReservasi == "14:30"){
    $KetWaktuReservasi = "Jam 14-15 (14.30 - 15.00)";
}
elseif(@$WaktuReservasi == "15:00"){
    $KetWaktuReservasi = "Jam 15-16 (15.00 - 15.30)";
}
elseif(@$WaktuReservasi == "15:30"){
    $KetWaktuReservasi = "Jam 15-16 (15.30 - 16.00)";
}
elseif(@$WaktuReservasi == "16:00"){
    $KetWaktuReservasi = "Jam 16-17 (16.00 - 16.30)";
}
elseif(@$WaktuReservasi == "16:30"){
    $KetWaktuReservasi = "Jam 16-17 (16.30 - 17.00)";
}
else{
    $KetWaktuReservasi = "-";
}
//end get waktu dari kode jam antrian
if($kode_jam_antrian == '' || $kode_jam_antrian == NULL){
    $antrianReservasi = $Vwaktu_masuk;
}else{
    $antrianReservasi = $KetWaktuReservasi;
}
?>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Antrian
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_edit; ?>" method="POST">
                                <table>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Kode Antrian</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Kode Antrian" name="kode_antrian" id="kode_antrian" value="<?= @$Vkode_antrian ?>" readonly required>
                                            <input type="hidden" class="form-control" placeholder="ID Antrian" name="id_antrian" id="id_antrian" value="<?= @$Vid ?>" readonly required>
                                            <input type="hidden" class="form-control" placeholder="Token" name="token" id="token" value="<?= @$Vtoken ?>" readonly required>
                                            <label class="form-label"><?= @$Vkode_antrian ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Username</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Username" name="username" id="username" value="<?= @$Vusername ?>" readonly required>
                                            <label class="form-label"><?= @$Vusername ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Tanggal/Waktu Masuk</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Tanggal Masuk" name="tgl_masuk" id="tgl_masuk" value="<?= @$Vtgl_masuk ?>" readonly required>
                                            <input type="hidden" class="form-control" placeholder="Waktu Masuk" name="waktu_masuk" id="waktu_masuk" value="<?= @$Vwaktu_masuk ?>" readonly required>
                                            <label class="form-label"><?= @$Vtgl_masuk." / ".@$Vwaktu_masuk ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Tipe Antrian</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Tipe Antrian" name="tipe_antrian" id="tipe_antrian" value="<?= @$Vtipe_antrian ?>" readonly required>
                                            <label class="form-label"><?= @$TipeAntrian ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <?php
                                    if($kode_jam_antrian == '' || $kode_jam_antrian == NULL){
                                        //kosong
                                    }else{
                                    ?>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Waktu Reservasi</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Kode Jam" name="kode_jam" id="kode_jam" value="<?= @$Vkode_jam ?>" readonly required>
                                        
                                            <label class="form-label"><?= @$antrianReservasi ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Status</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <select class="form-control show-tick" id="status" name="status">
                                            <?php
                                            if($Vstatus == 0){
                                            ?>
                                                <!-- <option value="00">-- Pilih Data --</option> -->
                                                <option value="0" selected="">Belum Terlayani</option>
                                                <option value="1">Terlayani</option>
                                            <?php
                                            }elseif($Vstatus == 1){
                                            ?>
                                                <!-- <option value="00">-- Pilih Data --</option> -->
                                                <option value="0">Belum Terlayani</option>
                                                <option value="1" selected="">Terlayani</option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value="00" selected="">-- Pilih Data --</option>
                                                <option value="0" selected="">Belum Terlayani</option>
                                                <option value="1">Terlayani</option>
                                            <?php  
                                            }
                                            ?>
                                            </select> 
                                        </td>
                                    </tr>
                                </table>
                                <table style="width: 100%;">
                                    <tr style="height: 5px;"></tr>
                                    <tr>
                                        <td style="width: 100%;">
                                            <center>
                                                <button class="btn btn-primary waves-effect" type="submit">
                                                    Update
                                                </button>
                                            </center>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <table style="width: 100%;">
                                <tr style="height: 5px;"></tr>
                                <tr>
                                    <td style="width: 100%;">
                                        <a href="<?php echo base_url('Antrian/List_antrian')?>">
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

