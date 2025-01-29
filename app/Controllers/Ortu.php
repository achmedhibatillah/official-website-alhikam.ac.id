<?php

namespace App\Controllers;

use \App\Models\PesertaModel;
use \App\Models\SantriModel;
use \App\Models\OrtuModel;

class Ortu extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $ortuModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
        $this->ortuModel = new OrtuModel();
    }

    public function update()
    {
        $rules = [
            'ortu_a_nama' => 'required|max_length[225]|alpha_space',
            'ortu_a_pekerjaan' => 'required',
            'ortu_a_pekerjaan_lain' => 'max_length[225]' . (($this->request->getPost('ortu_a_pekerjaan') == 13) ? '|required' : ''),
            'ortu_a_agama' => 'required',
            'ortu_a_agama_lain' => 'max_length[225]' . (($this->request->getPost('ortu_a_agama') == 7) ? '|required' : ''),
            'ortu_a_pendidikan' => 'required',
            'ortu_a_pendidikan_lain' => 'max_length[225]' . (($this->request->getPost('ortu_a_pendidikan') == 23) ? '|required' : ''),
            'ortu_a_hp' => 'required|numeric|min_length[9]|max_length[16]',
            'ortu_a_pendapatan' => 'required',
            'ortu_i_nama' => 'required|max_length[225]|alpha_space',
            'ortu_i_pekerjaan' => 'required',
            'ortu_i_pekerjaan_lain' => 'max_length[225]' . (($this->request->getPost('ortu_i_pekerjaan') == 13) ? '|required' : ''),
            'ortu_i_agama' => 'required',
            'ortu_i_agama_lain' => 'max_length[225]' . (($this->request->getPost('ortu_i_agama') == 7) ? '|required' : ''),
            'ortu_i_pendidikan' => 'required',
            'ortu_i_pendidikan_lain' => 'max_length[225]' . (($this->request->getPost('ortu_i_pendidikan') == 23) ? '|required' : ''),
            'ortu_i_hp' => 'required|numeric|min_length[9]|max_length[16]',
            'ortu_i_pendapatan' => 'required',
        ];
        
        $errors = [
            'ortu_a_nama' => [
                'required' => 'Nama ayah harus diisi.',
                'max_length' => 'Nama ayah maksimal 255 karakter.',
                'alpha_space' => 'Tidak boleh karakter selain huruf.'
            ],
            'ortu_a_pekerjaan' => [
                'required' => 'Pekerjaan ayah harus diisi.'
            ],
            'ortu_a_pekerjaan_lain' => [
                'required' => 'Pekerjaan lain ayah harus diisi.',
                'max_length' => 'Pekerjaan lain ayah maksimal 255 karakter.'
            ],
            'ortu_a_agama' => [
                'required' => 'Agama ayah harus diisi.'
            ],
            'ortu_a_agama_lain' => [
                'required' => 'Agama lain ayah harus diisi.',
                'max_length' => 'Agama lain ayah maksimal 255 karakter.'
            ],
            'ortu_a_pendidikan' => [
                'required' => 'Pendidikan ayah harus diisi.'
            ],
            'ortu_a_pendidikan_lain' => [
                'required' => 'Pendidikan lain ayah harus diisi.',
                'max_length' => 'Pendidikan lain ayah maksimal 255 karakter.'
            ],
            'ortu_a_hp' => [
                'required' => 'Nomor HP harus diisi.',
                'numeric' => 'Nomor HP harus berupa angka.',
                'min_length' => 'Nomor HP harus minimal 9 angka.',
                'max_length' => 'Nomor HP harus maksimal 16 angka.'
            ],
            'ortu_a_pendapatan' => [
                'required' => 'Pendapatan ayah harus diisi.'
            ],
            'ortu_i_nama' => [
                'required' => 'Nama ibu harus diisi.',
                'max_length' => 'Nama ibu maksimal 255 karakter.',
                'alpha_space' => 'Tidak boleh karakter selain huruf.'
            ],
            'ortu_i_pekerjaan' => [
                'required' => 'Pekerjaan ibu harus diisi.'
            ],
            'ortu_i_pekerjaan_lain' => [
                'required' => 'Pekerjaan lain ibu harus diisi.',
                'max_length' => 'Pekerjaan lain ibu maksimal 255 karakter.'
            ],
            'ortu_i_agama' => [
                'required' => 'Agama ibu harus diisi.'
            ],
            'ortu_i_agama_lain' => [
                'required' => 'Agama lain ibu harus diisi.',
                'max_length' => 'Agama lain ibu maksimal 255 karakter.'
            ],
            'ortu_i_pendidikan' => [
                'required' => 'Pendidikan ibu harus diisi.'
            ],
            'ortu_i_pendidikan_lain' => [
                'required' => 'Pendidikan lain ibu harus diisi.',
                'max_length' => 'Pendidikan lain ibu maksimal 255 karakter.'
            ],
            'ortu_i_hp' => [
                'required' => 'Nomor HP harus diisi.',
                'numeric' => 'Nomor HP harus berupa angka.',
                'min_length' => 'Nomor HP harus minimal 9 angka.',
                'max_length' => 'Nomor HP harus maksimal 16 angka.'
            ],
            'ortu_i_pendapatan' => [
                'required' => 'Pendapatan ibu harus diisi.'
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-ortu', $this->validator->getErrors());
            return redirect()->to('biodata-orang-tua')->withInput();
        }

        $telp_a = $this->request->getPost('ortu_a_hp');
        $telp_i = $this->request->getPost('ortu_i_hp');
        if (strpos($telp_a, '08') === 0) {  $telp_a = '628' . substr($telp_a, 2); }
        if (strpos($telp_i, '08') === 0) {  $telp_i = '628' . substr($telp_i, 2); }
    
        $update = [
            'ortu_a_nama' => ucwords(strtolower($this->request->getPost('ortu_a_nama'))),
            'ortu_a_pekerjaan' => $this->request->getPost('ortu_a_pekerjaan'),
            'ortu_a_pekerjaan_lain' => $this->request->getPost('ortu_a_pekerjaan_lain'),
            'ortu_a_agama' => $this->request->getPost('ortu_a_agama'),
            'ortu_a_agama_lain' => $this->request->getPost('ortu_a_agama_lain'),
            'ortu_a_pendidikan' => $this->request->getPost('ortu_a_pendidikan'),
            'ortu_a_pendidikan_lain' => $this->request->getPost('ortu_a_pendidikan_lain'),
            'ortu_a_hp' => $telp_a,
            'ortu_a_pendapatan' => $this->request->getPost('ortu_a_pendapatan'),
            'ortu_i_nama' => ucwords(strtolower($this->request->getPost('ortu_i_nama'))),
            'ortu_i_pekerjaan' => $this->request->getPost('ortu_i_pekerjaan'),
            'ortu_i_pekerjaan_lain' => $this->request->getPost('ortu_i_pekerjaan_lain'),
            'ortu_i_agama' => $this->request->getPost('ortu_i_agama'),
            'ortu_i_agama_lain' => $this->request->getPost('ortu_i_agama_lain'),
            'ortu_i_pendidikan' => $this->request->getPost('ortu_i_pendidikan'),
            'ortu_i_pendidikan_lain' => $this->request->getPost('ortu_i_pendidikan_lain'),
            'ortu_i_hp' => $telp_i,
            'ortu_i_pendapatan' => $this->request->getPost('ortu_i_pendapatan'),
        ];
        
        $ortu_id = $this->request->getPost('ortu_id');
        $ortuModel = $this->ortuModel;
        $ortuModel->update($ortu_id, $update);
    
        return redirect()->to('berkas-pendaftaran');
    }
}