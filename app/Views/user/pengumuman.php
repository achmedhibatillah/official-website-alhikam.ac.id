<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-3">PENGUMUMAN</h1>

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-6 m-0 p-0 px-3 px-md-3">
    <div class="card bg-clr4 m-1 m-md-4 p-3">
        <?php if ($pengumuman['pengumuman_saved'] == 1): ?>
            <p class="fw-bold text-center mb-1 text-clr1">Pengumuman:</p>
            <a href="<?= base_url('') ?>" class="btn btn-clr1 lh-1 px-3"><i class="fas fa-download me-2"></i> Download SK</a>
            <div class="card m-0 p-0 border-clr1 mt-3 px-3 py-3 text-clr1">
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
                <p class="ls-1 m-0"><i class="fas fa-check-circle me-2"></i> Kasur</p>
        </div>
        <?php else: ?>
            <div class="d-flex justify-content-center align-items-center" style="min-height:200px;">
                <p class="text-clr1 ls-1 text-center">Pengumuman belum keluar.</p>
            </div>
        <?php endif; ?>
    </div>

    </div>

</div>

</section>