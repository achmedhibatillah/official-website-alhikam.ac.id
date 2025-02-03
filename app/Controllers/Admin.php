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

class Admin extends BaseController
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
            'title' => 'Dashboard Admin',
            'page' => 'admin-dashboard',
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
        view('templates/navbar-admin', $data) .
        view('admin/index', [
            'santri' => $santriData,
            'ortu' => $ortuData,
            'rk' => $rkData,
            'bp' => $bpData,
            'tt' => $ttData,
            'tw' => $twData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function santri(): string
    {
        $data = [
            'title' => 'Daftar Calon Santri',
            'page' => 'admin-santri',
        ];
        
        $santriModel = $this->santriModel;
        $santriData = $santriModel->orderBy('created_at', 'DESC')->where('santri_saved', '1')->findAll();
    
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
    
        foreach ($santriData as $key => $x) {
            $santriData[$key]['ortu_saved'] = $ortuModel->getOrtuByPesertaId($x['peserta_id'])['ortu_saved'] ?? 0;
            $santriData[$key]['rk_saved'] = $rkModel->getRiwayatKesehatanByIdPeserta($x['peserta_id'])['rk_saved'] ?? 0;
            $santriData[$key]['bp_saved'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_saved'] ?? 0;
            $santriData[$key]['tt_konfirm'] = $ttModel->getTtByPesertaId($x['peserta_id'])['tt_konfirm'] ?? 0;
            $santriData[$key]['tw_status'] = $twModel->getTwByPesertaId($x['peserta_id'])['tw_status'] ?? 0;
        }
    
        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/santri', [
            'santri' => $santriData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }
    
    public function santri_d(): string
    {
        $data = [
            'title' => 'Daftar Calon Santri',
            'page' => 'admin-santri',
        ];
        
        $santriModel = $this->santriModel;
        $santriData = $santriModel->orderBy('created_at', 'DESC')->where('santri_saved', '1')->findAll();
    
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
    
        foreach ($santriData as $key => $x) {
            $santriData[$key]['ortu_saved'] = $ortuModel->getOrtuByPesertaId($x['peserta_id'])['ortu_saved'] ?? 0;
            $santriData[$key]['rk_saved'] = $rkModel->getRiwayatKesehatanByIdPeserta($x['peserta_id'])['rk_saved'] ?? 0;
            $santriData[$key]['bp_saved'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_saved'] ?? 0;
            $santriData[$key]['tt_konfirm'] = $ttModel->getTtByPesertaId($x['peserta_id'])['tt_konfirm'] ?? 0;
            $santriData[$key]['tw_status'] = $twModel->getTwByPesertaId($x['peserta_id'])['tw_status'] ?? 0;
        }
    
        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/santri', [
            'santri' => $santriData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }
    
}