<section class="bg-clr5 bg-web position-relative d-flex justify-content-center align-items-center" style="min-height:100vh;padding:80px 0;background-image:url('<?= base_url('images/bg-auth.png') ?>');">
<div class="card m-0 p-0 border-clr1-3 mx-2 position-relative" style="border-radius:40px;">
    <a href="<?= base_url() ?>" class="position-absolute td-none text-clr1 ls-xs" style="top:20px;left:20px;"><img src="<?= base_url('images/icon/back.png') ?>" class="he-15 mb-2"></a>
    <div class="card-body p-0 text-clr1" style="margin:38px;">
        <div class="d-flex justify-content-center">
            <img src="<?= base_url('images/logo.png') ?>" class="he-30 mb-2">
        </div>
        <h4 class="ls-s fw-bold">Daftar</h4>
        <p class="ls-1 lh-m fsz-15 mt--2">Masukkan data yang valid.</p>
        <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['auth'])): ?>
            <div class="alert alert-danger py-3 text-center" style="font-size:13px;"><?= session()->getFlashdata('errors-daftar')['auth'] ?></div>
        <?php endif; ?>
        <form action="<?= base_url('registration') ?>" method="post">
            <!-- Username & Email -->
            <div class="row m-0 p-0 mb-3">
                <div class="col-6 m-0 p-0 pe-1 d-flex align-items-end">
                    <div>
                        <label for="username" class="form-label mb-0 fsz-14 ls-1 lh-xs fw-bold">Username (No Telp/WA)</label>
                        <input name="username" type="number" class="form-control input-clr3 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['username']) ? 'is-invalid' : '' ?>" id="username" placeholder="No Telp/WA" value="<?= old('username') ?>">
                    </div>
                </div>
                <div class="col-6 m-0 p-0 d-flex align-items-end">
                    <div>
                        <label for="username" class="form-label mb-0 fsz-14 ls-1 fw-bold">Email</label>
                        <input name="email" type="text" class="form-control input-clr3 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['email']) ? 'is-invalid' : '' ?>" id="username" placeholder="Email" value="<?= old('email') ?>">
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-6 m-0 p-0">
                    <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['username'])): ?>
                        <div class="text-danger mb-1 lh-s ls-xs ms-2" style="margin-top:-12px;font-size:13px;"><?= session()->getFlashdata('errors-daftar')['username'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 m-0 p-0">
                    <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['email'])): ?>
                        <div class="text-danger mb-1 lh-s ls-xs ms-2" style="margin-top:-12px;font-size:13px;"><?= session()->getFlashdata('errors-daftar')['email'] ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label mb-0 fsz-14 ls-1 fw-bold">Nama Lengkap</label>
                <input name="nama" type="text" class="form-control input-clr3 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['nama']) ? 'is-invalid' : '' ?>" id="nama" placeholder="Nama Lengkap" value="<?= old('nama') ?>">
                <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['nama'])): ?>
                    <div class="text-danger mt-1 mb-1 lh-s ls-xs ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-daftar')['nama'] ?></div>
                <?php endif; ?>
            </div>
            <!-- KTP -->
            <div class="mb-3">
                <label for="ktp" class="form-label mb-0 fsz-14 ls-1 fw-bold">No KTP</label>
                <input name="ktp" type="number" class="form-control input-clr3 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['ktp']) ? 'is-invalid' : '' ?>" id="ktp" placeholder="16 digit" value="<?= old('ktp') ?>">
                <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['ktp'])): ?>
                    <div class="text-danger mt-1 mb-1 lh-s ls-xs ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-daftar')['ktp'] ?></div>
                <?php endif; ?>
            </div>
            <!-- Password -->
            <div class="mb-1">
                <div class="row m-0 p-0">
                    <div class="col-6 m-0 p-0 pe-1 d-flex align-items-end">
                        <div>
                            <label for="pass" class="form-label mb-0 fsz-14 ls-1 lh-xs fw-bold">Password</label>
                            <div class="input-group">
                                <input name="pass" type="password" class="form-control input-clr3 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['pass']) ? 'is-invalid' : '' ?>" id="pass" placeholder="Password" value="<?= old('pass') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0 d-flex align-items-end">
                        <div>
                            <label for="pass" class="form-label mb-0 fsz-14 ls-1 lh-xs fw-bold">Konfirmasi Password</label>
                            <div class="input-group">
                                <input name="pass2" type="password" class="form-control input-clr3 ps-3 py-2 mt--1 fsz-13 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['pass2']) ? 'is-invalid' : '' ?>" id="pass2" placeholder="Password" value="<?= old('pass2') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col-6 m-0 p-0">
                        <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['pass'])): ?>
                            <div class="text-danger mb-0 lh-s ls-xs ms-2" style="margin-top:4px;font-size:13px;"><?= session()->getFlashdata('errors-daftar')['pass'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <?php if (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['pass2'])): ?>
                            <div class="text-danger mb-0 lh-s ls-xs ms-2" style="margin-top:4px;font-size:13px;"><?= session()->getFlashdata('errors-daftar')['pass2'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-success btn-sm text-clr1 py-0 fsz-13 ls-s" style="border-radius:10px;" type="button" id="togglePassword"><i class="fas fa-eye"></i> lihat password</button>
            <!-- Setuju -->
            <div class="mt-2 mb-3">
                <input type="checkbox" name="setuju" value="1" class="form-check-input border-clr1 <?= session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['setuju']) ? 'is-invalid-check' : '' ?>" id="setuju">
                <label class="form-check-label ls-s lh-1 fsz-13" for="setuju">Saya setuju dengan <a href="<?= base_url('syarat-ketentuan') ?>" class="td-none text-clr1 fw-bold">Syarat & Ketentuan</a> dan <a href="<?= base_url('kebijakan-privasi') ?>" class="td-none text-clr1 fw-bold">Kebijakan Privasi</a> <br> <?= (session()->getFlashdata('errors-daftar') && isset(session()->getFlashdata('errors-daftar')['setuju'])) ? '<div class="text-danger">' . session()->getFlashdata('errors-daftar')['setuju'] . '</div>' : '' ?> </label>
            </div>
            <!-- Submit -->
            <button type="submit" class="btn btn-n-clr1-clr5 py-1 w-100 fsz-14 mt-2"><i class="fas fa-lock me-1"></i> Daftar</button>
        </form>
        <p class="text-clr1 text-center fsz-13 mt-3 mb-0">Sudah punya akun? <a href="<?= base_url('masuk') ?>" class="td-none text-clr1 fw-800 ls-xs">Masuk</a></p>
    </div>
</div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('pass');
        var passwordInput2 = document.getElementById('pass2');
        var icon = this.querySelector('i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordInput2.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            passwordInput2.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

