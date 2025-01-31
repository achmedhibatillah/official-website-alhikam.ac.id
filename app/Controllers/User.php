<?php

namespace App\Controllers;

use \App\Models\PesertaModel;
use \App\Models\SantriModel;
use \App\Models\OrtuModel;
use \App\Models\RiwayatKesehatanModel;
use \App\Models\LainModel;
use \App\Models\BpModel;
use \App\Models\TesTulisModel;
use \App\Models\TeswawancaraModel;

class User extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $ortuModel;
    protected $riwayatKesehatanModel;
    protected $lainModel;
    protected $bpModel;
    protected $ttModel;
    protected $twModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
        $this->ortuModel = new OrtuModel();
        $this->riwayatKesehatanModel = new RiwayatKesehatanModel();
        $this->lainModel = new LainModel();
        $this->bpModel = new BpModel();
        $this->ttModel = new TesTulisModel();
        $this->twModel = new TeswawancaraModel();
    }

    public function index(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Berkas Pendaftaran',
            'page' => 'user',
            'user' => $user
        ];

        $santriModel = $this->santriModel;
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;

        $santriData = $santriModel->getSantriByPesertaId($session_id);
        $ortuData = $ortuModel->getOrtuByPesertaId($session_id);
        $rkData = $rkModel->getRiwayatKesehatanByIdPeserta($session_id);
        $bpData = $bpModel->getBpByPesertaId($session_id);
        $ttData = $ttModel->getTtByPesertaId($session_id);
        $twData = $twModel->getTwByPesertaId($session_id);

        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('user/index', [
            'santri' => $santriData,
            'ortu' => $ortuData,
            'rk' => $rkData,
            'bp' => $bpData,
            'tt' => $ttData,
            'tw' => $twData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function biodata_calon_santri(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Biodata Calon Santri',
            'page' => 'user',
            'user' => $user
        ];

        $santriModel = $this->santriModel;

        $santriData = $santriModel->getSantriByPesertaId($session_id);

        if ($santriData['santri_saved'] == 1) {
            $view = 'user/biodata-calon-santri';
        } else {
            $view = 'user/edit-biodata-calon-santri';
        }

        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view($view, [
            'santri' => $santriData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function biodata_orang_tua(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Biodata Orang Tua',
            'page' => 'user',
            'user' => $user
        ];

        $ortuModel = $this->ortuModel;

        $ortuData = $ortuModel->getOrtuByPesertaId($session_id);

        if ($ortuData['ortu_saved'] == 1) {
            $view = 'user/biodata-orang-tua';
        } else {
            $view = 'user/edit-biodata-orang-tua';
        }

        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view($view, [
            'ortu' => $ortuData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function riwayat_kesehatan_dan_lain_lain(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Riwayat Kesehatan dan Lain-Lain',
            'page' => 'user',
            'user' => $user
        ];

        $riwayatKesehatanModel = $this->riwayatKesehatanModel;
        $lainModel = $this->lainModel;
        $riwayatKesehatanData = $riwayatKesehatanModel->getRiwayatKesehatanByIdPeserta($session_id);
        $lainData = $lainModel->getLainByIdPeserta($session_id);

        if ($riwayatKesehatanData['rk_saved'] == 1) {
            $view = 'user/riwayat-kesehatan-dan-lain-lain';
        } else {
            $view = 'user/edit-riwayat-kesehatan-dan-lain-lain';
        }
        
        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view($view, [
            'rk' => $riwayatKesehatanData,
            'lain' => $lainData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function bukti_pembayaran(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Bukti Pembayaran',
            'page' => 'user',
            'user' => $user
        ];

        $bpModel = $this->bpModel;
        $bpData = $bpModel->getBpByPesertaId($session_id);

        if ($bpData['bp_saved'] == 1) {
            $view = 'user/bukti-pembayaran';
        } else {
            $view = 'user/edit-bukti-pembayaran';
        }
        
        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view($view, [
            'bp' => $bpData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function tes_tulis(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Tes Tulis',
            'page' => 'user',
            'user' => $user
        ];

        $ttModel = $this->ttModel;
        $ttData = $ttModel->getTtByPesertaId($session_id);
        
        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('user/tes-tulis', [
            'tt' => $ttData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function tes_wawancara(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Tes Wawancara',
            'page' => 'user',
            'user' => $user
        ];

        $santriModel = $this->santriModel;
        $twModel = $this->twModel;

        $santriData = $santriModel->getSantriByPesertaId($session_id);
        $twData = $twModel->getTwByPesertaId($session_id);
        
        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('user/tes-wawancara', [
            'santri' => $santriData,
            'tw' => $twData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }
}