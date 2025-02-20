<style>
    .card {
        width: 100%;
        padding: 15px;
        margin: 10px 0;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background: #fff;
    }
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80px;
        height: 100px;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }
    .image-container img {
        width: 100%;
        height: auto;
    }
    .status {
        text-align: center;
        padding: 5px;
        border-radius: 5px;
        font-size: 12px;
    }
    .status-warning { background-color: orange; color: white; }
    .status-success { background-color: green; color: white; }
    .status-danger { background-color: red; color: white; }
    table {
        width: 100%;
        font-size: 13px;
    }
    td {
        padding: 5px;
    }
</style>

<div style="border: 1px solid #000; margin: 10px; padding: 15px; background-color: green;">
    <h4 style="text-align:center;font-weight:bold;">DATA SANTRI</h4>
    <h1 style="text-align:center;font-weight:bold;">PENERIMAAN SANTRI BARU</h1>
    <h3 style="text-align:center;font-weight:bold;">PESANTREN MAHASISWA ALHIKAM MALANG</h3>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h1 style="text-align:center;font-weight:bold;"><?= $santri['santri_nama'] ?: $peserta['peserta_nama'] ?></h1>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <table>
        <tr>
            <td>Pembayaran</td>
            <td>:</td>
            <td>
                <div class="status <?= $bp['bp_saved'] == 1 ? ($bp['bp_konfirm'] == 1 ? 'status-success' : 'status-warning') : 'status-danger' ?>">
                    <?= $bp['bp_saved'] == 1 ? ($bp['bp_konfirm'] == 1 ? 'Terverifikasi' : 'Perlu diverifikasi') : 'Belum membayar' ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Tes Tulis</td>
            <td>:</td>
            <td>
                <div class="status <?= $tt['testulis_konfirm'] == 1 ? 'status-success' : 'status-danger' ?>">
                    <?= $tt['testulis_konfirm'] == 1 ? 'Selesai' : 'Belum' ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Tes Wawancara</td>
            <td>:</td>
            <td>
                <div class="status <?= $tw['tw_status'] == 1 ? 'status-success' : ($tw['tw_tgl'] ? 'status-warning' : 'status-danger') ?>">
                    <?= $tw['tw_status'] == 1 ? 'Selesai' : ($tw['tw_tgl'] ? 'Menunggu' : 'Belum') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>SK</td>
            <td>:</td>
            <td>
                <div class="status <?= $pengumuman['pengumuman_saved'] == 1 ? 'status-success' : 'status-danger' ?>">
                    <?= $pengumuman['pengumuman_saved'] == 1 ? 'Sudah diumumkan' : 'Belum' ?>
                </div>
            </td>
        </tr>
    </table>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h4 style="background: #ddd; padding: 10px; font-weight: bold; margin-bottom: 20px;">I. IDENTITAS CALON SANTRI</h4>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 30%; padding: 5px;">1. Nama Lengkap</td>
            <td style="width: 3%;">:</td>
            <td style="width: 67%; padding: 5px;"><?= $santri['santri_nama'] ?: $peserta['peserta_nama'] ?></td>
        </tr>
        <tr>
            <td style="padding: 5px;">2. Nama Panggilan</td>
            <td>:</td>
            <td style="padding: 5px;"><?= $santri['santri_panggilan'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?></td>
        </tr>
        <tr>
            <td style="padding: 5px;">3. NIK</td>
            <td>:</td>
            <td style="padding: 5px;"><?= $santri['santri_nik'] ?: $peserta['peserta_ktp'] ?></td>
        </tr>
        <tr>
            <td style="padding: 5px;">4. Tempat dan Tanggal Lahir</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_tempatlahir'] ? $santri['santri_tempatlahir'] . ', ' . date('d M Y', strtotime($santri['santri_tanggallahir'])) : '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">5. Alamat Asal</td>
            <td>:</td>
            <td style="padding: 5px;"><?= $santri['santri_alamat'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?></td>
        </tr>
        <tr>
            <td style="padding: 5px;">6. Kedudukan dalam Keluarga</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_anakke'] ? 'Anak ke ' . $santri['santri_anakke'] . ', dari ' . $santri['santri_bersaudara']. ' bersaudara' : '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">7. Nomor HP/Whatsapp</td>
            <td>:</td>
            <td style="padding: 5px;"><?= $santri['santri_hp'] ? '+' . $santri['santri_hp'] : '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?></td>
        </tr>
    </table>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h4 style="background: #ddd; padding: 10px; font-weight: bold; margin-bottom: 20px;">II. PENDIDIKAN CALON SANTRI</h4>
    
    <p style="font-weight: bold; margin-bottom: 5px;">1. Riwayat Pendidikan</p>
    <table style="width: 100%; border-collapse: collapse; margin-left: 15px;">
        <tr>
            <td style="width: 30%; padding: 5px;">a. SD / MI</td>
            <td style="width: 3%;">:</td>
            <td style="width: 67%; padding: 5px;">
                Masuk tahun <?= $santri['santri_sdmasuk'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>, 
                lulus tahun <?= $santri['santri_sdlulus'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?> 
                (<?= $santri['santri_sdlulus'] && $santri['santri_sdmasuk'] ? $santri['santri_sdlulus'] - $santri['santri_sdmasuk'] . ' tahun' : '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>)
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">b. SMP / MTs</td>
            <td>:</td>
            <td style="padding: 5px;">
                Masuk tahun <?= $santri['santri_smpmasuk'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>, 
                lulus tahun <?= $santri['santri_smplulus'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?> 
                (<?= $santri['santri_smplulus'] && $santri['santri_smpmasuk'] ? $santri['santri_smplulus'] - $santri['santri_smpmasuk'] . ' tahun' : '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>)
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">c. SMU / MA / SMK</td>
            <td>:</td>
            <td style="padding: 5px;">
                Masuk tahun <?= $santri['santri_smamasuk'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>, 
                lulus tahun <?= $santri['santri_smalulus'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?> 
                (<?= $santri['santri_smalulus'] && $santri['santri_smamasuk'] ? $santri['santri_smalulus'] - $santri['santri_smamasuk'] . ' tahun' : '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>)
            </td>
        </tr>
    </table>
    
    <p style="font-weight: bold; margin-top: 15px;">2. Pendidikan Asal</p>
    <table style="width: 100%; border-collapse: collapse; margin-left: 15px;">
        <tr>
            <td style="width: 30%; padding: 5px;">a. SMU / MA / SMK</td>
            <td style="width: 3%;">:</td>
            <td style="width: 67%; padding: 5px;">
                <?= $santri['santri_pa'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">b. Alamat</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_pa_alamat'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">c. Jurusan</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_pa_jurusan'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">d. Tahun Kelulusan</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_pa_lulus'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
    </table>
    
    <p style="font-weight: bold; margin-top: 15px;">3. Pendidikan Saat Ini</p>
    <table style="width: 100%; border-collapse: collapse; margin-left: 15px;">
        <tr>
            <td style="width: 30%; padding: 5px;">a. Perguruan Tinggi</td>
            <td style="width: 3%;">:</td>
            <td style="width: 67%; padding: 5px;">
                <?= $santri['santri_ps_pt'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">b. Fakultas</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_ps_fakultas'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">c. Program Studi</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_ps_prodi'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">d. Tahun Masuk</td>
            <td>:</td>
            <td style="padding: 5px;">
                <?= $santri['santri_ps_masuk'] ?: '<span style="color: gray; font-style: italic;">Belum diisi</span>' ?>
            </td>
        </tr>
    </table>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h4 style="background: #ddd; padding: 10px; font-weight: bold; margin-bottom: 20px;">III. A. IDENTITAS AYAH</h4>
    <?php if ($santri['ortu_saved'] == 1): ?>
    <table>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Nama</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $ortu['ortu_a_nama'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Pekerjaan</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_a_pekerjaan_string']) ? $ortu['ortu_a_pekerjaan_string'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
                <?= !empty($ortu['ortu_a_pekerjaan_lain']) ? '(' . $ortu['ortu_a_pekerjaan_lain'] . ')' : '' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Agama</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_a_agama_string']) ? $ortu['ortu_a_agama_string'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
                <?= !empty($ortu['ortu_a_agama_lain']) ? '(' . $ortu['ortu_a_agama_lain'] . ')' : '' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Pendidikan</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_a_pendidikan_string']) ? $ortu['ortu_a_pendidikan_string'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
                <?= !empty($ortu['ortu_a_pendidikan_lain']) ? '(' . $ortu['ortu_a_pendidikan_lain'] . ')' : '' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">No. HP</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_a_hp']) ? '+' . $ortu['ortu_a_hp'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Pendapatan</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_a_pendapatan']) ? $ortu['ortu_a_pendapatan'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
    </table>
    <?php else: ?>
        <div class="alert alert-danger text-center lh-1 ls-1">Data belum diisi</div>
    <?php endif; ?>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h4 style="background: #ddd; padding: 10px; font-weight: bold; margin-bottom: 20px;">III. B. IDENTITAS IBU</h4>
    <?php if ($santri['ortu_saved'] == 1): ?>
    <table>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Nama</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $ortu['ortu_i_nama'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Pekerjaan</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_i_pekerjaan_string']) ? $ortu['ortu_i_pekerjaan_string'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
                <?= !empty($ortu['ortu_i_pekerjaan_lain']) ? '(' . $ortu['ortu_i_pekerjaan_lain'] . ')' : '' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Agama</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_i_agama_string']) ? $ortu['ortu_i_agama_string'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
                <?= !empty($ortu['ortu_i_agama_lain']) ? '(' . $ortu['ortu_i_agama_lain'] . ')' : '' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Pendidikan</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_i_pendidikan_string']) ? $ortu['ortu_i_pendidikan_string'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
                <?= !empty($ortu['ortu_i_pendidikan_lain']) ? '(' . $ortu['ortu_i_pendidikan_lain'] . ')' : '' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">No. HP</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_i_hp']) ? '+' . $ortu['ortu_i_hp'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">Pendapatan</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= !empty($ortu['ortu_i_pendapatan']) ? $ortu['ortu_i_pendapatan'] : '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
    </table>
    <?php else: ?>
        <div class="alert alert-danger text-center lh-1 ls-1">Data belum diisi</div>
    <?php endif; ?>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h4 style="background: #ddd; padding: 10px; font-weight: bold; margin-bottom: 20px;">IV. RIWAYAT KESEHATAN</h4>
    <?php if ($santri['rk_saved'] == 1): ?>
    <table>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">A. Golongan Darah</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $rk['rk_golongandarah_string'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">B. Penyakit yang Pernah Dialami</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <ul style="margin-left: -30px;">
                    <?php if (!empty($rk['penyakit_pernah'])): ?>
                        <?php foreach ($rk['penyakit_pernah'] as $x): ?>
                            <li class="ls-1 lh-1"><?= $x['rk_pernah_penyakit'] ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="margin-left: -10px;">Tidak ada</div>
                    <?php endif; ?>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">C. Penyakit yang Sedang Dialami</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <ul style="margin-left: -30px;">
                    <?php if (!empty($rk['penyakit_sedang'])): ?>
                        <?php foreach ($rk['penyakit_sedang'] as $x): ?>
                            <li class="ls-1 lh-1"><?= $x['rk_sedang_penyakit'] ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="margin-left: -10px;">Tidak ada</div>
                    <?php endif; ?>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">D. Pernah Menjalani Perawatan?</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $rk['rk_perawatan_string'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
    </table>

    <p class="ls-1 lh-1 mt-5 mb-1">Apabila terdapat hal-hal mendesak, yang dapat dihubungi segera adalah:</p>
    <table class="ms-3">
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- Nama</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $rk['rk_kontak_nama'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- Alamat</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $rk['rk_kontak_alamat'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- No Telp/WA</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <?= $rk['rk_kontak_hp'] ?: '<div class="text-secondary fst-italic">Belum diisi</div>' ?>
            </td>
        </tr>
    </table>
    <?php else: ?>
        <div class="alert alert-danger text-center lh-1 ls-1">Data belum diisi</div>
    <?php endif; ?>
</div>

<div style="border: 1px solid #000; margin: 10px; padding: 15px;">
    <h4 style="background: #ddd; padding: 10px; font-weight: bold; margin-bottom: 20px;">V. LAIN-LAIN</h4>
    <?php if ($santri['rk_saved'] == 1): ?>
    <table>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">A. Prestasi yang pernah dicapai</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <ul class="m-0 p-0 ms-3">
                    <?php if (!empty($lain['lain_prestasi'])): ?>
                        <?php foreach ($lain['lain_prestasi'] as $x): ?>
                            <li class="ls-1 lh-1"> <?= htmlspecialchars($x['lain_prestasi_prestasi']) ?> </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">B. Pengalaman Berorganisasi</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <ul class="m-0 p-0 ms-3">
                    <?php if (!empty($lain['lain_organisasi'])): ?>
                        <?php foreach ($lain['lain_organisasi'] as $x): ?>
                            <li class="ls-1 lh-1"> <?= htmlspecialchars($x['lain_organisasi_organisasi']) ?> </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </ul>
            </td>
        </tr>
    </table>
    <p style="font-size:13px;margin-left:7px;">C. Kemampuan Diri:</p>
    <table style="margin-left: 20px;">
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">1. Baca Tulis Al-Qur'an</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <ul class="m-0 p-0 ms-3">
                    <?php if (!empty($lain['lain_btq_membaca'])): ?><li class="ls-1 lh-1">Dapat Membaca Al-Qur'an</li><?php endif; ?>
                    <?php if (!empty($lain['lain_btq_menulis'])): ?><li class="ls-1 lh-1">Dapat Menulis Huruf Arab</li><?php endif; ?>
                    <?php if (!empty($lain['lain_btq_terjemah'])): ?><li class="ls-1 lh-1">Dapat Menerjemahkan Al-Qur'an</li><?php endif; ?>
                </ul>
            </td>
        </tr>
    </table>
    <p style="font-size:13px;margin-left:27px;">2. Sudah khatam Al-Qur'an <?= htmlspecialchars($lain['lain_khatam']) ?> kali dan baru mampu menyelesaikan <?= htmlspecialchars($lain['lain_juz']) ?> juz.</p>
    <table style="margin-left: 20px;">
        <tr>
            <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">3. Bahasa Asing yang Dikuasai</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
            <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                <ul class="m-0 p-0 ms-3">
                    <?php if (!empty($lain['lain_bahasa_arab'])): ?><li class="ls-1 lh-1">Bahasa Arab</li><?php endif; ?>
                    <?php if (!empty($lain['lain_bahasa_inggris'])): ?><li class="ls-1 lh-1">Bahasa Inggris</li><?php endif; ?>
                    <?php if (!empty($lain['lain_bahasa_jepang'])): ?><li class="ls-1 lh-1">Bahasa Jepang</li><?php endif; ?>
                    <?php if (!empty($lain['lain_bahasa'])): ?>
                        <?php foreach ($lain['lain_bahasa'] as $x): ?>
                            <li class="ls-1 lh-1">Bahasa <?= htmlspecialchars($x['lain_bahasa_bahasa']) ?></li>
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
                    <?php if (!empty($lain['lain_keahlian_komputer'])): ?><li class="ls-1 lh-1">Komputer</li><?php endif; ?>
                    <?php if (!empty($lain['lain_keahlian_elektro'])): ?><li class="ls-1 lh-1">Elektro</li><?php endif; ?>
                    <?php if (!empty($lain['lain_keahlian_desain'])): ?><li class="ls-1 lh-1">Desain</li><?php endif; ?>
                    <?php if (!empty($lain['lain_keahlian'])): ?>
                        <?php foreach ($lain['lain_keahlian'] as $x): ?>
                            <li class="ls-1 lh-1"><?= htmlspecialchars($x['lain_keahlian_keahlian']) ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </td>
        </tr>
    </table>
    <?php else: ?>
        <div class="alert alert-danger text-center lh-1 ls-1">Data belum diisi</div>
    <?php endif; ?>

    <p style="font-size:13px;margin-left:7px;">D. Orientasi Ketika Menjadi Santri Al-Hikam:</p>
    <table style="margin-left: 20px;">
        <?php 
        $bidang = [
            'Olahraga' => [
                'lain_olahraga_footbal' => 'Football',
                'lain_olahraga_basket' => 'Basket',
                'lain_olahraga_badminton' => 'Badminton',
                'lain_olahraga' => 'lain_olahraga_olahraga'
            ],
            'Seni dan Budaya' => [
                'lain_senbud_musik' => 'Musik',
                'lain_senbud_senisuara' => 'Seni Suara',
                'lain_senbud_senilukis' => 'Seni Lukis',
                'lain_senbud' => 'lain_senbud_senbud'
            ],
            'Penalaran' => [
                'lain_penalaran_seminar' => 'Seminar',
                'lain_penalaran_jurnalistik' => 'Jurnalistik',
                'lain_penalaran_karyatulis' => 'Karya Tulis',
                'lain_penalaran' => 'lain_penalaran_penalaran'
            ],
            'Keagamaan' => [
                'lain_agama_qiroah' => "Qiro'ah",
                'lain_agama_sholawat' => 'Sholawat',
                'lain_agama_ptq' => 'Mengajar TPQ',
                'lain_agama' => 'lain_agama_agama'
            ],
            'Bahasa' => [
                'lain_bahasam_arab' => 'Bahasa Arab',
                'lain_bahasam_inggris' => 'Bahasa Inggris',
                'lain_bahasam_jepang' => 'Bahasa Jepang',
                'lain_bahasam' => 'lain_bahasam_bahasam'
            ]
        ];
        ?>

        <?php foreach ($bidang as $namaBidang => $kategori) : ?>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">- Bidang <?= $namaBidang ?></td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0 ms-3">
                        <?php foreach ($kategori as $key => $label) : ?>
                            <?php if (is_array($lain[$key])) : ?>
                                <?php foreach ($lain[$key] as $item) : ?>
                                    <li class="ls-1 lh-1"><?= ($namaBidang == 'Bahasa') ? 'Bahasa ' : '' ?><?= $item[$label] ?></li>
                                <?php endforeach; ?>
                            <?php elseif ($lain[$key] == 1) : ?>
                                <li class="ls-1 lh-1"><?= $label ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>