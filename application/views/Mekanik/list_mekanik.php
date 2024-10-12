<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url('Mekanik/List_mekanik')?>" target="_blank">Mekanik</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Mekanik
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Tempat & Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Tempat & Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach($Mekanik as $row){
                                      $no++;
                                      $joinTempatTglLahir = $row->tempat_lahir."/".$row->tgl_lahir;
                                      if($row->jk == 1){
                                        $JeniKelamin = "Laki-Laki";
                                      }elseif($row->jk == 2){
                                        $JeniKelamin = "Perempuan";
                                      }else{
                                        $JeniKelamin = "Undifined";
                                      }
                                    ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $row->nip ?></td>
                                      <td><?php echo $row->nama_mekanik ?></td>
                                      <td><?php echo $joinTempatTglLahir ?></td>
                                      <td><?php echo $JeniKelamin ?></td>
                                      <td><?php echo $row->no_hp ?></td>
                                      <td><?php echo $row->alamat ?></td>
                                      <td style="width: 25%;">
                                        <!-- START CODING VIEW -->
                                        <?php
                                        $view_antrian = base_url('Mekanik/viewMekanik?id_mekanik='.$row->id_mekanik);
                                        ?>
                                        <a href="<?= @$view_antrian ?>"><button class="btn bg-purple btn waves-effect">View</button></a>
                                        <!-- END CODING VIEW -->
                                        <!-- START CODING EDIT -->
                                        <a href="<?php echo base_url('Mekanik/editMekanik/'.$row->id_mekanik);?>"><button class="btn bg-blue btn waves-effect">Edit</button></a>
                                        <!-- END CODING EDIT -->
                                        <!-- START CODING DELETE NEW -->
                                        <?php
                                        $url_delete = base_url('Mekanik/deleteMekanik?id_mekanik='.$row->id_mekanik);
                                        ?>
                                        <a href="<?= @$url_delete ?>" onclick="return confirm('Delete this data ?');"><button class="btn bg-red btn waves-effect">Delete</button></a>
                                        <!-- END CODING DELETE NEW -->
                                      </td>
                                    </tr>
                                    <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      <!-- #END# Exportable Table -->
                    </div>

<script>
        function hanyaAngka(evt) {//START CODING LOCK NUMBER IN TEXTBOX
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }//END CODING LOCK NUMBER IN TEXTBOX

    $('#date_from, #date_until').datepicker({
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

