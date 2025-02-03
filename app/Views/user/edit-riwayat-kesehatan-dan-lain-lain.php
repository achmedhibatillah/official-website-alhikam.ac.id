<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">RIWAYAT KESEHATAN DAN LAIN-LAIN</h1>
<form action="<?= base_url('simpan-riwayat-kesehatan-dan-lain-lain') ?>" method="post" class="mt-4">
<input type="hidden" name="rk_id" value="<?= $rk['rk_id'] ?>">
<input type="hidden" name="lain_id" value="<?= $lain['lain_id'] ?>">
<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
        <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">IV. RIWAYAT KESEHATAN</h4> 
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
                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-penyakit-pernah-dialami/') . $x['rk_pernah_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
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
                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-penyakit-sedang-dialami/') . $x['rk_sedang_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
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
        <div class="card m-1 m-md-4 p-3">
        <h4 class=" bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">V. LAIN-LAIN</h4>
        <!-- Prestasi -->
        <div class="mt-3">
            <label for="lain_prestasi_prestasi" class="form-label mb-0 fsz-14 ls-1 fw-bold">A. Prestasi:</label>
            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalprestasi">Tambah</button>
            <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_prestasi_prestasi'])): ?>
                <div class="ls-s fsz-12 text-danger mt--1">
                    <?= session()->getFlashdata('errors-lain')['lain_prestasi_prestasi'] ?>
                </div>
            <?php endif; ?>
            <?php foreach($lain['lain_prestasi'] as $x) : ?>
                <div class="card bg-clr4 border-clr1 mt-1 ls-s fsz-14 p-0 ps-3 py-1">
                    <div class="row m-0 p-0">
                        <div class="col-9 m-0 p-0"><?= $x['lain_prestasi_prestasi'] ?></div>
                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-prestasi/') . $x['lain_prestasi_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Organisasi -->
        <div class="mt-3">
            <label for="lain_organisasi_organisasi" class="form-label mb-0 fsz-14 ls-1 fw-bold">B. Organisasi:</label>
            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalOrganisasi">Tambah</button>
            <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_organisasi_organisasi'])): ?>
                <div class="ls-s fsz-12 text-danger mt--1">
                    <?= session()->getFlashdata('errors-lain')['lain_organisasi_organisasi'] ?>
                </div>
            <?php endif; ?>
            <?php foreach($lain['lain_organisasi'] as $x) : ?>
                <div class="card bg-clr4 border-clr1 mt-1 ls-s fsz-14 p-0 ps-3 py-1">
                    <div class="row m-0 p-0">
                        <div class="col-9 m-0 p-0"><?= $x['lain_organisasi_organisasi'] ?></div>
                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-organisasi/') . $x['lain_organisasi_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Kemampuan Diri -->
        <div class="mt-3">
            <p for="lain_organisasi_organisasi" class="form-label mb-0 fsz-14 ls-1 fw-bold">C. Kemampuan Diri:</p>
            <div class="ps-2">
                <table class="w-100 mt-2">
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">1.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Baca Tulis Al-Qur'an:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_btq_membaca" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_btq_membaca" name="lain_btq_membaca" value="1" <?= isset($lain['lain_btq_membaca']) && $lain['lain_btq_membaca'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_btq_membaca">Dapat Membaca Al-Qur'an</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_btq_menulis" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_btq_menulis" name="lain_btq_menulis" value="1" <?= isset($lain['lain_btq_menulis']) && $lain['lain_btq_menulis'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_btq_menulis">Dapat Menulis Huruf Arab</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_btq_terjemah" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_btq_terjemah" name="lain_btq_terjemah" value="1" <?= isset($lain['lain_btq_terjemah']) && $lain['lain_btq_terjemah'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_btq_terjemah">Dapat Menerjemahkan Al-Qur'an</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">2.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Pilih Salah Satu:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check ps-0">
                                <p class="d-inline">A. Sudah khatam Al-Qur'an</p>
                                <input class="rounded border-clr1 px-1 text-center" type="number" id="lain_khatam" style="width:40px;" name="lain_khatam" value="<?= old('lain_khatam') ? old('lain_khatam') : (isset($lain['lain_khatam']) ? $lain['lain_khatam'] : '') ?>" placeholder="...">
                                <p class="d-inline">kali.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check ps-0">
                                <p class="d-inline">B. Baru mampu menyelesaikan</p>
                                <input class="rounded border-clr1 px-1 text-center" type="number" id="lain_juz" style="width:40px;" name="lain_juz" value="<?= old('lain_juz') ? old('lain_juz') : (isset($lain['lain_juz']) ? $lain['lain_juz'] : '') ?>" placeholder="...">
                                <p class="d-inline">Juz.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">3.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Bahasa Asing yang Dikuasai:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_bahasa_arab" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_bahasa_arab" name="lain_bahasa_arab" value="1" <?= isset($lain['lain_bahasa_arab']) && $lain['lain_bahasa_arab'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_bahasa_arab">Bahasa Arab</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_bahasa_inggris" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_bahasa_inggris" name="lain_bahasa_inggris" value="1" <?= isset($lain['lain_bahasa_inggris']) && $lain['lain_bahasa_inggris'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_bahasa_inggris">Bahasa Inggris</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_bahasa_jepang" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_bahasa_jepang" name="lain_bahasa_jepang" value="1" <?= isset($lain['lain_bahasa_jepang']) && $lain['lain_bahasa_jepang'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_bahasa_jepang">Bahasa Jepang</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalBahasa">Tambah Bahasa Lain</button>
                            <ul>
                            <?php foreach($lain['lain_bahasa'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0">Bahasa <?= $x['lain_bahasa_bahasa'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-bahasa/') . $x['lain_bahasa_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">4.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Keahlian Lain:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_keahlian_komputer" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_keahlian_komputer" name="lain_keahlian_komputer" value="1" <?= isset($lain['lain_keahlian_komputer']) && $lain['lain_keahlian_komputer'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_keahlian_komputer">Komputer</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_keahlian_elektro" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_keahlian_elektro" name="lain_keahlian_elektro" value="1" <?= isset($lain['lain_keahlian_elektro']) && $lain['lain_keahlian_elektro'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_keahlian_elektro">Elektro</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_keahlian_desain" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_keahlian_desain" name="lain_keahlian_desain" value="1" <?= isset($lain['lain_keahlian_desain']) && $lain['lain_keahlian_desain'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_keahlian_desain">Desain</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalKeahlian">Tambah Keahlian Lain</button>
                            <ul>
                            <?php foreach($lain['lain_keahlian'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0">Keahlian <?= $x['lain_keahlian_keahlian'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-keahlian/') . $x['lain_keahlian_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Kemampuan Diri -->
        <div class="mt-3">
            <p for="lain_organisasi_organisasi" class="form-label mb-0 fsz-14 ls-1 fw-bold">D. Orientasi Kegiatan Ketika Menjadi Santri Al-Hikam:</p>
            <div class="ps-2">
                <table class="w-100 mt-2">
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">1.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Bidang Olahraga:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_olahraga_footbal" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_olahraga_footbal" name="lain_olahraga_footbal" value="1" <?= isset($lain['lain_olahraga_footbal']) && $lain['lain_olahraga_footbal'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_olahraga_footbal">Football</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_olahraga_basket" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_olahraga_basket" name="lain_olahraga_basket" value="1" <?= isset($lain['lain_olahraga_basket']) && $lain['lain_olahraga_basket'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_olahraga_basket">Basket</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_olahraga_badminton" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_olahraga_badminton" name="lain_olahraga_badminton" value="1" <?= isset($lain['lain_olahraga_badminton']) && $lain['lain_olahraga_badminton'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_olahraga_badminton">Badminton</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalOlahraga">Tambah Bidang Olahraga Lain</button>
                            <ul>
                            <?php foreach($lain['lain_olahraga'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0"><?= $x['lain_olahraga_olahraga'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-olahraga/') . $x['lain_olahraga_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">2.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Bidang Seni dan Budaya:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_senbud_musik" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_senbud_musik" name="lain_senbud_musik" value="1" <?= isset($lain['lain_senbud_musik']) && $lain['lain_senbud_musik'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_senbud_musik">Musik</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_senbud_senisuara" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_senbud_senisuara" name="lain_senbud_senisuara" value="1" <?= isset($lain['lain_senbud_senisuara']) && $lain['lain_senbud_senisuara'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_senbud_senisuara">Seni Suara</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_senbud_senilukis" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_senbud_senilukis" name="lain_senbud_senilukis" value="1" <?= isset($lain['lain_senbud_senilukis']) && $lain['lain_senbud_senilukis'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_senbud_senilukis">Seni Lukis</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalSenbud">Tambah Bidang Seni dan Budaya Lain</button>
                            <ul>
                            <?php foreach($lain['lain_senbud'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0"><?= $x['lain_senbud_senbud'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-senbud/') . $x['lain_senbud_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">3.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Bidang Penalaran:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_penalaran_seminar" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_penalaran_seminar" name="lain_penalaran_seminar" value="1" <?= isset($lain['lain_penalaran_seminar']) && $lain['lain_penalaran_seminar'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_penalaran_seminar">Seminar</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_penalaran_jurnalistik" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_penalaran_jurnalistik" name="lain_penalaran_jurnalistik" value="1" <?= isset($lain['lain_penalaran_jurnalistik']) && $lain['lain_penalaran_jurnalistik'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_penalaran_jurnalistik">Jurnalistik</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_penalaran_karyatulis" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_penalaran_karyatulis" name="lain_penalaran_karyatulis" value="1" <?= isset($lain['lain_penalaran_karyatulis']) && $lain['lain_penalaran_karyatulis'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_penalaran_karyatulis">Karya Tulis</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalPenalaran">Tambah Bidang Penalaran Lain</button>
                            <ul>
                            <?php foreach($lain['lain_penalaran'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0"><?= $x['lain_penalaran_penalaran'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-penalaran/') . $x['lain_penalaran_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">4.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Bidang Keagamaan:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_agama_qiroah" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_agama_qiroah" name="lain_agama_qiroah" value="1" <?= isset($lain['lain_agama_qiroah']) && $lain['lain_agama_qiroah'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_agama_qiroah">Qiraah</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_agama_sholawat" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_agama_sholawat" name="lain_agama_sholawat" value="1" <?= isset($lain['lain_agama_sholawat']) && $lain['lain_agama_sholawat'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_agama_sholawat">Sholawat</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_agama_ptq" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_agama_ptq" name="lain_agama_ptq" value="1" <?= isset($lain['lain_agama_ptq']) && $lain['lain_agama_ptq'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_agama_ptq">Mengajar TPQ</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalAgama">Tambah Bidang Keagamaan Lain</button>
                            <ul>
                            <?php foreach($lain['lain_agama'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0"><?= $x['lain_agama_agama'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-agama/') . $x['lain_agama_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold">5.</td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s">Bidang Bahasa:</td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_bahasam_arab" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_bahasam_arab" name="lain_bahasam_arab" value="1" <?= isset($lain['lain_bahasam_arab']) && $lain['lain_bahasam_arab'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_bahasam_arab">Bahasa Arab</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_bahasam_inggris" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_bahasam_inggris" name="lain_bahasam_inggris" value="1" <?= isset($lain['lain_bahasam_inggris']) && $lain['lain_bahasam_inggris'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_bahasam_inggris">Bahasa Inggris</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <div class="form-check">
                                <input type="hidden" name="lain_bahasam_jepang" value="0">
                                <input class="form-check-input border-clr1" type="checkbox" id="lain_bahasam_jepang" name="lain_bahasam_jepang" value="1" <?= isset($lain['lain_bahasam_jepang']) && $lain['lain_bahasam_jepang'] ? 'checked' : '' ?>>
                                <label class="form-check-label mt-1" for="lain_bahasam_jepang">Bahasa Jepang</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%" class="fsz-13 fw-bold"></td>
                        <td style="width:32%" class="fsz-13 fw-bold lh-s"></td>
                        <td style="width:65%" class="fsz-13 fw-bold lh-s">
                            <button type="button" class="btn btn-clr1 p-0 px-3 ms-1 ls-s fsz-12" data-bs-toggle="modal" data-bs-target="#modalBahasam">Tambah Bidang Bahasa Lain</button>
                            <ul>
                            <?php foreach($lain['lain_bahasam'] as $x) : ?>
                                <li class="mt-2 ls-s fsz-14 p-0 ps-1 py-0" style="border-bottom:0.5px solid var(--clr1);">
                                    <div class="row m-0 p-0">
                                        <div class="col-9 m-0 p-0"><?= $x['lain_bahasam_bahasam'] ?></div>
                                        <div class="col-3 m-0 p-0 pe-2 d-flex justify-content-end"><a href="<?= base_url('hapus-bahasam/') . $x['lain_bahasam_id'] ?>" class="btn btn-sm btn-outline-danger p-0 fsz-10  px-2 pt-1"><i class="fas fa-trash"></i></a></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
        
        <div class="">
            <div class="card px-3 px-md-3 m-1 m-md-4 rounded mt-2">
                <div class="py-3">
                <div class="form-check">
                    <input class="form-check-input border-clr1" type="checkbox" id="rk_saved" name="rk_saved" value="1">
                    <label class="form-check-label text-clr1 fsz-14 mb-0" for="rk_saved">
                        Pastikan seluruh data sudah diisi dengan benar & lengkap sebelum klik tombol simpan.
                    </label>
                </div>
                <?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_saved'])): ?>
                    <div class="text-danger fsz-12 mt-0" id="errors-rk">
                        <?= session()->getFlashdata('errors-rk')['rk_saved'] ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-sm btn-outline-clr1 ls-s mt-2" style="width:140px;"><i class="fas fa-save me-2"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</section>

<?= $this->include('user/edit-riwayat-kesehatan-dan-lain-lain-modal') ?>