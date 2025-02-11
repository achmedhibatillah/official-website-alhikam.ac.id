<?php

namespace App\Controllers;

use \App\Models\TeswawancaraModel;

class Wawancara extends BaseController
{
    protected $twModel;

    public function __construct()
    {
        $this->twModel = new TeswawancaraModel();
    }

    public function update()
    {
        $rules = [
            'tw_tgl' => 'required',
            'tw_tempat' => 'required|max_length[255]',
            'tw_pewawancara' => 'required|max_length[255]'
        ];
        
        $errors = [
            'tw_tgl' => [
                'required' => 'Tanggal wawancara harus diisi.',
            ],
            'tw_tempat' => [
                'required' => 'Tempat wawancara harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.'
            ],
            'tw_pewawancara' => [
                'required' => 'Nama pewawancara harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.'
            ]
        ];        

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-wawancara', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
        
        $update = [
            'tw_tgl' => $this->request->getPost('tw_tgl'),
            'tw_tempat' => $this->request->getPost('tw_tempat'),
            'tw_pewawancara' => $this->request->getPost('tw_pewawancara')
        ];

        $twModel = $this->twModel;

        $tw_id = $this->request->getPost('tw_id');
        $twModel->update($tw_id, $update);

        return redirect()->back()->with('success-wawancara', 'Anda berhasil memperbarui data!');
    }

    public function wawancara_ver()
    {
        $twModel = $this->twModel;
        $update = [
            'tw_status' => 1
        ];

        $tw_id = $this->request->getPost('tw_id');

        $twModel->update($tw_id, $update);

        return redirect()->back()->with('success-wawancara-ver', 'Anda berhasil memverifikasi tes wawancara.');
    }
}