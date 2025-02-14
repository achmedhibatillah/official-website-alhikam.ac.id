<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-3">PENGUMUMAN</h1>

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-6 m-0 p-0 px-3 px-md-3">
    <div class="card bg-clr4 m-1 m-md-4 p-3">
        <?php if ($pengumuman['pengumuman_saved'] == 1): ?>
            <p class="fw-bold text-center mb-1 text-clr1">Pengumuman:</p>
            <?php $file_pengumuman = str_replace('uploads/pengumuman/', '', $pengumuman['pengumuman_pdf']); ?>
            <a href="<?= base_url('download-surat-kelulusan/' . $file_pengumuman) ?>" class="btn btn-clr1 lh-1 px-3"><i class="fas fa-download me-2"></i> Download SK</a>
            <div class="card m-0 p-0 border-clr1 mt-3 px-3 py-3 text-clr1">
            <hr class="my-4">
                <p class="fw-bold ls-1">Kartu fasilitas santri baru:</p>
                <div class="row m-0 p-0">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_kasur'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Kasur</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_ranjang'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Ranjang tidur</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_lemari'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Lemari</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_tas'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Tas ransel</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_jas'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Jas almamater</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_olahraga'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Seragam olahraga</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_koko'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Baju taqwa</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_sarung'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Sarung</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_kopiah'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Kopyah</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_bukukitab'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Buku pembelajaran dan kitab-kitab</p>
                    </div>
                </div>
                <div class="row m-0 p-0 mt-1">
                    <div class="col-1 p-0 m-0 d-flex justify-content-end">
                        <?= ($pengumuman['pengumuman_bukubio'] == 1) ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-circle-minus text-secondary"></i>' ?>
                    </div>
                    <div class="col-11 m-0 p-0">
                        <p class="m-0 text-clr1 ms-2">Buku biografi KH. Hasyim Muzadi</p>
                    </div>
                </div>
        </div>
        <?php else: ?>
            <div class="d-flex justify-content-center align-items-center" style="min-height:200px;">
                <p class="text-clr1 ls-1 text-center">Pengumuman belum keluar.</p>
            </div>
        <?php endif; ?>
    </div>

    </div>

</div>

</section>