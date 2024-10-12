<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url('Sparepart/List_sparepart')?>" target="_blank">Sparepart</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Sparepart
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>SKU</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                          <?php
                                          if($this->session->userdata('role') == 0 || $this->session->userdata('role') == 1){
                                          ?>
                                            <th>Tanggal</th>
                                            <th>SKU Suplier</th>
                                            <th>Action</th>
                                          <?php
                                          }
                                          ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>SKU</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                          <?php
                                          if($this->session->userdata('role') == 0 || $this->session->userdata('role') == 1){
                                          ?>
                                            <th>Tanggal</th>
                                            <th>SKU Suplier</th>
                                            <th>Action</th>
                                          <?php
                                          }
                                          ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach($Sparepart as $row){
                                      $no++;
                                    if($row->status == 1){
                                      $Status = "Stok Tersedia";
                                    }elseif($row->status == 0){
                                      $Status = "Stok Kosong";
                                    }else{
                                      $Status = "Undifined";
                                    }
                                    if($row->sku_suplier != ""){
                                      $SKU_Suplier = $row->sku_suplier;
                                    }elseif ($row->sku_suplier == "") {
                                      $SKU_Suplier = "-";
                                    }else{
                                      $SKU_Suplier = "Undifined";
                                    }
                                    ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $row->sku ?></td>
                                      <td><?php echo $row->nama_sparepart ?></td>
                                      <td><?php echo $row->qty ?></td>
                                      <td><?php echo $row->harga ?></td>
                                      <td><?php echo $Status ?></td>
                                    <?php
                                    if($this->session->userdata('role') == 0 || $this->session->userdata('role') == 1){
                                    ?>
                                      <td><?php echo $row->tanggal ?></td>
                                      <td><?php echo $SKU_Suplier ?></td>
                                      <td style="width: 15%;">
                                        <!-- START CODING VIEW -->
                                        <!-- <?php
                                        $view_antrian = base_url('Sparepart/viewSparepart?id_sparepart='.$row->id_sparepart);
                                        ?>
                                        <a href="<?= @$view_antrian ?>"><button class="btn bg-purple btn waves-effect">View</button></a> -->
                                        <!-- END CODING VIEW -->
                                        <!-- START CODING EDIT -->
                                        <a href="<?php echo base_url('Sparepart/editSparepart/'.$row->id_sparepart);?>"><button class="btn bg-blue btn waves-effect">Edit</button></a>
                                        <!-- END CODING EDIT -->
                                        <!-- START CODING DELETE NEW -->
                                        <?php
                                        $url_delete = base_url('Sparepart/deleteSparepart?id_sparepart='.$row->id_sparepart);
                                        ?>
                                        <a href="<?= @$url_delete ?>" onclick="return confirm('Delete this data ?');"><button class="btn bg-red btn waves-effect">Delete</button></a>
                                        <!-- END CODING DELETE NEW -->
                                      </td>
                                    <?php
                                    }
                                    ?>
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

