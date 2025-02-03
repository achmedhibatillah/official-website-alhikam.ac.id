<div class="m-3">
    <p class="fsz-14 mb-0 ls-s">Keterangan telah mengisi:</p>
    <p class="fsz-14 ls-s" style="line-height:1.2;"><i class="text-index">BS</i>: Biodata calon santri | <i class="text-index">BO</i>: Biodata orang tua | <i class="text-index">RK</i>: Riwayat kesehatan & lain-lain | <i class="text-index">BP</i>: Bukti pembayaran | <i class="text-index">TT</i>: Tes tulis | <i class="text-index">TW</i>: Tes wawancara</p>
    <?php foreach($santri as $x) : ?>
        <div class="card m-0 p-3 mb-2">
            <table class="w-100">
                <tr>
                    <td style="width:90%;">
                        <?= $x['santri_nama'] ?>
                        <br>
                        <i class="text-index fsz-13">BS</i>
                        <?= ($x['ortu_saved'] == 1) ? '<i class="text-index fsz-13">BO</i>' : '' ?>
                        <?= ($x['rk_saved'] == 1) ? '<i class="text-index fsz-13">RK</i>' : '' ?>
                        <?= ($x['bp_saved'] == 1) ? '<i class="text-index fsz-13">BP</i>' : '' ?>
                        <?= ($x['tt_konfirm'] == 1) ? '<i class="text-index fsz-13">TT</i>' : '' ?>
                        <?= ($x['tw_status'] == 1) ? '<i class="text-index fsz-13">BW</i>' : '' ?>
                    </td>
                    <td style="width:10%;"><i class="fas fa-trash"></i></td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
</div>