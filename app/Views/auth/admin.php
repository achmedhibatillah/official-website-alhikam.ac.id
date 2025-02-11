<section class="bg-clr5 bg-web position-relative d-flex justify-content-center align-items-center" style="min-height:100vh;background-image:url('<?= base_url('images/bg-auth.png') ?>');">
    <div class="">
        <?php if(session()->getFlashdata('success-daftar')): ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata('success-daftar') ?>
            </div>
        <?php endif; ?>
        <div class="card m-0 p-0 border-clr1-3 bg-clr4 mx-2 position-relative" style="border-radius:20px;">
            <a href="<?= base_url() ?>" class="position-absolute td-none text-clr1 ls-xs" style="top:20px;left:20px;"><img src="<?= base_url('images/icon/back.png') ?>" class="he-15 mb-2"></a>
            <div class="card-body p-0 text-clr1" style="margin:38px;">
                <div class="d-flex justify-content-center">
                    <img src="<?= base_url('images/logo.png') ?>" class="he-30 mb-2">
                </div>
                <h4 class="ls-s fw-bold">Login Admin</h4>
                <p class="ls-1 lh-m fsz-15 mt--2">Hanya admin yang dapat mengakses.</p>
                <?php if (session()->getFlashdata('errors-masuk') && isset(session()->getFlashdata('errors-masuk')['auth'])): ?>
                    <div class="alert alert-danger py-3 text-center" style="font-size:13px;"><?= session()->getFlashdata('errors-masuk')['auth'] ?></div>
                <?php endif; ?>
                <form action="<?= base_url('authentication-admin') ?>" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label mb-0 fsz-14 ls-1 fw-bold">Username</label>
                        <input name="username" type="text" autocomplete="off" class="form-control ps-3 py-2 mt-0 fsz-13 <?= session()->getFlashdata('errors-masuk') && isset(session()->getFlashdata('errors-masuk')['username']) ? 'is-invalid' : '' ?>" id="username" placeholder="Username" value="<?= old('username') ?>">
                        <?php if (session()->getFlashdata('errors-masuk') && isset(session()->getFlashdata('errors-masuk')['username'])): ?>
                            <div class="text-danger mt-1 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-masuk')['username'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="pass" class="form-label mb-0 fsz-14 ls-1 fw-bold">Password</label>
                        <div class="input-group">
                            <input name="pass" type="password" class="form-control ps-3 py-2 mt-0 fsz-13 me-5 <?= session()->getFlashdata('errors-masuk') && isset(session()->getFlashdata('errors-masuk')['pass']) ? 'is-invalid' : '' ?>" id="pass" placeholder="Password" value="<?= old('pass') ?>">
                        </div>
                        <?php if (session()->getFlashdata('errors-masuk') && isset(session()->getFlashdata('errors-masuk')['pass'])): ?>
                            <div class="text-danger mt-1 mb-1 lh-s ms-2" style="font-size:13px;"><?= session()->getFlashdata('errors-masuk')['pass'] ?></div>
                        <?php endif; ?>
                        <button class="btn btn-transparent text-clr1 position-absolute" style="top:0;right:0;transform:translate(0%,50%);" type="button" id="togglePassword"><i class="fas fa-eye"></i></button>
                    </div>
                    <div class="mb-3">
                        <div class="row m-0 p-0">
                            <div class="col-12 m-0 p-0">
                                <input type="checkbox" name="ingat" class="form-check-input border-clr1 he-13 we-13" id="ingat">
                                <label class="form-check-label fsz-13" for="ingat">Ingat akun ini</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-n-clr1-clr5 py-1 w-100 fsz-14"><i class="fas fa-lock me-1"></i> Masuk</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('pass');
        var icon = this.querySelector('i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

