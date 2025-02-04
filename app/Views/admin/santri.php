<div class="m-3">
    <p class="fsz-12 mb-0 ls-s">Keterangan telah mengisi:</p>
    <p class="fsz-12 ls-s" style="line-height:1.2;"><i class="text-index">BS</i> : Biodata calon santri | <i class="text-index">BO</i> : Biodata orang tua | <i class="text-index">RK</i> : Riwayat kesehatan & lain-lain | <i class="text-index">BP</i> : Bukti pembayaran | <i class="text-index">TT</i> : Tes tulis | <i class="text-index">TW</i> : Tes wawancara</p>
    <hr>
    <div class="row m-0 p-0">
        <?php foreach($santri as $x) : ?>
            <div class="col-md-6 m-0 p-0">
                <div class="card border-clr1 m-0 mb-2 cursor-pointer ms-0 ms-md-1 d-flex justify-content-center align-items-center" onclick="window.location.href = '<?= base_url('calon-santri/' . $x['peserta_id']); ?>'" style="height:100px;">
                    <table class="w-100">
                        <tr>
                            <td style="width:20%;">
                                <?php if ($x['bp_foto']): ?>
                                    <div class="d-flex justify-content-center rounded ms-2 ms-md-1 ms-lg-4" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('/' . $x['bp_foto']) ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center rounded ms-2 ms-md-1 ms-lg-4" style="overflow:hidden;width:50px;height:65px;">
                                        <img src="<?= base_url('images/blank.png') ?>" alt="Pas foto" class="img-death">
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="width:75%;">
                                <p class="ls-s lh-1 fw-bold text-clr1 fsz-17 mb-0"><?= $x['santri_nama'] ?></p>
                                <p class="ls-s lh-1 text-clr1 fsz-12 mb-0"><?= $x['santri_nik'] ?></p>
                                <i class="text-index fsz-13">BS</i>
                                <?= ($x['ortu_saved'] == 1) ? '<i class="text-index fsz-13">BO</i>' : '' ?>
                                <?= ($x['rk_saved'] == 1) ? '<i class="text-index fsz-13">RK</i>' : '' ?>
                                <?= ($x['bp_saved'] == 1) ? '<i class="text-index fsz-13">BP</i>' : '' ?>
                                <?= ($x['tt_konfirm'] == 1) ? '<i class="text-index fsz-13">TT</i>' : '' ?>
                                <?= ($x['tw_status'] == 1) ? '<i class="text-index fsz-13">BW</i>' : '' ?>
                            </td>
                            <td style="width:5%;"><i class="fas fa-trash"></i></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>