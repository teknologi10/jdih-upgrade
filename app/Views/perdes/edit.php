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
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class=" card-title">Edit Peraturan Desa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="/perdes/update/<?= $perdes['id_perdes']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="perdeslama" value="<?= $perdes['id_perdes']; ?>">
                            <input type="hidden" name="lamplama" value="<?= $perdes['file']; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <select class="form-control <?= ($validation->hasError('desa')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="desa">
                                                <?php foreach ($desa as $d) : ?>
                                                    <option value="<?= $d['id_desa']; ?>" <?php if ($perdes['id_desa'] == $d['id_desa']) {
                                                                                                echo "selected='selected'";
                                                                                            } ?> value="<?= $d['id_desa']; ?>"><?= $d['nama_desa']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('desa'); ?>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="nomor" value="<?= (old('nomor')) ? old('nomor') : $perdes['nomor'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nomor'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tahun</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="tahun" value="<?= (old('nomor')) ? old('nomor') : $perdes['tahun'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tahun'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Tentang</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="tentang"><?= (old('ket')) ? old('ket') : $perdes['tentang'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="ket"><?= (old('ket')) ? old('ket') : $perdes['ket'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File lampiran</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="lamp" name="lamp" value="<?= (old('lamp')) ? old('lamp') : $perdes['file'] ?>">
                                                    <label class="custom-file-label" for="exampleInputFile"><?= $perdes['file']; ?></label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/perdes/tampil" class="btn btn-danger">Kembali</a>
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