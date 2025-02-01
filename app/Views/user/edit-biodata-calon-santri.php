<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-3">BIODATA CALON SANTRI</h1>
<form action="<?= base_url('simpan-santri') ?>" method="post" class="mt-4">
<input type="hidden" name="santri_id" value="<?= $santri['santri_id'] ?>">
<div class="text-clr1 row justify-content-center m-0 p-0">
    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">I. IDENTITAS CALON SANTRI</h4>
        <!-- Nama Lengkap -->
        <div class="mb-3">
            <label for="santri_nama" class="form-label mb-0 fsz-14 ls-1 fw-bold">1. Nama Lengkap:</label>
            <input name="santri_nama" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_nama']) ? 'is-invalid' : '' ?>" id="santri_nama" autocomplete="off" placeholder="Nama Lengkap" 
            value="<?= old('santri_nama') ? old('santri_nama') : (isset($santri['santri_nama']) ? $santri['santri_nama'] : '') ?>">
            <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_nama'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_nama'] ?></div>
            <?php endif; ?>
        </div>
        <!-- Nama Panggilan -->
        <div class="mb-3">
            <label for="santri_panggilan" class="form-label mb-0 fsz-14 ls-1 fw-bold">2. Nama panggilan:</label>
            <input name="santri_panggilan" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_panggilan']) ? 'is-invalid' : '' ?>" id="santri_panggilan" autocomplete="off" placeholder="Nama Panggilan" 
            value="<?= old('santri_panggilan') ? old('santri_panggilan') : (isset($santri['santri_panggilan']) ? $santri['santri_panggilan'] : '') ?>">
            <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_panggilan'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_panggilan'] ?></div>
            <?php endif; ?>
        </div>
        <!-- NIK -->
        <div class="mb-3">
            <label for="santri_nik" class="form-label mb-0 fsz-14 ls-1 fw-bold">3. Nomor Induk Kependudukan (NIK):</label>
            <input name="santri_nik" type="number" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_nik']) ? 'is-invalid' : '' ?>" id="santri_nik" autocomplete="off" placeholder="0000000000000000" 
            value="<?= old('santri_nik') ? old('santri_nik') : (isset($santri['santri_nik']) ? $santri['santri_nik'] : '') ?>">
            <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_nik'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_nik'] ?></div>
            <?php endif; ?>
        </div>
        <!-- TTL -->
        <p class="form-label mb-0 ms-0 fsz-14 ls-1 fw-bold">4. Tempat dan Tanggal Lahir:</p>
        <div class="row m-0 p-0">
            <div class="col-6 m-0 p-0 pe-1">
                <input name="santri_tempatlahir" type="text" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_tempatlahir']) ? 'is-invalid' : '' ?>" id="santri_tempatlahir" autocomplete="off" placeholder="Tempat Lahir" 
                value="<?= old('santri_tempatlahir') ? old('santri_tempatlahir') : (isset($santri['santri_tempatlahir']) ? $santri['santri_tempatlahir'] : '') ?>">
            </div>
            <div class="col-6 m-0 p-0">
                <input name="santri_tanggallahir" type="date" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_tanggallahir']) ? 'is-invalid' : '' ?>" id="santri_tanggallahir" autocomplete="off" placeholder="XXX"
                value="<?= old('santri_tanggallahir') ? old('santri_tanggallahir') : (isset($santri['santri_tanggallahir']) ? $santri['santri_tanggallahir'] : '') ?>">
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 pe-1">
            <div class="col-6 m-0 p-0">
                <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_tempatlahir'])): ?>
                    <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_tempatlahir'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-6 m-0 p-0">
                <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_tanggallahir'])): ?>
                    <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_tanggallahir'] ?></div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Alamat Asal -->
        <div class="mb-3">
            <label for="santri_alamat" class="form-label mb-0 fsz-14 ls-1 fw-bold">5. Alamat Asal:</label>
            <input name="santri_alamat" type="text" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_alamat']) ? 'is-invalid' : '' ?>" id="santri_alamat" autocomplete="off" placeholder="Alamat Asal"
            value="<?= old('santri_alamat') ? old('santri_alamat') : (isset($santri['santri_alamat']) ? $santri['santri_alamat'] : '') ?>">
            <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_alamat'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_alamat'] ?></div>
            <?php endif; ?>
        </div>
        <!-- Anak ke .. dari .. bersaudara -->
        <p class="form-label mb-0 ms-0 fsz-14 ls-1 fw-bold">6. Kedudukan dalam Keluarga:</p>
        <div class="row m-0 p-0">
            <div class="col-6 m-0 p-0 pe-1">
                <label for="santri_anakke" class="form-label mb-0 fsz-14 ls-1 fw-bold">Anak ke ...</label>
                <input name="santri_anakke" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_anakke']) ? 'is-invalid' : '' ?>" id="santri_anakke" autocomplete="off" placeholder="..."
                value="<?= old('santri_anakke') ? old('santri_anakke') : (isset($santri['santri_anakke']) ? $santri['santri_anakke'] : '') ?>">
            </div>
            <div class="col-6 m-0 p-0">
                <label for="santri_bersaudara" class="form-label mb-0 fsz-14 ls-1 fw-bold">dari ... bersaudara</label>
                <input name="santri_bersaudara" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_bersaudara']) ? 'is-invalid' : '' ?>" id="santri_bersaudara" autocomplete="off" placeholder="..."
                value="<?= old('santri_bersaudara') ? old('santri_bersaudara') : (isset($santri['santri_bersaudara']) ? $santri['santri_bersaudara'] : '') ?>">
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 pe-1">
            <div class="col-6 m-0 p-0">
                <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_anakke'])): ?>
                    <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_anakke'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-6 m-0 p-0">
                <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_bersaudara'])): ?>
                    <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_bersaudara'] ?></div>
                <?php endif; ?>
            </div>
        </div>
        <!-- No Telp -->
        <div class="mb-3">
            <label for="santri_hp" class="form-label mb-0 fsz-14 ls-1 fw-bold">7. Nomor HP/Whatsapp:</label>
            <input name="santri_hp" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_hp']) ? 'is-invalid' : '' ?>" id="santri_hp" autocomplete="off" placeholder="08... / 62..."
            value="<?= old('santri_hp') ? old('santri_hp') : (isset($santri['santri_hp']) ? $santri['santri_hp'] : '') ?>">
            <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_hp'])): ?>
                <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_hp'] ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card m-1 m-md-4 p-3">
        <h4 class="bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-4">II. PENDIDIKAN CALON SANTRI</h4>
        <!-- Riwayat Pendidikan -->
        <p class="form-label mb-0 ms-0 fsz-14 ls-1 fw-bold mb-0">1. Riwayat Pendidikan:</p>
        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_sdmasuk'])): ?>
            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('errors-santri')['santri_sdmasuk'] ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_sdlulus'])): ?>
            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('errors-santri')['santri_sdlulus'] ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smpmasuk'])): ?>
            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('errors-santri')['santri_smpmasuk'] ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smplulus'])): ?>
            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('errors-santri')['santri_smplulus'] ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smamasuk'])): ?>
            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('errors-santri')['santri_smamasuk'] ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smalulus'])): ?>
            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('errors-santri')['santri_smalulus'] ?></div>
        <?php endif; ?>
        <table class="mt-2 w-100">
            <tr>
                <td>a.</td>
                <td class="lh-s">SD / MI</td>
                <td>
                    <div>
                        <p class="ls-1 d-inline">Masuk: </p>
                        <input name="santri_sdmasuk" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_sdmasuk']) ? 'is-invalid' : '' ?>" id="santri_sdmasuk" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_sdmasuk') ? old('santri_sdmasuk') : (isset($santri['santri_sdmasuk']) ? $santri['santri_sdmasuk'] : '') ?>">
                    </div>
                </td>
                <td>
                    <div>
                        <p class="ls-1 d-inline">Lulus: </p>
                        <input name="santri_sdlulus" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_sdlulus']) ? 'is-invalid' : '' ?>" id="santri_sdlulus" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_sdlulus') ? old('santri_sdlulus') : (isset($santri['santri_sdlulus']) ? $santri['santri_sdlulus'] : '') ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>b.</td>
                <td class="lh-s">SMP / MTs</td>
                <td>
                    <div>
                        <p class="ls-1 d-inline">Masuk: </p>
                        <input name="santri_smpmasuk" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smpmasuk']) ? 'is-invalid' : '' ?>" id="santri_smpmasuk" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_smpmasuk') ? old('santri_smpmasuk') : (isset($santri['santri_smpmasuk']) ? $santri['santri_smpmasuk'] : '') ?>">
                    </div>
                </td>
                <td>
                    <div>
                        <p class="ls-1 d-inline">Lulus: </p>
                        <input name="santri_smplulus" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smplulus']) ? 'is-invalid' : '' ?>" id="santri_smplulus" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_smplulus') ? old('santri_smplulus') : (isset($santri['santri_smplulus']) ? $santri['santri_smplulus'] : '') ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width:8%;">c.</td>
                <td style="width:22%;" class="lh-s">SMU / MA/ SMK</td>
                <td style="width:35%">
                    <div>
                        <p class="ls-1 d-inline">Masuk: </p>
                        <input name="santri_smamasuk" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smamasuk']) ? 'is-invalid' : '' ?>" id="santri_smamasuk" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_smamasuk') ? old('santri_smamasuk') : (isset($santri['santri_smamasuk']) ? $santri['santri_smamasuk'] : '') ?>">
                    </div>
                </td>
                <td style="width:35%;">
                    <div>
                        <p class="ls-1 d-inline">Lulus: </p>
                        <input name="santri_smalulus" type="number" class="form-control input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_smalulus']) ? 'is-invalid' : '' ?>" id="santri_smalulus" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_smalulus') ? old('santri_smalulus') : (isset($santri['santri_smalulus']) ? $santri['santri_smalulus'] : '') ?>">
                    </div>
                </td>
            </tr>
        </table>
        <!-- Pendidikan Asal -->
        <p class="form-label mb-0 ms-0 fsz-14 ls-1 fw-bold mt-4 mb-0">2. Pendidikan Asal:</p>
        <table class="mt-2 p-0 w-100">
            <tr class="p-0">
                <td style="width:8%;">a.</td>
                <td style="width:22%;" class="lh-s">SMU / MA / SMK</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_pa" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa']) ? 'is-invalid' : '' ?>" id="santri_pa" autocomplete="off" placeholder="SMU / MA / SMK"
                        value="<?= old('santri_pa') ? old('santri_pa') : (isset($santri['santri_pa']) ? $santri['santri_pa'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_pa'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr class="p-0">
                <td style="width:8%;">b.</td>
                <td style="width:22%;" class="lh-s">Alamat</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_pa_alamat" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa_alamat']) ? 'is-invalid' : '' ?>" id="santri_pa_alamat" autocomplete="off" placeholder="Alamat SMU / MA / SMK"
                        value="<?= old('santri_pa_alamat') ? old('santri_pa_alamat') : (isset($santri['santri_pa_alamat']) ? $santri['santri_pa_alamat'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa_alamat'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_pa_alamat'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr class="p-0">
                <td style="width:8%;">c.</td>
                <td style="width:22%;" class="lh-s">Jurusan</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_pa_jurusan" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa_jurusan']) ? 'is-invalid' : '' ?>" id="santri_pa_jurusan" autocomplete="off" placeholder="Jurusan"
                        value="<?= old('santri_pa_jurusan') ? old('santri_pa_jurusan') : (isset($santri['santri_pa_jurusan']) ? $santri['santri_pa_jurusan'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa_jurusan'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_pa_jurusan'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr class="p-0">
                <td style="width:8%;">d.</td>
                <td style="width:22%;" class="lh-s">Tahun Kelulusan</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_pa_lulus" type="number" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa_lulus']) ? 'is-invalid' : '' ?>" id="santri_pa_lulus" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_pa_lulus') ? old('santri_pa_lulus') : (isset($santri['santri_pa_lulus']) ? $santri['santri_pa_lulus'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_pa_lulus'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_pa_lulus'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
        <!-- Pendidikan Asal -->
        <p class="form-label mb-0 ms-0 fsz-14 ls-1 fw-bold mt-4 mb-0">3. Pendidikan Saat Ini:</p>
        <table class="mt-2 p-0 w-100">
            <tr class="p-0">
                <td style="width:8%;">a.</td>
                <td style="width:22%;" class="lh-s">Perguruan Tinggi</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_ps_pt" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_pt']) ? 'is-invalid' : '' ?>" id="santri_ps_pt" autocomplete="off" placeholder="Nama Universitas / Institut / Politeknik / lainnya"
                        value="<?= old('santri_ps_pt') ? old('santri_ps_pt') : (isset($santri['santri_ps_pt']) ? $santri['santri_ps_pt'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_pt'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_ps_pt'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr class="p-0">
                <td style="width:8%;">b.</td>
                <td style="width:22%;" class="lh-s">Fakultas</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_ps_fakultas" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_fakultas']) ? 'is-invalid' : '' ?>" id="santri_ps_fakultas" autocomplete="off" placeholder="Nama Fakultas"
                        value="<?= old('santri_ps_fakultas') ? old('santri_ps_fakultas') : (isset($santri['santri_ps_fakultas']) ? $santri['santri_ps_fakultas'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_fakultas'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_ps_fakultas'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr class="p-0">
                <td style="width:8%;">c.</td>
                <td style="width:22%;" class="lh-s">Program Studi</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_ps_prodi" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_prodi']) ? 'is-invalid' : '' ?>" id="santri_ps_prodi" autocomplete="off" placeholder="Nama Program Studi (S1 / D4 / D3)"
                        value="<?= old('santri_ps_prodi') ? old('santri_ps_prodi') : (isset($santri['santri_ps_prodi']) ? $santri['santri_ps_prodi'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_prodi'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_ps_prodi'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <td style="width:8%;">d.</td>
                <td style="width:22%;" class="lh-s">Tahun Masuk</td>
                <td style="width:70%;">
                    <div class="m-1">
                        <input name="santri_ps_masuk" type="text" class="form-control w-100 input-clr1-out w-100 ps-3 py-2 mt--1 he-27 fsz-13 <?= session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_masuk']) ? 'is-invalid' : '' ?>" id="santri_ps_masuk" autocomplete="off" placeholder="20.."
                        value="<?= old('santri_ps_masuk') ? old('santri_ps_masuk') : (isset($santri['santri_ps_masuk']) ? $santri['santri_ps_masuk'] : '') ?>">
                        <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_ps_masuk'])): ?>
                            <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-santri')['santri_ps_masuk'] ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="">
        <div class="card px-3 px-md-3 m-1 m-md-4 rounded mt-2">
            <div class="py-3">
            <div class="form-check">
                <input class="form-check-input border-clr1" type="checkbox" id="santri_saved" name="santri_saved" value="1">
                <label class="form-check-label text-clr1 fsz-14 mb-0" for="santri_saved">
                    Pastikan seluruh data sudah diisi dengan benar & lengkap sebelum klik tombol simpan.
                </label>
            </div>
            <?php if (session()->getFlashdata('errors-santri') && isset(session()->getFlashdata('errors-santri')['santri_saved'])): ?>
                <div class="text-danger fsz-12 mt-0" id="errors-santri">
                    <?= session()->getFlashdata('errors-santri')['santri_saved'] ?>
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