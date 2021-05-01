<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JDIH - Kabupaten Kulon Progo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('img'); ?>/logokp.png" rel="icon">
    <link href="<?php base_url(); ?>/assets_frontend/eterna/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('theme/eterna'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('theme/eterna'); ?>/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('theme/eterna'); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('theme/eterna'); ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('theme/eterna'); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('theme/eterna'); ?>/assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('theme/eterna'); ?>/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Eterna - v2.2.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style type="text/css">
        .header {
            height: 79px;
            transition: all 0.5s;
            z-index: 997;
            transition: all 0.5s;
            padding: 10px 0;
            background: #3d6c03;
            box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 10%);
            position: relative;
        }

        #header {
            height: 70px;
            transition: all 0.5s;
            z-index: 997;
            transition: all 0.5s;
            padding: 10px 0;
            background: #182C61;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .nav-menu a {
            display: block;
            position: relative;
            color: #0dcaf0;
            padding: 13px 0 15px 25px;
            transition: 0.3s;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
        }

        .nav-menu a:hover,
        .nav-menu .active>a,
        .nav-menu li:hover>a {
            color: #f3f3f3;
            text-decoration: none;
        }

        .nav-menu .drop-down ul {
            display: block;
            position: absolute;
            left: 20px;
            top: calc(100% + 30px);
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            padding: 10px 0;
            background: #182C61;
            box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
            transition: ease all 0.3s;
        }

        .nav-menu .drop-down ul a:hover,
        .nav-menu .drop-down ul .active>a,
        .nav-menu .drop-down ul li:hover>a {
            color: #f3f3f3;
        }
    </style>
</head>

<body>

    <!--  <section id="topbar" class="d-none d-lg-block  bg-white">
        <div class="container  bg-white">
            <div class="row">
                <div class="col text-left"><img src="img/logokp.png" class="rounded float-start" alt="" style="height:75px"></div>
                <div class="col-8 text-center">
                    <h3></h3>
                    <h3><b>Jaringan Dokumentasi Dan Informasi Hukum</b></h3>
                    <h5><b>Kabupaten Kulon Progo</b></h5>
                </div>
                <div class="col text-right"><img src="img/logojdih.png" class="rounded float-end" alt="" style="height:75px"></div>
            </div>

        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex">
            <div class="col"><a href="#"><img src="<?= base_url('img'); ?>/logofix.png" class="rounded float-start" alt="" style="height:60px"></a></div>


            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="<?php if ($aktif == '') {
                                    echo "active";
                                } ?>"><a href="<?= base_url(); ?>/">Beranda</a></li>
                    <li class="<?php if ($aktif == 'profil') {
                                    echo "active";
                                } ?>"><a href="<?= base_url(); ?>/profil">Profil</a></li>
                    <li class="<?php if ($aktif == 'produk_hukum') {
                                    echo "active";
                                } ?> drop-down"><a href="">Informasi Hukum</a>
                        <ul>
                            <li><a href="<?= base_url(); ?>/informasi_hukum/produk_hukum">Produk Hukum Daerah</a></li>
                            <li><a href="<?= base_url(); ?>/informasi_hukum/raperda">Raperda</a></li>
                            <li><a href="<?= base_url(); ?>/informasi_hukum/propemperda">Propemperda</a></li>
                            <li><a href="<?= base_url(); ?>/informasi_hukum/perdes">Produk Hukum Desa</a></li>
                            <li><a href="http://ipprohuda.kulonprogokab.go.id/" target="_blank">iPPROHUDA</a></li>
                            <li><a href="<?= base_url(); ?>/informasi_hukum/naskah_akademik">Naskah Akademik</a></li>
                            <li><a href="<?= base_url(); ?>/informasi_hukum/konsultasi_hukum">Konsultasi Hukum</a></li>
                        </ul>
                    </li>
                    <li class="<?php if ($aktif == 'berita') {
                                    echo "active";
                                } ?>"><a href="<?= base_url(); ?>/berita">Berita</a></li>
                    <li class="text-end"><a href="<?= base_url(); ?>/login">Login</a></li>


                </ul>
            </nav>

        </div>

    </header><!-- End Header -->
    <!-- <div id="myModal" class="modal fade" role="dialog">
        <div id="contact" class="contact">
            <div class="container mt-4 text-center">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form" style="background: #ffffff;">
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div> -->