<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark text-center"> Selamat Datang dimenu admin JDIH</h1>
                </div>
            </div><br>
            <!-- Small Box (Stat card) -->
            <h3 class="mb-2 mt-4 text-center">Dashboard</h3><br>
            <div class="row mx-2">
                <div class="col-lg-3">
                    <!-- small card -->
                    <div class="small-box" style="background-color:#182C61;">
                        <div class="inner">
                            <br>
                            <h3 style="color: white;"><?= $ph; ?></h3>

                            <p style="color: white;">Produk Hukum</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="<?= base_url(); ?>/produk_hukum/tampil" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <br>
                            <h3><?= $raperda; ?></h3>

                            <p>Raperda</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="<?= base_url(); ?>/raperda/tampil" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <br>
                            <h3><?= $naskah; ?></h3>

                            <p>Naskah Akademik</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-book"></i>
                        </div>
                        <a href="<?= base_url(); ?>/naskah_akademik/tampil" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <br>
                            <h3><?= $berita; ?></h3>

                            <p>Berita</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-newspaper"></i>
                        </div>
                        <a href="<?= base_url(); ?>/berita/tampil" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <hr>
            <!-- /.row -->
        </div>
    </div>
</div>