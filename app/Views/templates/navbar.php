<nav class="navbar navbar-expand-lg bg-clr5 p-0 py-2 w-100">
<div class="container-fluid">
    <a class="navbar-brand" href="#">
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
            <a class="nav-link fw-bold <?= ($page == 'beranda') ? 'active' : '' ?>" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 <?= ($page == 'profil') ? 'active' : '' ?>" href="#">Profil Pondok</a>
        </li>
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 <?= ($page == 'pendaftaran') ? 'active' : '' ?>" href="#">Pendaftaran</a>
        </li>
        <li class="nav-item d-flex align-items-center mx-md-2">
            <a class="nav-link fw-bold text-clr1 <?= ($page == 'tanya-jawab') ? 'active' : '' ?>" href="#">Tanya Jawab</a>
        </li>
    </ul>
    <div class="me-md-4 mt-2 mt-md-0">
        <a href="<?= base_url('masuk') ?>" class="btn btn-sm btn-clr2-clr5-clr1 fw-bold">Masuk</a>
        <a href="<?= base_url('daftar') ?>" class="btn btn-sm btn-n-clr2-clr1 fw-bold">Daftar Sekarang</a>
    </div>
    
    </div>
</div>
</nav>


<style>
.navbar { z-index:2; position: absolute; top: 0; left: 0; border-bottom: 3px solid var(--clr1); border-radius: 0 0 20px 20px; }
.active { background-color: var(--clr1); color: var(--clr5) !important; font-weight: bold; border-radius: 5px; }
</style>