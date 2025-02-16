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

class Auth extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $ortuModel;
    protected $rkModel;
    protected $lainModel;
    protected $bpModel;
    protected $ttModel;
    protected $twModel;
    protected $messageModel;
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
        $this->ortuModel = new OrtuModel();
        $this->rkModel = new RiwayatKesehatanModel();
        $this->lainModel = new LainModel();
        $this->bpModel = new BpModel();
        $this->ttModel = new TesTulisModel();
        $this->twModel = new TeswawancaraModel();
        $this->messageModel = new MessageModel();
        $this->pengumumanModel = new PengumumanModel();
    }

    public function masuk(): mixed
    {
        $data = [
            'title' => 'Masuk',
            'page' => 'masuk'
        ];

        if (session()->get('status') == 'login-admin') {
            return redirect()->back();
        }
        if (session()->get('status') == 'login-user') {
            return redirect()->back();
        }

        return 
        view('templates/header', $data) .
        view('auth/masuk') .
        view('templates/footer');
    }

    public function daftar(): mixed
    {
        $data = [
            'title' => 'Masuk',
            'page' => 'masuk'
        ];

        if (session()->get('status') == 'login-admin') {
            return redirect()->back();
        }
        if (session()->get('status') == 'login-user') {
            return redirect()->back();
        }

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

            // Email
            $email = $peserta['peserta_email'];
            $nama = $peserta['peserta_nama'];
            $sendEmail = new \App\Controllers\SendEmail();
            $sendEmail->daftar_auth($email, $nama);
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
        $lainModel = $this->lainModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
        $messageModel = $this->messageModel;
        $pengumumanModel = $this->pengumumanModel;

        $santriModel->insert($santriData);
        $ortuModel->insert($santriData);
        $rkModel->insert($santriData);
        $lainModel->insert($santriData);
        $bpModel->insert($santriData);
        $ttModel->insert($santriData);
        $twModel->insert($santriData);
        $messageModel->insert($santriData);
        $pengumumanModel->insert($santriData);

        $email = $this->request->getPost('email');
        $nama = ucwords(strtolower($this->request->getPost('nama')));
        $sendEmail = new \App\Controllers\SendEmail();
        $sendEmail->daftar_auth($email, $nama);
    
        return redirect()->to('masuk')->with('success-daftar', 'Anda berhasil melakukan pendaftaran. Silakan login dengan akun yang baru Anda buat.');
    }
    
    public function destroy()
    {
        session()->destroy();
        return redirect()->to('/')->with('message', 'Anda telah berhasil keluar.');
    }

    public function admin(): string
    {
        $data = [
            'title' => 'Login Admin',
            'page' => 'masuk'
        ];
        return 
        view('templates/header', $data) .
        view('auth/admin') .
        view('templates/footer');
    }

    public function admin_auth()
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
            return redirect()->to('admin')->withInput();
        }
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('pass');
    
        if ($username !== $this->admin_ver('username')) {
            session()->setFlashdata('errors-masuk', ['auth' => 'Username tidak ditemukan.']);
            return redirect()->to('admin')->withInput();
        }
    
        if ($password !== $this->admin_ver('pass')) {
            session()->setFlashdata('errors-masuk', ['auth' => 'Password salah.']);
            return redirect()->to('admin')->withInput();
        }

        if ($this->request->getPost('ingat')) {
            session()->setTempdata('status', 'login-admin', 60 * 60 * 24 * 7);
        } else {
            session()->set('status', 'login-admin');
        }
        
        return redirect()->to('dashboard-admin');
    }

    private function admin_ver($x)
    {
        if ($x == 'pass') {
            return 'xxx';
        } elseif ($x == 'username') {
            return 'x';
        }
    }
}
