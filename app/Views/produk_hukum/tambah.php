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
                        <div class="card-header" style="background:#182C61">
                            <h3 class="card-title">Tambah Produk Hukum</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" action="<?= base_url(); ?>/produk_hukum/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="kategori">
                                                <option selected="selected" value="">--Pilih Kategori--</option>
                                                <?php foreach ($kategori as $k) : ?>
                                                    <option value="<?= $k['kid']; ?>"><?= $k['kategori']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kategori'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="nomor" value="<?= old('nomor'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nomor'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="tahun" value="<?= old('tahun'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tahun'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" type="text" name="ket" value="<?= old('ket'); ?>"><?= old('ket'); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="status">
                                                <option selected="selected" value="">--Pilih Status--</option>
                                                <option value="0">Berlaku</option>
                                                <option value="1">Tidak Berlaku</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('status'); ?>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="peraturan">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('peraturan')) ? 'is-invalid' : ''; ?>" id="peraturan" name="peraturan"><br>
                                                    <div class="error invalid-feedback">
                                                        <?= $validation->getError('peraturan'); ?>
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
                                <a href="<?= base_url(); ?>/produk_hukum/tampil" class="btn btn-danger">Kembali</a>
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