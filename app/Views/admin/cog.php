<div class="m-1">
    <div class="row m-0 p-0">
        <div class="col-md-6 m-0p-0">
            <div class="card bg-clr4">
                <div class="card-body">
                    <h5 class="text-clr1 ls-s fw-bold m-0">Atur Periode Penerimaan</h5>
                    <p class="text-clr1 ls-s lh-1">Atur filterisasi data berdasarkan periode tertentu.</p>
                    <hr class="text-clr1">
                    <div class="d-flex">
                        <a href="<?= base_url('konfigurasi-utama-seluruhnya') ?>" class="<?= (session()->get('periode') == null) ? 'bg-clr1 text-clr2' : 'bg-clr2 text-clr1' ?> rounded border-clr1 w-100 mb-1 lh-1 py-2 px-3 text-center td-none">Seluruh data</a>
                    </div>
                    <p class="text-center mb-2">( Seluruh data dari seluruh periode )</p>
                    <?php foreach($periode as $x) : ?>
                        <form action="<?= base_url('konfigurasi-utama') ?>" method="post">
                            <input type="hidden" name="periode_id" value="<?= $x['periode_id'] ?>">
                            <input type="hidden" name="periode_nama" value="<?= $x['periode_nama'] ?>">
                            <input type="hidden" name="periode_mulai" value="<?= $x['periode_mulai'] ?>">
                            <input type="hidden" name="periode_selesai" value="<?= $x['periode_selesai'] ?>">
                            <button type="submit" class="<?= (session()->get('periode') !== null && session()->get('periode')['id'] === $x['periode_id']) ? 'bg-clr1 text-clr2' : 'bg-clr2 text-clr1' ?> rounded border-clr1 w-100 mb-1 lh-1 py-2 px-3"><?= $x['periode_nama'] ?></button>
                            <div class="text-center mb-2">( <?= date('d/m/Y', strtotime($x['periode_mulai'])) ?> - <?= date('d/m/Y', strtotime($x['periode_selesai'])) ?> )</div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>