<?= $this->include('front/header') ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url(); ?>">Beranda</a></li>
                <li>Informasi Hukum</li>
            </ol>
            <h2><strong style="color:#182C61">Produk Hukum</strong></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <!-- <section id="contact" class="contact"><br>
        <div class="container mt-4">

            <div class="row">
                <div class="col-lg-12">
                    <div class="info-box">
                        <div class="row">
                            <div class="col-lg-8">
                                <h6 class="text-left ml-4">Cari produk hukum</h6>
                                <form action="" method="post">
                                    <div class="form-group ml-4">
                                        <input type="text" class="form-control" name="keyword" id="subject" placeholder="kata kunci.." data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                                        <div class="validate"></div>
                                    </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button class="btn btn-dark mr-4 mt-4" type="submit" style="background:#182C61" name="submit">Cari</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        </div>
    </section> -->
    <!-- End Contact Section -->

    <!-- <Section>
        <div class="continer mt-5">
            <div class="row col-lg-12 d-flex justify-content-center">

                <div class="row">

                    <div>
                        <h1 class="text-center" style="color:black"><b style="color:#182C61">PRODUK HUKUM</b></h1>
                    </div><br>

                </div>
            </div>
        </div>

    </Section> -->

    <section id="blog" class="blog">
        <div class="container">
            <!-- <div>
                <h1 class="text-center" style="color:black"><b style="color:#182C61">PRODUK HUKUM</b></h1>
            </div><br><br> -->
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">
                        <?php foreach ($peraturan as $p) : ?>
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <a>
                                            <img src="<?= base_url(); ?>/img/<?= $p['kid']; ?>.png" alt="..." style="width:135px">
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h4 class="entry-title" style="font-size: 20px;">
                                                <a href="<?= base_url(); ?>/peraturan/<?= $p['url']; ?>" target="_blank">
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
                                                    ?> Nomor <?= $p['judul']; ?> Tahun <?= $p['tahun']; ?>
                                                </a>
                                            </h4>
                                            <p class="card-text"><?= $p['keterangan']; ?></p>
                                            <div class="d-inline">
                                                <p class="card-text d-inline mr-2"><small class="text-muted"><i class="icofont-ui-calendar"></i> <?= date("d-m-Y", $p['date']); ?> </small></p>
                                                <p class="card-text d-inline"><small class="text-muted"><i class="icofont-comment"></i> <?= $p['hit']; ?> </small></p>
                                            </div>
                                            <div class="clearfix read-more" style="border:0px"><br><br>
                                                <a class="float-right btn btn-primary" href="<?= base_url(); ?>/peraturan/<?= $p['url']; ?>" target="_blank">Download</a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><br>
                        <?php endforeach; ?>
                    </article><!-- End blog entry -->


                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Cari Produk Hukum</h3>
                        <div class="sidebar-item search-form">
                            <form action="<?= base_url(); ?>/produk_hukum" method="get">
                                <input type="text" name="cari" value="<?= old('cari'); ?>">
                                <button type=" submit"><i class="icofont-search"></i></button>
                            </form>

                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Kategori</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="<?= base_url(); ?>/produk_hukum/kategori/1">Peraturan Daerah <span>(<?= $pd; ?>)</span></a></li>
                                <li><a href="<?= base_url(); ?>/produk_hukum/kategori/2">Peraturan Bupati <span>(<?= $pb; ?>)</span></a></li>
                                <li><a href="<?= base_url(); ?>/produk_hukum/kategori/3">Keputusan Bupati <span>(<?= $kb; ?>)</span></a></li>
                                <li><a href="<?= base_url(); ?>/produk_hukum/kategori/4">Instruksi Bupati <span>(<?= $ib; ?>)</span></a></li>
                                <li><a href="<?= base_url(); ?>/produk_hukum/kategori/5">Mou <span>(<?= $mou; ?>)</span></a></li>

                            </ul>

                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Produk Hukum Terbaru</h3>
                        <div class="sidebar-item recent-posts">
                            <?php foreach ($terbaru as $t) : ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url(); ?>/img/<?= $t['kid']; ?>.png" alt="">
                                    <h4><a href="<?= base_url(); ?>/peraturan/<?= $t['url']; ?>" target="_blank">
                                            <?php
                                            if ($t['kid'] == 1) {
                                                echo 'Peraturan Daerah';
                                            } else if ($t['kid'] == 2) {
                                                echo 'Peraturan Bupati';
                                            } else if ($t['kid'] == 3) {
                                                echo 'Keputusan Bupati';
                                            } else if ($t['kid'] == 4) {
                                                echo 'Instruksi Bupati';
                                            } else {
                                                echo 'MOU';
                                            }
                                            ?> Nomor <?= $t['judul']; ?> Tahun <?= $t['tahun']; ?></a></h4>
                                    <time datetime="2020-01-01"><?= date("d-m-Y", $t['date']); ?></time>
                                </div>
                            <?php endforeach; ?>
                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>


        </div>

    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?= $this->include('front/footer') ?>