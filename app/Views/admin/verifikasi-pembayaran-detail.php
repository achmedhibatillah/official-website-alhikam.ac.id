<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-3 bg-clr1 text-clr5">
                <div class="row m-0 p-0">
                    <div class="col-md-3 col-lg-2 m-0 p-0 d-flex justify-content-center justify-content-md-end pe-0 pe-md-4">
                        <div class="d-flex justify-content-center bg-clr4 rounded cursor-pointer" style="overflow:hidden;width:80px;height:100px;">
                            <?php if ($bp['bp_foto']): ?>
                                <img src="<?= base_url('/' . $bp['bp_foto']) ?>" alt="Pas foto" class="img-death">
                            <?php else: ?>
                                <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 m-0 p-0 d-flex justify-content-center justify-content-md-start align-items-md-center">
                        <div class="mt-4 mt-md-0">
                            <p class="fsz-20 fw-bold lh-1 m-0 text-center text-md-start"><?= $santri['santri_nama'] ?></p>
                            <p class="fsz-15 lh-1 m-0 mt-2 mb-2 text-center text-md-start"><i class="fas fa-id-card me-1"></i><?= $santri['santri_nik'] ?></p>
                            <p class="fsz-15 lh-1 m-0 text-center text-md-start d-inline position-relative">Status: <?= ($bp['bp_konfirm'] == 1) ? 'Terverifikasi <i class="fas fa-check fsz-12 bg-clr5 text-clr1 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' : 'Belum diverifikasi <i class="fas fa-hourglass-half fsz-12 bg-clr5 text-warning p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' ?></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 m-0 p-0 d-flex align-items-center justify-content-center">
                        <div class="card bg-transparent border-clr5 p-2 mt-4 py-3 mt-md-0">
                            <?php $file_bp = str_replace('uploads/bp/', '', $bp['bp_bp']); ?>
                            <div class="d-flex justify-content-center">
                                <a href="<?= base_url('admin-download-bukti-pembayaran/' . $file_bp) ?>" class="text-clr5 text-center ls-s lh-1 fsz-12"><i class="fas fa-download me-2"></i> lihat dokumen bukti pembayaran di sini</a>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <?php if ($bp['bp_konfirm'] == 0): ?>
                                    <div class="">
                                        <div class="d-flex justify-content-center">
                                            <div id="bp-konfirmasi" class="btn btn-light text-clr1 p-1 ls-s lh-1 fsz-12 cursor-pointer" data-bs-toggle="modal" data-bs-target="#modal-bp-konfirm"><i class="fas fa-check me-2"></i>verifikasi</div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2">
                                            <div id="bp-batal-konfirmasi" class="btn btn-danger text-clr5 p-1 ls-s lh-1 fsz-12 cursor-pointer" data-bs-toggle="modal" data-bs-target="#modal-bp-tolak-konfirm"><i class="fas fa-xmark me-2"></i>tolak verifikasi</div>
                                        </div>
                                    </div>
                                <?php else: ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-bp-konfirm" tabindex="-1" aria-labelledby="bp-konfirmasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-clr1 fw-bold ls-s" id="bp-konfirmasi-label">Verifikasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="ls-1 text-clr1">Apakah Anda yakin ingin memverifikasi pembayaran <i class="fst-normal fw-bold"><?= $santri['santri_nama'] ?></i>? Pastikan Anda cek bukti pembayaran terlebih dahulu.</p>
                <form action="<?= base_url('verifikasi-bp') ?>" method="post">
                    <input type="hidden" name="bp_id" value="<?= $bp['bp_id'] ?>">
                    <input type="hidden" name="bp_konfirm" value="1">
                    <button type="submit" class="btn btn-sm btn-clr1 fsz-12">Verifikasi</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-bp-tolak-konfirm" tabindex="-1" aria-labelledby="bp-tolak-konfirmasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-clr1 fw-bold ls-s" id="bp-tolak-konfirmasi-label">Tolak Verifikasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="ls-1 text-clr1">Apakah Anda yakin ingin menolak verifikasi pembayaran <i class="fst-normal fw-bold"><?= $santri['santri_nama'] ?></i>? Pastikan Anda cek bukti pembayaran terlebih dahulu.</p>
                <form action="<?= base_url('tolak-verifikasi-bp') ?>" method="post">
                    <input type="hidden" name="bp_id" value="<?= $bp['bp_id'] ?>">
                    <input type="hidden" name="bp_saved" value="0">
                    <input type="hidden" name="santri_nama" value="<?= $santri['santri_nama'] ?>">
                    <button type="submit" class="btn btn-sm btn-danger fsz-12">Tolak</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>