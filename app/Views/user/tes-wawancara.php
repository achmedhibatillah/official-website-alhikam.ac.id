<section class="bg-clr5 bg-web position-relative text-clr1" style="padding-top:160px;padding-bottom:100px;min-height:100vh;background-image:url('<?= base_url('images/bg-main.png') ?>');">

<h1 class="text-center fw-800 ls-xs mb-5">TES WAWANCARA</h1>

<div class="text-clr1 row m-0 p-0 justify-content-center">

    <div class="col-md-8 m-0 p-0 px-3 px-md-3">
    <div class="card m-1 m-md-4 p-3 text-clr1 fw-bold">
        <table>
            <tr>
                <td class="align-top lh-1" style="width:30%;">Nama</td>
                <td class="align-top lh-1" style="width:70%;">: 
                    <?= ($santri['santri_nama']) ? $santri['santri_nama'] : '<div class="d-inline text-secondary">Data santri belum diisi. Isi data santri <a href="' . base_url('biodata-calon-santri') . '">di sini</a>.</div>' ?>
                </td>
            </tr>
            <tr>
                <td class="align-top lh-1 pt-3" style="width:30%;">Tanggal Wawancara</td>
                <td class="align-top lh-1 pt-3" style="width:70%;">:
                    <?= ($tw['tw_tgl']) ? strftime("%d %B %Y", strtotime($tw['tw_tgl'])) : '<div class="d-inline text-secondary">Tanggal wawancara belum ditentukan.</div>' ?>
                </td>
            </tr>
            <tr>
                <td class="align-top lh-1 pt-3" style="width:30%;">Tempat Wawancara</td>
                <td class="align-top lh-1 pt-3" style="width:70%;">: 
                    <?= ($tw['tw_tempat']) ? $tw['tw_tempat'] : '<div class="d-inline text-secondary">Tempat wawancara belum ditentukan.</div>' ?>
                </td>
            </tr>
            <tr>
                <td class="align-top lh-1 pt-3" style="width:30%;">Pewawancara</td>
                <td class="align-top lh-1 pt-3" style="width:70%;">: 
                    <?= ($tw['tw_pewawancara']) ? $tw['tw_pewawancara'] : '<div class="d-inline text-secondary">Pewawancara belum ditentukan.</div>' ?>
                </td>
            </tr>
            <tr>
                <td class="align-top lh-1 pt-3" style="width:30%;">Status</td>
                <td class="align-top lh-1 pt-3" style="width:70%;">: 
                    <?= ($tw['tw_status'] == 1) 
                    ? $tw['tw_status'] 
                    : '<div class="d-inline bg-danger rounded text-light px-3">Belum wawancara</div>' 
                    ?>
                </td>
            </tr>
        </table>
    </div>
    </div>
</div>

</section>