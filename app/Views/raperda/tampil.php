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
            <div class="card-header bg-danger">
                <h3 class="card-title" style="color:#ffffff">Daftar Raperda</h3>
                <div class="card-tools">
                    <a href="<?= base_url(); ?>/raperda/add" class="btn btn-tool btn-sm">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($raperda as $r) : ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td>
                                    <?= $r['judul']; ?>
                                </td>
                                <td>
                                    <?= $r['keterangan']; ?>
                                </td>
                                <td class="text-center"><?= date("d/m/Y", $r['date']); ?>
                                </td>
                                <td class="text-center" style="width: 14%;">
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/raperda/edit_raperda/<?= $r['id']; ?>" class="btn btn-sm"> <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="text-muted d-inline-block" href="<?= base_url(); ?>/raperda/delete/<?= $r['id']; ?>" class="btn btn-sm" onclick="return confirm('apakah anda ingin hapus data?');"> <i class="fas fa-trash-alt"></i>
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