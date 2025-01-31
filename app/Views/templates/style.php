<style>

@media screen and (max-width: 767px) {
#bg-top { background-image:url('<?= base_url('images/bg-lp-top-sm.png') ?>');  }
#welcome h1 { font-size: 56px; margin-top: 160px; }
#welcome h5 { font-size: 13px; margin-top: -10px; }
#welcome p { font-size: 12px; margin-top: -3px; }
img#kyai { width: 230px; margin-top: 30px; }
}

@media screen and (min-width: 768px) and (max-width: 990px) {
#bg-top { background-image:url('<?= base_url('images/bg-lp-top-md.png') ?>'); }
#welcome h1 { font-size: 74px; }
#welcome h5 { font-size: 17px; margin-top: -15px; }
#welcome p { font-size: 15px; margin-top: -3px; }
img#kyai { width: 300px; margin-left: -90px; }
}

@media screen and (min-width: 991px) {
#bg-top { background-image:url('<?= base_url('images/bg-lp-top.png') ?>'); }
#welcome { margin-right: 30px; }
#welcome h1 { font-size: 74px; }
#welcome h5 { font-size: 17px; margin-top: -15px; }
#welcome p { font-size: 15px; margin-top: -3px; }
img#kyai { width: 350px; margin-left: -90px; margin-bottom: 190px; }
}
</style>