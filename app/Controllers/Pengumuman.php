<?php

namespace App\Controllers;

use \App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function update()
    {
        $rules = [
            'pengumuman_pdf' => 'uploaded[pengumuman_pdf]|max_size[pengumuman_pdf,10240]|ext_in[pengumuman_pdf,pdf]',
            'pengumuman_status' => 'required'
        ];
        
        $errors = [
            'pengumuman_pdf' => [
                'uploaded' => 'Surat wajib diunggah.',
                'max_size' => 'Ukuran file tidak boleh lebih dari 10 MB.',
                'ext_in'   => 'Format file harus PDF.',
            ],
            'pengumuman_status' => [
                'required' => 'Status kelulusan wajib diisi.',
            ]
        ];        

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-pengumuman', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $pengumuman_pdf = $this->request->getFile('pengumuman_pdf');
        if ($pengumuman_pdf->isValid() && !$pengumuman_pdf->hasMoved()) {
            $pengumuman_newName = $pengumuman_pdf->getRandomName(); 
            $pengumuman_pdf->move('uploads/pengumuman', $pengumuman_newName); 
            $path_pengumuman = 'uploads/pengumuman/' . $pengumuman_newName;
        } else {
            session()->setFlashdata('errors-pengumuman', ['pengumuman_pdf' => 'Gagal mengunggah file.']);
            return redirect()->back()->withInput();
        }
        
        $update = [
            'pengumuman_pdf' => $path_pengumuman,
            'pengumuman_kasur' => $this->request->getPost('pengumuman_kasur'),
            'pengumuman_ranjang' => $this->request->getPost('pengumuman_ranjang'),
            'pengumuman_lemari' => $this->request->getPost('pengumuman_lemari'),
            'pengumuman_tas' => $this->request->getPost('pengumuman_tas'),
            'pengumuman_jas' => $this->request->getPost('pengumuman_jas'),
            'pengumuman_olahraga' => $this->request->getPost('pengumuman_olahraga'),
            'pengumuman_koko' => $this->request->getPost('pengumuman_koko'),
            'pengumuman_sarung' => $this->request->getPost('pengumuman_sarung'),
            'pengumuman_kopiah' => $this->request->getPost('pengumuman_kopiah'),
            'pengumuman_bukukitab' => $this->request->getPost('pengumuman_bukukitab'),
            'pengumuman_bukubio' => $this->request->getPost('pengumuman_bukubio'),
            'pengumuman_status' => $this->request->getPost('pengumuman_status'),
            'pengumuman_saved' => 1
        ]; 

        $pengumumanModel = $this->pengumumanModel;

        $pengumuman_id = $this->request->getPost('pengumuman_id');
        $pengumumanModel->update($pengumuman_id, $update);

        return redirect()->to('atur-pengumuman')->with('success-pengumuman', 'Anda berhasil memperbarui data!');
    }

    public function request_update()
    {
        $update = [
            'pengumuman_saved' => $this->request->getPost('pengumuman_saved')
        ];

        $pengumumanModel = $this->pengumumanModel;

        $pengumuman_id = $this->request->getPost('pengumuman_id');
        $pengumumanModel->update($pengumuman_id, $update);

        return redirect()->back();
    }

    public function downloadPengumuman($filePath)
    {
        $filePath = urldecode($filePath);
        $fullPath = FCPATH . 'uploads/pengumuman/' . $filePath;
    
        if (!file_exists($fullPath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    
        return $this->response->download($fullPath, null);
    }
}