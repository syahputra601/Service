<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Transaction</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Report Trx All</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Report Transaction All
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Invoice</th>
                                            <th>Tanggal</th>
                                            <th>No Nota</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jenis Service</th>
                                            <th>Biaya Jasa</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Invoice</th>
                                            <th>Tanggal</th>
                                            <th>No Nota</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jenis Transaksi</th>
                                            <th>Biaya Jasa</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach($transction_all as $row){
                                      $no++;
                                      if($row->status == 0){
                                        $Status = "Sucess";
                                      }else{
                                        $Status = "Undifined";
                                      }
                                      if($row->jenis_service == 'ServiceUmum'){
                                        $JenisService = "Service Umum";
                                      }elseif($row->jenis_service == 'HomeService'){
                                        $JenisService = "Home Service";
                                      }else{
                                        $JenisService = "Undifined";
                                      }
                                    ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $row->no_invoice ?></td>
                                      <td><?php echo $row->tanggal ?></td>
                                      <td><?php echo $row->no_nota ?></td>
                                      <td><?php echo $row->nama_pel ?></td>
                                      <td><?php echo $JenisService ?></td>
                                      <td><?php echo $row->biaya_jasa ?></td>
                                      <td><?php echo $row->total ?></td>
                                      <td><?php echo $Status ?></td>
                                      <td style="width: 20%;">
                                        <!-- START CODING VIEW -->
                                        <?php
                                        $view_antrian = base_url('Trx/viewTrx?id_transaksi='.$row->id_transaksi.'&no_invoice='.$row->no_invoice);
                                        ?>
                                        <a href="<?= @$view_antrian ?>"><button class="btn bg-purple btn waves-effect">View</button></a>
                                        <!-- END CODING VIEW -->
                                        <!-- START CODING CETAK -->
                                        <?php
                                        $cetak = base_url('Trx/viewTrxCetak?id_transaksi='.$row->id_transaksi.'&no_invoice='.$row->no_invoice);
                                        ?>
                                        <a href="<?= @$cetak ?>"><button class="btn bg-brown btn waves-effect">Cetak</button></a>
                                        <!-- END CODING CETAK -->
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

