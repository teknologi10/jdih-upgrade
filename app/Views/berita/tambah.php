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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Berita</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="<?= base_url(); ?>/berita/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." value="<?= old('judul'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('judul'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Topik</label>
                                            <select class="form-control <?= ($validation->hasError('topik')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="topik">
                                                <option selected="selected" value="">--Pilih Topik--</option>
                                                <?php foreach ($topik as $t) : ?>
                                                    <option value="<?= $t['id']; ?>"><?= $t['topik']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('topik'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sumber</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('sumber')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="sumber" value="<?= old('sumber'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('sumber'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Isi Berita</label>
                                            <div class="mb-3">
                                                <textarea class="textarea <?= ($validation->hasError('berita')) ? 'is-invalid' : ''; ?>" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="berita"><?= old('berita'); ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('berita'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9 mr-4" style="width: 90%;">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Foto</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="foto">Pilih foto</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ket">Keterangan Foto</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="ket" value="<?= old('ket'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-4">
                                        <img src="<?= base_url('img'); ?>/berita/default.png" class="img-thumbnail img-preview">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File Lampiran</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/berita/tampil" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success  float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->include('admin/footer') ?>