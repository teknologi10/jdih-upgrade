<?= $this->include('front/header') ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url(); ?>">Beranda</a></li>
                <li>Produk Hukum Desa</li>
            </ol>
            <h2><strong style="color:#182C61">Produk Hukum Desa</strong></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="blog" class="blog">
        <div class="container">
            <!-- <div>
                <h1 class="text-center" style="color:black"><b style="color:#182C61">PRODUK HUKUM DESA</b></h1>
            </div><br> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-comments">
                        <div class="reply-form">
                            <h4>Pilih Desa</h4>
                            <form action="<?= base_url(); ?>/perdes/desa" method="post">
                                <div class="row">
                                    <select class="form-control col-md-10 form-group mt-1 ml-3" name="desa">
                                        <option selected>Pilih Desa</option>
                                        <option value="banaran">Banaran</option>
                                        <option value="banguncipto">Banguncipto</option>
                                        <option value="banjararum">Banjararum</option>
                                        <option value="banjarsari">Banjarasri</option>
                                        <option value="banjarharjo">Banjarharjo</option>
                                        <option value="banjaroyo">Banjaroyo</option>
                                        <option value="banjarsari">Banjarsari</option>
                                        <option value="banyuroto">Banyuroto</option>
                                        <option value="bendungan">Bendungan</option>
                                        <option value="bojong">Bojong</option>
                                        <option value="brosot">Brosot</option>
                                        <option value="bugel">Bugel</option>
                                        <option value="bumirejo">Bumirejo</option>
                                        <option value="cerme">Cerme</option>
                                        <option value="demangrejo">Demangrejo</option>
                                        <option value="demen">Demen</option>
                                        <option value="depok">Depok</option>
                                        <option value="donomulyo">Donomulyo</option>
                                        <option value="garongan">Garongan</option>
                                        <option value="gatokan">Gatokan</option>
                                        <option value="gerbosari">Gerbosari</option>
                                        <option value="giripeni">Giripeni</option>
                                        <option value="giripurwo">Giripurwo</option>
                                        <option value="glagah">Glagah</option>
                                        <option value="gotakan">Gotakan</option>
                                        <option value="gulurejo">Gulurejo</option>
                                        <option value="hargomulyo">Hargomulyo</option>
                                        <option value="hargorejo">Hargorejo</option>
                                        <option value="hargotirto">Hargotirto</option>
                                        <option value="hargowilis">Hargowilis</option>
                                        <option value="jangkaran">Jangkaran</option>
                                        <option value="janten">Janten</option>
                                        <option value="jatimulyo">Jatimulyo</option>
                                        <option value="jatirejo">Jatirejo</option>
                                        <option value="jatisarono">Jatisarono</option>
                                        <option value="kaliagung">Kaliagung</option>
                                        <option value="kalidengen">Kalidengen</option>
                                        <option value="kaligintung">Kaligintung</option>
                                        <option value="kalirejo">Kalirejo</option>
                                        <option value="kanoman">Kanoman</option>
                                        <option value="karangsari">Karangsari</option>
                                        <option value="karangsewu">Karangsewu</option>
                                        <option value="karangwuluh">Karangwuluh</option>
                                        <option value="karangwuni">Karangwuni</option>
                                        <option value="kebonharjo">Kebonharjo</option>
                                        <option value="kebonrejo">Kebonrejo</option>
                                        <option value="kedundang">Kedundang</option>
                                        <option value="kedungsari">Kedungsari</option>
                                        <option value="kembang">Kembang</option>
                                        <option value="kranggan">Kranggan</option>
                                        <option value="krembangan">Krembangan</option>
                                        <option value="kulur">Kulur</option>
                                        <option value="kulwaru">Kulwaru</option>
                                        <option value="margosari">Margosari</option>
                                        <option value="ngargosari">Ngargosari</option>
                                        <option value="ngentakrejo">Ngentakrejo</option>
                                        <option value="ngestiharjo">Ngestiharjo</option>
                                        <option value="nomporejo">Nomporejo</option>
                                        <option value="pagerharjo">Pagerharjo</option>
                                        <option value="palihan">Palihan</option>
                                        <option value="pandowan">Pandowan</option>
                                        <option value="panjatan">Panjatan</option>
                                        <option value="pendoworejo">Pendoworejo</option>
                                        <option value="pengasih">Pengasih</option>
                                        <option value="pleret">Pleret</option>
                                        <option value="purwoharjo">Purwoharjo</option>
                                        <option value="purwosari">Purwosari</option>
                                        <option value="salamrejo">Salamrejo</option>
                                        <option value="sendangsari">Sendangsari</option>
                                        <option value="sentolo">Sentolo</option>
                                        <option value="sidoharjo">Sidoharjo</option>
                                        <option value="sidomulyo">Sidomulyo</option>
                                        <option value="sidorejo">Sidorejo</option>
                                        <option value="sindutan">Sindutan</option>
                                        <option value="sogan">Sogan</option>
                                        <option value="srikayangan">Srikayangan</option>
                                        <option value="sukoreno">Sukoreno</option>
                                        <option value="tanjungharj">Tanjungharj</option>
                                        <option value="tawangsari">Tawangsari</option>
                                        <option value="tayuban">Tayuban</option>
                                        <option value="temon_kulon">Temon Kulon</option>
                                        <option value="temon_wetan">Temon Wetan</option>
                                        <option value="tirtorahayu">Tirtorahayu</option>
                                        <option value="triharjo">Triharjo</option>
                                        <option value="tuksono">Tuksono</option>
                                        <option value="wahyuharjo">Wahyuharjo</option>
                                        <option value="wijimulyo">Wijimulyo</option>
                                    </select>
                                    <div class="col-md-1 form-group">
                                        <button type="submit" class="btn btn-primary">Pilih</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        </div>

    </section><!-- End Contact Section --><br><br> <br><br>
    <!-- <Section>
        <div class="continer">
            <div class="row col-lg-12 d-flex justify-content-center">
                <h1>
                    Hasil Pencarian
                </h1>
                <div class="row">



                </div>
            </div>
        </div>

    </Section> -->

</main><!-- End #main -->
<?= $this->include('front/footer') ?>