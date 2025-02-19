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
use \App\Models\MessageModel;
use \App\Models\PengumumanModel;
use \App\Models\PeriodeModel;

use \App\Models\PenyakitPernahModel;
use \App\Models\PenyakitSedangModel;

use \App\Models\LainAgamaModel;
use \App\Models\LainBahasamModel;
use \App\Models\LainBahasaModel;
use \App\Models\LainKeahlianModel;
use \App\Models\LainOlahragaModel;
use \App\Models\LainOrganisasiModel;
use \App\Models\LainPenalaranModel;
use \App\Models\LainPrestasiModel;
use \App\Models\LainSenbudModel;


class Peserta extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $ortuModel;
    protected $riwayatKesehatanModel;
    protected $lainModel;
    protected $bpModel;
    protected $ttModel;
    protected $twModel;
    protected $messageModel;
    protected $pengumumanModel;
    protected $periodeModel;

    protected $penyakitPernahModel;
    protected $penyakitSedangModel;

    protected $lainAgamaModel;
    protected $lainBahasamModel;
    protected $lainBahasaModel;
    protected $lainKeahlianModel;
    protected $lainOlahragaModel;
    protected $lainOrganisasiModel;
    protected $lainPenalaranModel;
    protected $lainPrestasiModel;
    protected $lainSenbudModel;

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
        $this->messageModel = new MessageModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->periodeModel = new PeriodeModel();

        $this->penyakitPernahModel = new PenyakitPernahModel();
        $this->penyakitSedangModel = new PenyakitSedangModel();
    
        $this->lainAgamaModel = new LainAgamaModel();
        $this->lainBahasamModel = new LainBahasamModel();
        $this->lainBahasaModel = new LainBahasaModel();
        $this->lainKeahlianModel = new LainKeahlianModel();
        $this->lainOlahragaModel = new LainOlahragaModel();
        $this->lainOrganisasiModel = new LainOrganisasiModel();
        $this->lainPenalaranModel = new LainPenalaranModel();
        $this->lainPrestasiModel = new LainPrestasiModel();
        $this->lainSenbudModel = new LainSenbudModel();
    }

    public function delete()
    {
        $pesertaModel = $this->pesertaModel;
        $santriModel = $this->santriModel;
        $ortuModel = $this->ortuModel;
        $riwayatKesehatanModel = $this->riwayatKesehatanModel;
        $lainModel = $this->lainModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
        $messageModel = $this->messageModel;
        $pengumumanModel = $this->pengumumanModel;
        $periodeModel = $this->periodeModel;

        $penyakitPernahModel = $this->penyakitPernahModel;
        $penyakitSedangModel = $this->penyakitSedangModel;
        
        $lainAgamaModel = $this->lainAgamaModel;
        $lainBahasamModel = $this->lainBahasamModel;
        $lainBahasaModel = $this->lainBahasaModel;
        $lainKeahlianModel = $this->lainKeahlianModel;
        $lainOlahragaModel = $this->lainOlahragaModel;
        $lainOrganisasiModel = $this->lainOrganisasiModel;
        $lainPenalaranModel = $this->lainPenalaranModel;
        $lainPrestasiModel = $this->lainPrestasiModel;
        $lainSenbudModel = $this->lainSenbudModel;

        $peserta_id = $this->request->getPost('peserta_id');

        if ($riwayatKesehatanModel->where('peserta_id', $peserta_id)->first() !== null) {
            $rk_id = $riwayatKesehatanModel->where('peserta_id', $peserta_id)->first()['rk_id'];
        } else {
            $rk_id = '';
        }

        if ($lainModel->where('peserta_id', $peserta_id)->first() !== null) {
            $lain_id = $lainModel->where('peserta_id', $peserta_id)->first()['lain_id'];
        } else {
            $lain_id = '';
        }

        // Delete

        if ($penyakitPernahModel->where('rk_id', $rk_id)->first() !== null) {
            $penyakitPernahModel->where('rk_id', $rk_id)->delete();
        }

        if ($penyakitSedangModel->where('rk_id', $rk_id)->first() !== null) {
            $penyakitSedangModel->where('rk_id', $rk_id)->delete();
        }
        
        if ($lainAgamaModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainAgamaModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainBahasamModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainBahasamModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainBahasaModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainBahasaModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainKeahlianModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainKeahlianModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainOlahragaModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainOlahragaModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainOrganisasiModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainOrganisasiModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainPenalaranModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainPenalaranModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainPrestasiModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainPrestasiModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($lainSenbudModel->where('lain_id_lain', $lain_id)->first() !== null) {
            $lainSenbudModel->where('lain_id_lain', $lain_id)->delete();
        }
        
        if ($santriModel->where('peserta_id', $peserta_id)->first() !== null) {
            $santriModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($ortuModel->where('peserta_id', $peserta_id)->first() !== null) {
            $ortuModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($riwayatKesehatanModel->where('peserta_id', $peserta_id)->first() !== null) {
            $riwayatKesehatanModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($lainModel->where('peserta_id', $peserta_id)->first() !== null) {
            $lainModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($bpModel->where('peserta_id', $peserta_id)->first() !== null) {
            $bpModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($ttModel->where('peserta_id', $peserta_id)->first() !== null) {
            $ttModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($twModel->where('peserta_id', $peserta_id)->first() !== null) {
            $twModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($messageModel->where('peserta_id', $peserta_id)->first() !== null) {
            $messageModel->where('peserta_id', $peserta_id)->delete();
        }
        
        if ($pengumumanModel->where('peserta_id', $peserta_id)->first() !== null) {
            $pengumumanModel->where('peserta_id', $peserta_id)->delete();
        }
        
        $pesertaModel->where('peserta_id', $peserta_id)->delete();

        return redirect()->back();
    }
}