<?php $this->include('templates/style') ?>

<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">BERKAS PENDAFTARAN</h1>
<div class="d-flex justify-content-center align-items-center">
    <div class="card m-0 py-5 px-3 px-md-4 bg-clr5 border-clr1-3" style="width:90%;">
        <?php if (session()->getFlashdata('errors-saved')): ?>
            <div class="alert alert-danger text-center lh-1">
                <?= session()->getFlashdata('errors-saved') ?>
            </div>
        <?php endif; ?>
        <!-- Biodata Calon Santri -->
        <div class="card m-0 py-3 border-none cursor-pointer <?= ($santri['santri_saved'] == 1) ? 'btn-isi' : 'btn-bisi' ?>" onclick="window.location.href = '<?= base_url('biodata-calon-santri'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-3 col-md-2 col-lg-1 m-0 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-id-card text-clr1 fsz-24 m-0"></i>
                </div>
                <div class="col-9 col-md-10 col-lg-11 m-0 p-0">
                    <h5 class="fw-bold text-clr1 ls-s ls-1 mb-0">Biodata Calon Santri</h5>
                    <?php if($santri['santri_saved'] == 1): ?>
                        <p class="text-clr1 m-0 ls-s">Sudah mengisi</p>
                    <?php else: ?>
                        <p class="text-danger m-0 ls-s">Belum mengisi</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Biodata Orang Tua -->
        <div class="card m-0 mt-2 mt-md-3 py-3 border-none cursor-pointer <?= ($ortu['ortu_saved'] == 1) ? 'btn-isi' : 'btn-bisi' ?>" onclick="window.location.href = '<?= base_url('biodata-orang-tua'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-3 col-md-2 col-lg-1 m-0 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-id-card text-clr1 fsz-24 m-0"></i>
                </div>
                <div class="col-9 col-md-10 col-lg-11 m-0 p-0">
                    <h5 class="fw-bold text-clr1 ls-s ls-1 mb-0">Biodata Orang Tua</h5>
                    <?php if($ortu['ortu_saved'] == 1): ?>
                        <p class="text-clr1 m-0 ls-s">Sudah mengisi</p>
                    <?php else: ?>
                        <p class="text-danger m-0 ls-s">Belum mengisi</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Riwayat Kesehatan & Lain-Lain -->
        <div class="card m-0 mt-2 mt-md-3 py-3 border-none cursor-pointer <?= ($rk['rk_saved'] == 1) ? 'btn-isi' : 'btn-bisi' ?>" onclick="window.location.href = '<?= base_url('riwayat-kesehatan-dan-lain-lain'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-3 col-md-2 col-lg-1 m-0 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-id-card text-clr1 fsz-24 m-0"></i>
                </div>
                <div class="col-9 col-md-10 col-lg-11 m-0 p-0">
                    <h5 class="fw-bold text-clr1 ls-s ls-1 mb-0">Riwayat Kesehatan & Lain-Lain</h5>
                    <?php if($rk['rk_saved'] == 1): ?>
                        <p class="text-clr1 m-0 ls-s">Sudah mengisi</p>
                    <?php else: ?>
                        <p class="text-danger m-0 ls-s">Belum mengisi</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Bukti Pembayaran -->
        <div class="card m-0 mt-2 mt-md-3 py-3 border-none cursor-pointer position-relative <?= ($bp['bp_saved'] == 1) ? 'btn-isi' : 'btn-bisi' ?>" onclick="window.location.href = '<?= base_url('bukti-pembayaran'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-3 col-md-2 col-lg-1 m-0 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-id-card text-clr1 fsz-24 m-0"></i>
                </div>
                <div class="col-9 col-md-10 col-lg-11 m-0 p-0">
                    <h5 class="fw-bold text-clr1 ls-s ls-1 mb-0">Bukti Pembayaran</h5>
                    <?php if($bp['bp_saved'] == 1): ?>
                        <p class="text-clr1 m-0 ls-s">Sudah mengisi</p>
                    <?php else: ?>
                        <p class="text-danger m-0 ls-s">Belum mengisi</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($bp['bp_konfirm'] == 0 && $bp['bp_saved'] == 0): ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-exclamation text-danger"></i></div>
            <?php elseif($bp['bp_konfirm'] == 0 && $bp['bp_saved'] == 1): ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-hourglass-half text-warning"></i></div>
            <?php else: ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-check text-success"></i></div>
            <?php endif; ?>
        </div>
        <!-- Tes Tulis -->
        <div class="card m-0 mt-2 mt-md-3 py-3 border-none cursor-pointer position-relative <?= ($tt['testulis_konfirm'] == 1) ? 'btn-isi' : 'btn-bisi' ?>" onclick="window.location.href = '<?= base_url('tes-tulis'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-3 col-md-2 col-lg-1 m-0 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-id-card text-clr1 fsz-24 m-0"></i>
                </div>
                <div class="col-9 col-md-10 col-lg-11 m-0 p-0">
                    <h5 class="fw-bold text-clr1 ls-s ls-1 mb-0">Tes Tulis</h5>
                    <?php if($tt['testulis_konfirm'] == 1): ?>
                        <p class="text-clr1 m-0 ls-s">Sudah mengisi</p>
                    <?php else: ?>
                        <p class="text-danger m-0 ls-s">Belum mengisi</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($tt['testulis_konfirm'] == 0): ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-exclamation text-danger"></i></div>
            <?php else: ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-check text-success"></i></div>
            <?php endif; ?>
        </div>
        <!-- Tes Wawancara -->
        <div class="card m-0 mt-2 mt-md-3 py-3 border-none cursor-pointer position-relative <?= ($tw['tw_status'] == 1) ? 'btn-isi' : 'btn-bisi' ?>" onclick="window.location.href = '<?= base_url('tes-wawancara'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-3 col-md-2 col-lg-1 m-0 p-0 d-flex justify-content-center align-items-center">
                    <i class="fas fa-id-card text-clr1 fsz-24 m-0"></i>
                </div>
                <div class="col-9 col-md-10 col-lg-11 m-0 p-0">
                    <h5 class="fw-bold text-clr1 ls-s ls-1 mb-0">Tes Wawancara</h5>
                    <?php if($tw['tw_status'] == 1): ?>
                        <p class="text-clr1 m-0 ls-s">Sudah mengisi</p>
                    <?php else: ?>
                        <p class="text-danger m-0 ls-s">Belum mengisi</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($tw['tw_status'] == 0): ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-exclamation text-danger"></i></div>
            <?php else: ?>
                <div class="position-absolute he-30 we-30 bg-clr5 text-danger rounded-circle d-flex justify-content-center align-items-center" style="right:0px;top:50%;transform:translate(-50%,-50%);"><i class="fas fa-check text-success"></i></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div style="margin-top:120px;">
    <?= $this->include('templates/medsos') ?>
</div>
</section>