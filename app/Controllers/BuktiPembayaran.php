<?php

namespace App\Controllers;

use \App\Models\BpModel;
use \App\Models\MessageModel;

class BuktiPembayaran extends BaseController
{
    protected $bpModel;
    protected $messageModel;

    public function __construct()
    {
        $this->bpModel = new BpModel();
        $this->messageModel = new MessageModel();
    }

    public function update()
    {
        $rules = [
            'bp_foto_file' => 'uploaded[bp_foto_file]|max_size[bp_foto_file,2048]|ext_in[bp_foto_file,jpg,jpeg,png]',
            'bp_bp_file' => 'uploaded[bp_foto_file]|max_size[bp_foto_file,2048]|ext_in[bp_foto_file,jpg,jpeg,png,pdf]',
            'bp_saved' => 'required',
        ];
    
        $errors = [
            'bp_foto_file' => [
                'uploaded' => 'Foto wajib diunggah.',
                'max_size' => 'Ukuran file tidak boleh lebih dari 2MB.',
                'ext_in' => 'Format file harus JPG, JPEG, atau PNG.',
            ],
            'bp_bp_file' => [
                'uploaded' => 'Slip pembayaran wajib diunggah.',
                'max_size' => 'Ukuran file tidak boleh lebih dari 2MB.',
                'ext_in' => 'Format file harus JPG, JPEG, PNG, atau PDF.',
            ],
            'bp_saved' => [
                'required' => 'Klik checkbox ini sebelum menyimpan.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-bp', $this->validator->getErrors());
            return redirect()->to('bukti-pembayaran')->withInput();
        }

        $foto_file = $this->request->getFile('bp_foto_file');
        if ($foto_file->isValid() && !$foto_file->hasMoved()) {
            $foto_newName = $foto_file->getRandomName(); 
            $foto_file->move('uploads/foto', $foto_newName); 
            $path_foto = 'uploads/foto/' . $foto_newName;
        } else {
            session()->setFlashdata('errors-bp', ['bp_foto_file' => 'Gagal mengunggah file.']);
            return redirect()->to('bukti-pembayaran')->withInput();
        }

        $bp_file = $this->request->getFile('bp_bp_file');
        if ($bp_file->isValid() && !$bp_file->hasMoved()) {
            $bp_newName = $bp_file->getRandomName(); 
            $bp_file->move('uploads/bp', $bp_newName); 
            $path_bp = 'uploads/bp/' . $bp_newName;
        } else {
            session()->setFlashdata('errors-bp', ['bp_bp_file' => 'Gagal mengunggah file.']);
            return redirect()->to('bukti-pembayaran')->withInput();
        }

        $update = [
            'bp_foto' => $path_foto,
            'bp_bp' => $path_bp,
            'bp_saved' => $this->request->getPost('bp_saved')
        ];
        $bp_id = $this->request->getPost('bp_id');
        $this->bpModel->update($bp_id, $update);
    
        return redirect()->to('berkas-pendaftaran');
    }
    
    public function downloadBp($filePath)
    {
        $filePath = urldecode($filePath);
        $fullPath = FCPATH . 'uploads/bp/' . $filePath;
    
        if (!file_exists($fullPath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    
        return $this->response->download($fullPath, null);
    }
    
    public function pembayaran_ver()
    {
        $bpModel = $this->bpModel;
        $update = [
            'bp_konfirm' => $this->request->getPost('bp_konfirm')
        ];

        $bp_id = $this->request->getPost('bp_id');

        $bpModel->update($bp_id, $update);

        return redirect()->back();
    }

    public function pembayaran_unver()
    {
        $bpModel = $this->bpModel;
        $messageModel = $this->messageModel;

        $update_bp = [
            'bp_saved' => $this->request->getPost('bp_saved')
        ];

        $bp_id = $this->request->getPost('bp_id');

        $bpModel->update($bp_id, $update_bp);

        $santri_nama = $this->request->getPost('santri_nama');
        return redirect()->to('verifikasi-pembayaran')->with('unver-success', 'Anda berhasil menolak verifikasi pembayaran <b>' . $santri_nama . '</b>.');
    }
}
