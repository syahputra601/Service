<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Form</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Form Antrian</a>
                  </li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Tipe Antrian</a>
                  </li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Antrian Online</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Antrian Online
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                <table>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Kode Antrian</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Kode Antrian" name="kode_antrian" id="kode_antrian" value="<?= @$antrian_HomeService_kode ?>" readonly>
                                            <label class="form-label"><?= @$antrian_HomeService_kode ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;">
                                            <label class="form-label">Username</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="Username" name="username" id="username" value="<?= @$username ?>">
                                            <input type="hidden" class="form-control" placeholder="Username" name="token" id="token" value="<?= @$get_token ?>">
                                            <label class="form-label"><?= @$username ?></label>
                                            <!-- <label class="form-label"><?= @$get_token ?></label> -->
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Tanggal Masuk</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td>
                                            <input type="hidden" class="form-control" placeholder="2020-02-22" name="date_in" id="date_in" value="<?= @$dateNow ?>">
                                            <label class="form-label"><?= @$dateNow ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td style="width: 100px;"> 
                                            <label class="form-label">Waktu Reservasi</label>
                                        </td>
                                        <td style="width: 50px; text-align: center;">:</td>
                                        <td style="width: 60%;">
                                            <input type="hidden" class="form-control" placeholder="20-02-01" name="time_in" id="time_in" value="<?= @$timeNow ?>">
                                            <!-- <label class="form-label"><?= @$timeNow ?></label> -->
                                            <select class="form-control show-tick" id="kode_jam_antrian" name="kode_jam_antrian">
                                                <option value="00" selected="">-- Pilih Waktu --</option>
                                                <?php
                                                if(@$JustTime < "08:00"){
                                                ?>
                                                <option value="A1">Jam 8-9 (08.00 - 08.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "08:30"){
                                                ?>
                                                <option value="A2">Jam 8-9 (08.30 - 09.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "09:00"){
                                                ?>
                                                <option value="B1">Jam 9-10 (09.00 - 09.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "09:30"){
                                                ?>
                                                <option value="B2">Jam 9-10 (09.30 - 10.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "10:00"){
                                                ?>
                                                <option value="C1">Jam 10-11 (10.00 - 10.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "10:30"){
                                                ?>
                                                <option value="C2">Jam 10-11 (10.30 - 11.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "11:00"){
                                                ?>
                                                <option value="D1">Jam 11-12 (11.00 - 11.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "11:30"){
                                                ?>
                                                <option value="D2">Jam 11-12 (11.30 - 12.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "13:00"){
                                                ?>
                                                <option value="E1">Jam 13-14 (13.00 - 13.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "13:30"){
                                                ?>
                                                <option value="E2">Jam 13-14 (13.30 - 14.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "14:00"){
                                                ?>
                                                <option value="F1">Jam 14-15 (14.00 - 14.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "14:30"){
                                                ?>
                                                <option value="F2">Jam 14-15 (14.30 - 15.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "15:00"){
                                                ?>
                                                <option value="G1">Jam 15-16 (15.00 - 15.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "15:30"){
                                                ?>
                                                <option value="G2">Jam 15-16 (15.30 - 16.00)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "16:00"){
                                                ?>
                                                <option value="H1">Jam 16-17 (16.00 - 16.30)</option>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(@$JustTime < "16:30"){
                                                ?>
                                                <option value="H2">Jam 16-17 (16.30 - 17.00)</option>
                                                <?php
                                                }
                                                ?>
                                              </select>
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
                            </form>
                            <table>
                                <tr>
                                    <td style="width: 150%;"></td>
                                    <td >
                                        <?php
                                        $Back = base_url('Antrian/Form');
                                        ?>
                                        <a href="<?= @$Back ?>">
                                            <button class="btn btn-danger btn-block waves-effect" type="button">
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

    $('#date_in').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

