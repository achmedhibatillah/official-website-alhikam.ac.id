<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-3">BIODATA ORANG TUA CALON SANTRI</h1>
<div class="text-clr1 row justify-content-center m-0 p-0">
    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
        <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">III. A. IDENTITAS AYAH</h4>
        <table>
            <tr><td>Nama</td><td>:</td><td><?= $ortu['ortu_a_nama'] ?></td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td><?= $ortu['ortu_a_pekerjaan_string'] ?> <?= !empty($ortu['ortu_a_pekerjaan_lain']) ? '(' . $ortu['ortu_a_pekerjaan_lain'] . ')' : '' ?></td></tr>
            <tr><td>Agama</td><td>:</td><td><?= $ortu['ortu_a_agama_string'] ?> <?= !empty($ortu['ortu_a_agama_lain']) ? '(' . $ortu['ortu_a_agama_lain'] . ')' : '' ?></td></tr>
            <tr><td>Pendidikan</td><td>:</td><td><?= $ortu['ortu_a_pendidikan_string'] ?> <?= !empty($ortu['ortu_a_pendidikan_lain']) ? '(' . $ortu['ortu_a_pendidikan_lain'] . ')' : '' ?></td></tr>
            <tr><td>No. HP</td><td>:</td><td>+<?= $ortu['ortu_a_hp'] ?></td></tr>
            <tr><td>Pendapatan</td><td>:</td><td><?= $ortu['ortu_a_pendapatan'] ?></td></tr>
        </table>
    </div>
    
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">III. B. IDENTITAS IBU</h4>
        <table>
            <tr><td>Nama</td><td>:</td><td><?= $ortu['ortu_i_nama'] ?></td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td><?= $ortu['ortu_i_pekerjaan_string'] ?> <?= !empty($ortu['ortu_i_pekerjaan_lain']) ? '(' . $ortu['ortu_i_pekerjaan_lain'] . ')' : '' ?></td></tr>
            <tr><td>Agama</td><td>:</td><td><?= $ortu['ortu_i_agama_string'] ?> <?= !empty($ortu['ortu_i_agama_lain']) ? '(' . $ortu['ortu_i_agama_lain'] . ')' : '' ?></td></tr>
            <tr><td>Pendidikan</td><td>:</td><td><?= $ortu['ortu_i_pendidikan_string'] ?> <?= !empty($ortu['ortu_i_pendidikan_lain']) ? '(' . $ortu['ortu_i_pendidikan_lain'] . ')' : '' ?></td></tr>
            <tr><td>No. HP</td><td>:</td><td>+<?= $ortu['ortu_i_hp'] ?></td></tr>
            <tr><td>Pendapatan</td><td>:</td><td><?= $ortu['ortu_i_pendapatan'] ?></td></tr>
        </table>
    </div>
</div>
</section>