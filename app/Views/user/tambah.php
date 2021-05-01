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
                        <div class="card-header">
                            <h3 class="card-title">Tambah User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" action="/user/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="nama" value="<?= old('nama'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="password" value="<?= old('password'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="email" value="<?= old('email'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="level">
                                                <option selected="selected" value="">--Pilih Level--</option>
                                                <option value="JDIH Kecamatan">JDIH Kecamatan</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Editor">Editor</option>
                                                <option value="User">User</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('level'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control <?= ($validation->hasError('tipe')) ? 'is-invalid' : ''; ?>" style="width: 100%;" name="tipe">
                                                <option selected="selected" value="">--Pilih Status--</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="pasif">Pasif</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tipe'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/user/tampil" class="btn btn-danger">Kembali</a>
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