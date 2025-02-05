<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">BUKTI PEMBAYARAN</h1>

<form action="<?= base_url('simpan-bukti-pembayaran') ?>" method="post" enctype="multipart/form-data" class="mt-4">
<input type="hidden" name="bp_id" value="<?= $bp['bp_id'] ?>">

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-6 m-0 p-0 px-3 px-md-3">
        <div class="card m-1 m-md-4 p-3">
            <h4 class=" bg-clr1 text-clr5 rounded py-3 px-4 fw-bold ls-xs mb-3">V. UPLOAD FOTO DAN BUKTI PEMBAYARAN</h4>
            <div class="ls-1 fw-bold text-clr1 text-center mb-3">Maksimal ukuran file adalah 2 MB.</div>
            <table>
                <tr>
                    <td class="ls-1 lh-1 fw-bold text-clr1" style="width:30%;">1. Foto</td>
                    <td class="" style="width:40%;">
                        <input type="file" class="d-none" name="bp_foto_file" id="bp_foto_file" accept=".jpg,.jpeg,.png">
                        <label for="bp_foto_file" class="btn btn-clr2 fw-bold ls-1 lh-1 fsz-14 w-100" id="bp_foto_label">Unggah di sini</label>
                        <div id="file-foto-name" class="text-muted text-center mt-0 ls-1 lh-1 fsz-14"></div>
                        <?php if (session()->getFlashdata('errors-bp') && isset(session()->getFlashdata('errors-bp')['bp_foto_file'])): ?>
                            <div class="text-danger text-center mt-1 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-bp')['bp_foto_file'] ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="pt-3 ls-1 lh-1 fw-bold text-clr1" style="width:30%;">2. Slip Pembayaran</td>
                    <td class="pt-3" style="width:60%;">
                        <input type="file" class="d-none" name="bp_bp_file" id="bp_bp_file" accept=".jpg,.jpeg,.png,.pdf">
                        <label for="bp_bp_file" class="btn btn-clr2 fw-bold ls-1 lh-1 fsz-14 w-100" id="bp_foto_label">Unggah di sini</label>
                        <div id="file-bp-name" class="text-muted text-center mt-0 ls-1 lh-1 fsz-14"></div>
                        <?php if (session()->getFlashdata('errors-bp') && isset(session()->getFlashdata('errors-bp')['bp_bp_file'])): ?>
                            <div class="text-danger text-center mt-1 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-bp')['bp_bp_file'] ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <div class="d-flex justify-content-center align-items-center">
                <a href="https://chat.whatsapp.com/Dg31q8T8YNeENGwem01bpi" class="btn btn-clr1 py-1 ls-s lh-1 fsz-14 mt-4" style="width:290px;">Grup Whatsapp calon santri Al-Hikam <i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="w-100">
            <div class="card px-3 px-md-3 m-1 m-md-4 rounded mt-2">
                <div class="py-3">
                <div class="form-check">
                    <input class="form-check-input border-clr1" type="checkbox" id="bp_saved" name="bp_saved" value="1">
                    <label class="form-check-label text-clr1 fsz-14 mb-0 lh-1" for="bp_saved">
                        Pastikan seluruh data sudah diisi dengan benar & lengkap sebelum klik tombol simpan.
                    </label>
                </div>
                <?php if (session()->getFlashdata('errors-bp') && isset(session()->getFlashdata('errors-bp')['bp_saved'])): ?>
                    <div class="text-danger fsz-12 mt-0" id="errors-bp">
                        <?= session()->getFlashdata('errors-bp')['bp_saved'] ?>
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

<script>
document.getElementById("bp_foto_file").addEventListener("change", function() {
    document.getElementById("file-foto-name").textContent = this.files[0] ? this.files[0].name : "";
});
document.getElementById("bp_bp_file").addEventListener("change", function() {
    document.getElementById("file-bp-name").textContent = this.files[0] ? this.files[0].name : "";
});
</script>
