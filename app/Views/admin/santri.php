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
                    <ul class="dropdown-menu w-100 bg-clr1 text-clr5">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="border-clr4 p-2 overflow-x-scroll w-100">
        <div class="w-100">
            <table class="table w-100">
                <thead class="w-100 lh-1">
                    <tr>
                        <th style="width:2%;">No</th>
                        <th style="width:48%;">Nama lengkap</th>
                        <th style="width:10%;">Kelengkapan biodata</th>
                        <th style="width:10%;">Status pembayaran</th>
                        <th style="width:10%;">Tes tulis</th>
                        <th style="width:10%;">Tes wawancara</th>
                        <th style="width:10%;">SK</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="overflow-y-scroll w-100" style="max-height:50vh;">
            <table class="table table-striped w-100">
                <tbody class="w-100">
                    <?php $i = 1 ?>
                    <?php foreach($santri as $x) : ?>
                        <tr>
                            <td style="width:2%;"><?= $i ?></td>
                            <td style="width:48%;"><?= $x['santri_nama'] ?></td>
                            <td style="width:10%;"><?= ($x['santri_saved'] == 1 && $x['ortu_saved'] == 1 && $x['rk_saved'] == 1) ? '<div class="text-clr1">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                            <td style="width:10%;"><?= ($x['bp_saved'] == 1 && $x['bp_konfirm'] == 1) ? '<div class="text-clr1">Terverifikasi</div>' : (($x['bp_saved'] == 1 && $x['bp_konfirm'] == 1) ? '<div class="text-warning">Menunggu konfirmasi</div>' : '<div class="text-secondary">Belum mengisi</div>') ?></td>
                            <td style="width:10%;"><?= ($x['testulis_konfirm'] == 1) ? '<div class="text-clr1">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                            <td style="width:10%;"><?= ($x['tw_status'] == 1) ? '<div class="text-clr1">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                            <td style="width:10%;"><?= ($x['pengumuman_pdf']) ? '<div class="text-clr1">Terisi</div>' : '<div class="text-secondary">Belum mengisi</div>' ?></td>
                        </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>