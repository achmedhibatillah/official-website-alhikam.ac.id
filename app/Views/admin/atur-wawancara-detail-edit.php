<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-2 bg-clr5 text-clr1">
                <div class="row m-0 p-0">
                    <div class="col-md-3 col-lg-2 m-0 p-0 d-flex justify-content-center justify-content-md-end align-items-center pe-0 pe-md-4">
                        <div class="d-flex justify-content-center bg-clr4 rounded cursor-pointer" style="overflow:hidden;width:80px;height:100px;">
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
                            <p class="fsz-15 text-secondary lh-1 m-0 text-center text-md-start d-inline position-relative">Status: <?= (isset($tw['tw_status']) && $tw['tw_status'] == 1) ? 'Sudah wawancara <i class="fas fa-check fsz-12 bg-clr1 text-clr5 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' : 'Belum wawancara <i class="fas fa-hourglass-half fsz-12 bg-warning text-clr5 p-1 he-20 we-20 d-flex justify-content-center align-items-center rounded-circle position-absolute" style="top:-1px;right:-22px;"></i>' ?></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 m-0 p-0 d-flex justify-content-center align-items-center">
                        <?php if(isset($tw['tw_tgl']) && $tw['tw_tgl']): ?>
                            <div class="bg-warning rounded d-flex justify-content-center align-items-center" style="height:100%;width:100%">
                                <?php if ($tw['tw_status'] == 1): ?>
                                    <div class="my-3">
                                        <div class="d-flex justify-content-center">
                                            <i class="fas fa-check-circle text-clr1 fsz-30"></i>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div id="tw-konfirmasi" class="btn btn-light text-clr1 p-1 ls-s lh-1 fsz-12 cursor-pointer" data-bs-toggle="modal" data-bs-target="#modal-tw-konfirm"><i class="fas fa-check me-2"></i>verifikasi</div>
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
            <?php if (session()->getFlashdata('success-wawancara')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('success-wawancara') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success-wawancara-ver')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('success-wawancara-ver') ?>
                </div>
            <?php endif; ?>
            <div class="card m-0 p-3 mb-3 bg-clr5 text-clr1">
                <form action="<?= base_url('simpan-wawancara') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="tw_id" value="<?= $tw['tw_id'] ?>">
                    <div class="mb-3">
                        <label for="tw_tgl" class="text-clr1 fw-bold ls-s">Tanggal wawancara:</label>
                        <input type="date" name="tw_tgl" id="tw_tgl" class="form-control <?= (isset(session()->getFlashdata('errors-wawancara')['tw_tgl'])) ? 'is-invalid' : '' ?>"
                        value="<?= old('tw_tgl') ? old('tw_tgl') : (isset($tw['tw_tgl']) ? $tw['tw_tgl'] : '') ?>">
                        <?= (isset(session()->getFlashdata('errors-wawancara')['tw_tgl']) ? '<div class="fsz-12 text-danger">' . session()->getFlashdata('errors-wawancara')['tw_tgl'] . '</div>' : '') ?>
                    </div>
                    <div class="mb-3">
                        <label for="tw_tempat" class="text-clr1 fw-bold ls-s">Tempat wawancara:</label>
                        <input type="text" name="tw_tempat" id="tw_tempat" class="form-control <?= (isset(session()->getFlashdata('errors-wawancara')['tw_tempat'])) ? 'is-invalid' : '' ?>" placeholder="Masukkan tempat wawancara ..."
                        value="<?= old('tw_tempat') ? old('tw_tempat') : (isset($tw['tw_tempat']) ? $tw['tw_tempat'] : '') ?>">
                        <?= (isset(session()->getFlashdata('errors-wawancara')['tw_tempat']) ? '<div class="fsz-12 text-danger">' . session()->getFlashdata('errors-wawancara')['tw_tempat'] . '</div>' : '') ?>
                    </div>
                    <div class="mb-3">
                        <label for="tw_pewawancara" class="text-clr1 fw-bold ls-s">Pewawancara:</label>
                        <input type="text" name="tw_pewawancara" id="tw_pewawancara" class="form-control <?= (isset(session()->getFlashdata('errors-wawancara')['tw_pewawancara'])) ? 'is-invalid' : '' ?>" placeholder="Masukkan nama pewawancara ..."
                        value="<?= old('tw_pewawancara') ? old('tw_pewawancara') : (isset($tw['tw_pewawancara']) ? $tw['tw_pewawancara'] : '') ?>">
                        <?= (isset(session()->getFlashdata('errors-wawancara')['tw_pewawancara']) ? '<div class="fsz-12 text-danger">' . session()->getFlashdata('errors-wawancara')['tw_pewawancara'] . '</div>' : '') ?>
                    </div>
                    <button type="submit" class="btn btn-clr1 p-0 px-3 mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tw-konfirm" tabindex="-1" aria-labelledby="tw-konfirmasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-clr1 fw-bold ls-s" id="tw-konfirmasi-label">Verifikasi Tes Wawancara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="ls-1 text-clr1">Apakah Anda yakin ingin memverifikasi tes wawancara <i class="fst-normal fw-bold"><?= $santri['santri_nama'] ?></i>?</p>
                <form action="<?= base_url('verifikasi-tw') ?>" method="post">
                    <input type="hidden" name="tw_id" value="<?= $tw['tw_id'] ?>">
                    <input type="hidden" name="bp_konfirm" value="1">
                    <button type="submit" class="btn btn-sm btn-clr1 fsz-12">Verifikasi</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>