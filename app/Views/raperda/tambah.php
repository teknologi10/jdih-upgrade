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
                        <div class="card-header bg-danger">
                            <h3 class="card-title">Tambah Raperda</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" action="<?= base_url(); ?>/raperda/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" placeholder="Judul ..." name="judul" value="<?= old('judul'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('judul'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" type="text" placeholder="Keterangan ..." name="ket" value="<?= old('ket'); ?>"><?= old('ket'); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Tanggal</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input name="tanggal" type="text" class="form-control" value="<?= date('d-m-Y'); ?>">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="peraturan">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('raperda')) ? 'is-invalid' : ''; ?>" id="raperda" name="raperda"><br>
                                                    <div class="error invalid-feedback">
                                                        <?= $validation->getError('raperda'); ?>
                                                    </div><br>
                                                    <label class="custom-file-label" for="peraturan">Pilih dokumen</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/raperda/tampil" class="btn btn-danger">Kembali</a>
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