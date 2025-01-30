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

<div class="modal fade" id="modalprestasi" tabindex="-1" aria-labelledby="modalLain" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Prestasi</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-prestasi') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_prestasi_prestasi" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_prestasi_prestasi']) ? 'is-invalid' : '' ?>" id="lain_prestasi_prestasi" autocomplete="off" placeholder="Masukkan Prestasi" 
                        value="<?= old('lain_prestasi_prestasi') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_prestasi_prestasi'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_prestasi_prestasi'] ?>
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

<div class="modal fade" id="modalOrganisasi" tabindex="-1" aria-labelledby="modalOrganisasi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Organisasi</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-organisasi') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_organisasi_organisasi" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_organisasi_organisasi']) ? 'is-invalid' : '' ?>" id="lain_organisasi_organisasi" autocomplete="off" placeholder="Masukkan Organisasi" 
                        value="<?= old('lain_organisasi_organisasi') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_organisasi_organisasi'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_organisasi_organisasi'] ?>
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

<div class="modal fade" id="modalBahasa" tabindex="-1" aria-labelledby="modalBahasa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Bahasa</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-bahasa') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_bahasa_bahasa" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_bahasa_bahasa']) ? 'is-invalid' : '' ?>" id="lain_bahasa_bahasa" autocomplete="off" placeholder="Masukkan Bahasa" 
                        value="<?= old('lain_bahasa_bahasa') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_bahasa_bahasa'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_bahasa_bahasa'] ?>
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

<div class="modal fade" id="modalKeahlian" tabindex="-1" aria-labelledby="modalKeahlian" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Keahlian</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-keahlian') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_keahlian_keahlian" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_keahlian_keahlian']) ? 'is-invalid' : '' ?>" id="lain_keahlian_keahlian" autocomplete="off" placeholder="Masukkan Keahlian" 
                        value="<?= old('lain_keahlian_keahlian') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_keahlian_keahlian'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_keahlian_keahlian'] ?>
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

<div class="modal fade" id="modalOlahraga" tabindex="-1" aria-labelledby="modalOlahraga" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Olahraga</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-olahraga') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_olahraga_olahraga" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_olahraga_olahraga']) ? 'is-invalid' : '' ?>" id="lain_olahraga_olahraga" autocomplete="off" placeholder="Masukkan Bidang Olahraga Lain" 
                        value="<?= old('lain_olahraga_olahraga') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_olahraga_olahraga'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_olahraga_olahraga'] ?>
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

<div class="modal fade" id="modalSenbud" tabindex="-1" aria-labelledby="modalSenbud" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Bidang Seni dan Budaya Lain</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-senbud') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_senbud_senbud" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_senbud_senbud']) ? 'is-invalid' : '' ?>" id="lain_senbud_senbud" autocomplete="off" placeholder="Masukkan Bidang Seni dan Budaya Lain" 
                        value="<?= old('lain_senbud_senbud') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_senbud_senbud'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_senbud_senbud'] ?>
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

<div class="modal fade" id="modalPenalaran" tabindex="-1" aria-labelledby="modalPenalaran" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Bidang Penalaran Lain</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-penalaran') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_penalaran_penalaran" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_penalaran_penalaran']) ? 'is-invalid' : '' ?>" id="lain_penalaran_penalaran" autocomplete="off" placeholder="Masukkan Bidang Penalaran Lain" 
                        value="<?= old('lain_penalaran_penalaran') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_penalaran_penalaran'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_penalaran_penalaran'] ?>
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

<div class="modal fade" id="modalAgama" tabindex="-1" aria-labelledby="modalAgama" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Bidang Keagamaan Lain</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-agama') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_agama_agama" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_agama_agama']) ? 'is-invalid' : '' ?>" id="lain_agama_agama" autocomplete="off" placeholder="Masukkan Bidang Keagamaan Lain" 
                        value="<?= old('lain_agama_agama') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_agama_agama'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_agama_agama'] ?>
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

<div class="modal fade" id="modalBahasam" tabindex="-1" aria-labelledby="modalBahasam" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalLain text-clr1">Tambah Bidang Bahasa Lain</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('simpan-bahasam') ?>" method="post">
                    <input type="hidden" name="lain_id_lain" value="<?= $lain['lain_id'] ?>">
                    <div class="mb-3">
                        <input name="lain_bahasam_bahasam" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13<?= session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_bahasam_bahasam']) ? 'is-invalid' : '' ?>" id="lain_bahasam_bahasam" autocomplete="off" placeholder="Masukkan Bidang Bahasa Lain" 
                        value="<?= old('lain_bahasam_bahasam') ?>">
                        
                        <?php if (session()->getFlashdata('errors-lain') && isset(session()->getFlashdata('errors-lain')['lain_bahasam_bahasam'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('errors-lain')['lain_bahasam_bahasam'] ?>
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