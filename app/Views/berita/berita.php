<?= $this->include('front/header') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url(); ?>">Beranda</a></li>
                <li>Info Berita</li>
            </ol>
            <h2><strong style="color:#182C61">Info Berita</strong></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- <Section>
        <div class="continer mt-5">
            <div class="row col-lg-12 d-flex justify-content-center">

                <div class="row">
                    <div>
                        <h1 class="text-center" style="color:black"><b style="color:#182C61">INFO BERITA</b></h1>
                    </div><br>
                </div>
            </div>
        </div>
    </Section> -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">
                    <?php foreach ($berita as $a) : ?>
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?= base_url('img'); ?>/berita/<?= $a['gambar']; ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="<?= base_url(); ?>/berita/read/<?= $a['judul']; ?>">
                                    <?= substr($a['judul'], 0, 50); ?>...</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a><?= $a['user']; ?></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-ui-calendar"></i> <a><time datetime="2020-01-01">
                                                <?=
                                                helper('tanggal');
                                                $tgl = $a['tgl'];
                                                echo tjs($tgl);

                                                ?></time></a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a><?= $a['hits']; ?></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= substr($a['konten'], 0, 250); ?>...
                                </p>
                                <div class="read-more">
                                    <a href="<?= base_url(); ?>/berita/read/<?= $a['judul']; ?>">Selengkapnya</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->


                    <?php endforeach; ?>
                </div><!-- End blog entries list -->
                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Cari Berita</h3>
                        <div class="sidebar-item search-form">
                            <form action="<?= base_url(); ?>/berita" method="get">
                                <input type="text" name="cari" value="<?= old('cari'); ?>">
                                <button type=" submit"><i class="icofont-search"></i></button>
                            </form>


                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Kategori</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="<?= base_url(); ?>/berita/topik/2">Berita <span>(<?= $kategorib; ?>)</span></a></li>
                                <li><a href="<?= base_url(); ?>/berita/topik/3">Kajian <span>(<?= $kategorik; ?>)</span></a></li>
                                <li><a href="<?= base_url(); ?>/berita/topik/4">Artikel <span>(<?= $kategoria; ?>)</span></a></li>
                            </ul>

                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Berita Terbaru</h3>
                        <?php foreach ($terbaru as $a) : ?>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="<?= base_url('img'); ?>/berita/<?php
                                                                                if ($a['gambar'] == '') {
                                                                                    echo 'default.png';
                                                                                } else {

                                                                                    echo $a['gambar'];
                                                                                }
                                                                                ?>" alt="">
                                    <h4><a href="<?= base_url(); ?>/berita/read/<?= $a['judul']; ?>"><?= $a['judul']; ?></a></h4>
                                    <time datetime="2020-01-01"><?=
                                                                helper('tanggal');
                                                                $tgl = $a['tgl'];
                                                                echo tjs($tgl);

                                                                ?></time>
                                </div>


                            </div><!-- End sidebar recent posts-->
                        <?php endforeach; ?>

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>


        </div>


    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?= $this->include('front/footer') ?>