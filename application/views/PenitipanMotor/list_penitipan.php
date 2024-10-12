<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url('PenitipanMotor/List_penitipan')?>" target="_blank">Penitipan Motor</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Penitipan Motor
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Penitipan</th>
                                            <th>No Kendaraan</th>
                                            <th>Nama Pemilik</th>
                                            <th>No Telepon</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Penitipan</th>
                                            <th>Tanggal Ambil</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Penitipan</th>
                                            <th>No Kendaraan</th>
                                            <th>Nama Pemilik</th>
                                            <th>No Telepon</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Penitipan</th>
                                            <th>Tanggal Ambil</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach($Penitipan as $row){
                                      $no++;
                                      if($row->status == 0){
                                        $Status = "Sudah Di ambil";
                                      }elseif($row->status == 1){
                                        $Status = "Belum Di ambil";
                                      }else{
                                        $Status = "Undifined";
                                      }
                                    ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $row->no_penitipan ?></td>
                                      <td><?php echo $row->no_kendaraan ?></td>
                                      <td><?php echo $row->nama_pemilik ?></td>
                                      <td><?php echo $row->no_telp ?></td>
                                      <td><?php echo $row->nama_penerima ?></td>
                                      <td><?php echo $row->tgl_penitipan ?></td>
                                      <td><?php echo $row->tgl_ambil ?></td>
                                      <td><?php echo $Status ?></td>
                                      <td style="width: 25%;">
                                        <!-- START CODING VIEW -->
                                        <?php
                                        $view_antrian = base_url('PenitipanMotor/viewPenitipan?id_penitipan='.$row->id_penitipan);
                                        ?>
                                        <a href="<?= @$view_antrian ?>"><button class="btn bg-purple btn waves-effect">View</button></a>
                                        <!-- END CODING VIEW -->
                                        <!-- START CODING EDIT -->
                                        <a href="<?php echo base_url('PenitipanMotor/editPenitipan/'.$row->id_penitipan);?>"><button class="btn bg-blue btn waves-effect">Edit</button></a>
                                        <!-- END CODING EDIT -->
                                        <!-- START CODING CETAK -->
                                        <?php
                                        $view_penitipan = base_url('PenitipanMotor/viewPenitipanCetak?id_penitipan='.$row->id_penitipan);
                                        ?>
                                        <a href="<?= @$view_penitipan ?>"><button class="btn bg-brown btn waves-effect">Cetak</button></a>
                                        <!-- END CODING CETAK -->
                                        <!-- START CODING DELETE NEW -->
                                        <?php
                                        $url_delete = base_url('PenitipanMotor/deletePenitipan?id_penitipan='.$row->id_penitipan);
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

