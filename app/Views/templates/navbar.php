<nav class="navbar navbar-expand-lg bg-clr5 p-0 py-2 w-100">
<div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url() ?>">
        <div class="row m-0 p-0" style="width:200px;">
            <div class="col-3 m-0 p-0 d-flex justify-content-center align-items-center">
                <img src="<?= base_url('images/logo.png') ?>" alt="al-hikam" style="height:38px;">
            </div>
            <div class="col-9 m-0 p-0 d-flex justify-content-center align-items-center">
                <h5 class="text-clr1 ff-dm-serif lh-s fsz-15 m-0">Pesantren Mahasiswa<br>Al-Hikam Malang</h5>
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto ms-md-5 mb-2 mb-lg-0 mt-3 mt-md-0">
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 fsz-18" href="<?= base_url('') ?>">Beranda</a>
        </li>
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 fsz-18" href="<?= base_url('/#profil-pondok') ?>">Profil Pondok</a>
        </li>
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 fsz-18" href="<?= base_url('/#pendaftaran') ?>">Pendaftaran</a>
        </li>
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 fsz-18" href="<?= base_url('/#tanya-jawab') ?>">Tanya Jawab</a>
        </li>
        <?php if (session()->get('status') === 'login-user'): ?>
            <li class="nav-item d-flex align-items-center mx-md-2">
                <a class="nav-link fw-bold text-clr1 fsz-18" href="<?= base_url('/berkas-pendaftaran') ?>">Berkas Pendaftaran</a>
            </li>
        <?php endif; ?>
    </ul>
    <?php if (!(session()->get('status') === 'login-user')): ?>
        <div class="me-md-4 mt-2 mt-md-0">
            <a href="<?= base_url('masuk') ?>" class="btn btn-clr2-clr5-clr1 fw-bold">Masuk</a>
            <a href="<?= base_url('daftar') ?>" class="btn btn-n-clr2-clr1 fw-bold">Daftar Sekarang</a>
        </div>
    <?php elseif (session()->get('status') === 'login-user' && isset($user)): ?>
        <div class="row m-0 p-0 mt-3 mt-md-0 mb-3 mb-md-0" style="width:240px;" id="username-login">
            <div class="col-10 m-0 p-0 d-flex justify-content-start justify-content-md-end align-items-center order-2 order-md-1">
                <div class="text-clr1 fsz-16 fw-bold ls-s p-0 me-0 me-md-2 cursor-pointer"><?= esc($user['peserta_nama']) ?></div>
            </div>
            <div class="col-2 m-0 p-0 d-flex align-items-center justify-content-center justify-content-md-start order-1 order-md-2">
                <i class="fas fa-user-circle text-clr1 me-2 me-md-0 cursor-pointer"></i>
            </div>
        </div>
        <div id="fixed-card" class="fixed-card bg-clr4">
            <p class="fw-bold ls-1 lh-1 mb-0"><i class="fas fa-user-circle lh-1 me-2"></i><?= esc($user['peserta_nama']) ?></p>
            <div class="card m-0 p-3 mt-3">
                <p class="ls-s lh-1 fsz-14 mb-1 text-clr1">No KTP</p>
                <p class="ls-s lh-1 mb-0 fw-bold ms-2 text-clr1" style="width:70%;"><?= esc($user['peserta_ktp']) ?></p>
                <p class="ls-s lh-1 fsz-14 mt-3 mb-1 text-clr1">Username / No Telp</p>
                <p class="ls-s lh-1 mb-0 fw-bold ms-2 text-clr1" style="width:70%;"><?= esc($user['peserta_username']) ?></p>
                <p class="ls-s lh-1 fsz-14 mt-3 mb-1 text-clr1">Email</p>
                <p class="ls-s lh-1 mb-0 fw-bold ms-2 text-clr1" style="width:70%;"><?= esc($user['peserta_email']) ?></p>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?= base_url('berkas-pendaftaran') ?>" class="btn btn-clr1 fsz-14 py-0 mt-3" style="width:70%;">Berkas Pendaftaran</a>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?= base_url('d') ?>" class="btn btn-danger fsz-14 py-0 mt-2 mb-0" style="width:70%;">Logout</a>
            </div>
            <button id="close-card">x</button>
        </div>
    <?php endif; ?>
    </div>
</div>
</nav>


<style>
.navbar { z-index:5; position: fixed; top: 0; left: 0; border-bottom: 3px solid var(--clr1); border-radius: 0 0 20px 20px; }
.active { background-color: var(--clr1); color: var(--clr5) !important; font-weight: bold; border-radius: 5px; }

.fixed-card { display: none; position: fixed; padding: 20px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); border-radius: 8px; border: 2px solid var(--clr5); z-index: 1000; }
#close-card { position: absolute; top: 10px; right: 10px; padding: 5px 10px; background: red; color: white; border: none; cursor: pointer; }
@media screen and (max-width: 990px) {
    .fixed-card { top: 50%; left: 50%; transform: translate(-50%, -50%); width: 90%; }
}
@media screen and (min-width: 991px) {
.fixed-card { top: 70px; right: 20px; transform: translate(0%, 0%); width: 300px; }
}
</style>

<script>
document.getElementById("username-login").addEventListener("click", function() {
    document.getElementById("fixed-card").style.display = "block";
});

document.getElementById("close-card").addEventListener("click", function() {
    document.getElementById("fixed-card").style.display = "none";
});

document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");
    const navLinks = document.querySelectorAll(".nav-link");

    function activateNav() {
        let scrollPosition = window.scrollY + window.innerHeight / 3; // Ambil posisi scroll, lebih awal sedikit

        sections.forEach(section => {
            let id = section.getAttribute("id");
            let sectionTop = section.offsetTop;
            let sectionHeight = section.offsetHeight;

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === `#${id}`) {
                        link.classList.add("active");
                    }
                });
            }
        });
    }

    window.addEventListener("scroll", activateNav);
});
</script>