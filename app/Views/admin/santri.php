<div class="m-3">
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-md-6 m-0 p-0 d-flex align-items-center">
            <div class="w-100">
                <form action="<?= base_url('daftar-calon-santri') ?>" class="mt-2 mt-md-0 d-flex justify-content-center">
                    <div class="row m-0 p-0 w-100">
                        <div class="col-10 m-0 p-0 pe-1">
                            <input type="text" name="keyword" id="" class="form-control he-33 fsz-14 ls-1 border-clr4" placeholder="Cari berdasarkan nama atau NIK ..." value="<?= $keyword ?>" autocomplete="off">
                        </div>
                        <div class="col-2 m-0 p-0 pe-2">
                            <button type="submit" class="he-33 rounded text-clr5 bg-clr4 border-clr3 w-100 m-0"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 row m-0 p-0 d-flex align-items-center">
            <div class="mt-3 mt-md-0">
                <div class="dropdown">
                    <button class="rounded border-none bg-clr1 text-clr5 dropdown-toggle he-33 fsz-13 py-0 px-3 lh-1 w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">Filter berdasarkan</button>
                    <ul class="dropdown-menu w-100 bg-secondary fsz-12">
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri') ?>">Seluruhnya</a></li>
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri-where-biodata-telah-lengkap') ?>">Kelengkapan biodata</a></li>
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri-where-bukti-pembayaran-tersimpan') ?>">Menunggu verifikasi bukti pembayaran</a></li>
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri-where-bukti-pembayaran-terverifikasi') ?>">Bukti pembayaran telah terverifikasi</a></li>
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri-where-telah-mengikuti-tes-tulis') ?>">Telah mengikuti tes tulis</a></li>
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri-where-telah-mengikuti-tes-wawancara') ?>">Telah mengikuti tes wawancara</a></li>
                        <li><a class="dropdown-item text-clr5" href="<?= base_url('daftar-calon-santri-where-telah-diberikan-sk') ?>">Telah diberikan SK</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="border-clr4 p-2 overflow-x-scroll w-100">
        <div class="overflow-y-scroll w-100" style="max-height:70vh;">
            <table class="table table-md table-striped w-100">
                <thead class="w-100 lh-1 table-dark">
                    <tr>
                        <th style="width:2%;">No</th>
                        <th style="width:32%;">Nama lengkap</th>
                        <th style="width:16%;">Dibuat pada</th>
                        <th style="width:10%;">Kelengkapan biodata</th>
                        <th style="width:10%;">Status pembayaran</th>
                        <th style="width:10%;">Tes tulis</th>
                        <th style="width:10%;">Tes wawancara</th>
                        <th style="width:10%;">SK</th>
                    </tr>
                </thead>
                <tbody class="w-100 lh-1 fsz-12">
                    <?php $i = 1 ?>
                    <?php foreach($santri as $x) : ?>
                        <tr>
                            <td style="width:2%;"><?= $i ?></td>
                            <td style="width:32%;"><a class="text-clr1 td-none" href="<?= base_url('calon-santri/') . $x['peserta_id'] ?>"><?= ($x['santri_nama']) ? $x['santri_nama'] : $x['peserta_nama'] ?> →</a></td>
                            <td style="width:16%;"><?= date('d/m/Y', strtotime($x['peserta_created_at'])) ?><br><?= date('H:i', strtotime($x['peserta_created_at'])) ?> WIB</td>
                            <td style="width:10%;"><?= ($x['santri_saved'] == 1 && $x['ortu_saved'] == 1 && $x['rk_saved'] == 1) ? '<div class="text-clr1 fw-bold">Terisi</div>' : '<div class="text-secondary">Belum</div>' ?></td>
                            <td style="width:10%;"><?= ($x['bp_saved'] == 1 && $x['bp_konfirm'] == 1) ? '<div class="text-clr1 fw-bold">Terverifikasi</div>' : (($x['bp_saved'] == 1 && $x['bp_konfirm'] == 0) ? '<div class="text-warning">Menunggu konfirmasi</div>' : '<div class="text-secondary">Belum mengisi</div>') ?></td>
                            <td style="width:10%;"><?= ($x['testulis_konfirm'] == 1) ? '<div class="text-clr1 fw-bold">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                            <td style="width:10%;"><?= ($x['tw_status'] == 1) ? '<div class="text-clr1 fw-bold">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                            <td style="width:10%;"><?= ($x['pengumuman_saved'] == 1) ? '<div class="text-clr1 fw-bold">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                        </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>