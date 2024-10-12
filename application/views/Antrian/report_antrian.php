<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Report</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);"> Report Antrian</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Report Antrian
                            </h2>
                        </div>
                        <div class="body">
                            <div>
                                <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                    <table style="width: 50%;">
                                        <tr>
                                            <td style="width: 25%;">
                                               <label class="form-label">Tanggal Awal</label> 
                                            </td>
                                            <td style="width: 5%;">
                                                <center>:</center>
                                            </td>
                                            <td style="">
                                                <input type="text" class="form-control" name="date_start" id="date_start" placeholder="2020-01-22" required="">
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
                                                <input type="text" class="form-control" name="date_end" id="date_end" placeholder="2020-01-22" required="">
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

    $('#date_start, #date_end').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

