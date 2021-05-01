<?= $this->include('front/header') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li>Informasi Hukum</li>
            </ol>
            <h2>Raperda</strong></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">
            <!-- <div>
                <h1 class="text-center" style="color:black"><b style="color:#182C61">RAPERDA</b></h1>
            </div><br><br> -->
            <div class="row">
                <?php foreach ($raperda as $r) : ?>
                    <div class="col-lg-6 entries">
                        <article class="entry">

                            <h2 class="entry-title" style="font-size: 20px;">
                                <a href="<?= base_url(); ?>/raperda/read/<?= $r['url']; ?>">
                                    <?= $r['judul']; ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-ui-calendar"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= date("d-m-Y", $r['date']); ?></time></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html"><?= $r['hit']; ?></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= $r['keterangan']; ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?= base_url(); ?>/raperda/read/<?= $r['url']; ?>">Lihat Raperda</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->


                    </div><!-- End blog entries list -->
                <?php endforeach; ?>

            </div>


        </div>


    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?= $this->include('front/footer') ?>