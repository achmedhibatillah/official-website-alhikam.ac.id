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
        <div class="btn m-0 py-1 border-clr5 btn-outline-light lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('dashboard-admin'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-tachometer-alt"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Dashboard</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-dashboard') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="btn m-0 py-1 btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('konfigurasi-utama'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-cog"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Atur Konfigurasi Utama</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-cog') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="btn m-0 py-1 btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('daftar-calon-santri'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-receipt"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Daftar Calon Santri</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-santri') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('verifikasi-pembayaran'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-users"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Verifikasi Pembayaran</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-verifikasi') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('atur-tes-tulis'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-file-alt"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Tes Tulis</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-tes-tulis') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('atur-wawancara'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-chalkboard-teacher"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Tes Wawancara</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-wawancara') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
        <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('atur-pengumuman'); ?>'">
            <div class="row m-0 p-0 w-100">
                <div class="col-1 m-0 p-0"><i class="fas fa-bullhorn"></i></div>
                <div class="col-10 m-0 p-0 d-flex justify-content-start ps-2">Pengumuman Kelulusan</div>
                <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-pengumuman') ? '<i class="fas fa-circle"></i>' : '' ?></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9 m-0 p-0 bg-clr5">
<div class="card bg-clr1 m-3 px-4 py-2">
    <div class="row m-0 p-0">
        <div class="col-10 m-0 p-0">
            <h4 class="m-0 text-clr5 fw-800 ls-xxs lh-1"><?= $title ?></h4>
        </div>
        <div class="col-2 m-0 p-0 d-flex justify-content-end align-items-center">
            <i class="fas fa-user-circle text-clr5 cursor-pointer" id="admin-login"></i>
        </div>
    </div>
</div>

<div id="fixed-card" class="fixed-card bg-clr4">
    <p class="fw-bold ls-1 lh-1 mb-0 text-clr1"><i class="fas fa-user-circle lh-1 me-2"></i>Admin</p>
    <a href="<?= base_url('d') ?>" class="btn btn-outline-danger fsz-14 py-0 mx-0 mt-4 mb-0" style="width:50%;">Logout</a>
    <button id="close-card">x</button>
</div>

<style>
.fixed-card { display: none; position: fixed; padding: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); border-radius: 8px; border: 2px solid var(--clr5); z-index: 1000; }
#close-card { position: absolute; top: 10px; right: 10px; padding: 5px 10px; background: red; color: white; border: none; cursor: pointer; }
@media screen and (max-width: 990px) {
.fixed-card { top: 50%; left: 50%; transform: translate(-50%, -50%); width: 90%; }
}
@media screen and (min-width: 991px) {
.fixed-card { top: 50px; right: 20px; transform: translate(0%, 0%); width: 300px; }
}
</style>

<script>
document.getElementById("admin-login").addEventListener("click", function() {
    document.getElementById("fixed-card").style.display = "block";
});

document.getElementById("close-card").addEventListener("click", function() {
    document.getElementById("fixed-card").style.display = "none";
});
</script>