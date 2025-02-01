<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-3">BIODATA CALON SANTRI</h1>
<div class="text-clr1 row justify-content-center m-0 p-0">
    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
        <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">I. IDENTITAS CALON SANTRI</h4>
        <table>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">1. Nama Lengkap</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_nama'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">2. Nama Panggilan</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_panggilan'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">3. NIK</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_nik'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">4. Tempat dan Tanggal Lahir</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_tempatlahir'] ?>, <?= date('d M Y', strtotime($santri['santri_tanggallahir'])) ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">5. Alamat Asal</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;"><?= $santri['santri_alamat'] ?></td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">6. Kedudukan dalam Keluarga</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">Anak ke <?= $santri['santri_anakke'] ?>, dari <?= $santri['santri_bersaudara'] ?> bersaudara</td>
            </tr>
            <tr>
                <td class="align-top ls-1 lh-1 pt-3" style="width:30%;">7. Nomor HP/Whatsapp:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:3%;">:</td>
                <td class="align-top ls-1 lh-1 pt-3" style="width:67%;">+<?= $santri['santri_hp'] ?></td>
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
</div>
</section>