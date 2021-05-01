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
            <div class="card-header bg-success">
                <h3 class="card-title" style="color:#ffffff">Daftar Berita</h3>
                <div class="card-tools">
                    <a href="<?= base_url(); ?>/berita/add" class="btn btn-tool btn-sm">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Sumber</th>
                            <th>Topik</th>
                            <th>Hits</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($berita as $a) : ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td>
                                    <b>
                                        <?= $a['judul']; ?>
                                    </b>
                                </td>
                                <td class="text-center">
                                    <?= $a['tgl']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $a['user']; ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($a['topik'] == 2) {
                                        echo 'Berita';
                                    } else if ($a['topik'] == 3) {
                                        echo 'Kajian';
                                    } else {
                                        echo 'Artikel';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?= $a['hits']; ?>
                                </td>
                                <td class="text-center" style="width: 8%;">
                                    <div class="row">
                                        <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/berita/edit/<?= $a['id']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/berita/publikasi/<?= $a['id']; ?>">
                                            <i class="fas fa-check-circle" style="color: 
                                        <?php if ($a['publikasi'] == 1) {
                                            echo 'green';
                                        } else {
                                            echo '';
                                        }; ?>"></i> </a>

                                        <a class="text-muted d-inline-block" href="<?= base_url(); ?>/berita/delete/<?= $a['id']; ?>" onclick="return confirm('apakah anda ingin hapus data?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <!-- </a> -->
                                    </div>
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