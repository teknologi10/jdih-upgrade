<?= $this->include('front/header') ?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <!-- <ol class="carousel-indicators" id="hero-carousel-indicators"></ol> -->

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background: url(img/banner1.png)">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown text-primary">JDIH</h2>
                            <h2 class="animate__animated animate__fadeInDown">Jaringan Dokumentasi Informasi Dan Hukum</h2>
                            <h2 class="animate__animated animate__fadeInDown">Kabupaten Kulon Progo</h2>

                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <!-- <div class="carousel-item" style="background: url(theme/eterna/assets/img/slide/slide-2.jpg)">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated fanimate__adeInDown">Lorem <span>Ipsum Dolor</span></h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                        </div>
                    </div>
                </div> -->

                <!-- Slide 3 -->
                <!-- <div class="carousel-item" style="background: url(theme/eterna/assets/img/slide/slide-3.jpg)">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Sequi ea <span>Dime Lara</span></h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                        </div>
                    </div>
                </div> -->

                <!--  <div class="carousel-item" style="background: url(https://14425l3871o43zotto1db087-wpengine.netdna-ssl.com/wp-content/uploads/2018/12/How-to-adapt-your-business-to-the-digital-era-2000x1304.jpg)">
                    <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated fanimate__adeInDown">Pajak Daerah  <span>Kulon Progo</span></h2>
                        <p class="animate__animated animate__fadeInUp">Pajak Restoran, Pajak Hotel, Pajak Parkir, Pajak Hiburan, Pajak Reklame, Pajak Mineral Bukan Logam dan Batuan, Pajak Air Tanah & Pajak Penerangan Jalan</p>
                        <a href="<?php base_url(); ?>admin/login" class="btn-get-started animate__animated animate__fadeInUp">Mulai</a>
                    </div>
                    </div>
                     </div> -->

                <!-- Slide 3 -->


            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section>

<!-- End Hero -->

<main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
        <div class="container">

            <div class="row">
                <?php foreach ($peraturan as $p) : ?>
                    <div class="col-lg-4">
                        <div class="icon-box entries">
                            <!-- <i class="icofont-paper"></i> -->
                            <h3><a href="<?= base_url(); ?>/peraturan/<?= $p['url']; ?>" target="_blank">
                                    <?php
                                    if ($p['kid'] == 1) {
                                        echo 'Peraturan Daerah';
                                    } else if ($p['kid'] == 2) {
                                        echo 'Peraturan Bupati';
                                    } else if ($p['kid'] == 3) {
                                        echo 'Keputusan Bupati';
                                    } else if ($p['kid'] == 4) {
                                        echo 'Instruksi Bupati';
                                    } else {
                                        echo 'MOU';
                                    }
                                    ?> Nomor <?= $p['judul']; ?> Tahun <?= $p['tahun']; ?></a></h3>
                            <p><?= $p['keterangan']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section><!-- End Featured Section -->

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title">
                <h2>Berita Terbaru</h2>
            </div>

            <div class="row portfolio-container">
                <?php foreach ($berita as $a) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="<?= base_url('img'); ?>/berita/<?php
                                                                        if ($a['gambar'] == '') {
                                                                            echo 'default.png';
                                                                        } else {

                                                                            echo $a['gambar'];
                                                                        }
                                                                        ?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4 href="<?= base_url(); ?>/berita/read/<?= $a['judul']; ?>"><?= $a['judul']; ?></h4>

                                <div class="portfolio-links">
                                    <a href="<?= base_url(); ?>/berita/read/<?= $a['judul']; ?>" title="Baca"><i class="icofont-read-book"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section><!-- End Blog Section -->

    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Data Statistik Produk Hukum</h2>
                <p>Berikut adalah statistik Produk Hukum Kabupaten Kulon Progo yang suah diterbitkan.</p>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-2 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-buildings"></i>
                        <h2 data-toggle="counter-up"><?= $pd; ?></h2>
                        <p>Peraturan Daerah</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-user"></i>
                        <h2 data-toggle="counter-up"><?= $pb; ?></h2>
                        <p>Peraturan Bupati</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-user-pin"></i>
                        <h2 data-toggle="counter-up"><?= $kb; ?></h2>
                        <p>Keputusan Bupati</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-user-voice"></i>
                        <h2 data-toggle="counter-up"><?= $ib; ?></h2>
                        <p>Instruksi Bupati</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-file"></i>
                        <h2 data-toggle="counter-up"><?= $mou; ?></h2>
                        <p>MOU</p>
                    </div>
                </div>

                <!-- <div class="col-lg-2 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-home"></i>
                        <h2 data-toggle="counter-up"><?= $perdes; ?></h2>
                        <p>Peraturan Desa</p>
                    </div>
                </div> -->

            </div>

        </div>
    </section><!-- End Contact Section -->

    <section id="clients" class="clients">
        <div id="b" class="container">

            <div class="section-title">
                <h2>Jaringan JDIH</h2>
            </div>

            <div class="owl-carousel clients-carousel">
                <a href="http://jdih.slemankab.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihsleman.png" alt=""></a>
                <a href="https://jdih.semarangkota.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihsemarang.png" alt=""></a>
                <a href="https://jdih.kemenkeu.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihkemenkeu.png" alt=""></a>
                <a href="https://jdih.bantulkab.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihbantul.png" alt=""></a>
                <a href="https://jdih.jogjakota.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihkotayogyakarta.png" alt=""></a>
                <a href="https://jdih.gunungkidulkab.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihgunungkidul.png" alt=""></a>
                <a href="http://jdih.klatenkab.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihklaten.png" alt=""></a>
                <a href="http://www.birohukum.jogjaprov.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihpemdadiy.png" alt=""></a>
                <a href="https://jdihn.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihnasional.png" alt=""></a>
                <a href="https://bphn.jdihn.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/jdihbphn.png" alt=""></a>
                <a href="https://e-report.jdihn.go.id/" target="_blank"><img src="<?= base_url('img'); ?>/e-reporting.png" alt=""></a>
            </div>

        </div>
        <a class="carousel-control-prev" href="#b" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#b" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section><!-- End Clients Section -->
</main>
<?= $this->include('front/footer') ?>