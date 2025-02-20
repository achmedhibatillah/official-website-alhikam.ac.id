<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-8 m-0 p-0">
            <div class="card m-0 p-3 mb-2 bg-clr5 text-clr1">
                <div class="row m-0 p-0">
                    <div class="col-md-3 col-lg-2 m-0 p-0 d-flex justify-content-center justify-content-md-end align-items-center pe-0 pe-md-4">
                        <div class="d-flex justify-content-center rounded cursor-pointer shadow-m" style="overflow:hidden;width:80px;height:100px;">
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
                <form action="<?= base_url('simpan-pengumuman') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pengumuman_id" value="<?= $pengumuman['pengumuman_id'] ?>">
                    <div class="mb-3">
                        <div class="fw-bold ls-1 lh-1 mb-2">Status kelulusan:</div>
                        <?php if(isset(session()->getFlashdata('errors-pengumuman')['pengumuman_status'])): ?>
                            <p class="d-block text-danger fsz-12 ls-1 lh-1 mb-2"><?= session()->getFlashdata('errors-pengumuman')['pengumuman_status'] ?></p>
                        <?php endif; ?>
                        <div class="">
                            <input type="radio" name="pengumuman_status" value="1" id="pengumuman_saved_true"
                                <?= old('pengumuman_status') === '1' ? 'checked' : '' ?>>
                            <label for="pengumuman_saved_true" class="text-clr1">Lulus</label>
                        </div>
                        <div class="">
                            <input type="radio" name="pengumuman_status" value="0" id="pengumuman_saved_false"
                                <?= old('pengumuman_status') === '0' ? 'checked' : '' ?>>
                            <label for="pengumuman_saved_false" class="text-clr1">Tidak Lulus</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pengumuman_pdf" class="fw-bold ls-1 lh-1 mb-2">Unggah surat kelulusan santri:</label>
                        <?php if(isset(session()->getFlashdata('errors-pengumuman')['pengumuman_pdf'])): ?>
                            <p class="d-block text-danger fsz-12 ls-1 lh-1 mb-2"><?= session()->getFlashdata('errors-pengumuman')['pengumuman_pdf'] ?></p>
                        <?php endif; ?>
                        <input class="d-block" type="file" name="pengumuman_pdf" id="pengumuman_pdf" accept=".pdf" enctype="multipart/form-data">
                    </div>
                    <div class="mb-3">
                        <p class="ls-1 lh-1 fw-bold mb-2">Kartu fasilitas santri baru:</p>
                        <div class="">
                            <input <?= (old('pengumuman_kasur', $pengumuman['pengumuman_kasur'] ?? '') ? 'checked' : '') ?> value="1" type="checkbox" name="pengumuman_kasur" id="pengumuman_kasur" class="border-clr1 me-1">
                            <label for="pengumuman_kasur">Kasur</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_ranjang', $pengumuman['pengumuman_ranjang'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_ranjang" id="pengumuman_ranjang" class="border-clr1 me-1">
                            <label for="pengumuman_ranjang">Ranjang tidur</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_lemari', $pengumuman['pengumuman_lemari'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_lemari" id="pengumuman_lemari" class="border-clr1 me-1">
                            <label for="pengumuman_lemari">Lemari</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_tas', $pengumuman['pengumuman_tas'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_tas" id="pengumuman_tas" class="border-clr1 me-1">
                            <label for="pengumuman_tas">Tas ransel</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_jas', $pengumuman['pengumuman_jas'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_jas" id="pengumuman_jas" class="border-clr1 me-1">
                            <label for="pengumuman_jas">Jas almamater</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_olahraga', $pengumuman['pengumuman_olahraga'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_olahraga" id="pengumuman_olahraga" class="border-clr1 me-1">
                            <label for="pengumuman_olahraga">Seragam olahraga</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_koko', $pengumuman['pengumuman_koko'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_koko" id="pengumuman_koko" class="border-clr1 me-1">
                            <label for="pengumuman_koko">Baju taqwa</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_sarung', $pengumuman['pengumuman_sarung'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_sarung" id="pengumuman_sarung" class="border-clr1 me-1">
                            <label for="pengumuman_sarung">Sarung</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_kopiah', $pengumuman['pengumuman_kopiah'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_kopiah" id="pengumuman_kopiah" class="border-clr1 me-1">
                            <label for="pengumuman_kopiah">Kopyah</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_bukukitab', $pengumuman['pengumuman_bukukitab'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_bukukitab" id="pengumuman_bukukitab" class="border-clr1 me-1">
                            <label for="pengumuman_bukukitab">Buku pembelajaran dan kitab-kitab</label>
                        </div>
                        <div class="">
                            <input <?= (old('pengumuman_bukubio', $pengumuman['pengumuman_bukubio'] ?? '') ? 'checked' : '') ?> value="1"  type="checkbox" name="pengumuman_bukubio" id="pengumuman_bukubio" class="border-clr1 me-1">
                            <label for="pengumuman_bukubio">Buku biografi KH. Hasyim Muzadi</label>
                        </div>
                        <button type="submit" class="btn btn-clr1 p-0 px-3 mt-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>