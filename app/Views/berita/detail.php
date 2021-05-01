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
                    <article class="entry">

                        <div class="entry-img">
                            <img src="<?= base_url(); ?>/img/berita/<?= $berita['gambar']; ?> " alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title mx-2">
                            <a href="blog-single.html"><?= $berita['judul']; ?></a>
                        </h2>

                        <div class="entry-meta mx-2">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html"><?= $berita['user']; ?></a></li>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?=
                                                                                                                                                                helper('tanggal');
                                                                                                                                                                $tgl = $berita['tgl'];
                                                                                                                                                                echo tjs($tgl);

                                                                                                                                                                ?></time></a></li>
                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html"><?= $berita['hits']; ?></a></li>
                            </ul>
                        </div>

                        <div class="entry-content mx-2">
                            <?= $berita['konten']; ?>
                        </div>

                        <!-- <div class="entry-footer clearfix">


                            <div class="float-right share">
                                <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                                <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                                <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                            </div>

                        </div> -->

                    </article><!-- End blog entry -->
                </div>
                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Cari Berita</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="icofont-search"></i></button>
                            </form>

                        </div><!-- End sidebar search formn-->

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


        </div>
        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?= $this->include('front/footer') ?>