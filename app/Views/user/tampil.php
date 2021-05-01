<?= $this->include('admin/header') ?>
<?= csrf_field(); ?>
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
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title" style="color:#ffffff">Daftar Produk Hukum</h3>
                <div class="card-tools">
                    <a href="<?= base_url(); ?>/user/add" class="btn btn-tool btn-sm">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Username</th>
                            <!-- <th>Password</th> -->
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <td>
                                    <?= $u['user']; ?>
                                </td>
                                <!-- <td class="text-center"><?= $u['password']; ?>
                                </td> -->
                                <td class="text-center"><?= $u['level']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['tipe']; ?>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="/user/edit/<?= $u['UserId']; ?>" class="text-muted">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/user/<?= $u['UserId']; ?>" class="text-muted" onclick="return confirm('apakah anda ingin hapus data?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>


                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
    </section>
</div>



<?= $this->include('admin/footer') ?>