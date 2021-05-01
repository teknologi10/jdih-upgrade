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
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Daftar Produk Hukum</h3>
                <div class="card-tools">
                    <a href="<?= base_url(); ?>/produk_hukum/add" class="btn btn-tool btn-sm">
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
                            <th>Produk Hukum</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($peraturan as $p) : ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td>
                                    <b>
                                        <?php
                                        if ($p['kid'] == 1) {
                                            echo 'Peraturan Daerah';
                                        } else if ($p['kid'] == 2) {
                                            echo 'Peraturan Bupati';
                                        } else if ($p['kid'] == 3) {
                                            echo 'Keputusan Bupati';
                                        } else if ($p['kid'] == 4) {
                                            echo 'Instruksi Bupati';
                                        } else {
                                            echo 'MOU';
                                        }
                                        ?> Nomor <?= $p['judul']; ?> Tahun <?= $p['tahun']; ?>
                                    </b>
                                    <br> Tentang :
                                    <?= $p['keterangan']; ?>
                                </td>
                                <td class="text-center"><?= date("d/m/Y", $p['date']); ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($p['status'] == 1) {
                                        echo 'Tidak Berlaku';
                                    } else {
                                        echo 'Berlaku';
                                    }
                                    ?>
                                </td>
                                <td class="text-center" style="width: 14%;">
                                    <a class="text-muted d-inline-block">

                                        <form action="<?= base_url(); ?>/produk_hukum/edit/<?= $p['url']; ?>" method="post" class="mx-0">

                                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" title="edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                    </a>
                                    <a class="text-muted d-inline-block" href="<?= base_url(); ?>/produk_hukum/input_tte/<?= $p['id']; ?>" class="btn btn-sm">
                                        <?php if ($p['is_ttd'] == 1) {
                                            echo '';
                                        } else {
                                            echo ' <i class="fas fa-qrcode"></i>';
                                        }; ?>

                                    </a>
                                    <a class="text-muted d-inline-block">

                                        <form action="<?= base_url(); ?>/produk_hukum/<?= $p['id']; ?>" method="post" class="mx-0">

                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm" onclick="return confirm('apakah anda ingin hapus data?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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