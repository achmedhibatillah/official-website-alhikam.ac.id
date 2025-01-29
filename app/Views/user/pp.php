<div class="">
<input name="rk_pernah_penyakit" type="text" class="form-control input-clr1-out ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_pernah_penyakit']) ? 'is-invalid' : '' ?>" id="rk_pernah_penyakit" autocomplete="off" placeholder="Tambah Nama Penyakit" 
value="<?= old('rk_pernah_penyakit') ?>">
<?php if (session()->getFlashdata('errors-rk') && isset(session()->getFlashdata('errors-rk')['rk_pernah_penyakit'])): ?>
    <div class="text-danger mt-0 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-rk')['rk_pernah_penyakit'] ?></div>
<?php endif; ?>
</div>