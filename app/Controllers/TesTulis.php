<?php

namespace App\Controllers;

use \App\Models\PesertaModel;
use \App\Models\SantriModel;
use \App\Models\BpModel;
use \App\Models\TesTulisModel;

class TesTulis extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $bpModel;
    protected $ttModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
        $this->bpModel = new BpModel();
        $this->ttModel = new TesTulisModel();
    }

    public function form(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first(); 

        $data = [
            'title' => 'Berkas Pendaftaran',
            'page' => 'user',
            'user' => $user
        ];

        $santriModel = $this->santriModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;

        $santriData = $santriModel->getSantriByPesertaId($session_id);
        $bpData = $bpModel->getBpByPesertaId($session_id);
        $ttData = $ttModel->getTtByPesertaId($session_id);

        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('user/tes-tulis-form', [
            'santri' => $santriData,
            'bp' => $bpData,
            'tt' => $ttData
        ]) .
        view('templates/footbar') .
        view('templates/footer');
    }

    public function verifikasi()
    {
        $testulis_id = $this->request->getPost('testulis_id');

        $update = [
            'testulis_konfirm' => 1
        ];

        $ttModel = $this->ttModel;
        $ttModel->update($testulis_id, $update);

        return redirect()->to('tes-tulis')->with('success-testulis', 'Terimakasih telah mengisi tes tulis.');
    }

    public function verifikasi_admin()
    {
        $testulis_id = $this->request->getPost('testulis_id');

        $update = [
            'testulis_konfirm' => 1
        ];

        $ttModel = $this->ttModel;
        $ttModel->update($testulis_id, $update);

        return redirect()->back()->with('success-testulis', 'Tes tulis berhasil diverifikasi.');
    }

    public function unver_admin()
    {
        $testulis_id = $this->request->getPost('testulis_id');

        $update = [
            'testulis_konfirm' => 0
        ];

        $ttModel = $this->ttModel;
        $ttModel->update($testulis_id, $update);

        return redirect()->back()->with('success-testulis', 'Tes tulis berhasil dibatalkan verifikasinya.');
    }
}