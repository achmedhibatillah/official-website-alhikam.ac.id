<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-2 bg-clr5 text-clr1">
                <div class="row m-0 p-0">
                    <div class="col-md-3 col-lg-2 m-0 p-0 d-flex justify-content-center justify-content-md-end align-items-center pe-0 pe-md-4">
                        <div class="d-flex justify-content-center bg-clr4 rounded cursor-pointer" style="overflow:hidden;width:80px;height:100px;">
                            <?php if ($bp['bp_foto']): ?>
                                <img src="<?= base_url('/' . $bp['bp_foto']) ?>" alt="Pas foto" class="img-death">
                            <?php else: ?>
                                <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-10 m-0 p-0 d-flex justify-content-center justify-content-md-start align-items-md-center">
                        <div class="mt-4 mt-md-0">
                            <p class="fsz-20 fw-bold lh-1 m-0 text-center text-md-start"><?= $santri['santri_nama'] ?></p>
                            <p class="fsz-15 lh-1 m-0 mt-1 mb-0 text-center text-md-start"><i class="fas fa-id-card me-1"></i><?= $santri['santri_nik'] ?></p>
                            <a href="<?= base_url('calon-santri/') . $santri['peserta_id'] ?>" class="fsz-15 td-none text-clr2 mb-2 d-block">lihat profil →</a>
                            <p class="fsz-15 text-secondary lh-1 m-0 text-center text-md-start d-inline position-relative">Status: <?= ($bp['bp_konfirm'] == 1) ? 'Sudah dilampirkan <i class="fas fa-check fsz-12 bg-clr1 text-clr5 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' : 'Belum dilampirkan <i class="fas fa-hourglass-half fsz-12 bg-warning text-clr5 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-3 bg-clr5 text-clr1">
                <div class="row m-0 p-0">
                    <?php if($pengumuman['pengumuman_pdf']): ?>
                        <p class="ls-1 fw-bold mb-1 text-center">Lihat surat kelulusan santri:</p>
                        <div class="d-flex justify-content-center">
                            <?php $file_pengumuman = str_replace('uploads/pengumuman/', '', $pengumuman['pengumuman_pdf']); ?>
                            <a href="<?= base_url('admin-download-surat-kelulusan/') . $file_pengumuman  ?>" class="btn btn-clr1" style="width:220px;"><i class="fas fa-download"></i> Lihat pengumuman</a>
                        </div>
                    <?php endif; ?>
                </div>
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
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-3 bg-clr5 text-clr1">
                <form action="<?= base_url('request-edit-pengumuman') ?>" method="post">
                    <input type="hidden" name="pengumuman_id" value="<?= $pengumuman['pengumuman_id'] ?>">
                    <input type="hidden" name="pengumuman_saved" value="0">
                    <button type="submit" class="btn btn-outline-clr1">Edit pengumuman</button>
                </form>
            </div>
        </div>
    </div>
</div>
