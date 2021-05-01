<?= $this->include('front/header') ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li>Informasi Hukum</li>
            </ol>
            <h2>Konsultasi Hukum</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <form action="#" method="post" role="form" class="php-email-form">
                        <h4><b>Konsultasi Hukum / Tanggapan Raperda</b></h4>
                        <p>Anda dapat melakukan konsultasi hukum atau menanggapi Raperda melalui formulir yang disediakan di bawah ini.
                            Terimakasih.</p>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Harap masukkan nama lebih dari 4 karakter" />
                                <div class="validate"></div>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Harap masukkan alamat email" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Harap tuliskan pesan Anda" placeholder="Pesan"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Pesan Anda sudah terkirim. Terimakasih</div>
                        </div>
                        <div class="text-center"><button type="submit">Kirim</button></div>
                    </form>
                </div>

                <div class="col-lg-3">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>hukum@kulonprogokab.go.id</p>
                    </div>
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Telepon</h3>
                        <p>(0274) 773010</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->include('front/footer') ?>