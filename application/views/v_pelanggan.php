    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
              </ol>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <?php
                    if($this->session->userdata('role') == 2 && $this->session->userdata('role') != NULL){
                ?>     
                    <div style="padding-left: 5%;">
                       <h2>
                            Welcome, <?= @$nama_user ?> <small>(Pelanggan)</small>.
                        </h2> 
                    </div>  

                    <a href="<?php echo base_url("Sparepart/List_sparepart"); ?>">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-<?= @$color ?> hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">Sparepart</div>
                                <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                            </div>
                        </div> 
                    </div>
                    </a> 

                    <a href="<?php echo base_url("Antrian/Form"); ?>">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-<?= @$color ?> hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">Form Antrian</div>
                                <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                            </div>
                        </div> 
                    </div>
                    </a>  

                    <a href="<?php echo base_url("HomeService/Form"); ?>">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-<?= @$color ?> hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">Form Home Service</div>
                                <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                            </div>
                        </div> 
                    </div>
                    </a>    

                    <a href="<?php echo base_url("Pelanggan/List_pelanggan"); ?>">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-<?= @$color ?> hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">Pelanggan</div>
                                <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                            </div>
                        </div> 
                    </div>
                    </a>   
                    <!-- CODING BELUM ADA -->
                <?php
                    }else{
                ?>
                    <!-- CODING BELUM ADA -->
                <?php
                    }
                ?>
            </div>
            <div class="row clearfix">
                
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">

            </div>
        </div>
    </section>


<script>

</script>