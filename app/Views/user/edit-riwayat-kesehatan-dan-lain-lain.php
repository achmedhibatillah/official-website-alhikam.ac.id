<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">RIWAYAT KESEHATAN DAN LAIN-LAIN</h1>
<form action="<?= base_url('simpan-riwayat-kesehatan-dan-lain-lain') ?>" method="post" class="mt-4">
<input type="hidden" name="rk_id" value="<?= $rk['rk_id'] ?>">
<div class="text-clr1 row m-0 p-0">

    <div class="col-md-6 m-0 p-0 px-3 px-md-3">
        <h4 class=" bg-clr1 text-clr2 rounded py-3 px-4 fw-bold ls-xs mb-4 mx-2">IV. RIWAYAT KESEHATAN</h4>
        <!-- Gplongan Darah -->
        <div class="mt-3">
            <label for="rk_golongandarah" class="form-label mb-0 fsz-14 ls-1 fw-bold">A. Golongan Darah:</label>
            <select name="rk_golongandarah" class="form-select input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= isset(session()->getFlashdata('errors-rk')['rk_golongandarah']) ? 'is-invalid' : '' ?>" id="rk_golongandarah">
                <option value="" disabled <?= old('rk_golongandarah') || (isset($rk['rk_golongandarah']) && $rk['rk_golongandarah'] !== '') ? '' : 'selected' ?>>Pilih Golongan Darah</option>
                <option value="1" <?= old('rk_golongandarah') == '1' || (isset($rk['rk_golongandarah']) && $rk['rk_golongandarah'] == '1') ? 'selected' : '' ?>>A</option>
                <option value="2" <?= old('rk_golongandarah') == '2' || (isset($rk['rk_golongandarah']) && $rk['rk_golongandarah'] == '2') ? 'selected' : '' ?>>B</option>
                <option value="3" <?= old('rk_golongandarah') == '3' || (isset($rk['rk_golongandarah']) && $rk['rk_golongandarah'] == '3') ? 'selected' : '' ?>>AB</option>
                <option value="4" <?= old('rk_golongandarah') == '4' || (isset($rk['rk_golongandarah']) && $rk['rk_golongandarah'] == '4') ? 'selected' : '' ?>>O</option>
                <option value="5" <?= old('rk_golongandarah') == '5' || (isset($rk['rk_golongandarah']) && $rk['rk_golongandarah'] == '5') ? 'selected' : '' ?>>-</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-rk')['rk_golongandarah'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-rk')['rk_golongandarah'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Penyakit yang Pernah Dialami -->
        <div class="mt-3">
            <label for="rk_pernah_penyakit" class="form-label mb-0 fsz-14 ls-1 fw-bold">B. Penyakit yang Pernah Dialami:</label>
            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalTambahPenyakitPernah">Tambah</button>
            <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_pernah_penyakit'])): ?>
                <div class="ls-s fsz-12 text-danger mt--1">
                    <?= session()->getFlashdata('errors-rk')['rk_pernah_penyakit'] ?>
                </div>
            <?php endif; ?>
            <?php foreach($rk['penyakit_pernah'] as $x) : ?>
                <div class="card bg-clr4 border-clr1 mt-1 ls-s fsz-14 p-0 ps-3 py-1">
                    <div class="row m-0 p-0">
                        <div class="col-9 m-0 p-0"><?= $x['rk_pernah_penyakit'] ?></div>
                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-penyakit-pernah-dialami/') . $x['rk_pernah_id'] ?>" class="btn btn-sm btn-danger px-3 p-0 fsz-10 d-flex align-items-center"><i class="fas fa-trash me-1"></i> hapus</a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Penyakit yang Sedang Dialami -->
        <div class="mt-3">
            <label for="rk_sedang_penyakit" class="form-label mb-0 fsz-14 ls-1 fw-bold">C. Penyakit yang Sedang Dialami:</label>
            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalTambahPenyakitSedang">Tambah</button>
            <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_sedang_penyakit'])): ?>
                <div class="ls-s fsz-12 text-danger mt--1">
                    <?= session()->getFlashdata('errors-rk')['rk_sedang_penyakit'] ?>
                </div>
            <?php endif; ?>
            <?php foreach($rk['penyakit_sedang'] as $x) : ?>
                <div class="card bg-clr4 border-clr1 mt-1 ls-s fsz-14 p-0 ps-3 py-1">
                    <div class="row m-0 p-0">
                        <div class="col-9 m-0 p-0"><?= $x['rk_sedang_penyakit'] ?></div>
                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-penyakit-sedang-dialami/') . $x['rk_sedang_penyakit'] ?>" class="btn btn-sm btn-danger px-3 p-0 fsz-10 d-flex align-items-center"><i class="fas fa-trash me-1"></i> hapus</a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Perawatan -->
        <div class="mt-3">
            <label for="rk_perawatan" class="form-label mb-0 fsz-14 ls-1 fw-bold">D. Pernah Menjalani Perawatan:</label>
            <select name="rk_perawatan" class="form-select input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= isset(session()->getFlashdata('errors-rk')['rk_perawatan']) ? 'is-invalid' : '' ?>" id="rk_perawatan">
                <option value="" disabled <?= old('rk_perawatan') || (isset($rk['rk_perawatan']) && $rk['rk_perawatan'] !== '') ? '' : 'selected' ?>>Pilih</option>
                <option value="1" <?= old('rk_perawatan') == '1' || (isset($rk['rk_perawatan']) && $rk['rk_perawatan'] == '1') ? 'selected' : '' ?>>Iya</option>
                <option value="2" <?= old('rk_perawatan') == '2' || (isset($rk['rk_perawatan']) && $rk['rk_perawatan'] == '2') ? 'selected' : '' ?>>Tidak</option>
                <option value="3" <?= old('rk_perawatan') == '3' || (isset($rk['rk_perawatan']) && $rk['rk_perawatan'] == '3') ? 'selected' : '' ?>>Jalan</option>
                <option value="4" <?= old('rk_perawatan') == '4' || (isset($rk['rk_perawatan']) && $rk['rk_perawatan'] == '4') ? 'selected' : '' ?>>Inap</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-rk')['rk_perawatan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-rk')['rk_perawatan'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Kontak -->
        <div class="mt-3">
            <p for="rk_perawatan" class="form-label mb-1 fsz-14 lh-1 fw-bold ls-1">E. Apabila terjadi hal-hal yang mendesak atas diri saya, orang yang mudah dihubungi segera adalah:</p>
            <!-- Nama -->
            <table class="mt-1">
                <tr>
                    <td style="width:2%;" class="fsz-14 ls-1 fw-bold ">1.</td>
                    <td style="width:30%;">
                        <p for="rk_kontak_nama" class="form-label mb-0 fsz-14 ls-1 fw-bold lh-1">Nama Lengkap:</p>
                    </td>
                    <td style="width:78%;">
                        <input name="rk_kontak_nama" type="text" class="form-control he-28 input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_kontak_nama']) ? 'is-invalid' : '' ?>" id="rk_kontak_nama" autocomplete="off" placeholder="Nama Lengkap" 
                        value="<?= old('rk_kontak_nama') ? old('rk_kontak_nama') : (isset($rk['rk_kontak_nama']) ? $rk['rk_kontak_nama'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_kontak_nama'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-rk')['rk_kontak_nama'] ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:2%;" class="fsz-14 ls-1 fw-bold ">2.</td>
                    <td style="width:30%;">
                        <p for="rk_kontak_alamat" class="form-label mb-0 fsz-14 ls-1 fw-bold lh-1">Alamat Lengkap:</p>
                    </td>
                    <td style="width:78%;">
                        <input name="rk_kontak_alamat" type="text" class="form-control mt-1 he-28 input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_kontak_alamat']) ? 'is-invalid' : '' ?>" id="rk_kontak_alamat" autocomplete="off" placeholder="Alamat Lengkap" 
                        value="<?= old('rk_kontak_alamat') ? old('rk_kontak_alamat') : (isset($rk['rk_kontak_alamat']) ? $rk['rk_kontak_alamat'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_kontak_alamat'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-rk')['rk_kontak_alamat'] ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:2%;" class="fsz-14 ls-1 fw-bold ">3.</td>
                    <td style="width:30%;">
                        <p for="rk_kontak_hp" class="form-label mb-0 fsz-14 ls-1 fw-bold lh-1">No Telp/WA:</p>
                    </td>
                    <td style="width:78%;">
                        <input name="rk_kontak_hp" type="number" class="form-control mt-1 he-28 input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_kontak_hp']) ? 'is-invalid' : '' ?>" id="rk_kontak_hp" autocomplete="off" placeholder="08.. / 62.." 
                        value="<?= old('rk_kontak_hp') ? old('rk_kontak_hp') : (isset($rk['rk_kontak_hp']) ? $rk['rk_kontak_hp'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_kontak_hp'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-rk')['rk_kontak_hp'] ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<button type="submit" class="btn btn-clr1 mt-4 ms-5">Simpan</button>
</form>
</section>

<div class="modal fade" id="modalTambahPenyakitPernah" tabindex="-1" aria-labelledby="modalTambahPenyakitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTambahPenyakitLabel text-clr1">Tambah Penyakit yang Pernah Dialami</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-penyakit-pernah-dialami') ?>" method="post">
                    <input type="hidden" name="rk_id" value="<?= $rk['rk_id'] ?>">
                    <div class="mb-3">
                        <input name="rk_pernah_penyakit" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_pernah_penyakit']) ? 'is-invalid' : '' ?>" id="rk_pernah_penyakit" autocomplete="off" placeholder="Masukkan Nama Penyakit" 
                        value="<?= old('rk_pernah_penyakit') ?>">
                        
                        <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_pernah_penyakit'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-rk')['rk_pernah_penyakit'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-sm btn-clr1 fsz-12">Simpan</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTambahPenyakitSedang" tabindex="-1" aria-labelledby="modalTambahPenyakitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTambahPenyakitLabel text-clr1">Tambah Penyakit yang Sedang Dialami</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-penyakit-sedang-dialami') ?>" method="post">
                    <input type="hidden" name="rk_id" value="<?= $rk['rk_id'] ?>">
                    <div class="mb-3">
                        <input name="rk_sedang_penyakit" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_sedang_penyakit']) ? 'is-invalid' : '' ?>" id="rk_sedang_penyakit" autocomplete="off" placeholder="Masukkan Nama Penyakit" 
                        value="<?= old('rk_sedang_penyakit') ?>">
                        
                        <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_sedang_penyakit'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-rk')['rk_sedang_penyakit'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-sm btn-clr1 fsz-12">Simpan</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>