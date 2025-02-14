<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">TES TULIS</h1>

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-8 m-0 p-0 px-3 px-md-3">

    <?php if ($tt['testulis_konfirm'] == 1): ?>
        <div class="card bg-clr1 m-1 m-md-4 p-3 text-clr5">
            <h1 class="fw-900 ls-xxs lh-1 text-center m-0">Anda telah menyelesaikan tes tulis</h1>
        </div>
    <?php else: ?>
        <div class="card bg-warning m-1 m-md-4 p-3 text-clr5">
            <h1 class="fw-900 ls-xxs lh-1 text-center m-0">Anda belum mengikuti tes tulis</h1>
        </div>
    <?php endif; ?>

    <div class="card m-1 m-md-4 p-3 text-clr1">
        <p class="fw-bold">[TES TULIS CALON SANTRI BARU PESANTREN MAHASISWA AL-HIKAM MALANG]</p>
        <?php if ($tt['testulis_konfirm'] == 0): ?>
            <p class="fw-bold">Silakan akses halaman di bawah ini:</p>
            <a href="<?= base_url('form-tes-tulis') ?>" class="btn btn-clr2 fw-800 px-3 lh-1 position-relative" style="width:max-content;">
                TES TULIS
                <img src="<?= base_url('images/icon/click.png') ?>" class="position-absolute" style="bottom:-10px;right:-40px;width:30px">
            </a>
        <?php endif; ?>
        <p class="fw-bold mt-3">
            MEKANISME:
            <ul class="mt--2 mb--1 fw-bold">
                <li class="my-0">Peserta Tes Tulis mengakses link soal yang di kirim melalui kontak masing-masing.</li>
                <li class="my-0">Media pengerjaan hanya melalui Google Form tanpa Zoom maupun Google Meet.</li>
                <li class="mt-0">Durasi pelaksanaan Tes Tulis 60 Menit, bisa dimulai pukul 20.10 WIB.</li>
                <li class="mt-0">Setelah selesai mengerjakan, peserta dimohon konfirmasi ke Admin.</li>
            </ul>
        </p>
        <p class="fw-bold">Selamat Mengerjakan💪</p>
        <p class="fw-bold mt-4 mb-0">Panitia Penerimaan Santri Baru</p>
        <p class="fw-bold mt-0">Pesantren Mahasiswa Al-Hikam Malang 2025</p>
    </div>
    </div>

</div>

</section>

