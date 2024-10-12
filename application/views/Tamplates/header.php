<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADI Service</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- sesuaikan dengan path jqueryui yang kamu punya -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('Home')?>">Admin <b>ADI MOTOR</b></a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
                        $Nama = $this->session->userdata('nama'); 
                        $UserName = $this->session->userdata('Emailaddress');
                        echo $Nama;
                        ?>
                    </div>
                    <div class="email"><?= @$UserName ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li> -->
                            <!-- <li role="separator" class="divider"></li> -->
                            <li><a href="<?php echo base_url('Login/logout')?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <?php 
            $segment_one = $this->uri->segment(1);  
            $segment_two = $this->uri->segment(2);
            $segment_join = $segment_one."/".$segment_two;
            ?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?= ($segment_one == 'Home'?'active':'') ?>">
                    <?php
                    if($this->session->userdata('role') == 0 && $this->session->userdata('role') != NULL){
                    ?>  
                        <a href="<?php echo base_url('HomeAdminkasir')?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    <?php
                    }elseif($this->session->userdata('role') == 1 && $this->session->userdata('role') != NULL){
                    ?>  
                        <a href="<?php echo base_url('HomePemilik')?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    <?php
                    }elseif($this->session->userdata('role') == 2 && $this->session->userdata('role') != NULL){
                    ?>  
                        <a href="<?php echo base_url('HomePelanggan')?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    <?php   
                    }else{
                    ?>
                        <a href="<?php echo base_url('HomeAdminkasir')?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>  
                    <?php
                    }
                    ?>

                    <?php
                        if($this->session->userdata('role') == 0 && $this->session->userdata('role') != NULL){
                    ?>
                        <!-- START CODING MENU MASTER -->
                        <li class="<?= ($segment_join == 'Antrian/List_antrian' || $segment_join == 'Mekanik/List_mekanik' || $segment_join == 'Pelanggan/List_pelanggan' || $segment_join == 'Sparepart/List_sparepart' || $segment_join == 'PO/List_po' || $segment_join == 'HomeService/List_homeservice' || $segment_join == 'PenitipanMotor/List_penitipan'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Master Data</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Antrian/List_antrian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/List_antrian')?>">Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'Mekanik/List_mekanik'?'active':'') ?>">
                                    <a href="<?php echo base_url('Mekanik/List_mekanik')?>">Mekanik</a>
                                </li>
                                <li class="<?= ($segment_join == 'Pelanggan/List_pelanggan'?'active':'') ?>">
                                    <a href="<?php echo base_url('Pelanggan/List_pelanggan')?>">Pelanggan</a>
                                </li>
                                <li class="<?= ($segment_join == 'Sparepart/List_sparepart'?'active':'') ?>">
                                    <a href="<?php echo base_url('Sparepart/List_sparepart')?>">Sparepart</a>
                                </li>
                                <li class="<?= ($segment_join == 'PO/List_po'?'active':'') ?>">
                                    <a href="<?php echo base_url('PO/List_po')?>">PO</a>
                                </li>
                                <li class="<?= ($segment_join == 'HomeService/List_homeservice'?'active':'') ?>">
                                    <a href="<?php echo base_url('HomeService/List_homeservice')?>">Home Service</a>
                                </li>
                                <li class="<?= ($segment_join == 'PenitipanMotor/List_penitipan'?'active':'') ?>">
                                    <a href="<?php echo base_url('PenitipanMotor/List_penitipan')?>">Penitipan Motor</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU MASTER -->
                        <!-- START CODING MENU FORM -->
                        <li class="<?= ($segment_join == 'Pelanggan/Form' || $segment_join == 'Antrian/Form' || $segment_join == 'Mekanik/Form' || $segment_join == 'Sparepart/Form' || $segment_join == 'HomeService/Form' || $segment_join == 'PenitipanMotor/Form' || $segment_join == 'PO/Form'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Form</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Pelanggan/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('Pelanggan/Form')?>">Form Pelanggan</a>
                                </li>
                                <li class="<?= ($segment_join == 'Antrian/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/Form')?>">Form Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'Mekanik/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('Mekanik/Form')?>">Form Mekanik</a>
                                </li>
                                <li class="<?= ($segment_join == 'Sparepart/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('Sparepart/Form')?>">Form Spartpart</a>
                                </li>
                                <li class="<?= ($segment_join == 'HomeService/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('HomeService/Form')?>">Form Home Service</a>
                                </li>
                                <li class="<?= ($segment_join == 'PenitipanMotor/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('PenitipanMotor/Form')?>">Form Penitipan Motor</a>
                                </li>
                                <li class="<?= ($segment_join == 'PO/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('PO/Form')?>">Form PO</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU FORM -->
                        <!-- START CODING MENU REPORT -->
                        <li class="<?= ($segment_join == 'Report/Antrian' || $segment_join == 'Report/StokSparePart' || $segment_join == 'Report/PengajuanPO' || $segment_join == 'Report/Keuangan' || $segment_join == 'Report/SKPenitipanMotor'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Report</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Antrian/Report_antrian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/Report_antrian')?>">Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'Sparepart/Report_SparePart'?'active':'') ?>">
                                    <a href="<?php echo base_url('Sparepart/Report_SparePart')?>">Stok Spare Part</a>
                                </li>
                                <li class="<?= ($segment_join == 'Trx/Report_transaksi'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Report_transaksi')?>">Transaksi ALL</a>
                                </li>
                                <li class="<?= ($segment_join == 'PO/Report_po'?'active':'') ?>">
                                    <a href="<?php echo base_url('PO/Report_po')?>">Pengajuan PO</a>
                                </li>
                                <li class="<?= ($segment_join == 'Trx/Report_keuangan'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Report_keuangan')?>">Keuangan</a>
                                </li>
                                <li class="<?= ($segment_join == 'PenitipanMotor/Report_penitipan'?'active':'') ?>">
                                    <a href="<?php echo base_url('PenitipanMotor/Report_penitipan')?>">Penitipan Motor</a>
                                </li>
                                <!-- <li class="<?= ($segment_join == 'Trx/Report_nota'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Report_nota')?>">Nota Pembayaran</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- END CODING MENU REPORT -->
                         <!-- START CODING MENU TRANSAKSI -->
                        <li class="<?= ($segment_join == 'Trx/Form' || $segment_join == 'Trx/TrxAll'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Transaction</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Trx/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Form')?>">Form Transaksi</a>
                                </li>
                                <!-- <li class="<?= ($segment_join == 'Trx/FormQeuee'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Qeuee')?>">Input Trx by Qeuee</a>
                                </li>
                                <li class="<?= ($segment_join == 'Trx/FormHomeService'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/FormHomeService')?>">Input Trx by Home Service</a>
                                </li> -->
                                <li class="<?= ($segment_join == 'Trx/TrxAll'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/TrxAll')?>">Report Trx All</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU TRANSAKSI -->
                        <!-- START CODING MENU USER ACCESS -->
                        <li class="<?= ($segment_one == 'User'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>User Access</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_one == 'User'?'active':'') ?>">
                                    <a href="<?php echo base_url('User')?>">User Access</a>
                                </li>
                                <!-- <li class="<?= ($segment_join == 'User/List'?'active':'') ?>">
                                    <a href="<?php echo base_url('User/List')?>">Data User Access</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- END CODING MENU USER ACCESS -->
                        <!-- START CODING MENU SPK SPARPART -->
                        <li class="<?= ($segment_join == 'SPK/Form'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>SPK Spare Part</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'SPK/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('SPK/Form')?>">Hasil Rangking</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU SPK SPARPART -->     
                    <?php
                        }elseif($this->session->userdata('role') == 1 && $this->session->userdata('role') != NULL){
                    ?>
                        <!-- START CODING MENU MASTER -->
                        <li class="<?= ($segment_join == 'Antrian/List_antrian' || $segment_join == 'Mekanik/List_mekanik' || $segment_join == 'Pelanggan/List_pelanggan' || $segment_join == 'Sparepart/List_sparepart' || $segment_join == 'PO/List_po' || $segment_join == 'HomeService/List_homeservice' || $segment_join == 'PenitipanMotor/List_penitipan'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Master Data</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Antrian/List_antrian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/List_antrian')?>">Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'Mekanik/List_mekanik'?'active':'') ?>">
                                    <a href="<?php echo base_url('Mekanik/List_mekanik')?>">Mekanik</a>
                                </li>
                                <li class="<?= ($segment_join == 'Pelanggan/List_pelanggan'?'active':'') ?>">
                                    <a href="<?php echo base_url('Pelanggan/List_pelanggan')?>">Pelanggan</a>
                                </li>
                                <li class="<?= ($segment_join == 'Sparepart/List_sparepart'?'active':'') ?>">
                                    <a href="<?php echo base_url('Sparepart/List_sparepart')?>">Sparepart</a>
                                </li>
                                <li class="<?= ($segment_join == 'PO/List_po'?'active':'') ?>">
                                    <a href="<?php echo base_url('PO/List_po')?>">PO</a>
                                </li>
                                <li class="<?= ($segment_join == 'HomeService/List_homeservice'?'active':'') ?>">
                                    <a href="<?php echo base_url('HomeService/List_homeservice')?>">Home Service</a>
                                </li>
                                <li class="<?= ($segment_join == 'PenitipanMotor/List_penitipan'?'active':'') ?>">
                                    <a href="<?php echo base_url('PenitipanMotor/List_penitipan')?>">Penitipan Motor</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU MASTER -->
                        <!-- START CODING MENU REPORT -->
                        <li class="<?= ($segment_join == 'Report/Antrian' || $segment_join == 'Report/StokSparePart' || $segment_join == 'Report/PengajuanPO' || $segment_join == 'Report/Keuangan' || $segment_join == 'Report/SKPenitipanMotor'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Report</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Antrian/Report_antrian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/Report_antrian')?>">Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'Sparepart/Report_SparePart'?'active':'') ?>">
                                    <a href="<?php echo base_url('Sparepart/Report_SparePart')?>">Stok Spare Part</a>
                                </li>
                                <li class="<?= ($segment_join == 'Trx/Report_transaksi'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Report_transaksi')?>">Transaksi ALL</a>
                                </li>
                                <li class="<?= ($segment_join == 'PO/Report_po'?'active':'') ?>">
                                    <a href="<?php echo base_url('PO/Report_po')?>">Pengajuan PO</a>
                                </li>
                                <li class="<?= ($segment_join == 'Trx/Report_keuangan'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Report_keuangan')?>">Keuangan</a>
                                </li>
                                <li class="<?= ($segment_join == 'PenitipanMotor/Report_penitipan'?'active':'') ?>">
                                    <a href="<?php echo base_url('PenitipanMotor/Report_penitipan')?>">Penitipan Motor</a>
                                </li>
                                <!-- <li class="<?= ($segment_join == 'Trx/Report_nota'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/Report_nota')?>">Nota Pembayaran</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- END CODING MENU REPORT -->
                         <!-- START CODING MENU TRANSAKSI -->
                        <li class="<?= ($segment_join == 'Trx/Form' || $segment_join == 'Trx/TrxAll'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Transaction</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Trx/TrxAll'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/TrxAll')?>">Report Trx All</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU TRANSAKSI -->
                        <!-- START CODING MENU SPK SPARPART -->
                        <li class="<?= ($segment_join == 'SPK/Form'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>SPK Spare Part</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'SPK/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('SPK/Form')?>">Hasil Rangking</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU SPK SPARPART -->   
                    <?php
                        }elseif($this->session->userdata('role') == 2 && $this->session->userdata('role') != NULL){
                    ?>
                        <!-- START CODING MENU MASTER -->
                        <li class="<?= ($segment_join == 'Antrian/List_antrian' || $segment_join == 'Mekanik/List_mekanik' || $segment_join == 'Pelanggan/List_pelanggan' || $segment_join == 'Sparepart/List_sparepart' || $segment_join == 'PO/List_po' || $segment_join == 'HomeService/List_homeservice' || $segment_join == 'PenitipanMotor/List_penitipan'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Master Data</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Antrian/List_antrian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/List_antrian')?>">Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'Pelanggan/List_pelanggan'?'active':'') ?>">
                                    <a href="<?php echo base_url('Pelanggan/List_pelanggan')?>">Pelanggan</a>
                                </li>
                                <li class="<?= ($segment_join == 'Sparepart/List_sparepart'?'active':'') ?>">
                                    <a href="<?php echo base_url('Sparepart/List_sparepart')?>">Sparepart</a>
                                </li>
                                <li class="<?= ($segment_join == 'HomeService/List_homeservice'?'active':'') ?>">
                                    <a href="<?php echo base_url('HomeService/List_homeservice')?>">Home Service</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU MASTER -->
                        <!-- START CODING MENU FORM -->
                        <li class="<?= ($segment_join == 'Pelanggan/Form' || $segment_join == 'Antrian/Form' || $segment_join == 'Mekanik/Form' || $segment_join == 'Sparepart/Form' || $segment_join == 'HomeService/Form' || $segment_join == 'PenitipanMotor/Form' || $segment_join == 'PO/Form'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Form</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Antrian/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('Antrian/Form')?>">Form Antrian</a>
                                </li>
                                <li class="<?= ($segment_join == 'HomeService/Form'?'active':'') ?>">
                                    <a href="<?php echo base_url('HomeService/Form')?>">Form Home Service</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CODING MENU FORM -->
                         <!-- START CODING MENU TRANSAKSI -->
                        <!-- <li class="<?= ($segment_join == 'Trx/Form' || $segment_join == 'Trx/TrxAll'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Transaction</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Trx/TrxAll'?'active':'') ?>">
                                    <a href="<?php echo base_url('Trx/TrxAll')?>">Report Trx All</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- END CODING MENU TRANSAKSI -->
                    <?php
                        }
                        else{
                    ?>
                        <p style="color: red;">Cannot Access Menu.</p>
                    <?php
                        }
                    ?>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Admin - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>