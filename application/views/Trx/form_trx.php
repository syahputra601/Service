<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Form</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Kode Antrian</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Kode Antrian
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_next; ?>" method="POST">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 100%; text-align: center;">
                                            <label class="form-label">Kode Antrian :</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 100%; text-align: center;">
                                            <div style="width: 100%; padding-left: 43%; padding-right: 43%;">
                                                <input type="text" class="form-control" name="kode_antrian" id="kode_antrian" placeholder="Kode Antrian" onkeypress="return /[a-z0-9]/i.test(event.key)" required="">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table style="width: 100%;" border="0">
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary waves-effect pull-right" type="submit">
                                                Next
                                            </button>
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

        function validate() {
          var element = document.getElementById('nama');
          element.value = element.value.replace(/[^a-zA-Z0-9@]+/, '');
        };

    $('#tgl').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

