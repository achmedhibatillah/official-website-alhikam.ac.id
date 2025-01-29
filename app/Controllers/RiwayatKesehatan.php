<?php

namespace App\Controllers;

use \App\Models\RiwayatKesehatanModel;
use \App\Models\PenyakitPernahModel;
use \App\Models\PenyakitSedangModel;

class RiwayatKesehatan extends BaseController
{
    protected $riwayatKesehatanModel;
    protected $penyakitPernahModel;
    protected $penyakitSedangModel;

    public function __construct()
    {
        $this->riwayatKesehatanModel = new RiwayatKesehatanModel();
        $this->penyakitPernahModel = new PenyakitPernahModel();
        $this->penyakitSedangModel = new PenyakitSedangModel();
    }

    public function update()
    {
        $rules = [
            'rk_golongandarah' => 'required',
            'rk_perawatan' => 'required',
            'rk_kontak_nama' => 'required|max_length[225]',
            'rk_kontak_alamat' => 'required|max_length[225]',
            'rk_kontak_hp' => 'required|numeric|min_length[9]|max_length[16]',
        ];
        
        $errors = [
            'rk_golongandarah' => [
                'required' => 'Golongan darah harus diisi.',
            ],
            'rk_perawatan' => [
                'required' => 'Rawat harus diisi.',
            ],
            'rk_kontak_nama' => [
                'required' => 'Nama lengkap harus diisi.',
                'max_length' => 'Nama lengkap maksimal 255 karakter.'
            ],
            'rk_kontak_alamat' => [
                'required' => 'Alamat lengkap harus diisi.',
                'max_length' => 'Alamat lengkap maksimal 255 karakter.'
            ],
            'rk_kontak_hp' => [
                'required' => 'Nomor HP harus diisi.',
                'numeric' => 'Nomor HP harus berupa angka.',
                'min_length' => 'Nomor HP harus minimal 9 angka.',
                'max_length' => 'Nomor HP harus maksimal 16 angka.'
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-rk', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $telp_a = $this->request->getPost('ortu_a_hp');
        if (strpos($telp_a, '08') === 0) {  $telp_a = '628' . substr($telp_a, 2); }
    
        $update = [
            'rk_golongandarah' => $this->request->getPost('rk_golongandarah'),
            'rk_perawatan' => $this->request->getPost('rk_perawatan'),
        ];
        
        $rk_id = $this->request->getPost('rk_id');
        $riwayatKesehatanModel = $this->riwayatKesehatanModel;
        $riwayatKesehatanModel->update($rk_id, $update);
    
        return redirect()->to('berkas-pendaftaran');
    }

    public function update_penyakit_pernah()
    {
        $rules = [
            'rk_pernah_penyakit' => 'required|max_length[225]',
        ];
        
        $errors = [
            'rk_pernah_penyakit' => [
                'required' => 'Nama penyakit harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-rk', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'rk_pernah_penyakit' => $this->request->getPost('rk_pernah_penyakit'),
            'rk_id' => $this->request->getPost('rk_id')
        ];
        
        $penyakitPernahModel = $this->penyakitPernahModel;
        $penyakitPernahModel->insert($add);
    
        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_penyakit_sedang()
    {
        $rules = [
            'rk_sedang_penyakit' => 'required|max_length[225]',
        ];
        
        $errors = [
            'rk_sedang_penyakit' => [
                'required' => 'Nama penyakit harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-rk', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'rk_sedang_penyakit' => $this->request->getPost('rk_sedang_penyakit'),
            'rk_id' => $this->request->getPost('rk_id')
        ];
        
        $penyakitSedangModel = $this->penyakitSedangModel;
        $penyakitSedangModel->insert($add);
    
        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function hapus_penyakit_pernah($id)
    {
        $penyakitPernahModel = $this->penyakitPernahModel;
        $penyakitPernahModel->delete($id);
        return redirect()->back();
    }

    public function hapus_penyakit_sedang($id)
    {
        $penyakitSedangModel = $this->penyakitSedangModel;
        $penyakitSedangModel->delete($id);
        return redirect()->back();
    }
}