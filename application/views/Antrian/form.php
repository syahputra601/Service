<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Form</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);"> Form Antrian</a>
                  </li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Tipe Antrian</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pilih Tipe Antrian
                            </h2>
                        </div>
                        <div class="body">
                            <?php
                            if($this->session->userdata('role') == 0){
                            ?>
                            <div>
                                <h4>Antrian Bengkel</h4>
                                
                                <?php
                                    // $print_antrian = base_url('Antrian/antrian_bengkel?id_antrian='.$Vid_antrian);
                                $Antrian_bengkel = base_url('Antrian/antrian_bengkel');
                                ?>
                                    <!-- target="_blank" -->
                                    <div style="width: 15%;">
                                        <a href="<?= @$Antrian_bengkel ?>">
                                            <button class="btn btn-default btn-block waves-effect" type="button">
                                                Bengkel
                                            </button>
                                        </a>
                                    </div>
                            </div>
                            <div style="height: 20px;"></div>
                            <?php
                            }
                            ?>
                            <div>
                                <h4>Antrian Online</h4>

                                <?php
                                    // $print_antrian = base_url('Antrian/antrian_bengkel?id_antrian='.$Vid_antrian);
                                $Antrian_homeservice = base_url('Antrian/antrian_homeservice');
                                ?>
                                    <!-- target="_blank" -->
                                    <div style="width: 15%;">
                                        <a href="<?= @$Antrian_homeservice ?>">
                                            <button class="btn btn-default btn-block waves-effect" type="button">
                                                Online
                                            </button>
                                        </a>
                                    </div>
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

    $('#date_in').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

