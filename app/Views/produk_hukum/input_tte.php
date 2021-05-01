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
                            <h3 class="card-title">TTE Produk Hukum</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form role="form" action="<?=base_url();?>/produk_hukum/ttd_ok" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_produk_hukum" value="<?= $id_produk_hukum; ?>">
                            <div class="card-body">
                                <?php echo session()->getFlashdata('pesan');?>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Passphrase</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('passphrase')) ? 'is-invalid' : ''; ?>" placeholder="Enter ..." name="passphrase" value="<?= old('passphrase'); ?>" required>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('passphrase'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url(); ?>/produk_hukum/tampil" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success  float-right"><i class="fa fa-check"></i> Tanda Tangani</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->include('admin/footer') ?>