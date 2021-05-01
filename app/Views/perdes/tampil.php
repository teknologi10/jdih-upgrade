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
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header bg-danger">
                <h3 class="card-title">Daftar Peraturan Desa</h3>
                <div class="card-tools">
                    <a href="<?= base_url(); ?>/perdes/add" class="btn btn-tool btn-sm">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Desa</th>
                            <th>Nomor</th>
                            <th>Tahun</th>
                            <th>Tentang</th>
                            <th>Keterangan</th>
                            <th>File</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($perdes as $p) : ?>
                            <tr>
                                <td>
                                    <?php
                                    foreach ($desa as $d) :
                                        if ($p['id_desa'] == $d['id_desa']) {
                                            echo $d['nama_desa'];
                                        };
                                    endforeach;
                                    ?>
                                </td>
                                <td class="text-center"><?= $p['nomor']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $p['tahun']; ?>
                                </td>
                                <td>
                                    <?= $p['tentang']; ?>
                                </td>
                                <td>
                                    <?= $p['ket']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $p['file']; ?>
                                </td>
                                <td class="text-center">
                                    <a href="/perdes/edit/<?= $p['id_perdes']; ?>" class="text-muted">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/perdes/<?= $p['id_perdes']; ?>" class="text-muted" onclick="return confirm('apakah anda ingin hapus data?');">
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