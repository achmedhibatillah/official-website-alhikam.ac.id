<div class="m-3">
    <?php if (session()->getFlashdata('unver-success')): ?>
        <div class="mb-3 alert alert-success">
            <?= session()->getFlashdata('unver-success') ?>
        </div>
    <?php endif; ?>
    <div class="card m-0 p-3 mb-3 bg-clr1 text-clr5">
        <div class="row m-0 p-0">
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-wawancara') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 <?= ($cond == '') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Menunggu didata</a>
            </div>
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-wawancara-where-queue') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 mt-2 mt-md-0 <?= ($cond == 'queue') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Menunggu verifikasi</a>
            </div>
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-wawancara-where-verified') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 mt-2 mt-md-0 <?= ($cond == 'verified') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Sudah wawancara</a>
            </div>
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-wawancara-where-all') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 mt-2 mt-md-0 <?= ($cond == 'all') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Semuanya</a>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <?php foreach($santri as $x) : ?>
            <div class="col-md-4 m-0 p-0">
                <div class="card border-clr1 m-0 mb-2 ms-0 ms-md-1 d-flex justify-content-center align-items-center position-relative" style="height:130px;">
                    <table class="w-100">
                        <tr>
                            <td style="width:30%;">
                                <?php if ($x['bp_foto']): ?>
                                    <div class="d-flex justify-content-center rounded ms-4 ms-md-1 ms-lg-4" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('/' . $x['bp_foto']) ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center rounded ms-4 ms-md-1 ms-lg-4" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="width:70%;">
                                <p class="ls-s lh-1 fw-bold text-clr1 fsz-17 mb-0"><?= $x['santri_nama'] ?></p>
                                <p class="ls-s lh-1 text-clr1 fsz-12 mb-0"><?= $x['santri_nik'] ?></p>
                                <a href="<?= base_url('atur-wawancara/' . $x['peserta_id']) ?>" class="btn btn-clr1 py-1 lh-s mt-1 fsz-12">Lihat detail</a>
                            </td>
                        </tr>
                    </table>
                    <?php if($x['tw_status'] == 1): ?>
                        <i class="fas fa-check text-clr1 position-absolute" style="transform:translate(-50%,-50%);top:50%;right:20px;"></i>
                    <?php else: ?>
                        <i class="fas fa-hourglass-half text-danger position-absolute" style="transform:translate(-50%,-50%);top:50%;right:20px;"></i>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>