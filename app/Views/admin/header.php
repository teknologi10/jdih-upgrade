<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin JDIH | Kabupaten Kulon Progo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url(); ?>/img/logokp.png" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Google Font: Source Sans Pro -->

    <script src="<?= base_url(); ?>/theme/admin/assets/barcode/jquery-barcode.js"></script>
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.3.2.min.js"></script> -->
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light" style="background:#182C61">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color:#ffffff"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="color:#ffffff">
                        <b><?= session('username'); ?></b> &nbsp;&nbsp;&nbsp;<i class="fas fa-power-off"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="color:#ffffff">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('logout'); ?>" class="dropdown-item dropdown-footer">Log Out</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" style="color:#ffffff">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('img/logojdih.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">JDIH</span>
            </a>
            <!-- <img src="<?= base_url(); ?>/theme/admin/assets_frontend/stpdku.png" alt="" class="img-fluid"> -->
            <!-- <a href=" " class="brand-link">
                
                <span class="brand-text font-weight-light"><img src="<?= base_url('img/logojdih.png'); ?>" alt="" class="img-fluid" style="width:15%"> </span>
                <span class="brand-text font-weight-light"><b>JDIH</b></span>
            </a> -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="<?= base_url('theme/admin/assets/dist/img/user_pajaku.png'); ?>" class="img-circle elevation-2" alt="User Image">  -->
                        &nbsp; &nbsp;<b style="color: white">

                            Admin JDIH


                        </b>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item <?php if ($aktif == 'admin') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">MENU ADMIN</li>
                        <li class="nav-item <?php if ($aktif == 'produk_hukum') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/produk_hukum/tampil" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Produk Hukum
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($aktif == 'raperda') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/raperda/tampil" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Raperda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($aktif == 'naskah_akademik') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/naskah_akademik/tampil" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Naskah Akademik
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item <?php if ($aktif == 'perdes') {
                                                        echo "has-treeview menu-open";
                                                    } ?>">
                            <a href="<?= base_url(); ?>/perdes/tampil" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Produk Hukum Desa
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item <?php if ($aktif == 'berita') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/berita/tampil" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    Berita
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($aktif == 'user') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/user/tampil" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
              <a href="<?= base_url(); ?>/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pilih Jenis Pajak
                </p>
              </a>
            </li> -->


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>