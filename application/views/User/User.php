<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="" Target="_blank">Master Data</a>
                  </li>
                  <li class=""><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url().'User' ?>" Target="_blank">User</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                User
                                <!-- <small>Add quick, dynamic tab functionality to transition through panes of local content</small> -->
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">LIST</a></li>
                                <li role="presentation"><a href="#insert" data-toggle="tab">INPUT USER</a></li>
                                <!-- <li role="presentation"><a href="#import" data-toggle="tab">IMPORT</a></li> -->
                            </ul>

                            <!-- Tab panes -->
           <div class="tab-content">
               <div role="tabpanel" class="tab-pane fade in active" id="home">
                    <center>
                      <b>Data User</b>
                    </center>
                      <!-- Exportable Table -->
                        <div class="body">
                            <div class="table-responsive">
                                <table id="User" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Created At and By</th>
                                            <th>Updated At and By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Created At and By</th>
                                            <th>Updated At and By</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                      <!-- #END# Exportable Table -->
                </div>

              <div role="tabpanel" class="tab-pane fade in" id="insert">
                <form method="post"  action="<?php echo @$url_save; ?>" enctype="multipart/form-data">
                  
                  <!-- <div class="form-group">
                    <label for="phone">ID User:</label>
                    <input type="text" class="form-control" name="id_user" placeholder="ID User" value="<?php echo @$ID_User; ?>" onkeypress="return hanyaAngka(event)" required="" readonly="">
                  </div>  -->
                  <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" name="first_name" placeholder="Nama Depan" required="" onkeypress="return /[a-z ]/i.test(event.key)">
                  </div>
                  <!-- <div class="form-group">
                    <label for="nama">Nama Belakang:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Nama Belakang" required="">
                  </div>  -->
                  <div class="form-group">
                    <label for="nama">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                  </div> 
                  <div class="form-group">
                    <label for="nama">Password:</label>
                    <input type="text" class="form-control" name="password" placeholder="Password" required="">
                  </div> 
                  <!-- <div class="form-group">
                    <label for="nama">Repeat Password:</label>
                    <input type="text" class="form-control" name="repeat_password" placeholder="Repeat Password" required="">
                  </div>  -->
                  <div class="form-group form-float">
                    <div class="row clearfix">
                      <div class="col-sm-3">
                        <label class="form-label">Status User</label>
                          <select class="form-control show-tick" id="status" name="status">
                            <option value="" selected="">-- Pilih Status --</option>
                            <option value="0">Admin Kasir</option>
                            <option value="1">Pemilik</option>
                            <option value="2">Pelanggan</option>
                            <option value="00">Bloked</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" name="save" value="Save" class="btn btn-primary waves-effect">
                    <i class="material-icons">save</i>
                    <span>Save</span>
                  </button>
                </form>
              </div>
<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
</script>

<script type="text/javascript">
    
    // $('#date_from, #date_until').datepicker({
    //     dateFormat: 'yy-mm-dd'
    // });

    // $('#preview_target').DataTable({
    //   ordering: true,
    //   columnDefs: [{ "orderable": true, "targets": 8 }],
    //   order: [[ 8, "desc" ]],
    //   processing: true,
    //   scrollX: false,
    //   bScrollCollapse: true,
    //   dom: "lfrtip",
    //   lengthMenu: [
    //             [ 10, 20, 30, 50, -1 ],
    //             [ '10 rows', '20 rows', '30 rows', '50 rows', 'All' ]
    //         ],
    // });

$(document).ready(function(){
    
    var oTable = $("#User").DataTable({
            ordering: true,
            columnDefs: [{ "orderable": true, "targets": 4 }],
            order: [[ 6, "desc" ]],
            processing: true,
            serverSide: true,
            scrollX: false,
            bScrollCollapse: true,
            ajax: {
              url: "<?php echo base_url('User/UserData')?>",
              type:"POST",
              data: {
                // phone: $('#user').val(),
                // date_from: $('#date_from').val(),
                // date_to: $('#date_until').val(),
                // status: $('#status').val(),
                // noreferensi: $('#noreferensi').val(),
              }    
            },
            dom: "lfrtip",
            // dom: "lBfrtip",
            lengthMenu: [
                [ 10, 20, 30, 50, -1 ],
                [ '10 rows', '20 rows', '30 rows', '50 rows', 'All' ]
            ], 
    });

});
    

</script>

<?php $this->load->view('Tamplates/footer_v2');?>

