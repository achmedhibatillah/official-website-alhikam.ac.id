<div class="row m-0 p-0 w-100" style="height:100vh;">

<div class="col-md-3 m-0 p-0 d-flex justify-content-center bg-clr1" style="min-height:100vh;" id="navbar-admin">
    <div class="w-100">
        <div class="pb-5 py-5 mb-5 mx-4">
            <div class="row m-0 p-0">
                <div class="col-2 m-0 p-0 d-flex align-items-center">
                    <div class="bg-clr5 p-2 d-flex justify-content-center align-items-center d-inline w-100 rounded">
                        <img src="<?= base_url('images/logo.png') ?>" style="width:100%;">
                    </div>
                </div>
                <div class="col-10 m-0 p-0 d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h5 class="text-clr5 d-inline fw-800 ls-s mt-0 mb-0">Al-Hikam</h5>
                            <p class="text-clr5 mt--2 mb-0">Admin Page</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-clr5">
            <div class="mt-0">
                <div class="card border-clr5 bg-transparent p-2 text-clr5 fw-light m-0 ls-1 lh-1 fsz-13 mb-2">
                    <p class="m-0 fw-lighter mb-0 fsz-12 ms-1">Periode berjalan</p>
                    <hr class="mt-1 mb-2">
                    <p class="m-0 ms-1 fw-lighter fst-italic">
                        <?php if ($periode_now !== null): ?>
                            <?= $periode_now['periode_nama'] ?>
                            (<?= date('d/m/Y', strtotime($periode_now['periode_mulai'])) ?> - <?= date('d/m/Y', strtotime($periode_now['periode_selesai'])) ?>).
                        <?php else: ?>
                            Tidak ada periode berjalan.
                        <?php endif; ?>
                    </p>
                </div>
                <div class="card border-clr5 bg-transparent p-2 text-clr5 fw-light m-0 ls-1 lh-1 fsz-13">
                    <p class="m-0 fw-lighter mb-0 fsz-12 ms-1">Konfigurasi</p>
                    <hr class="mt-1 mb-2">
                    <p class="m-0 ms-1 fw-lighter fst-italic">
                        <?php if (session()->get('periode') !== null): ?>
                            <?= session()->get('periode')['nama'] ?>
                            (<?= date('d/m/Y', strtotime(session()->get('periode')['mulai'])) ?> - <?= date('d/m/Y', strtotime(session()->get('periode')['selesai'])) ?>).
                        <?php else: ?>
                            Seluruh data.
                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <div class="mt-2 row m-0 p-0">
                <div class="col-4 m-0 p-0 pe-1">
                    <div class="card border-clr5 text-clr5 bg-transparent px-3 d-clex justify-content-center" style="height:50px;">
                        <div class="">
                            <canvas id="speedometerChart"></canvas>
                        </div>
                    </div>
                    <div class="text-center text-clr5 fsz-14"><?= $jumlah_peserta > 0 ? ($jumlah_peserta_lulus / $jumlah_peserta * 100) : 0 ?>%</div>
                </div>
                <div class="col-4 m-0 p-0 px-1">
                    <div class="card border-clr5 text-clr5 bg-transparent d-flex justify-content-center align-items-center" style="height:50px;">
                        <div class="text-center"><?= $jumlah_peserta ?></div>
                    </div>
                    <div class="text-center text-clr5 fsz-14">peserta</div>
                </div>
                <div class="col-4 m-0 p-0 ps-1">
                    <div class="card border-clr5 text-clr5 bg-transparent d-flex justify-content-center align-items-center" style="height:50px;">
                        <div class="text-center"><?= $jumlah_peserta_lulus ?></div>
                    </div>
                    <div class="text-center text-clr5 fsz-14">santri lulus</div>
                </div>
            </div>
            <div class="mt-4">
                <div class="btn m-0 py-1 border-clr5 btn-outline-light lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('dashboard-admin'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-tachometer-alt"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Dashboard</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-dashboard') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="btn m-0 py-1 btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('periode-penerimaan'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-clock"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Periode Penerimaan</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-periode') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="btn m-0 py-1 btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('konfigurasi-utama'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-cog"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Atur Konfigurasi Utama</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-cog') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="btn m-0 py-1 btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('daftar-calon-santri'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-receipt"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Daftar Calon Santri</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-santri') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('verifikasi-pembayaran'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Verifikasi Pembayaran</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-verifikasi') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('atur-tes-tulis'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-file-alt"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Tes Tulis</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-tes-tulis') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('atur-wawancara'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-chalkboard-teacher"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Tes Wawancara</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-wawancara') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
                <div class="m-0 py-1 btn btn-outline-light text-clr5 lh-1 fsz-12 mb-2 d-flex justify-content-center px-3 cursor-pointer" style="border-radius:5px;" onclick="window.location.href = '<?= base_url('atur-pengumuman'); ?>'">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-1 m-0 p-0"><i class="fas fa-bullhorn"></i></div>
                        <div class="col-10 m-0 p-0 d-flex justify-content-start text-start ps-2">Pengumuman Kelulusan</div>
                        <div class="col-1 m-0 p-0 d-flex align-items-center justify-content-end"><?= ($page == 'admin-pengumuman') ? '<i class="fas fa-circle"></i>' : '' ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9 m-0 p-0 bg-clr5 pb-5">
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const totalPeserta = <?= $jumlah_peserta ?>; 
    const pesertaLulus = <?= $jumlah_peserta_lulus ?>; 

    const persentaseKelulusan = (pesertaLulus / totalPeserta) * 100;

    const ctx = document.getElementById('speedometerChart').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Lulus', 'Belum Lulus'],
            datasets: [{
                data: [persentaseKelulusan, 100 - persentaseKelulusan],
                backgroundColor: ['#4CAF50', '#E0E0E0'], 
                borderWidth: 0
            }]
        },
        options: {
            rotation: 270, 
            circumference: 180, 
            cutout: '75%', 
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true }
            }
        }
    });
</script>