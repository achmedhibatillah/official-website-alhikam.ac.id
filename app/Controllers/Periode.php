<?php

namespace App\Controllers;

use \App\Models\PeriodeModel;

class Periode extends BaseController
{
    protected $periodeModel;

    public function __construct()
    {
        $this->periodeModel = new PeriodeModel();
    }

    public function add()
    {
        $rules = [
            'periode_nama' => 'required|max_length[225]',
            'periode_mulai' => 'required',
            'periode_selesai' => 'required',
        ];
        $errors = [
            'periode_nama' => [
                'required' => 'Nama periode harus diisi.',
                'max_length' => 'Nama periode maksimal 255 karakter.'
            ],
            'periode_mulai' => [
                'required' => 'Tanggal dimulai harus diisi.'
            ],
            'periode_selesai' => [
                'required' => 'Tanggal selesai harus diisi.'
            ],
        ];
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-periode', $this->validator->getErrors());
            return redirect()->to('periode-penerimaan')->withInput();
        }

        $insert = [
            'periode_nama' => $this->request->getPost('periode_nama'),
            'periode_mulai' => $this->request->getPost('periode_mulai'),
            'periode_selesai' => $this->request->getPost('periode_selesai')
        ];

        $periodeModel = $this->periodeModel;
        $periodeModel->insert($insert);

        return redirect()->to('periode-penerimaan')->with('success-periode', 'Periode baru berhasil ditambahkan.');
    }

    public function del($periode_id)
    {
        $periodeModel = $this->periodeModel;
        $periodeModel->delete($periode_id);

        return redirect()->to('periode-penerimaan')->with('success-periode', 'Periode tertentu berhasil dihapus.');
    }

    public function manage()
    {
        $periodeModel = $this->periodeModel;

        $id = $this->request->getPost('periode_id');
        $nama = $this->request->getPost('periode_nama');
        $mulai = $this->request->getPost('periode_mulai');
        $selesai = $this->request->getPost('periode_selesai');

        session()->set('periode', [
            'id' => $id,
            'nama' => $nama,
            'mulai' => $mulai . ' 00:00:00',
            'selesai' => $selesai . ' 23:59:59'
        ]);

        return redirect()->to('konfigurasi-utama');
    }

    public function manage_destroy()
    {
        session()->remove('periode');

        return redirect()->to('konfigurasi-utama');
    }
}