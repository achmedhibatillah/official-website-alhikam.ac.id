<div class="m-3">
    <div class="row m-0 p-0">
        <div class="col-md-6 m-0 p-0 order-2 order-md-1">
            <div class="">
                <p class="mb-0 text-center ls-s lh-s fsz-13">Filter berdasarkan:</p>
                <div class="row m-0 p-0 mb-2">
                    <div class="col-2 m-0 p-0 pe-1">
                        <a href="<?= base_url('daftar-calon-santri') ?>" class="btn btn-secondary p-0 fsz-13 w-100">BS</a>
                    </div>
                    <div class="col-2 m-0 p-0 pe-1">
                        <a href="<?= base_url('daftar-calon-santri-where-bo') ?>" class="btn btn-secondary p-0 fsz-13 w-100">BO</a>
                    </div>
                    <div class="col-2 m-0 p-0 pe-1">
                        <a href="<?= base_url('daftar-calon-santri-where-rk') ?>" class="btn btn-secondary p-0 fsz-13 w-100">RK</a>
                    </div>
                    <div class="col-2 m-0 p-0 pe-1">
                        <a href="<?= base_url('daftar-calon-santri-where-bp') ?>" class="btn btn-secondary p-0 fsz-13 w-100">BP</a>
                    </div>
                    <div class="col-2 m-0 p-0 pe-1">
                        <a href="<?= base_url('daftar-calon-santri-where-tt') ?>" class="btn btn-secondary p-0 fsz-13 w-100">TT</a>
                    </div>
                    <div class="col-2 m-0 p-0 pe-1">
                        <a href="<?= base_url('daftar-calon-santri-where-tw') ?>" class="btn btn-secondary p-0 fsz-13 w-100">TW</a>
                    </div>
                </div>
            </div>
            <form action="<?= base_url('daftar-calon-santri') ?>" class="mt-2 mt-md-0">
                <div class="row m-0 p-0">
                    <div class="col-10 m-0 p-0 pe-1">
                        <input type="text" name="keyword" id="" class="form-control he-33 fsz-14 ls-1 border-clr4" placeholder="Cari berdasarkan nama atau NIK ..." value="<?= $keyword ?>" autocomplete="off">
                    </div>
                    <div class="col-2 m-0 p-0 pe-2">
                        <button type="submit" class="he-33 rounded text-clr5 bg-clr4 border-clr3 w-100"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 m-0 p-0 order-1 order-md-2 px-2">
            <p class="fsz-12 mb-0 ls-s">Keterangan telah mengisi:</p>
            <p class="fsz-12 mb-0 ls-s" style="line-height:1.2;"><i class="text-index">BS</i> : Biodata calon santri | <i class="text-index">BO</i> : Biodata orang tua | <i class="text-index">RK</i> : Riwayat kesehatan & lain-lain | <i class="text-index">BP</i> : Bukti pembayaran | <i class="text-index">TT</i> : Tes tulis | <i class="text-index">TW</i> : Tes wawancara</p>
        </div>
    </div>
    <hr>
    <div class="row m-0 p-0">
        <?php foreach($santri as $x) : ?>
            <div class="col-md-6 m-0 p-0">
                <div class="card bg-clr4 border-clr1 m-0 mb-2 cursor-pointer ms-0 ms-md-1 d-flex justify-content-center align-items-center" onclick="window.location.href = '<?= base_url('calon-santri/' . $x['peserta_id']); ?>'" style="height:100px;">
                    <table class="w-100">
                        <tr>
                            <td style="width:20%;">
                                <?php if ($x['bp_foto']): ?>
                                    <div class="d-flex justify-content-center rounded bg-secondary ms-2 ms-md-1 ms-lg-4" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('/' . $x['bp_foto']) ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center rounded ms-2 ms-md-1 ms-lg-4" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="width:85%;">
                                <p class="ls-s lh-1 fw-bold text-clr1 fsz-17 mb-0"><?= $x['santri_nama'] ?></p>
                                <p class="ls-s lh-1 text-clr1 fsz-12 mb-0"><?= $x['santri_nik'] ?></p>
                                <i class="text-index fsz-13">BS</i>
                                <?= ($x['ortu_saved'] == 1) ? '<i class="text-index fsz-13">BO</i>' : '' ?>
                                <?= ($x['rk_saved'] == 1) ? '<i class="text-index fsz-13">RK</i>' : '' ?>
                                <?= ($x['bp_saved'] == 1) ? '<i class="text-index fsz-13">BP</i>' : '' ?>
                                <?= ($x['testulis_konfirm'] == 1) ? '<i class="text-index fsz-13">TT</i>' : '' ?>
                                <?= ($x['tw_status'] == 1) ? '<i class="text-index fsz-13">BW</i>' : '' ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>