<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">III. BIODATA ORANG TUA</h1>
<form action="<?= base_url('simpan-ortu') ?>" method="post" class="mt-4">
<input type="hidden" name="ortu_id" value="<?= $ortu['ortu_id'] ?>">
<div class="text-clr1 row m-0 p-0">

    <div class="col-md-6 m-0 p-0 px-3 px-md-3">
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">1. IDENTITAS AYAH</h4>
        <!-- Nama Ayah -->
        <div class="">
            <label for="ortu_a_nama" class="form-label mb-0 fsz-14 ls-1 fw-bold">1. Nama Lengkap Ayah:</label>
            <input name="ortu_a_nama" type="text" class="form-control input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_a_nama']) ? 'is-invalid' : '' ?>" id="ortu_a_nama" autocomplete="off" placeholder="Nama Lengkap Ayah" 
            value="<?= old('ortu_a_nama') ? old('ortu_a_nama') : (isset($ortu['ortu_a_nama']) ? $ortu['ortu_a_nama'] : '') ?>">
            <?php if (session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_a_nama'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-ortu')['ortu_a_nama'] ?></div>
            <?php endif; ?>
        </div>
        <!-- Pekerjaan Ayah -->
        <div class="mt-3">
            <label for="ortu_a_pekerjaan" class="form-label mb-0 fsz-14 ls-1 fw-bold">2. Pekerjaan Ayah:</label>
            <select name="ortu_a_pekerjaan" class="form-select input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_a_pekerjaan']) ? 'is-invalid' : '' ?>" id="ortu_a_pekerjaan" onchange="toggle_a_pekerjaan(this)">
                <option value="" disabled <?= old('ortu_a_pekerjaan') || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] !== '') ? '' : 'selected' ?>>Pilih Pekerjaan Ayah</option>
                <option value="1" <?= old('ortu_a_pekerjaan') == '1' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '1') ? 'selected' : '' ?>>Tidak bekerja</option>
                <option value="2" <?= old('ortu_a_pekerjaan') == '2' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '2') ? 'selected' : '' ?>>Nelayan</option>
                <option value="3" <?= old('ortu_a_pekerjaan') == '3' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '3') ? 'selected' : '' ?>>Petani</option>
                <option value="4" <?= old('ortu_a_pekerjaan') == '4' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '4') ? 'selected' : '' ?>>Peternak</option>
                <option value="5" <?= old('ortu_a_pekerjaan') == '5' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '5') ? 'selected' : '' ?>>PNS/TNI/Polri</option>
                <option value="6" <?= old('ortu_a_pekerjaan') == '6' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '6') ? 'selected' : '' ?>>Karyawan swasta</option>
                <option value="7" <?= old('ortu_a_pekerjaan') == '7' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '7') ? 'selected' : '' ?>>Pedagang kecil</option>
                <option value="8" <?= old('ortu_a_pekerjaan') == '8' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '8') ? 'selected' : '' ?>>Pedagang besar</option>
                <option value="9" <?= old('ortu_a_pekerjaan') == '9' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '9') ? 'selected' : '' ?>>Wiraswasta</option>
                <option value="10" <?= old('ortu_a_pekerjaan') == '10' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '10') ? 'selected' : '' ?>>Buruh</option>
                <option value="11" <?= old('ortu_a_pekerjaan') == '11' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '11') ? 'selected' : '' ?>>Pensiunan</option>
                <option value="12" <?= old('ortu_a_pekerjaan') == '12' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '12') ? 'selected' : '' ?>>Sudah meninggal</option>
                <option value="13" <?= old('ortu_a_pekerjaan') == '13' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '13') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_pekerjaan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_pekerjaan'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="ortu_a_pekerjaan_lain" style="display: <?= (old('ortu_a_pekerjaan') == '13' || (isset($ortu['ortu_a_pekerjaan']) && $ortu['ortu_a_pekerjaan'] == '13')) ? 'block' : 'none' ?>;">
            <input name="ortu_a_pekerjaan_lain" type="text" class="form-control  he-28 input-clr1-out ps-3 py-2 mt-1 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_a_pekerjaan_lain']) ? 'is-invalid' : '' ?>" id="ortu_a_pekerjaan_lain" value="<?= old('ortu_a_pekerjaan_lain') ?: (isset($ortu['ortu_a_pekerjaan_lain']) ? $ortu['ortu_a_pekerjaan_lain'] : '') ?>" placeholder="Tulis pekerjaan ayah">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_pekerjaan_lain'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_pekerjaan_lain'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Agama Ayah -->
        <div class="mt-3">
            <label for="ortu_a_agama" class="form-label mb-0 fsz-14 ls-1 fw-bold">3. Agama Ayah:</label>
            <select name="ortu_a_agama" class="form-select input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_a_agama']) ? 'is-invalid' : '' ?>" id="ortu_a_agama" onchange="toggle_a_agama(this)">
                <option value="" disabled <?= old('ortu_a_agama') || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] !== '') ? '' : 'selected' ?>>Pilih Agama Ayah</option>
                <option value="1" <?= old('ortu_a_agama') == '1' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '1') ? 'selected' : '' ?>>Islam</option>
                <option value="2" <?= old('ortu_a_agama') == '2' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '2') ? 'selected' : '' ?>>Protestan</option>
                <option value="3" <?= old('ortu_a_agama') == '3' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '3') ? 'selected' : '' ?>>Katolik</option>
                <option value="4" <?= old('ortu_a_agama') == '4' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '4') ? 'selected' : '' ?>>Hindu</option>
                <option value="5" <?= old('ortu_a_agama') == '5' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '5') ? 'selected' : '' ?>>Buddha</option>
                <option value="6" <?= old('ortu_a_agama') == '6' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '6') ? 'selected' : '' ?>>Konghuchu</option>
                <option value="7" <?= old('ortu_a_agama') == '7' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '7') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_agama'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_agama'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="ortu_a_agama_lain" style="display: <?= (old('ortu_a_agama') == '13' || (isset($ortu['ortu_a_agama']) && $ortu['ortu_a_agama'] == '13')) ? 'block' : 'none' ?>;">
            <input name="ortu_a_agama_lain" type="text" class="form-control  he-28 input-clr1-out ps-3 py-2 mt-1 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_a_agama_lain']) ? 'is-invalid' : '' ?>" id="ortu_a_agama_lain" value="<?= old('ortu_a_agama_lain') ?: (isset($ortu['ortu_a_agama_lain']) ? $ortu['ortu_a_agama_lain'] : '') ?>" placeholder="Tulis agama ayah">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_agama_lain'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_agama_lain'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Pendidikan Ayah -->
        <div class="mt-3">
            <label for="ortu_a_pendidikan" class="form-label mb-0 fsz-14 ls-1 fw-bold">4. Pendidikan Ayah:</label>
            <select name="ortu_a_pendidikan" class="form-select input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_a_pendidikan']) ? 'is-invalid' : '' ?>" id="ortu_a_pendidikan" onchange="toggle_a_pendidikan(this)">
                <option value="" disabled <?= old('ortu_a_pendidikan') || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] !== '') ? '' : 'selected' ?>>Pilih Pendidikan Ayah</option>
                <option value="1" <?= old('ortu_a_pendidikan') == '1' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '1') ? 'selected' : '' ?>>Tidak sekolah</option>
                <option value="2" <?= old('ortu_a_pendidikan') == '2' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '2') ? 'selected' : '' ?>>PAUD</option>
                <option value="3" <?= old('ortu_a_pendidikan') == '3' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '3') ? 'selected' : '' ?>>TK / sederajat</option>
                <option value="4" <?= old('ortu_a_pendidikan') == '4' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '4') ? 'selected' : '' ?>>Putus SD</option>
                <option value="5" <?= old('ortu_a_pendidikan') == '5' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '5') ? 'selected' : '' ?>>SD / sederajat</option>
                <option value="6" <?= old('ortu_a_pendidikan') == '6' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '6') ? 'selected' : '' ?>>SMP / sederajat</option>
                <option value="7" <?= old('ortu_a_pendidikan') == '7' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '7') ? 'selected' : '' ?>>SMA / sederajat</option>
                <option value="8" <?= old('ortu_a_pendidikan') == '8' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '8') ? 'selected' : '' ?>>Paket A</option>
                <option value="9" <?= old('ortu_a_pendidikan') == '9' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '9') ? 'selected' : '' ?>>Paket B</option>
                <option value="10" <?= old('ortu_a_pendidikan') == '10' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '10') ? 'selected' : '' ?>>Paket C</option>
                <option value="11" <?= old('ortu_a_pendidikan') == '11' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '11') ? 'selected' : '' ?>>D1</option>
                <option value="12" <?= old('ortu_a_pendidikan') == '12' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '12') ? 'selected' : '' ?>>D2</option>
                <option value="13" <?= old('ortu_a_pendidikan') == '13' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '13') ? 'selected' : '' ?>>D3</option>
                <option value="14" <?= old('ortu_a_pendidikan') == '14' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '14') ? 'selected' : '' ?>>D4</option>
                <option value="15" <?= old('ortu_a_pendidikan') == '15' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '15') ? 'selected' : '' ?>>Profesi</option>
                <option value="16" <?= old('ortu_a_pendidikan') == '16' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '16') ? 'selected' : '' ?>>S1</option>
                <option value="17" <?= old('ortu_a_pendidikan') == '17' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '17') ? 'selected' : '' ?>>SP-1</option>
                <option value="18" <?= old('ortu_a_pendidikan') == '18' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '18') ? 'selected' : '' ?>>S2</option>
                <option value="19" <?= old('ortu_a_pendidikan') == '19' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '19') ? 'selected' : '' ?>>SP-2</option>
                <option value="20" <?= old('ortu_a_pendidikan') == '20' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '20') ? 'selected' : '' ?>>S3</option>
                <option value="21" <?= old('ortu_a_pendidikan') == '21' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '21') ? 'selected' : '' ?>>Non-Formal</option>
                <option value="22" <?= old('ortu_a_pendidikan') == '22' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '22') ? 'selected' : '' ?>>Informal</option>
                <option value="23" <?= old('ortu_a_pendidikan') == '23' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '23') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_pendidikan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_pendidikan'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="ortu_a_pendidikan_lain" style="display: <?= (old('ortu_a_pendidikan') == '13' || (isset($ortu['ortu_a_pendidikan']) && $ortu['ortu_a_pendidikan'] == '13')) ? 'block' : 'none' ?>;">
            <input name="ortu_a_pendidikan_lain" type="text" class="form-control  he-28 input-clr1-out ps-3 py-2 mt-1 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_a_pendidikan_lain']) ? 'is-invalid' : '' ?>" id="ortu_a_pendidikan_lain" value="<?= old('ortu_a_pendidikan_lain') ?: (isset($ortu['ortu_a_pendidikan_lain']) ? $ortu['ortu_a_pendidikan_lain'] : '') ?>" placeholder="Tulis pekerjaan ayah">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_pendidikan_lain'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_pendidikan_lain'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- No Telp Ayah -->
        <div class="mt-3">
            <label for="ortu_a_hp" class="form-label mb-0 fsz-14 ls-1 fw-bold">5. No Telp/WA Ayah:</label>
            <input name="ortu_a_hp" type="number" class="form-control input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_a_hp']) ? 'is-invalid' : '' ?>" id="ortu_a_hp" autocomplete="off" placeholder="08.. / 62.." 
            value="<?= old('ortu_a_hp') ? old('ortu_a_hp') : (isset($ortu['ortu_a_hp']) ? $ortu['ortu_a_hp'] : '') ?>">
            <?php if (session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_a_hp'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-ortu')['ortu_a_hp'] ?></div>
            <?php endif; ?>
        </div>
        <!-- Pendapatan Ayah -->
        <div class="mt-3">
            <label for="ortu_a_pendapatan" class="form-label mb-0 fsz-14 ls-1 fw-bold">6. Pendapatan Per-Bulan:</label>
            <input name="ortu_a_pendapatan" type="text" class="form-control input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_a_pendapatan']) ? 'is-invalid' : '' ?>" id="ortu_a_pendapatan" autocomplete="off" placeholder="ex. 500 ribu - 1 juta" 
            value="<?= old('ortu_a_pendapatan') ? old('ortu_a_pendapatan') : (isset($ortu['ortu_a_pendapatan']) ? $ortu['ortu_a_pendapatan'] : '') ?>">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_a_pendapatan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_a_pendapatan'] ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="col-md-6 m-0 p-0 mt-4 px-3 px-md-3 mt-md-0">
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">2. IDENTITAS IBU</h4>
        <!-- Nama Ibu -->
        <div class="">
            <label for="ortu_i_nama" class="form-label mb-0 fsz-14 ls-1 fw-bold">1. Nama Lengkap Ibu:</label>
            <input name="ortu_i_nama" type="text" class="form-control input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_i_nama']) ? 'is-invalid' : '' ?>" id="ortu_i_nama" autocomplete="off" placeholder="Nama Lengkap Ibu" 
            value="<?= old('ortu_i_nama') ? old('ortu_i_nama') : (isset($ortu['ortu_i_nama']) ? $ortu['ortu_i_nama'] : '') ?>">
            <?php if (session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_i_nama'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-ortu')['ortu_i_nama'] ?></div>
            <?php endif; ?>
        </div>
        <!-- Pekerjaan Ibu -->
        <div class="mt-3">
            <label for="ortu_i_pekerjaan" class="form-label mb-0 fsz-14 ls-1 fw-bold">2. Pekerjaan Ibu:</label>
            <select name="ortu_i_pekerjaan" class="form-select input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_i_pekerjaan']) ? 'is-invalid' : '' ?>" id="ortu_i_pekerjaan" onchange="toggle_i_pekerjaan(this)">
                <option value="" disabled <?= old('ortu_i_pekerjaan') || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] !== '') ? '' : 'selected' ?>>Pilih Pekerjaan Ibu</option>
                <option value="1" <?= old('ortu_i_pekerjaan') == '1' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '1') ? 'selected' : '' ?>>Tidak bekerja</option>
                <option value="2" <?= old('ortu_i_pekerjaan') == '2' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '2') ? 'selected' : '' ?>>Nelayan</option>
                <option value="3" <?= old('ortu_i_pekerjaan') == '3' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '3') ? 'selected' : '' ?>>Petani</option>
                <option value="4" <?= old('ortu_i_pekerjaan') == '4' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '4') ? 'selected' : '' ?>>Peternak</option>
                <option value="5" <?= old('ortu_i_pekerjaan') == '5' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '5') ? 'selected' : '' ?>>PNS/TNI/Polri</option>
                <option value="6" <?= old('ortu_i_pekerjaan') == '6' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '6') ? 'selected' : '' ?>>Karyawan swasta</option>
                <option value="7" <?= old('ortu_i_pekerjaan') == '7' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '7') ? 'selected' : '' ?>>Pedagang kecil</option>
                <option value="8" <?= old('ortu_i_pekerjaan') == '8' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '8') ? 'selected' : '' ?>>Pedagang besar</option>
                <option value="9" <?= old('ortu_i_pekerjaan') == '9' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '9') ? 'selected' : '' ?>>Wiraswasta</option>
                <option value="10" <?= old('ortu_i_pekerjaan') == '10' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '10') ? 'selected' : '' ?>>Buruh</option>
                <option value="11" <?= old('ortu_i_pekerjaan') == '11' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '11') ? 'selected' : '' ?>>Pensiunan</option>
                <option value="12" <?= old('ortu_i_pekerjaan') == '12' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '12') ? 'selected' : '' ?>>Sudah meninggal</option>
                <option value="13" <?= old('ortu_i_pekerjaan') == '13' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '13') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_pekerjaan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_pekerjaan'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="ortu_i_pekerjaan_lain" style="display: <?= (old('ortu_i_pekerjaan') == '13' || (isset($ortu['ortu_i_pekerjaan']) && $ortu['ortu_i_pekerjaan'] == '13')) ? 'block' : 'none' ?>;">
            <input name="ortu_i_pekerjaan_lain" type="text" class="form-control  he-28 input-clr1-out ps-3 py-2 mt-1 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_i_pekerjaan_lain']) ? 'is-invalid' : '' ?>" id="ortu_i_pekerjaan_lain" value="<?= old('ortu_i_pekerjaan_lain') ?: (isset($ortu['ortu_i_pekerjaan_lain']) ? $ortu['ortu_i_pekerjaan_lain'] : '') ?>" placeholder="Tulis pekerjaan ibu">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_pekerjaan_lain'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_pekerjaan_lain'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Agama Ibu -->
        <div class="mt-3">
            <label for="ortu_i_agama" class="form-label mb-0 fsz-14 ls-1 fw-bold">3. Agama Ibu:</label>
            <select name="ortu_i_agama" class="form-select input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_i_agama']) ? 'is-invalid' : '' ?>" id="ortu_i_agama" onchange="toggle_i_agama(this)">
                <option value="" disabled <?= old('ortu_i_agama') || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] !== '') ? '' : 'selected' ?>>Pilih Agama Ibu</option>
                <option value="1" <?= old('ortu_i_agama') == '1' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '1') ? 'selected' : '' ?>>Islam</option>
                <option value="2" <?= old('ortu_i_agama') == '2' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '2') ? 'selected' : '' ?>>Protestan</option>
                <option value="3" <?= old('ortu_i_agama') == '3' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '3') ? 'selected' : '' ?>>Katolik</option>
                <option value="4" <?= old('ortu_i_agama') == '4' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '4') ? 'selected' : '' ?>>Hindu</option>
                <option value="5" <?= old('ortu_i_agama') == '5' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '5') ? 'selected' : '' ?>>Buddha</option>
                <option value="6" <?= old('ortu_i_agama') == '6' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '6') ? 'selected' : '' ?>>Konghuchu</option>
                <option value="7" <?= old('ortu_i_agama') == '7' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '7') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_agama'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_agama'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="ortu_i_agama_lain" style="display: <?= (old('ortu_i_agama') == '13' || (isset($ortu['ortu_i_agama']) && $ortu['ortu_i_agama'] == '13')) ? 'block' : 'none' ?>;">
            <input name="ortu_i_agama_lain" type="text" class="form-control  he-28 input-clr1-out ps-3 py-2 mt-1 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_i_agama_lain']) ? 'is-invalid' : '' ?>" id="ortu_i_agama_lain" value="<?= old('ortu_i_agama_lain') ?: (isset($ortu['ortu_i_agama_lain']) ? $ortu['ortu_i_agama_lain'] : '') ?>" placeholder="Tulis agama ibu">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_agama_lain'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_agama_lain'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Pendidikan Ibu -->
        <div class="mt-3">
            <label for="ortu_i_pendidikan" class="form-label mb-0 fsz-14 ls-1 fw-bold">4. Pendidikan Ibu:</label>
            <select name="ortu_i_pendidikan" class="form-select input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_i_pendidikan']) ? 'is-invalid' : '' ?>" id="ortu_i_pendidikan" onchange="toggle_i_pendidikan(this)">
                <option value="" disabled <?= old('ortu_i_pendidikan') || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] !== '') ? '' : 'selected' ?>>Pilih Pendidikan Ibu</option>
                <option value="1" <?= old('ortu_i_pendidikan') == '1' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '1') ? 'selected' : '' ?>>Tidak sekolah</option>
                <option value="2" <?= old('ortu_i_pendidikan') == '2' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '2') ? 'selected' : '' ?>>PAUD</option>
                <option value="3" <?= old('ortu_i_pendidikan') == '3' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '3') ? 'selected' : '' ?>>TK / sederajat</option>
                <option value="4" <?= old('ortu_i_pendidikan') == '4' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '4') ? 'selected' : '' ?>>Putus SD</option>
                <option value="5" <?= old('ortu_i_pendidikan') == '5' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '5') ? 'selected' : '' ?>>SD / sederajat</option>
                <option value="6" <?= old('ortu_i_pendidikan') == '6' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '6') ? 'selected' : '' ?>>SMP / sederajat</option>
                <option value="7" <?= old('ortu_i_pendidikan') == '7' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '7') ? 'selected' : '' ?>>SMA / sederajat</option>
                <option value="8" <?= old('ortu_i_pendidikan') == '8' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '8') ? 'selected' : '' ?>>Paket A</option>
                <option value="9" <?= old('ortu_i_pendidikan') == '9' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '9') ? 'selected' : '' ?>>Paket B</option>
                <option value="10" <?= old('ortu_i_pendidikan') == '10' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '10') ? 'selected' : '' ?>>Paket C</option>
                <option value="11" <?= old('ortu_i_pendidikan') == '11' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '11') ? 'selected' : '' ?>>D1</option>
                <option value="12" <?= old('ortu_i_pendidikan') == '12' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '12') ? 'selected' : '' ?>>D2</option>
                <option value="13" <?= old('ortu_i_pendidikan') == '13' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '13') ? 'selected' : '' ?>>D3</option>
                <option value="14" <?= old('ortu_i_pendidikan') == '14' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '14') ? 'selected' : '' ?>>D4</option>
                <option value="15" <?= old('ortu_i_pendidikan') == '15' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '15') ? 'selected' : '' ?>>Profesi</option>
                <option value="16" <?= old('ortu_i_pendidikan') == '16' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '16') ? 'selected' : '' ?>>S1</option>
                <option value="17" <?= old('ortu_i_pendidikan') == '17' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '17') ? 'selected' : '' ?>>SP-1</option>
                <option value="18" <?= old('ortu_i_pendidikan') == '18' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '18') ? 'selected' : '' ?>>S2</option>
                <option value="19" <?= old('ortu_i_pendidikan') == '19' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '19') ? 'selected' : '' ?>>SP-2</option>
                <option value="20" <?= old('ortu_i_pendidikan') == '20' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '20') ? 'selected' : '' ?>>S3</option>
                <option value="21" <?= old('ortu_i_pendidikan') == '21' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '21') ? 'selected' : '' ?>>Non-Formal</option>
                <option value="22" <?= old('ortu_i_pendidikan') == '22' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '22') ? 'selected' : '' ?>>Informal</option>
                <option value="23" <?= old('ortu_i_pendidikan') == '23' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '23') ? 'selected' : '' ?>>Lainnya</option>
            </select>
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_pendidikan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_pendidikan'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="ortu_i_pendidikan_lain" style="display: <?= (old('ortu_i_pendidikan') == '13' || (isset($ortu['ortu_i_pendidikan']) && $ortu['ortu_i_pendidikan'] == '13')) ? 'block' : 'none' ?>;">
            <input name="ortu_i_pendidikan_lain" type="text" class="form-control  he-28 input-clr1-out ps-3 py-2 mt-1 fsz-13 <?= isset(session()->getFlashdata('errors-ortu')['ortu_i_pendidikan_lain']) ? 'is-invalid' : '' ?>" id="ortu_i_pendidikan_lain" value="<?= old('ortu_i_pendidikan_lain') ?: (isset($ortu['ortu_i_pendidikan_lain']) ? $ortu['ortu_i_pendidikan_lain'] : '') ?>" placeholder="Tulis pekerjaan ibu">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_pendidikan_lain'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_pendidikan_lain'] ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- No Telp Ibu -->
        <div class="mt-3">
            <label for="ortu_i_hp" class="form-label mb-0 fsz-14 ls-1 fw-bold">5. No Telp/WA Ibu:</label>
            <input name="ortu_i_hp" type="number" class="form-control input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_i_hp']) ? 'is-invalid' : '' ?>" id="ortu_i_hp" autocomplete="off" placeholder="08.. / 62.." 
            value="<?= old('ortu_i_hp') ? old('ortu_i_hp') : (isset($ortu['ortu_i_hp']) ? $ortu['ortu_i_hp'] : '') ?>">
            <?php if (session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_i_hp'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-ortu')['ortu_i_hp'] ?></div>
            <?php endif; ?>
        </div>
        <!-- Pendapatan Ibu -->
        <div class="mt-3">
            <label for="ortu_i_pendapatan" class="form-label mb-0 fsz-14 ls-1 fw-bold">6. Pendapatan Per-Bulan:</label>
            <input name="ortu_i_pendapatan" type="text" class="form-control input-clr1-out ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_i_pendapatan']) ? 'is-invalid' : '' ?>" id="ortu_i_pendapatan" autocomplete="off" placeholder="ex. 500 ribu - 1 juta" 
            value="<?= old('ortu_i_pendapatan') ? old('ortu_i_pendapatan') : (isset($ortu['ortu_i_pendapatan']) ? $ortu['ortu_i_pendapatan'] : '') ?>">
            <?php if (isset(session()->getFlashdata('errors-ortu')['ortu_i_pendapatan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;">
                    <?= session()->getFlashdata('errors-ortu')['ortu_i_pendapatan'] ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <div class="w-100">
        <div class="card px-3 px-md-3 m-1 m-md-4 mx-3 rounded mt-2">
            <div class="py-3">
            <div class="form-check">
                <input class="form-check-input border-clr1" type="checkbox" id="ortu_saved" name="ortu_saved" value="1">
                <label class="form-check-label text-clr1 fsz-14 mb-0" for="ortu_saved">
                    Pastikan seluruh data sudah diisi dengan benar & lengkap sebelum klik tombol simpan.
                </label>
            </div>
            <?php if (session()->getFlashdata('errors-ortu') && isset(session()->getFlashdata('errors-ortu')['ortu_saved'])): ?>
                <div class="text-danger fsz-12 mt-0" id="errors-ortu">
                    <?= session()->getFlashdata('errors-ortu')['ortu_saved'] ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-sm btn-outline-clr1 ls-s mt-2" style="width:140px;"><i class="fas fa-save me-2"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () { const ortu_a_pekerjaan = document.getElementById('ortu_a_pekerjaan'); toggle_a_pekerjaan(ortu_a_pekerjaan); });
function toggle_a_pekerjaan(ortu_a_pekerjaan) { const ortu_a_pekerjaan_c = document.getElementById('ortu_a_pekerjaan_lain');
if (ortu_a_pekerjaan.value === '13') { ortu_a_pekerjaan_c.style.display = 'block'; } else { ortu_a_pekerjaan_c.style.display = 'none'; document.getElementById('ortu_a_pekerjaan_lain').value = ''; } }
document.addEventListener('DOMContentLoaded', function () { const ortu_a_agama = document.getElementById('ortu_a_agama'); toggle_a_agama(ortu_a_agama); });
function toggle_a_agama(ortu_a_agama) { const ortu_a_agama_c = document.getElementById('ortu_a_agama_lain');
if (ortu_a_agama.value === '7') { ortu_a_agama_c.style.display = 'block'; } else { ortu_a_agama_c.style.display = 'none'; document.getElementById('ortu_a_agama_lain').value = ''; } }
document.addEventListener('DOMContentLoaded', function () { const ortu_a_pendidikan = document.getElementById('ortu_a_pendidikan'); toggle_a_pendidikan(ortu_a_pendidikan); });
function toggle_a_pendidikan(ortu_a_pendidikan) { const ortu_a_pendidikan_c = document.getElementById('ortu_a_pendidikan_lain');
if (ortu_a_pendidikan.value === '23') { ortu_a_pendidikan_c.style.display = 'block'; } else { ortu_a_pendidikan_c.style.display = 'none'; document.getElementById('ortu_a_pendidikan_lain').value = ''; } }

document.addEventListener('DOMContentLoaded', function () { const ortu_i_pekerjaan = document.getElementById('ortu_i_pekerjaan'); toggle_i_pekerjaan(ortu_i_pekerjaan); });
function toggle_i_pekerjaan(ortu_i_pekerjaan) { const ortu_i_pekerjaan_c = document.getElementById('ortu_i_pekerjaan_lain');
if (ortu_i_pekerjaan.value === '13') { ortu_i_pekerjaan_c.style.display = 'block'; } else { ortu_i_pekerjaan_c.style.display = 'none'; document.getElementById('ortu_i_pekerjaan_lain').value = ''; } }
document.addEventListener('DOMContentLoaded', function () { const ortu_i_agama = document.getElementById('ortu_i_agama'); toggle_i_agama(ortu_i_agama); });
function toggle_i_agama(ortu_i_agama) { const ortu_i_agama_c = document.getElementById('ortu_i_agama_lain');
if (ortu_i_agama.value === '7') { ortu_i_agama_c.style.display = 'block'; } else { ortu_i_agama_c.style.display = 'none'; document.getElementById('ortu_i_agama_lain').value = ''; } }
document.addEventListener('DOMContentLoaded', function () { const ortu_i_pendidikan = document.getElementById('ortu_i_pendidikan'); toggle_i_pendidikan(ortu_i_pendidikan); });
function toggle_i_pendidikan(ortu_i_pendidikan) { const ortu_i_pendidikan_c = document.getElementById('ortu_i_pendidikan_lain');
if (ortu_i_pendidikan.value === '23') { ortu_i_pendidikan_c.style.display = 'block'; } else { ortu_i_pendidikan_c.style.display = 'none'; document.getElementById('ortu_i_pendidikan_lain').value = ''; } }
</script>