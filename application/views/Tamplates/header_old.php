<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADI Motor</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- SELECT Min CSS 2 -->
    <link href="<?php echo base_url();?>assets/new/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <!-- <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" /> -->
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

    <link type="text/javascript" src="<?php echo base_url(); ?>assets/js/datediff.js">
    <!-- <script type="text/javascript" src="datediff.js"></script> -->

    <!-- JQuery DataTable Css -->
    <!-- <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet"> -->

    <!-- sesuaikan dengan path jqueryui yang kamu punya -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script src="<?php echo base_url('asset/datatables/js/jquery.dataTables.min.js')?>"></script>

    <link href="<?php echo base_url('asset/datatables/css/jquery.dataTables.min.css')?>" rel="stylesheet">
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

    

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
                <a class="navbar-brand" href="<?php echo base_url('Home')?>">ADI <b>Motor</b></a>
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
                        $NamaDepan = $this->session->userdata('nama_depan'); 
                        $NamaBelakang = $this->session->userdata('nama_belakang'); 
                        $EmailAddress = $this->session->userdata('Emailaddress');
                        $phonenumber = ' ('.$this->session->userdata('phonenumber').')';
                        $joinNama = $NamaDepan.' '.$NamaBelakang;
                        echo $joinNama;
                        ?>
                    </div>
                    <div class="email"><?php echo $EmailAddress; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="Login/logout"><i class="material-icons">input</i>Sign Out</a></li>
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
                    <li class="<?= ($segment_one == 'HomeAdmin' || $segment_one == 'HomeHRD' || $segment_one == 'HomeStaff'?'active':'') ?>">
                        <?php
                        if($this->session->userdata('role') == 0){//For Access Admin (Belum dipakai)
                        ?>
                            <a href="<?php echo base_url('HomeAdmin')?>">
                        <?php
                        }elseif($this->session->userdata('role') == 1){//For Access Mekanik
                        ?>
                            <a href="<?php echo base_url('HomeMekanik')?>">
                        <?php
                        }elseif($this->session->userdata('role') == 2){//For Access Kasir
                        ?>
                            <a href="<?php echo base_url('HomeKasir')?>">
                        <?php
                        }elseif($this->session->userdata('role') == 3){//For Access Pemilik
                        ?>
                            <a href="<?php echo base_url('HomePemilik')?>">
                        <?php
                        }elseif($this->session->userdata('role') == 4){//For Access Pelanggan
                        ?>
                            <a href="<?php echo base_url('HomePelanggan')?>">
                        <?php
                        }else{//Nothing
                        ?>
                            <a href="<?php echo base_url('login')?>">
                        <?php
                        }
                        ?>
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    <!-- START CODING UNTUK MENU SERVICE ADI MOTOR -->
                    <?php
                    if($this->session->userdata('role') == 0 || $this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 4){
                    ?>
                        <li class="<?= ($segment_one == 'Absen' || $segment_one == 'Profil'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Master Data</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_one == 'Absen'?'active':'') ?>">
                                    <a href="<?php echo base_url('Absen')?>">Absen</a>
                                </li>
                                <li class="<?= ($segment_one == 'Profil'?'active':'') ?>">
                                    <a href="<?php echo base_url('Profil')?>">Divisi</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <!-- END CODING UNTUK MENU SERVICE ADI MOTOR -->

                    <?php
                        if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 0){
                    ?>
                        <li class="<?= ($segment_one == 'PT' || $segment_one == 'Divisi' || $segment_one == 'Jabatan' || $segment_one == 'Pegawai' || $segment_one == 'User'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Master Data</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_one == 'PT'?'active':'') ?>">
                                    <a href="<?php echo base_url('PT')?>">PT</a>
                                </li>
                                <li class="<?= ($segment_one == 'Divisi'?'active':'') ?>">
                                    <a href="<?php echo base_url('Divisi')?>">Divisi</a>
                                </li>
                                <li class="<?= ($segment_one == 'Jabatan'?'active':'') ?>">
                                    <a href="<?php echo base_url('Jabatan')?>">Jabatan</a>
                                </li>
                                <li class="<?= ($segment_one == 'Pegawai'?'active':'') ?>">
                                    <a href="<?php echo base_url('Pegawai')?>">Pegawai</a>
                                </li>
                                <?php
                                if($this->session->userdata('role') == 0){
                                ?>
                                <li class="<?= ($segment_one == 'User'?'active':'') ?>">
                                    <a href="<?php echo base_url('User')?>">User</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="<?= ($segment_one == 'Kepegawaian'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Transaction</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_one == 'Kepegawaian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Kepegawaian')?>">Pegawai</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= ($segment_join == 'Report/Pegawai' || $segment_join == 'Report/Kepegawaian'?'active':'') ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Report</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?= ($segment_join == 'Report/Pegawai'?'active':'') ?>">
                                    <a href="<?php echo base_url('PT')?>">Pegawai</a>
                                </li>
                                <li class="<?= ($segment_join == 'Report/Kepegawaian'?'active':'') ?>">
                                    <a href="<?php echo base_url('Divisi')?>">Kepegawaian</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                        }else{
                    ?>
                        <li class="<?= ($segment_one == 'transaction_pegawai'?'active':'') ?>">
                            <a href="<?php echo base_url('transaction_pegawai')?>">
                                <i class="material-icons">view_list</i>s
                                <span>BackUp</span>
                            </a>
                        </li>
                    <?php
                        }
                    ?>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">AdminPJS - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
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