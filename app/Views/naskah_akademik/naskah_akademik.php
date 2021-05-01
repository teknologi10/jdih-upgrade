<?= $this->include('front/header') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li>Informasi Hukum</li>
            </ol>
            <h2>Naskah Akademik</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <!-- <div>
                <h1 class="text-center" style="color:black"><b style="color:#182C61">NASKAH AKADEMIK</b></h1>
            </div><br><br> -->
            <div class="row">
                <?php foreach ($naskah as $n) : ?>
                    <div class="col-lg-4 col-md-6 align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h6><a><?=
                                    helper('tanggal');
                                    $tgl = $n['tanggal'];
                                    echo tjs($tgl);

                                    ?></a></h6>
                            <h4><a href="<?= base_url(); ?>/peraturan/naskah_akademik/<?= $n['file']; ?>"><?= $n['judul']; ?></a></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->
<?= $this->include('front/footer') ?>