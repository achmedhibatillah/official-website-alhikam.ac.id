<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-3">RIWAYAT KESEHATAN DAN LAIN-LAIN</h1>
<div class="text-clr1 row justify-content-center m-0 p-0">
    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
        <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">IV. RIWAYAT KESEHATAN</h4>
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
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">C. Penyakit yang Sedang Dialami</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">
                    <ul class="m-0 p-0">
                        <?php if($rk['penyakit_sedang']): ?>
                            <?php foreach($rk['penyakit_sedang'] as $x) : ?>
                                <li class="ls-1 lh-1"><?= $x['rk_sedang_penyakit'] ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            -
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
        <p class="ls-1 lh-1 mt-5 mb-1">Apabila terdapat hal-hal mendesak atas saya, yang dapat dihubungi segera adalah:</p>
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
    </div>
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">V. LAIN-LAIN</h4>
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
    </div>
    </div>
</div>
</section>