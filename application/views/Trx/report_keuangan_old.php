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
                                <a href="<?php echo base_url('Trx/Report_keuangan_day')?>">
                                    <button class="btn btn-default waves-effect pull-left" type="button">
                                        Report Keuangan Harian
                                    </button>
                                </a>
                            </div>
                            <br>
                            <br>
                            <div style="height: 15px;"></div>
                            <div>
                                <h4>
                                    Report Keuangan Bulanan
                                </h4>
                                <a href="<?php echo base_url('Trx/Report_keuangan_month')?>">
                                    <button class="btn btn-default waves-effect pull-left" type="button">
                                        Report Keuangan Bulanan
                                    </button>
                                </a>
                            </div>
                            <br>
                            <br>
                            <div style="height: 15px;"></div>
                            <div>
                                <h4>
                                    Report Keuangan Tahunan
                                </h4>
                                <a href="<?php echo base_url('Trx/Report_keuangan_year')?>">
                                    <button class="btn btn-default waves-effect pull-left" type="button">
                                        Report Keuangan Tahunan
                                    </button>
                                </a>
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

    $('#date_start_day, #date_end_day, #date_start_month, #date_end_month, #date_start_year, #date_end_year').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

