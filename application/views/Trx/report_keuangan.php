<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Report</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);"> Report Keuangan</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Report Keuangan
                            </h2>
                        </div>
                        <div class="body">
                            <div>
                                <h4>
                                    Report Keuangan Harian
                                </h4>
                                <br>
                                <form id="" action="<?php echo @$url_save_day; ?>" method="POST">
                                    <table style="width: 50%;">
                                        <tr>
                                            <td style="width: 25%;">
                                               <label class="form-label">Tanggal Awal</label> 
                                            </td>
                                            <td style="width: 5%;">
                                                <center>:</center>
                                            </td>
                                            <td style="">
                                                <input type="text" class="form-control" name="date_start_day" id="date_start_day" placeholder="2020-01-22" required="">
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                        <tr>
                                            <td>
                                               <label class="form-label">Tanggal Akhir</label> 
                                            </td>
                                            <td>
                                                <center>:</center>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="date_end_day" id="date_end_day" placeholder="2020-01-22" required="">
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                        <tr>
                                            <td colspan="2">
                                                <!-- <center> -->
                                                    <button type="submit" class="btn btn-primary btn-sm waves-effect">
                                                        Cetak
                                                    </button>
                                                <!-- </center> -->
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                    </table>
                                </form>
                            </div>
                            <br>
                            <br>
                            <div style="height: 15px;"></div>
                            <div>
                                <h4>
                                    Report Keuangan Bulanan
                                </h4>
                                <br>
                                <form id="" action="<?php echo @$url_save_month; ?>" method="POST">
                                    <table style="width: 50%;">
                                        <tr>
                                            <td style="width: 25%;">
                                               <label class="form-label">Tahun</label> 
                                            </td>
                                            <td style="width: 5%;">
                                                <center>:</center>
                                            </td>
                                            <td style="">
                                                <select class="form-control show-tick" id="year_month" name="year_month">
                                                <?php
                                                $now=@$YearNow;
                                                for ($a=2015;$a<=$now;$a++){
                                                ?>
                                                    <option value="<?= @$a ?>" <?php if(@$a == @$YearNow){ echo "selected"; }else{ echo ""; } ?> ><?= @$a ?></option>;
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                        <tr>
                                            <td colspan="2">
                                                <!-- <center> -->
                                                    <button type="submit" class="btn btn-primary btn-sm waves-effect">
                                                        Cetak
                                                    </button>
                                                <!-- </center> -->
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                    </table>
                                </form>
                            </div>
                            <br>
                            <br>
                            <div style="height: 15px;"></div>
                            <div>
                                <h4>
                                    Report Keuangan Tahunan
                                </h4>
                                <br>
                                <form id="" action="<?php echo @$url_save_year; ?>" method="POST">
                                    <table style="width: 50%;">
                                        <tr>
                                            <td style="width: 25%;">
                                               <label class="form-label">Tahun</label> 
                                            </td>
                                            <td style="width: 5%;">
                                                <center>:</center>
                                            </td>
                                            <td style="">
                                                <!-- <input type="text" class="form-control" name="year" id="year" placeholder="2020" required=""> -->
                                                <select class="form-control show-tick" id="year" name="year">
                                                <?php
                                                $now=@$YearNow;
                                                for ($a=2015;$a<=$now;$a++){
                                                ?>
                                                    <option value="<?= @$a ?>" <?php if(@$a == @$YearNow){ echo "selected"; }else{ echo ""; } ?> ><?= @$a ?></option>;
                                                <?php
                                                }
                                                ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                        <tr>
                                            <td colspan="2">
                                                <!-- <center> -->
                                                    <button type="submit" class="btn btn-primary btn-sm waves-effect">
                                                        Cetak
                                                    </button>
                                                <!-- </center> -->
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        <tr style="height: 15px;"></tr>
                                    </table>
                                </form>
                            </div>
                            <div style="height: 15px;"></div>
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

    $('#date_start_day, #date_end_day').datepicker({//, #date_start_month, #date_end_month
        dateFormat: 'yy-mm-dd'
    });

    // $('#year').datepicker({//'#date_from, #date_out'
    //     dateFormat: 'yy'
    // });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

