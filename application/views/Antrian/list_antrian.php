<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url('Antrian')?>" target="_blank">Antrian</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Antrian
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Antrian</th>
                                            <th>Username</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tipe Antrian</th>
                                            <th>Jam Antrian</th>
                                            <th>Status</th>
                                            <th style="width: 16%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Antrian</th>
                                            <th>Username</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tipe Antrian</th>
                                            <th>Jam Antrian</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach($Antrian as $row){
                                      $no++;
                                    if($row->tipe_antrian == 'Bengkel'){
                                        $TipeAntrian = "Antrian Bengkel";
                                    }elseif($row->tipe_antrian == 'HomeService'){
                                        $TipeAntrian = "Antrian Online";
                                    }else{
                                        $TipeAntrian = "Undifined";
                                    }
                                    if($row->kode_jam_antrian == NULL || $row->kode_jam_antrian == ''){
                                        $JamAntrian = $row->waktu_masuk;
                                    }elseif ($row->kode_jam_antrian != NULL || $row->kode_jam_antrian != '') {
                                        if($row->kode_jam_antrian == 'A1'){
                                            $JamAntrian = 'Jam 8-9 (08.00 - 08.30)';
                                        }elseif($row->kode_jam_antrian == 'A2'){
                                            $JamAntrian = 'Jam 8-9 (08.30 - 09.00)';
                                        }elseif($row->kode_jam_antrian == 'B1'){
                                            $JamAntrian = 'Jam 9-10 (09.00 - 09.30)';
                                        }elseif($row->kode_jam_antrian == 'B2'){
                                            $JamAntrian = 'Jam 9-10 (09.30 - 10.00)';
                                        }elseif($row->kode_jam_antrian == 'C1'){
                                            $JamAntrian = 'Jam 10-11 (10.00 - 10.30)';
                                        }elseif($row->kode_jam_antrian == 'C2'){
                                            $JamAntrian = 'Jam 10-11 (10.30 - 11.00)';
                                        }elseif($row->kode_jam_antrian == 'D1'){
                                            $JamAntrian = 'Jam 11-12 (11.00 - 11.30)';
                                        }elseif($row->kode_jam_antrian == 'D2'){
                                            $JamAntrian = 'Jam 11-12 (11.30 - 12.00)';
                                        }elseif($row->kode_jam_antrian == 'E1'){
                                            $JamAntrian = 'Jam 13-14 (13.00 - 13.30)';
                                        }elseif($row->kode_jam_antrian == 'E2'){
                                            $JamAntrian = 'Jam 13-14 (13.30 - 14.00)';
                                        }elseif($row->kode_jam_antrian == 'F1'){
                                            $JamAntrian = 'Jam 14-15 (14.00 - 14.30)';
                                        }elseif($row->kode_jam_antrian == 'F2'){
                                            $JamAntrian = 'Jam 14-15 (14.30 - 15.00)';
                                        }elseif($row->kode_jam_antrian == 'G1'){
                                            $JamAntrian = 'Jam 15-16 (15.00 - 15.30)';
                                        }elseif($row->kode_jam_antrian == 'G2'){
                                            $JamAntrian = 'Jam 15-16 (15.30 - 16.00)';
                                        }elseif($row->kode_jam_antrian == 'H1'){
                                            $JamAntrian = 'Jam 16-17 (16.00 - 16.30)';
                                        }elseif($row->kode_jam_antrian == 'H2'){
                                            $JamAntrian = 'Jam 16-17 (16.30 - 17.00)';
                                        }else{
                                            $JamAntrian = "Undifined Kode";
                                        }
                                    }else{
                                        $JamAntrian = "Undifined";
                                    }
                                    if($row->status == 0){
                                        $Status = "Belum Terlayani";
                                    }elseif($row->status == 1){
                                        $Status = "Terlayani";
                                    }else{
                                        $Status = "Undifined";
                                    }
                                    ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $row->kode_antrian ?></td>
                                      <td><?php echo $row->username ?></td>
                                      <td><?php echo $row->tanggal_masuk ?></td>
                                      <td><?php echo $TipeAntrian ?></td>
                                      <td><?php echo $JamAntrian ?></td>
                                      <td><?php echo $Status ?></td>
                                      <td>
                                        <!-- START CODING VIEW -->
                                        <?php
                                        $view_antrian = base_url('Antrian/viewAntrian?id_antrian='.$row->id_antrian);
                                        ?>
                                        <a href="<?= @$view_antrian ?>"><button class="btn bg-purple btn waves-effect">View</button></a>
                                        <!-- END CODING VIEW -->
                                        <?php
                                        if($this->session->userdata('role') == 0 || $this->session->userdata('role') == 1){
                                        ?>
                                        <!-- START CODING EDIT -->
                                        <a href="<?php echo base_url('Antrian/editAntrian/'.$row->id_antrian);?>"><button class="btn bg-blue btn waves-effect">Edit</button></a>
                                        <!-- END CODING EDIT -->
                                        <!-- START CODING DELETE NEW -->
                                        <?php
                                        $url_delete = base_url('Antrian/deleteAntrian?id_antrian='.$row->id_antrian);
                                        ?>
                                        <a href="<?= @$url_delete ?>" onclick="return confirm('Delete this data ?');"><button class="btn bg-red btn waves-effect">Delete</button></a>
                                        <?php
                                        }
                                        ?>
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

