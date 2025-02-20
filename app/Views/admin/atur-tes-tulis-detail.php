<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-2 bg-clr5 text-clr1">
                <div class="row m-0 p-0">
                    <div class="col-md-3 col-lg-2 m-0 p-0 d-flex justify-content-center justify-content-md-end align-items-center pe-0 pe-md-4">
                        <div class="d-flex justify-content-center rounded cursor-pointer shadow-m" style="overflow:hidden;width:80px;height:100px;">
                            <?php if (isset($bp['bp_foto'])): ?>
                                <img src="<?= base_url('/' . $bp['bp_foto']) ?>" alt="Pas foto" class="img-death">
                            <?php else: ?>
                                <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-8 m-0 p-0 d-flex justify-content-center justify-content-md-start align-items-md-center">
                        <div class="mt-4 mt-md-0"> 
                            <p class="fsz-20 fw-bold lh-1 m-0 text-center text-md-start"><?= $santri['santri_nama'] ?></p>
                            <p class="fsz-15 lh-1 m-0 mt-1 mb-0 text-center text-md-start"><i class="fas fa-id-card me-1"></i><?= $santri['santri_nik'] ?></p>
                            <a href="<?= base_url('calon-santri/') . $santri['peserta_id'] ?>" class="fsz-15 td-none text-clr2 mb-2 d-block">lihat profil →</a>
                            <p class="fsz-15 text-secondary lh-1 m-0 text-center text-md-start d-inline position-relative">Status: <?= (isset($tt['testulis_konfirm']) && $tt['testulis_konfirm'] == 1) ? 'Sudah mengikuti <i class="fas fa-check fsz-12 bg-clr1 text-clr5 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' : 'Belum mengikuti <i class="fas fa-hourglass-half fsz-12 bg-warning text-clr5 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' ?></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 m-0 p-0 d-flex justify-content-center align-items-center">
                        <?php if(isset($tt['testulis_konfirm']) && $tt['testulis_konfirm']): ?>
                            <div class="bg-warning rounded d-flex justify-content-center align-items-center" style="height:100%;width:100%">
                                <?php if ($tt['testulis_konfirm'] == 1): ?>
                                    <div class="my-3">
                                        <div class="d-flex justify-content-center">
                                            <i class="fas fa-check-circle text-clr1 fsz-30"></i>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center">
                                        <i class="fas fa-check-circle text-clr1 fsz-30"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <?php if (session()->getFlashdata('success-testulis')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('success-testulis') ?>
                </div>
            <?php endif; ?>
            <div class="card m-0 p-3 mb-3 bg-clr5 text-clr1">
                <?php if ($tt['testulis_konfirm'] == 1): ?>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-tt-batal">Batalkan verifikasi tes tulis</button>
                <?php else: ?>
                    <button class="btn btn-clr1" data-bs-toggle="modal" data-bs-target="#modal-tt-konfirm">Verifikasi tes tulis</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="modal-tt-konfirm" tabindex="-1" aria-labelledby="bp-konfirmasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-clr1 fw-bold ls-s" id="bp-konfirmasi-label">Verifikasi Tes Tulis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="ls-1 text-clr1">Apakah Anda yakin ingin memverifikasi tes tulis <i class="fst-normal fw-bold"><?= $santri['santri_nama'] ?></i>? Pastikan Anda cek bukti pembayaran terlebih dahulu.</p>
                <form action="<?= base_url('verifikasi-tt') ?>" method="post">
                    <input type="hidden" name="testulis_id" value="<?= $tt['testulis_id'] ?>">
                    <input type="hidden" name="bp_konfirm" value="1">
                    <button type="submit" class="btn btn-sm btn-clr1 fsz-12">Verifikasi</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tt-batal" tabindex="-1" aria-labelledby="bp-tt-batal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-clr1 fw-bold ls-s" id="bp-tolak-konfirmasi-label">Batalkan Verifikasi Tes Tulis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="ls-1 text-clr1">Apakah Anda yakin ingin membatalkan verifikasi tes tulis <i class="fst-normal fw-bold"><?= $santri['santri_nama'] ?></i>? Pastikan Anda cek bukti pembayaran terlebih dahulu.</p>
                <form action="<?= base_url('tolak-verifikasi-tt') ?>" method="post">
                    <input type="hidden" name="testulis_id" value="<?= $tt['testulis_id'] ?>">
                    <input type="hidden" name="bp_saved" value="0">
                    <input type="hidden" name="santri_nama" value="<?= $santri['santri_nama'] ?>">
                    <button type="submit" class="btn btn-sm btn-danger fsz-12">Tolak</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
