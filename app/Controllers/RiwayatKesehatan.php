<?php

namespace App\Controllers;

use \App\Models\RiwayatKesehatanModel;
use \App\Models\PenyakitPernahModel;
use \App\Models\PenyakitSedangModel;
use \App\Models\LainPrestasiModel;
use \App\Models\LainOrganisasiModel;
use \App\Models\LainBahasaModel;
use \App\Models\LainKeahlianModel;
use \App\Models\LainOlahragaModel;
use \App\Models\LainSenbudModel;
use \App\Models\LainPenalaranModel;
use \App\Models\LainAgamaModel;
use \App\Models\LainBahasamModel;
use \App\Models\LainModel;

class RiwayatKesehatan extends BaseController
{
    protected $riwayatKesehatanModel;
    protected $penyakitPernahModel;
    protected $penyakitSedangModel;
    protected $lainPrestasiModel;
    protected $lainOrganisasiModel;
    protected $lainBahasaModel;
    protected $lainKeahlianModel;
    protected $lainOlahragaModel;
    protected $lainSenbudModel;
    protected $lainPenalaranModel;
    protected $lainAgamaModel;
    protected $lainBahasamModel;
    protected $lainModel;

    public function __construct()
    {
        $this->riwayatKesehatanModel = new RiwayatKesehatanModel();
        $this->penyakitPernahModel = new PenyakitPernahModel();
        $this->penyakitSedangModel = new PenyakitSedangModel();
        $this->lainPrestasiModel = new LainPrestasiModel();
        $this->lainOrganisasiModel = new LainOrganisasiModel();
        $this->lainBahasaModel = new LainBahasaModel();
        $this->lainKeahlianModel = new LainKeahlianModel();
        $this->lainOlahragaModel = new LainOlahragaModel();
        $this->lainSenbudModel = new LainSenbudModel();
        $this->lainPenalaranModel = new LainPenalaranModel();
        $this->lainAgamaModel = new LainAgamaModel();
        $this->lainBahasamModel = new LainBahasamModel();
        $this->lainModel = new LainModel();
    }

    public function update()
    {
        $rules = [
            'rk_golongandarah' => 'required',
            'rk_perawatan' => 'required',
            'rk_kontak_nama' => 'required|max_length[225]',
            'rk_kontak_alamat' => 'required|max_length[225]',
            'rk_kontak_hp' => 'required|numeric|min_length[9]|max_length[16]',
            'rk_saved' => 'required',
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
            'rk_saved' => [
                'required' => 'Klik checkbox ini sebelum menyimpan.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-rk', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $telp = $this->request->getPost('rk_kontak_hp');
        if (strpos($telp, '08') === 0) {  $telp = '628' . substr($telp, 2); }
    
        $update_rk = [
            'rk_golongandarah' => $this->request->getPost('rk_golongandarah'),
            'rk_perawatan' => $this->request->getPost('rk_perawatan'),
            'rk_kontak_nama' => $this->request->getPost('rk_kontak_nama'),
            'rk_kontak_alamat' => $this->request->getPost('rk_kontak_alamat'),
            'rk_kontak_hp' => $telp,
            'rk_saved' => $this->request->getPost('rk_saved'),
        ];
        $update_lain = [
            'lain_btq_membaca' => $this->request->getPost('lain_btq_membaca'),
            'lain_btq_menulis' => $this->request->getPost('lain_btq_menulis'),
            'lain_btq_terjemah' => $this->request->getPost('lain_btq_terjemah'),
            'lain_khatam' => $this->request->getPost('lain_khatam'),
            'lain_juz' => $this->request->getPost('lain_juz'),
            'lain_bahasa_arab' => $this->request->getPost('lain_bahasa_arab'),
            'lain_bahasa_inggris' => $this->request->getPost('lain_bahasa_inggris'),
            'lain_bahasa_jepang' => $this->request->getPost('lain_bahasa_jepang'),

            'lain_keahlian_komputer' => $this->request->getPost('lain_keahlian_komputer'),
            'lain_keahlian_elektro' => $this->request->getPost('lain_keahlian_elektro'),
            'lain_keahlian_desain' => $this->request->getPost('lain_keahlian_desain'),

            'lain_olahraga_footbal' => $this->request->getPost('lain_olahraga_footbal'),
            'lain_olahraga_basket' => $this->request->getPost('lain_olahraga_basket'),
            'lain_olahraga_badminton' => $this->request->getPost('lain_olahraga_badminton'),

            'lain_senbud_musik' => $this->request->getPost('lain_senbud_musik'),
            'lain_senbud_senisuara' => $this->request->getPost('lain_senbud_senisuara'),
            'lain_senbud_senilukis' => $this->request->getPost('lain_senbud_senilukis'),

            'lain_penalaran_seminar' => $this->request->getPost('lain_penalaran_seminar'),
            'lain_penalaran_jurnalistik' => $this->request->getPost('lain_penalaran_jurnalistik'),
            'lain_penalaran_karyatulis' => $this->request->getPost('lain_penalaran_karyatulis'),

            'lain_agama_qiroah' => $this->request->getPost('lain_agama_qiroah'),
            'lain_agama_sholawat' => $this->request->getPost('lain_agama_sholawat'),
            'lain_agama_ptq' => $this->request->getPost('lain_agama_ptq'),

            'lain_bahasam_arab' => $this->request->getPost('lain_bahasam_arab'),
            'lain_bahasam_inggris' => $this->request->getPost('lain_bahasam_inggris'),
            'lain_bahasam_jepang' => $this->request->getPost('lain_bahasam_jepang'),
        ];
        
        $rk_id = $this->request->getPost('rk_id');
        $lain_id = $this->request->getPost('lain_id');

        $riwayatKesehatanModel = $this->riwayatKesehatanModel;
        $lainModel = $this->lainModel;

        $riwayatKesehatanModel->update($rk_id, $update_rk);
        $lainModel->update($lain_id, $update_lain);
    
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

    public function update_prestasi()
    {
        $rules = [
            'lain_prestasi_prestasi' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_prestasi_prestasi' => [
                'required' => 'Prestasi harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_prestasi_prestasi' => $this->request->getPost('lain_prestasi_prestasi'),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainPrestasiModel = $this->lainPrestasiModel;
        $lainPrestasiModel->insert($add);
    
        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_organisasi()
    {
        $rules = [
            'lain_organisasi_organisasi' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_organisasi_organisasi' => [
                'required' => 'Organisasi harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_organisasi_organisasi' => $this->request->getPost('lain_organisasi_organisasi'),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainOrganisasiModel = $this->lainOrganisasiModel;
        $lainOrganisasiModel->insert($add);
    
        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_bahasa()
    {
        $rules = [
            'lain_bahasa_bahasa' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_bahasa_bahasa' => [
                'required' => 'Bahasa harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_bahasa_bahasa' => ucwords(strtolower($this->request->getPost('lain_bahasa_bahasa'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainBahasaModel = $this->lainBahasaModel;
        $lainBahasaModel->insert($add);
    
        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_keahlian()
    {
        $rules = [
            'lain_keahlian_keahlian' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_keahlian_keahlian' => [
                'required' => 'Keahlian harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_keahlian_keahlian' => ucwords(strtolower($this->request->getPost('lain_keahlian_keahlian'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainKeahlianModel = $this->lainKeahlianModel;
        $lainKeahlianModel->insert($add);
    
        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }
    
    public function update_olahraga()
    {
        $rules = [
            'lain_olahraga_olahraga' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_olahraga_olahraga' => [
                'required' => 'Bidang olahraga harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_olahraga_olahraga' => ucwords(strtolower($this->request->getPost('lain_olahraga_olahraga'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainOlahragaModel = $this->lainOlahragaModel;
        $lainOlahragaModel->insert($add);

        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_senbud()
    {
        $rules = [
            'lain_senbud_senbud' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_senbud_senbud' => [
                'required' => 'Bidang seni dan budaya harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_senbud_senbud' => ucwords(strtolower($this->request->getPost('lain_senbud_senbud'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainSenbudModel = $this->lainSenbudModel;
        $lainSenbudModel->insert($add);

        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_penalaran()
    {
        $rules = [
            'lain_penalaran_penalaran' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_penalaran_penalaran' => [
                'required' => 'Bidang penalaran harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_penalaran_penalaran' => ucwords(strtolower($this->request->getPost('lain_penalaran_penalaran'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainPenalaranModel = $this->lainPenalaranModel;
        $lainPenalaranModel->insert($add);

        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_agama()
    {
        $rules = [
            'lain_agama_agama' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_agama_agama' => [
                'required' => 'Bidang agama harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_agama_agama' => ucwords(strtolower($this->request->getPost('lain_agama_agama'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainAgamaModel = $this->lainAgamaModel;
        $lainAgamaModel->insert($add);

        return redirect()->to('riwayat-kesehatan-dan-lain-lain');
    }

    public function update_bahasam()
    {
        $rules = [
            'lain_bahasam_bahasam' => 'required|max_length[225]',
        ];
        
        $errors = [
            'lain_bahasam_bahasam' => [
                'required' => 'Bidang bahasa harus diisi.',
                'max_length' => 'Panjang maksimal 255 karakter.',
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-lain', $this->validator->getErrors());
            return redirect()->to('riwayat-kesehatan-dan-lain-lain')->withInput();
        }

        $add = [
            'lain_bahasam_bahasam' => ucwords(strtolower($this->request->getPost('lain_bahasam_bahasam'))),
            'lain_id_lain' => $this->request->getPost('lain_id_lain')
        ];
        
        $lainBahasamModel = $this->lainBahasamModel;
        $lainBahasamModel->insert($add);

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

    public function hapus_prestasi($id)
    {
        $lainPrestasiModel = $this->lainPrestasiModel;
        $lainPrestasiModel->delete($id);
        return redirect()->back();
    }

    public function hapus_organisasi($id)
    {
        $lainOrganisasiModel = $this->lainOrganisasiModel;
        $lainOrganisasiModel->delete($id);
        return redirect()->back();
    }

    public function hapus_bahasa($id)
    {
        $lainBahasaModel = $this->lainBahasaModel;
        $lainBahasaModel->delete($id);
        return redirect()->back();
    }

    public function hapus_keahlian($id)
    {
        $lainKeahlianModel = $this->lainKeahlianModel;
        $lainKeahlianModel->delete($id);
        return redirect()->back();
    }

    public function hapus_olahraga($id)
    {
        $lainOlahragaModel = $this->lainOlahragaModel;
        $lainOlahragaModel->delete($id);
        return redirect()->back();
    }

    public function hapus_senbud($id)
    {
        $lainSenbudModel = $this->lainSenbudModel;
        $lainSenbudModel->delete($id);
        return redirect()->back();
    }

    public function hapus_penalaran($id)
    {
        $lainPenalaranModel = $this->lainPenalaranModel;
        $lainPenalaranModel->delete($id);
        return redirect()->back();
    }

    public function hapus_agama($id)
    {
        $lainAgamaModel = $this->lainAgamaModel;
        $lainAgamaModel->delete($id);
        return redirect()->back();
    }

    public function hapus_bahasam($id)
    {
        $lainBahasamModel = $this->lainBahasamModel;
        $lainBahasamModel->delete($id);
        return redirect()->back();
    }
}