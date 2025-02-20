<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-6 m-0 p-0">
            <?php if(session()->getFlashdata('success-pengumuman')): ?>
                <div class="alert alert-success ls-1 lh-1">
                    <?= session()->getFlashdata('success-pengumuman') ?>
                </div>
            <?php endif; ?>
        </div>
    </div> 
    <div class="card m-0 p-3 mb-2 bg-clr1 text-clr5">
        <div class="row m-0 p-0">
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-pengumuman') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 <?= ($cond == '') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Menunggu dilampirkan</a>
            </div>
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-pengumuman-where-lulus') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 mt-2 mt-md-0 <?= ($cond == 'lulus') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Telah terlampir: Lulus</a>
            </div>
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-pengumuman-where-tidak-lulus') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 mt-2 mt-md-0 <?= ($cond == 'tidak-lulus') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Telah terlampir: Tidak Lulus</a>
            </div>
            <div class="col-md-3 m-0 p-0">
                <a href="<?= base_url('atur-pengumuman-where-all') ?>" class="btn btn-light fsz-13 p-1 ls-1 lh-1 text-clr1 mt-2 mt-md-0 <?= ($cond == 'all') ? 'bg-clr4' : '' ?>" style="width:95%;"><i class="fas fa-search me-2"></i>Semuanya</a>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-md-6 m-0 p-0">
            <div class="card m-0 p-3 mb-3 bg-clr4 text-clr1 border-clr1">
                <p class="m-0 ls-1 lh-1 fsz-14">Data yang tertera di bawah hanya peserta yang telah mengikuti wawancara.</p>
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
                                    <div class="d-flex justify-content-center rounded ms-4 ms-md-1 ms-lg-4 shadow-m" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('/' . $x['bp_foto']) ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center rounded ms-4 ms-md-1 ms-lg-4 shadow-m" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="width:70%;">
                                <p class="ls-s lh-1 fw-bold text-clr1 fsz-17 mb-0"><?= $x['santri_nama'] ?></p>
                                <p class="ls-s lh-1 text-clr1 fsz-12 mb-0"><?= $x['santri_nik'] ?></p>
                                <?php if (isset($x['pengumuman_saved']) && isset($x['pengumuman_status']) && $x['pengumuman_saved'] == 1 && $x['pengumuman_status'] == 1): ?>
                                    <p class="m-0 text-clr1 fsz-12">Status: <i class="fst-normal bg-clr1 text-clr5 px-1">Lulus</i></p>
                                <?php elseif (isset($x['pengumuman_saved']) && isset($x['pengumuman_status']) && $x['pengumuman_saved'] == 1 && $x['pengumuman_status'] == 0): ?>
                                    <p class="m-0 text-clr1 fsz-12">Status: <i class="fst-normal bg-danger text-clr5 px-1">Tidak Lulus</i></p>
                                <?php else: ?>
                                    <p class="m-0 text-clr1 fsz-12">Status: <i class="fst-normal bg-warning text-dark px-1">Menunggu</i></p>
                                <?php endif; ?>
                                <a href="<?= base_url('atur-pengumuman/' . $x['peserta_id']) ?>" class="btn btn-clr1 py-1 lh-s mt-1 fsz-12">Lihat detail</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>