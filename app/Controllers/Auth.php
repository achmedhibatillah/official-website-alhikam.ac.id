<?php

namespace App\Controllers;

use \App\Models\PesertaModel;
use \App\Models\SantriModel;
use \App\Models\OrtuModel;
use \App\Models\RiwayatKesehatanModel;

class Auth extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $ortuModel;
    protected $rkModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
        $this->ortuModel = new OrtuModel();
        $this->rkModel = new RiwayatKesehatanModel();
    }

    public function masuk(): string
    {
        $data = [
            'title' => 'Masuk',
            'page' => 'masuk'
        ];
        return 
        view('templates/header', $data) .
        view('auth/masuk') .
        view('templates/footer');
    }

    public function daftar(): string
    {
        $data = [
            'title' => 'Masuk',
            'page' => 'masuk'
        ];
        return 
        view('templates/header', $data) .
        view('auth/daftar') .
        view('templates/footer');
    }

    public function masuk_auth()
    {
        $rules = [
            'username' => 'required',
            'pass' => 'required'
        ];
    
        $errors = [
            'username' => [
                'required' => 'Username harus diisi.'
            ],
            'pass' => [
                'required' => 'Password harus diisi.'
            ]
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-masuk', $this->validator->getErrors());
            return redirect()->to('masuk')->withInput();
        }
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('pass');
    
        if (str_starts_with($username, '08')) {
            $username = '628' . substr($username, 2);
        }
    
        $peserta = $this->pesertaModel->where('peserta_username', $username)->first();
    
        if (!$peserta) {
            session()->setFlashdata('errors-masuk', ['auth' => 'Username tidak ditemukan.']);
            return redirect()->to('masuk')->withInput();
        }
    
        if (!password_verify($password, $peserta['peserta_pass'])) {
            session()->setFlashdata('errors-masuk', ['auth' => 'Password salah.']);
            return redirect()->to('masuk')->withInput();
        }

        if ($this->request->getPost('ingat')) {
            session()->setTempdata('status', 'login-user', 60 * 60 * 24 * 7);
            session()->setTempdata('peserta_id', $peserta['peserta_id'], 60 * 60 * 24 * 7);
        } else {
            session()->set('status', 'login-user');
            session()->set('peserta_id', $peserta['peserta_id']);
        }
        
        return redirect()->to('berkas-pendaftaran');
    }    

    public function daftar_auth()
    {
        $rules = [
            'username' => 'required|numeric|max_length[16]',
            'email' => 'required|valid_email|is_unique[peserta.peserta_email]',
            'nama' => 'required|alpha_space',
            'ktp' => 'required|numeric|min_length[16]|max_length[16]|is_unique[peserta.peserta_ktp]',
            'pass' => 'required|min_length[8]', 
            'pass2' => 'required|matches[pass]',
            'setuju' => 'required'
        ];
        
        $errors = [
            'username' => [
                'required' => 'Username harus diisi.',
                'numeric' => 'Username hanya boleh berisi angka.',
                'max_length' => 'Username maksimal 16 karakter.'
            ],
            'email' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email harus valid.',
                'is_unique' => 'Email sudah terdaftar.'
            ],
            'nama' => [
                'required' => 'Nama harus diisi.',
                'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi.'
            ],
            'ktp' => [
                'required' => 'No KTP harus diisi.',
                'numeric' => 'No KTP harus berupa angka.',
                'min_length' => 'No KTP harus 16 digit.',
                'max_length' => 'No KTP harus 16 digit.',
                'is_unique' => 'No KTP sudah terdaftar.'
            ],
            'pass' => [
                'required' => 'Password harus diisi.',
                'min_length' => 'Password minimal 8 karakter.'
            ],
            'pass2' => [
                'required' => 'Konfirmasi password harus diisi.',
                'matches' => 'Konfirmasi password harus sama.'
            ],
            'setuju' => [
                'required' => 'Anda harus menyetujui syarat dan ketentuan untuk melanjutkan.'
            ]
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-daftar', $this->validator->getErrors());
            return redirect()->to('daftar')->withInput();
        }

        $telp = $this->request->getPost('username');

        if (strpos($telp, '08') === 0) {
            $telp = '628' . substr($telp, 2);
        }
    
        $pesertaData = [
            'peserta_username' => $telp,
            'peserta_nama'     => ucwords(strtolower($this->request->getPost('nama'))),
            'peserta_pass'     => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'peserta_email'    => $this->request->getPost('email'),
            'peserta_ktp'      => $this->request->getPost('ktp'),
        ];
        $pesertaModel = $this->pesertaModel;
        $pesertaModel->insert($pesertaData);
        $pesertaId = $pesertaModel->insertID();

        $santriData = [ 'peserta_id' => $pesertaId ];
        
        $santriModel = $this->santriModel;
        $ortuModel = $this->ortuModel;
        $rkModel = $this->rkModel;

        $santriModel->insert($santriData);
        $ortuModel->insert($santriData);
        $rkModel->insert($santriData);
    
        return redirect()->to('masuk');
    }
    
    public function destroy()
    {
        session()->destroy();
        return redirect()->to('/')->with('message', 'Anda telah berhasil keluar.');
    }
}
