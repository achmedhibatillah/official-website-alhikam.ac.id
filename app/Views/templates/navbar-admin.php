<div class="row m-0 p-0 w-100" style="min-height:100vh;">

<div class="col-md-3 m-0 px-4 py-5 bg-clr1" id="navbar-admin">
    <div class="row m-0 p-0">
        <div class="col-2 m-0 p-0">
            <div class="bg-clr5 p-3 d-flex justify-content-center align-items-center d-inline" style="width:45px;height:45px;border-radius:50%;">
                <img src="<?= base_url('images/logo.png') ?>" style="height:30px;">
            </div>
        </div>
        <div class="col-10 m-0 p-0">
            <div class="d-flex align-items-center">
                <div class="">
                    <h3 class="text-clr5 d-inline fw-800 ls-xxs mt-0 mb-0">Al-Hikam</h3>
                    <p class="text-clr5 mt--2 mb-0">Admin Page</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="card m-0 py-2 text-clr1 lh-1 fsz-18 mb-2 he-35 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:20px;" onclick="window.location.href = '<?= base_url('dashboard-admin'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-11 m-0 p-0">Dashboard</div>
                <div class="col-1 m-0 p-0 d-flex justify-content-center align-items-center"><?= ($page == 'admin-dashboard') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="card m-0 py-2 text-clr1 lh-1 fsz-18 mb-2 he-35 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:20px;" onclick="window.location.href = '<?= base_url('daftar-calon-santri'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-11 m-0 p-0">Daftar Calon Santri</div>
                <div class="col-1 m-0 p-0 d-flex justify-content-center align-items-center"><?= ($page == 'admin-santri') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="card m-0 py-2 text-clr1 lh-1 fsz-18 mb-2 he-35 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:20px;" onclick="window.location.href = '<?= base_url('verifikasi-calon-santri'); ?>'">
            <div class="row m-0 p-0">
                <div class="col-11 m-0 p-0">Verifikasi Pembayaran</div>
                <div class="col-1 m-0 p-0 d-flex justify-content-center align-items-center"><?= ($page == 'admin-verifikasi') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9 m-0 p-0 bg-clr5">