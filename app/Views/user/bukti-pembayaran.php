<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">BUKTI PEMBAYARAN</h1>

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-6 m-0 p-0 px-3 px-md-3">
        <div class="card m-1 m-md-4 p-0 py-5 text-clr1">
            <h5 class="text-center mb-0 fw-800 ls-1 lh-1">Pas Foto Calon Santri</h5>
            <div class="d-flex justify-content-center mt-4">
                <div class="d-flex justify-content-center rounded border-clr1" style="overflow:hidden;width:150px;height:200px;">
                    <img src="<?= base_url($bp['bp_foto']) ?>" alt="Pas foto">
                </div>
            </div>
            <hr class="mt-5">
            <h5 class="text-center mb-0 fw-800 ls-1 lh-1 mt-5">Bukti Pembayaran</h5>
            <p class="ls-s lh-1 text-center mt-2 mb-3">Terimakasih, Anda telah mengirim bukti pembayaran.</p>
            <p class="ls-s lh-1 text-center mb-1">Status:</p>
            <div class="d-flex justify-content-center mb-3">
                <?php if($bp['bp_konfirm'] == 0): ?>
                    <div class="d-inline bg-warning text-clr5 px-3 py-1 rounded lh-1 ls-s fsz-14">Sedang diverifikasi <i class="fas fa-hourglass-half ms-1"></i></div>
                <?php elseif($bp['bp_konfirm'] == 1): ?>
                    <div class="d-inline bg-clr1 text-clr5 px-3 py-1 rounded lh-1 ls-s fsz-14">Terverifikasi</div>
                <?php else: ?>
                    <div class="d-inline bg-danger text-clr5 px-3 py-1 rounded lh-1 ls-s fsz-14">Tidak terverifikasi</div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <?php $file_bp = str_replace('uploads/bp/', '', $bp['bp_bp']); ?>
                <a href="<?= base_url('download-bukti-pembayaran/') . $file_bp ?>" class="btn btn-sm btn-outline-clr1 px-4 lh-1 ls-s"><i class="fas fa-download me-2"></i>Unduh bukti pembayaran Anda di sini</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a target="_blank" href="https://chat.whatsapp.com/Dg31q8T8YNeENGwem01bpi" class="btn btn-clr1 py-1 ls-s lh-1 fsz-14 mt-4" style="width:290px;">Grup Whatsapp calon santri Al-Hikam <i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

</div>

</section>