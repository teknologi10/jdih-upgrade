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
                            <h3 class="card-title">Edit Produk Hukum</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" action="<?= base_url(); ?>/produk_hukum/update/<?= $peraturan['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="peraturanlama" value="<?= $peraturan['url']; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="kategori">
                                                <option selected="selected" value="">--Pilih Kategori--</option>
                                                <?php foreach ($kategori as $k) : ?>
                                                    <option value="<?= $k['kid']; ?>" <?php if ($peraturan['kid'] == $k['kid']) {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="<?= $k['kid']; ?>"><?= $k['kategori']; ?></option>

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
                                            <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="nomor" value="<?= (old('nomor')) ? old('nomor') : $peraturan['judul'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nomor'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="tahun" value="<?= (old('tahun')) ? old('tahun') : $peraturan['tahun'] ?>">
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
                                            <textarea class="form-control" type="text" name="ket"><?= (old('ket')) ? old('ket') : $peraturan['keterangan'] ?></textarea>
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
                                                <option value="0" <?php if ($peraturan['status'] == 0) {
                                                                        echo "selected='selected'";
                                                                    } ?>>Berlaku</option>
                                                <option value="1" <?php if ($peraturan['status'] == 1) {
                                                                        echo "selected='selected'";
                                                                    } ?>>Tidak Berlaku</option>

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
                                                <input name="tanggal" type="text" class="form-control" value="<?= (old('tanggal')) ? old('tanggal') : date('d-m-Y', $peraturan['date']) ?>">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label for="peraturan">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="peraturan" name="peraturan" value="<?= (old('peraturan')) ? old('peraturan') : $peraturan['url'] ?>">
                                                    <label class="custom-file-label" for="peraturan"><?= $peraturan['url']; ?></label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/produk_hukum/tampil" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success  float-right">Ubah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->include('admin/footer') ?>