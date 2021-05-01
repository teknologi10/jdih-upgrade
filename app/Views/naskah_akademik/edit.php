<?= $this->include('admin/header') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark text-center"> Selamat Datang dimenu admin JDIH</h1>
                </div>
            </div><br>
            <!-- Small Box (Stat card) -->


        </div>
    </section>

    <section class="content mx-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header bg-warning">
                            <h3 class="card-title">Edit Naskah Akademik</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" action="<?= base_url(); ?>/naskah_akademik/update/<?= $naskah['id_naskah_akademik']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="naskahlama" value="<?= $naskah['file']; ?>">
                            <!-- <input type="hidden" name="tanggallama" value="<?= $naskah['tanggal']; ?>"> -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" placeholder="Judul ..." name="judul" value="<?= (old('judul')) ? old('judul') : $naskah['judul'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('judul'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Tanggal</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input name="tanggal" type="text" class="form-control" value="<?= date('d-m-Y'); ?>">
                                            </div>
                                            
                                        </div>
                                    </div> -->
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="naskah">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('naskah')) ? 'is-invalid' : ''; ?>" id="naskah" name="naskah" <?= (old('naskah')) ? old('naskah') : $naskah['file'] ?>><br>
                                                    <div class="error invalid-feedback">
                                                        <?= $validation->getError('naskah'); ?>
                                                    </div><br>
                                                    <label class="custom-file-label" for="naskah"><?= $naskah['file']; ?></label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/naskah_akademik/tampil" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success  float-right">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->include('admin/footer') ?>