<div class="row m-0 p-0">

<div class="col-md-3 m-0 p-0 order-1 order-md-2">
    <div class="card mt-1 m-1 m-md-0 mt-md-4 me-1 me-md-4 py-3">
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center rounded cursor-pointer shadow-m" style="overflow:hidden;width:80px;height:100px;">
                <?php if (!empty($bp['bp_foto'])): ?> 
                    <img src="<?= base_url('/' . $bp['bp_foto']) ?>" alt="Pas foto" class="img-death">
                <?php else: ?>
                    <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death shadow">
                <?php endif; ?>
            </div>
        </div>
        <table class="table mt-3 fsz-13 ls-1 lh-1">
            <tr><td></td><td></td><td></td></tr>
            <tr>
                <td style="width:28%;">Pembayaran</td>
                <td style="width:2%;">:</td>
                <td style="width:70%;">
                    <?php if($bp['bp_saved'] == 1 && $bp['bp_konfirm'] == 0): ?>
                        <div class="text-center bg-warning text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Perlu diverifikasi</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('verifikasi-pembayaran/' . $santri['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">verifikasi di sini</a>
                        </div>
                    <?php elseif($bp['bp_saved'] == 1 && $bp['bp_konfirm'] == 1): ?>
                        <div class="text-center bg-clr1 text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Terverifikasi</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('verifikasi-pembayaran/' . $santri['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">lihat di sini</a>
                        </div>
                    <?php else: ?>
                        <div class="text-center bg-danger text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Belum membayar</div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td style="width:28%;">Tes tulis</td>
                <td style="width:2%;">:</td>
                <td style="width:70%;">
                    <?php if($tt['testulis_konfirm'] == 1 && $bp['bp_konfirm'] == 1): ?>
                        <div class="text-center bg-clr1 text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Selesai</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('atur-tes-tulis/' . $santri['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">lihat di sini</a>
                        </div>
                    <?php elseif($tt['testulis_konfirm'] == 0 && $bp['bp_konfirm'] == 1): ?>
                        <div class="text-center bg-danger text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Belum</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('atur-tes-tulis/' . $santri['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">verifikasi di sini</a>
                        </div>
                    <?php else: ?>
                        <div class="text-center bg-danger text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Belum</div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td style="width:28%;">Tes wawancara</td>
                <td style="width:2%;">:</td>
                <td style="width:70%;">
                    <?php if($tw['tw_status'] == 1): ?>
                        <div class="text-center bg-clr1 text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Selesai</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('atur-wawancara/' . $peserta['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">lihat di sini</a>
                        </div>
                    <?php elseif($tw['tw_tgl']): ?>
                        <div class="text-center bg-warning text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Menunggu</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('atur-wawancara/' . $peserta['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">verifikasi di sini</a>
                        </div>
                    <?php else: ?>
                        <div class="text-center bg-danger text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Belum</div>
                        <?php if ($tt['testulis_konfirm'] == 1): ?>
                            <div class="d-flex justify-content-center">
                                <a href="<?= base_url('atur-wawancara/' . $peserta['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">isi datanya di sini</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td style="width:28%;">SK</td>
                <td style="width:2%;">:</td>
                <td style="width:70%;">
                    <?php if($pengumuman['pengumuman_saved'] == 1): ?>
                        <div class="text-center bg-clr1 text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Sudah diumumkan</div>
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('atur-pengumuman/' . $peserta['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">lihat di sini</a>
                        </div>
                    <?php else: ?>
                        <div class="text-center bg-danger text-clr5 px-3 py-1 rounded lh-s ls-s fsz-12">Belum</div>
                        <?php if ($tw['tw_status'] == 1): ?>
                            <div class="d-flex justify-content-center">
                                <a href="<?= base_url('atur-pengumuman/' . $peserta['peserta_id']) ?>" class="fsz-11 ls-s lh-1 mt-1">beri di sini</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="col-md-9 m-0 p-0 order-2 order-md-1">
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">I. IDENTITAS CALON SANTRI</h4>
        <table>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">1. Nama Lengkap</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= ($santri['santri_nama']) ? $santri['santri_nama'] : $peserta['peserta_nama'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">2. Nama Panggilan</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= ($santri['santri_panggilan']) ? $santri['santri_panggilan'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">3. NIK</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= ($santri['santri_nik']) ? $santri['santri_nik'] : $peserta['peserta_ktp'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">4. Tempat dan Tanggal Lahir</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= ($santri['santri_tempatlahir']) ? $santri['santri_tempatlahir'] . ', ' . date('d M Y', strtotime($santri['santri_tanggallahir'])) : '<div class="text-secondary fst-italic">Belum diisi</div>' ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">5. Alamat Asal</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= ($santri['santri_alamat']) ? $santri['santri_alamat'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">6. Kedudukan dalam Keluarga</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"> <?= ($santri['santri_anakke']) ? 'Anak ke ' . $santri['santri_anakke'] . ', dari ' . $santri['santri_bersaudara']. ' bersaudara' : '<div class="text-secondary fst-italic">Belum diisi</div>' ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">7. Nomor HP/Whatsapp:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_hp'] ? '+' . $santri['santri_hp'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?></td>
            </tr>
        </table>
    </div>

    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">II. PENDIDIKAN CALON SANTRI</h4>
        <p class="ls-1 mb-0 fw-bold">1. Riwayat Pendidikan</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">a. SD / MI</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">Masuk tahun <?= $santri['santri_sdmasuk'] ?>, lulus tahun <?= $santri['santri_sdlulus'] ?> (<?= $santri['santri_sdlulus'] - $santri['santri_sdmasuk'] ?> tahun)</td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">b. SMP / MTs</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    Masuk tahun <?= $santri['santri_smpmasuk'] ?>, lulus tahun <?= $santri['santri_smplulus'] ?> (<?= $santri['santri_smplulus'] - $santri['santri_smpmasuk'] ?> tahun)
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">c. SMU / MA / SMK</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    Masuk tahun <?= $santri['santri_smamasuk'] ?>, lulus tahun <?= $santri['santri_smalulus'] ?> (<?= $santri['santri_smalulus'] - $santri['santri_smamasuk'] ?> tahun)
                </td>
            </tr>
        </table>
        <p class="ls-1 mt-4 mb-0 fw-bold">2. Pendidikan Asal</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">a. SMU / MA / SMK</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_pa'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">b. Alamat</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_pa_alamat'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">c. Jurusan</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_pa_jurusan'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">d. Tahun Kelulusan</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_pa_lulus'] ?></td>
            </tr>
        </table>
        <p class="ls-1 mt-4 mb-0 fw-bold">3. Pendidikan Saat Ini</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">a. Perguruan Tinggi</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_ps_pt'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">b. Fakultas</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_ps_fakultas'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">c. Program Studi</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_ps_prodi'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">d. Tahun Masuk</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_ps_masuk'] ?></td>
            </tr>
        </table>
    </div>

    <!-- Ortu -->
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">III. A. IDENTITAS AYAH</h4>
        <?php if ($santri['ortu_saved'] == 1): ?>
        <table>
            <tr><td style="width:30%;">Nama</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_a_nama'] ?></td></tr>
            <tr><td style="width:30%;">Pekerjaan</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_a_pekerjaan_string'] ?> <?= !empty($ortu['ortu_a_pekerjaan_lain']) ? '(' . $ortu['ortu_a_pekerjaan_lain'] . ')' : '' ?></td></tr>
            <tr><td style="width:30%;">Agama</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_a_agama_string'] ?> <?= !empty($ortu['ortu_a_agama_lain']) ? '(' . $ortu['ortu_a_agama_lain'] . ')' : '' ?></td></tr>
            <tr><td style="width:30%;">Pendidikan</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_a_pendidikan_string'] ?> <?= !empty($ortu['ortu_a_pendidikan_lain']) ? '(' . $ortu['ortu_a_pendidikan_lain'] . ')' : '' ?></td></tr>
            <tr><td style="width:30%;">No. HP</td><td style="width:3%;">:</td><td style="width:67%;">+<?= $ortu['ortu_a_hp'] ?></td></tr>
            <tr><td style="width:30%;">Pendapatan</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_a_pendapatan'] ?></td></tr>
        </table>
        <?php else: ?>
            <div class="alert alert-danger text-center lh-1 ls-1">data belum diisi</div>
        <?php endif; ?>
    </div>
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">III. B. IDENTITAS IBU</h4>
        <?php if ($santri['ortu_saved'] == 1): ?>
        <table>
            <tr><td style="width:30%;">Nama</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_i_nama'] ?></td></tr>
            <tr><td style="width:30%;">Pekerjaan</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_i_pekerjaan_string'] ?> <?= !empty($ortu['ortu_i_pekerjaan_lain']) ? '(' . $ortu['ortu_i_pekerjaan_lain'] . ')' : '' ?></td></tr>
            <tr><td style="width:30%;">Agama</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_i_agama_string'] ?> <?= !empty($ortu['ortu_i_agama_lain']) ? '(' . $ortu['ortu_i_agama_lain'] . ')' : '' ?></td></tr>
            <tr><td style="width:30%;">Pendidikan</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_i_pendidikan_string'] ?> <?= !empty($ortu['ortu_i_pendidikan_lain']) ? '(' . $ortu['ortu_i_pendidikan_lain'] . ')' : '' ?></td></tr>
            <tr><td style="width:30%;">No. HP</td><td style="width:3%;">:</td><td style="width:67%;">+<?= $ortu['ortu_i_hp'] ?></td></tr>
            <tr><td style="width:30%;">Pendapatan</td><td style="width:3%;">:</td><td style="width:67%;"><?= $ortu['ortu_i_pendapatan'] ?></td></tr>
        </table>
        <?php else: ?>
            <div class="alert alert-danger text-center lh-1 ls-1">data belum diisi</div>
        <?php endif; ?>
    </div>

    <!-- RK -->
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">IV. RIWAYAT KESEHATAN</h4>
        <?php if ($santri['rk_saved'] == 1): ?>
        <table>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">A. Golongan Darah</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $rk['rk_golongandarah_string'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">B. Penyakit yang Pernah Dialami</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ps-3">
                        <?php if($rk['penyakit_pernah']): ?>
                            <?php foreach($rk['penyakit_pernah'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['rk_pernah_penyakit'] ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>-
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">C. Penyakit yang Sedang Dialami</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ps-3">
                        <?php if($rk['penyakit_sedang']): ?>
                            <?php foreach($rk['penyakit_sedang'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['rk_sedang_penyakit'] ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>-
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">D. Pernah Menjalani Perawatan?</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $rk['rk_perawatan_string'] ?></td>
            </tr>
        </table>
        <p class="ls-1 lh-1 mt-5 mb-1">Apabila terdapat hal-hal mendesak, yang dapat dihubungi segera adalah:</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- Nama</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $rk['rk_kontak_nama'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- Alamat</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $rk['rk_kontak_alamat'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- No Telp/WA</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $rk['rk_kontak_hp'] ?></td>
            </tr>
        </table>
        <?php else: ?>
            <div class="alert alert-danger text-center lh-1 ls-1">data belum diisi</div>
        <?php endif; ?>
    </div>
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">V. LAIN-LAIN</h4>
        <?php if ($santri['rk_saved'] == 1): ?>
        <table>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">A. Prestasi yang pernah dicapai:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_prestasi']): ?>
                            <?php foreach($lain['lain_prestasi'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_prestasi_prestasi'] ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">B. Pengalaman Berorganisasi</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_organisasi']): ?>
                            <?php foreach($lain['lain_organisasi'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_organisasi_organisasi'] ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
        </table>
        <p class="ls-1 lh-1 mt-3 mb-1">C. Kemampuan Diri:</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">1. Baca Tulis Al-Qur'an</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_btq_membaca'] == 1): ?>
                            <li class="ls-1 lh-1">Dapat Membaca Al-Qur'an</li>
                        <?php endif; ?>
                        <?php if($lain['lain_btq_menulis'] == 1): ?>
                            <li class="ls-1 lh-1">Dapat Menulis Huruf Arab</li>
                        <?php endif; ?>
                        <?php if($lain['lain_btq_terjemah'] == 1): ?>
                            <li class="ls-1 lh-1">Dapat Menerjemahkan Al-Qur'an</li>
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
        </table>
        <p class="ls-1 lh-1 mt-3 ms-3 mb-1">2. Sudah khatam Al-Qur'an <?= $lain['lain_khatam'] ?> kali dan baru mampu menyelesaikan <?= $lain['lain_juz'] ?> juz.</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">3. Bahasa Asing yang Dikuasai</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_bahasa_arab'] == 1): ?>
                            <li class="ls-1 lh-1">Bahasa Arab</li>
                        <?php endif; ?>
                        <?php if($lain['lain_bahasa_inggris'] == 1): ?>
                            <li class="ls-1 lh-1">Bahasa Inggris</li>
                        <?php endif; ?>
                        <?php if($lain['lain_bahasa_jepang'] == 1): ?>
                            <li class="ls-1 lh-1">Bahasa Jepang</li>
                        <?php endif ?>
                        <?php if($lain['lain_bahasa']): ?>
                            <?php foreach($lain['lain_bahasa'] as $x) : ?>
                                <li class="ls-1 lh-1">Bahasa <?= $x['lain_bahasa_bahasa'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">4. Keahlian Lain</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_keahlian_komputer'] == 1): ?>
                            <li class="ls-1 lh-1">Komputer</li>
                        <?php endif; ?>
                        <?php if($lain['lain_keahlian_elektro'] == 1): ?>
                            <li class="ls-1 lh-1">Elektro</li>
                        <?php endif; ?>
                        <?php if($lain['lain_keahlian_desain'] == 1): ?>
                            <li class="ls-1 lh-1">Desain</li>
                        <?php endif ?>
                        <?php if($lain['lain_keahlian']): ?>
                            <?php foreach($lain['lain_keahlian'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_keahlian_keahlian'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
        </table>
        <p class="ls-1 lh-1 mt-3 mb-1">D.Orientasi Ketika Menjadi Santri Al-Hikam:</p>
        <table class="ms-3">
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">1. Bidang Olahraga</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_olahraga_footbal'] == 1): ?>
                            <li class="ls-1 lh-1">Football</li>
                        <?php endif; ?>
                        <?php if($lain['lain_olahraga_basket'] == 1): ?>
                            <li class="ls-1 lh-1">Basket</li>
                        <?php endif; ?>
                        <?php if($lain['lain_olahraga_badminton'] == 1): ?>
                            <li class="ls-1 lh-1">Badminton</li>
                        <?php endif ?>
                        <?php if($lain['lain_olahraga']): ?>
                            <?php foreach($lain['lain_olahraga'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_olahraga_olahraga'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">2. Bidang Seni dan Budaya</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_senbud_musik'] == 1): ?>
                            <li class="ls-1 lh-1">Musik</li>
                        <?php endif; ?>
                        <?php if($lain['lain_senbud_senisuara'] == 1): ?>
                            <li class="ls-1 lh-1">Seni Suara</li>
                        <?php endif; ?>
                        <?php if($lain['lain_senbud_senilukis'] == 1): ?>
                            <li class="ls-1 lh-1">Seni Lukis</li>
                        <?php endif ?>
                        <?php if($lain['lain_senbud']): ?>
                            <?php foreach($lain['lain_senbud'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_senbud_senbud'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">3. Bidang Penalaran</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_penalaran_seminar'] == 1): ?>
                            <li class="ls-1 lh-1">Seminar</li>
                        <?php endif; ?>
                        <?php if($lain['lain_penalaran_jurnalistik'] == 1): ?>
                            <li class="ls-1 lh-1">Jurnalistik</li>
                        <?php endif; ?>
                        <?php if($lain['lain_penalaran_karyatulis'] == 1): ?>
                            <li class="ls-1 lh-1">Karya Tulis</li>
                        <?php endif ?>
                        <?php if($lain['lain_penalaran']): ?>
                            <?php foreach($lain['lain_penalaran'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_penalaran_penalaran'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">4. Bidang Keagamaan</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_agama_qiroah'] == 1): ?>
                            <li class="ls-1 lh-1">Qiro'ah</li>
                        <?php endif; ?>
                        <?php if($lain['lain_agama_sholawat'] == 1): ?>
                            <li class="ls-1 lh-1">Sholawat</li>
                        <?php endif; ?>
                        <?php if($lain['lain_agama_ptq'] == 1): ?>
                            <li class="ls-1 lh-1">Mengajar TPQ</li>
                        <?php endif ?>
                        <?php if($lain['lain_agama']): ?>
                            <?php foreach($lain['lain_agama'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['lain_agama_agama'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">5. Bidang Bahasa</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php if($lain['lain_bahasam_arab'] == 1): ?>
                            <li class="ls-1 lh-1">Bahasa Arab</li>
                        <?php endif; ?>
                        <?php if($lain['lain_bahasam_inggris'] == 1): ?>
                            <li class="ls-1 lh-1">Bahasa Inggris</li>
                        <?php endif; ?>
                        <?php if($lain['lain_bahasam_jepang'] == 1): ?>
                            <li class="ls-1 lh-1">Bahasa Jepang</li>
                        <?php endif ?>
                        <?php if($lain['lain_bahasam']): ?>
                            <?php foreach($lain['lain_bahasam'] as $x) : ?>
                                <li class="ls-1 lh-1">Bahasa <?= $x['lain_bahasam_bahasam'] ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
        </table>
        <?php else: ?>
            <div class="alert alert-danger text-center lh-1 ls-1">data belum diisi</div>
        <?php endif; ?>
    </div>

</div>

</div>