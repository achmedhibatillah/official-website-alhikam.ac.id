<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:100px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
    <div class="card m-1 m-md-4 p-3 text-clr1 d-flex justify-content-center">
        <div class="bg-clr4 rounded border-clr1">
            <iframe 
                src="https://docs.google.com/forms/d/e/1FAIpQLSdReZD0aG_uIyRUpIrDWUczHKQVudkAT0-XlVIE3SP5nbqCfw/viewform?embedded=true" 
                style="width: 100%; height: 100vh; border: none;">
                Loading…
            </iframe>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-clr1 mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#modalTesTulis">Saya sudah men-submit formulir tes tulis online.</button>
        </div>
    </div>
    </div>

</div>

</section>

<div class="modal fade" id="modalTesTulis" tabindex="-1" aria-labelledby="modalTesTulisLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="modalTesTulisLabel text-clr1">Verifikasi Tes Tulis</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('verifikasi-tes-tulis') ?>" method="post">
                    <input type="hidden" name="testulis_id" value="<?= $tt['testulis_id'] ?>">
                    <p class="text-clr1">Apakah Anda yakin bahwa Anda telah men-submit formulir di atas?</p>
                    <button type="submit" class="btn btn-sm btn-clr1 fsz-12">Simpan</button>
                    <button type="button" class="btn btn-sm btn-secondary fsz-12" data-bs-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

