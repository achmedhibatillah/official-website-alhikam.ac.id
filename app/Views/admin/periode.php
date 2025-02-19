<div class="m-1">
    <div class="row m-0 p-0">
        <div class="col-md-12 m-0p-0">
            <button class="btn btn-clr1 mb-0 btn-sm ls-s" id="tambah-periode">Tambah Periode <i class="fas fa-chevron-down ms-2"></i></button>
            <div class="row m-0 p-0 mb-3">
                <div class="col-md-8 m-0 p-0">
                    <?php if(session()->getFlashdata('success-periode')): ?>
                        <div class="alert alert-success text-center lh-1 m-0 mt-2">
                            <?= session()->getFlashdata('success-periode') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-3 m-0 p-0" id="form-tambah-periode" style="<?= (session()->getFlashdata('errors-periode')) ? 'display:block;' : 'display:none;' ?>">
                <div class="col-md-8 m-0 p-0">
                    <div class="card p-3 bg-clr4 border-clr1">
                        <form action="<?= base_url('simpan-periode-penerimaan-baru') ?>" method="post">
                            <div class="mb-3">
                                <label for="periode_nama" class="fw-bold text-clr1 ls-s">Nama Periode</label>
                                <input type="text" placeholder="..." id="periode_nama" name="periode_nama" class="form-control bg-clr5 border-clr1 <?= (isset(session()->getFlashdata('errors-periode')['periode_nama'])) ? 'is-invalid' : '' ?>"
                                value="<?= old('periode_nama') ?>" autocomplete="off">
                                <?php if(isset(session()->getFlashdata('errors-periode')['periode_nama'])): ?>
                                    <p class="fsz-12 text-danger"><?= session()->getFlashdata('errors-periode')['periode_nama'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-6 m-0 px-1">
                                    <label for="periode_mulai" class="fw-bold text-clr1 ls-s">Tanggal Dibuka</label>
                                    <input type="date" placeholder="..." id="periode_mulai" name="periode_mulai" class="form-control bg-clr5 border-clr1 <?= (isset(session()->getFlashdata('errors-periode')['periode_mulai'])) ? 'is-invalid' : '' ?>"
                                    value="<?= old('periode_mulai') ?>">
                                </div>
                                <div class="col-6 m-0 px-1">
                                    <label for="periode_selesai" class="fw-bold text-clr1 ls-s">Tanggal Ditutup</label>
                                    <input type="date" placeholder="..." id="periode_selesai" name="periode_selesai" class="form-control bg-clr5 border-clr1 <?= (isset(session()->getFlashdata('errors-periode')['periode_selesai'])) ? 'is-invalid' : '' ?>"
                                    value="<?= old('periode_selesai') ?>">
                                </div>
                            </div>
                            <div class="row m-0 p-0 mb-3">
                                <div class="col-6 m-0 p-0">
                                    <?php if(isset(session()->getFlashdata('errors-periode')['periode_mulai'])): ?>
                                        <p class="fsz-12 text-danger mx-1"><?= session()->getFlashdata('errors-periode')['periode_mulai'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-6 m-0 p-0">
                                    <?php if(isset(session()->getFlashdata('errors-periode')['periode_selesai'])): ?>
                                        <p class="fsz-12 text-danger mx-1"><?= session()->getFlashdata('errors-periode')['periode_selesai'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-clr1 btn-sm px-3 ls-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-100 overflow-scroll" style="max-height:70vh;">
                <table class="table table-stripped m-0">
                    <thead class="table-dark">
                        <td>No</td>
                        <td>Nama Periode</td>
                        <td>Tanggal Dibuka</td>
                        <td>Tanggal Ditutup</td>
                        <td class="text-center">Pendaftar</td>
                        <td class="text-center">Status</td>
                        <td class="text-center">Tindakan</td>
                    </thead>
                    <tbody class="lh-1">
                        <?php $i = 1 ?>
                        <?php foreach($periode as $x) : ?>
                            <tr>
                                <td class="align-center"><?= $i ?></td>
                                <td class="align-center"><?= $x['periode_nama'] ?></td>
                                <td class="align-center"><?= date("d-m-Y", strtotime($x['periode_mulai'])) ?></td>
                                <td class="align-center"><?= date("d-m-Y", strtotime($x['periode_selesai'])) ?></td>
                                <td class="align-center text-center"><?= $x['jumlah_peserta'] ?></td>
                                <td class="align-center text-center">
                                    <?php if (date("Y-m-d") >= $x['periode_mulai'] && date("Y-m-d") <= $x['periode_selesai']) : ?>
                                        <div class="fsz-12 ls-1 text-clr1 fw-bold rounded px-2">Sedang berjalan</div>
                                    <?php elseif (date("Y-m-d") < $x['periode_mulai']): ?>
                                        <div class="fsz-12 ls-1 text-warning fw-bold rounded px-2">Belum berjalan</div>
                                    <?php elseif (date("Y-m-d") > $x['periode_selesai']): ?> 
                                        <div class="fsz-12 ls-1 text-secondary fw-bold rounded px-2">Sudah selesai</div> <!-- Perbaikan teks -->
                                    <?php endif; ?>
                                </td>
                                <td class="align-center text-center"><a href="<?= base_url('hapus-periode-penerimaan/' . $x['periode_id']) ?>" class="btn btn-sm p-0 px-2 btn-outline-danger"><i class="fas fa-trash fsz-10"></i></a></td>
                            </tr>
                        <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
const buttontambah = document.getElementById("tambah-periode");
const formtambah = document.getElementById("form-tambah-periode");

buttontambah.addEventListener("click", function () {
    if (formtambah.style.display === "none" || formtambah.style.display === "") {
        formtambah.style.display = "block";
        buttontambah.innerHTML = "Tambah Periode <i class='fas fa-chevron-up ms-2'></i>";
    } else {
        formtambah.style.display = "none";
        buttontambah.innerHTML = "Tambah Periode <i class='fas fa-chevron-down ms-2'></i>";
    }
});

</script>