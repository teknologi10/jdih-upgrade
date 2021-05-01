<link href="<?= base_url('img'); ?>/logokp.png" rel="icon">
<!-- <embed src="http://103.135.180.16/jdih/file/produk_hukum_1942.pdf" type="application/pdf" width="100%" height="100%"> -->
<embed src="<?= base_url(); ?>/peraturan/files/
<?php if ($url['is_ttd'] == 0) {
    echo $url['url'];
} else {
    echo 'signed/produk_hukum_' . $url['id'] . '.pdf';
} ?>" type="application/pdf" width="100%" height="100%">