<?php

namespace App\Controllers;

use \App\Models\PesertaModel;
use \App\Models\SantriModel;

class Santri extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
    }

    public function update()
    {
        $rules = [
            'santri_nama' => 'required|max_length[225]',
            'santri_panggilan' => 'required|max_length[35]',
            'santri_nik' => 'required|numeric|min_length[16]|max_length[16]',
            'santri_tempatlahir' => 'required|max_length[225]',
            'santri_tanggallahir' => 'required',
            'santri_alamat' => 'required|max_length[225]',
            'santri_anakke' => 'required|numeric|max_length[2]',
            'santri_bersaudara' => 'required|numeric|max_length[2]',
            'santri_hp' => 'required|numeric|min_length[9]|max_length[16]',
            'santri_sdmasuk' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2025]',
            'santri_sdlulus' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2025]',
            'santri_smpmasuk' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2025]',
            'santri_smplulus' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2025]',
            'santri_smamasuk' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2026]',
            'santri_smalulus' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2026]',
            'santri_pa' => 'required|max_length[225]',
            'santri_pa_alamat' => 'required|max_length[225]',
            'santri_pa_jurusan' => 'required|max_length[225]',
            'santri_pa_lulus' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2026]',
            'santri_ps_pt' => 'required|max_length[225]',
            'santri_ps_fakultas' => 'required|max_length[225]',
            'santri_ps_prodi' => 'required|max_length[225]',
            'santri_ps_masuk' => 'required|numeric|exact_length[4]|regex_match[/^20\d{2}$/]|less_than[2026]',
        ];
        
        $errors = [
            'santri_ps_pt' => [
                'required' => 'Perguruan tinggi harus diisi.',
                'max_length' => 'Perguruan tinggi maksimal 255 karakter.'
            ],
            'santri_ps_fakultas' => [
                'required' => 'Fakultas harus diisi.',
                'max_length' => 'Fakultas maksimal 255 karakter.'
            ],
            'santri_ps_prodi' => [
                'required' => 'Program studi harus diisi.',
                'max_length' => 'Program studi maksimal 255 karakter.'
            ],
            'santri_ps_masuk' => [
                'required' => 'Tahun masuk belum diisi.',
                'numeric' => 'Tahun masuk harus berupa angka.',
                'exact_length' => 'Masukkan tahun masuk yang valid.',
                'regex_match' => 'Masukkan tahun masuk yang valid.',
                'less_than' => 'Masukkan tahun masuk yang tepat.'
            ],
            'santri_nama' => [
                'required' => 'Nama lengkap harus diisi.',
                'max_length' => 'Nama lengkap maksimal 255 karakter.'
            ],
            'santri_panggilan' => [
                'required' => 'Nama panggilan harus diisi.',
                'max_length' => 'Nama panggilan maksimal 35 karakter.'
            ],
            'santri_nik' => [
                'required' => 'NIK harus diisi.',
                'numeric' => 'NIK harus berupa angka.',
                'min_length' => 'NIK harus 16 angka.',
                'max_length' => 'NIK harus 16 angka.'
            ],
            'santri_tempatlahir' => [
                'required' => 'Tempat lahir harus diisi.',
                'max_length' => 'Tempat lahir maksimal 255 karakter.'
            ],
            'santri_tanggallahir' => [
                'required' => 'Tanggal lahir harus diisi.'
            ],
            'santri_alamat' => [
                'required' => 'Alamat asal harus diisi.',
                'max_length' => 'Alamat asal maksimal 255 karakter.'
            ],
            'santri_anakke' => [
                'required' => 'Bagian ini harus diisi.',
                'numeric' => 'Harus berupa angka.',
                'max_length' => 'Angka maksimal adalah 99.'
            ],
            'santri_bersaudara' => [
                'required' => 'Bagian ini harus diisi.',
                'numeric' => 'Harus berupa angka.',
                'max_length' => 'Angka maksimal adalah 99.'
            ],
            'santri_hp' => [
                'required' => 'Nomor HP harus diisi.',
                'numeric' => 'Nomor HP harus berupa angka.',
                'min_length' => 'Nomor HP harus minimal 9 angka.',
                'max_length' => 'Nomor HP harus maksimal 16 angka.'
            ],
            'santri_sdmasuk' => [
                'required' => 'Tahun masuk SD / MI belum diisi.',
                'numeric' => 'Tahun masuk SD / MI harus berupa angka.',
                'exact_length' => 'Masukkan tahun masuk SD / MI yang valid.',
                'regex_match' => 'Masukkan tahun masuk SD / MI yang valid.',
                'less_than' => 'Masukkan tahun masuk SD / MI yang tepat.'
            ],
            'santri_sdlulus' => [
                'required' => 'Tahun lulus SD / MI belum diisi.',
                'numeric' => 'Tahun lulus SD / MI harus berupa angka.',
                'exact_length' => 'Masukkan tahun lulus SD / MI yang valid.',
                'regex_match' => 'Masukkan tahun lulus SD / MI yang valid.',
                'less_than' => 'Masukkan tahun lulus SD / MI yang tepat.'
            ],
            'santri_smpmasuk' => [
                'required' => 'Tahun masuk SMP / MTs belum diisi.',
                'numeric' => 'Tahun masuk SMP / MTs harus berupa angka.',
                'exact_length' => 'Masukkan tahun masuk SMP / MTs yang valid.',
                'regex_match' => 'Masukkan tahun masuk SMP / MTs yang valid.',
                'less_than' => 'Masukkan tahun masuk SMP / MTs yang tepat.'
            ],
            'santri_smplulus' => [
                'required' => 'Tahun lulus SMP / MTs belum diisi.',
                'numeric' => 'Tahun lulus SMP / MTs harus berupa angka.',
                'exact_length' => 'Masukkan tahun lulus SMP / MTs yang valid.',
                'regex_match' => 'Masukkan tahun lulus SMP / MTs yang valid.',
                'less_than' => 'Masukkan tahun lulus SMP / MTs yang tepat.'
            ],
            'santri_smamasuk' => [
                'required' => 'Tahun masuk SMU / MA / SMK belum diisi.',
                'numeric' => 'Tahun masuk SMU / MA / SMK harus berupa angka.',
                'exact_length' => 'Masukkan tahun masuk SMU / MA / SMK yang valid.',
                'regex_match' => 'Masukkan tahun masuk SMU / MA / SMK yang valid.',
                'less_than' => 'Masukkan tahun masuk SMU / MA / SMK yang tepat.'
            ],
            'santri_smalulus' => [
                'required' => 'Tahun lulus SMU / MA / SMK belum diisi.',
                'numeric' => 'Tahun lulus SMU / MA / SMK harus berupa angka.',
                'exact_length' => 'Masukkan tahun lulus SMU / MA / SMK yang valid.',
                'regex_match' => 'Masukkan tahun lulus SMU / MA / SMK yang valid.',
                'less_than' => 'Masukkan tahun lulus SMU / MA / SMK yang tepat.'
            ],
            'santri_pa' => [
                'required' => 'Pendidikan asal harus diisi.',
                'max_length' => 'Pendidikan asal maksimal 255 karakter.'
            ],
            'santri_pa_alamat' => [
                'required' => 'Alamat pendidikan asal harus diisi.',
                'max_length' => 'Alamat pendidikan asal maksimal 255 karakter.'
            ],
            'santri_pa_jurusan' => [
                'required' => 'Jurusan harus diisi.',
                'max_length' => 'Jurusan maksimal 255 karakter.'
            ],
            'santri_pa_lulus' => [
                'required' => 'Tahun lulus belum diisi.',
                'numeric' => 'Tahun lulus harus berupa angka.',
                'exact_length' => 'Masukkan lulus yang valid.',
                'regex_match' => 'Masukkan lulus yang valid.',
                'less_than' => 'Masukkan lulus yang tepat.'
            ],
        ];
    
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('errors-santri', $this->validator->getErrors());
            return redirect()->to('biodata-calon-santri')->withInput();
        }

        $telp = $this->request->getPost('santri_hp');
        if (strpos($telp, '08') === 0) {
            $telp = '628' . substr($telp, 2);
        }
    
        $update = [
            'santri_nama' => ucwords(strtolower($this->request->getPost('santri_nama'))),
            'santri_panggilan' => ucwords(strtolower($this->request->getPost('santri_panggilan'))),
            'santri_nik' => $this->request->getPost('santri_nik'),
            'santri_tempatlahir' => $this->request->getPost('santri_tempatlahir'),
            'santri_tanggallahir' => $this->request->getPost('santri_tanggallahir'),
            'santri_alamat' => $this->request->getPost('santri_alamat'),
            'santri_anakke' => $this->request->getPost('santri_anakke'),
            'santri_bersaudara' => $this->request->getPost('santri_bersaudara'),
            'santri_hp' => $telp,
            'santri_sdmasuk' => $this->request->getPost('santri_sdmasuk'),
            'santri_sdlulus' => $this->request->getPost('santri_sdlulus'),
            'santri_smpmasuk' => $this->request->getPost('santri_smpmasuk'),
            'santri_smplulus' => $this->request->getPost('santri_smplulus'),
            'santri_smamasuk' => $this->request->getPost('santri_smamasuk'),
            'santri_smalulus' => $this->request->getPost('santri_smalulus'),
            'santri_pa' => $this->request->getPost('santri_pa'),
            'santri_pa_alamat' => $this->request->getPost('santri_pa_alamat'),
            'santri_pa_jurusan' => $this->request->getPost('santri_pa_jurusan'),
            'santri_pa_lulus' => $this->request->getPost('santri_pa_lulus'),
            'santri_ps_pt' => $this->request->getPost('santri_ps_pt'),
            'santri_ps_fakultas' => $this->request->getPost('santri_ps_fakultas'),
            'santri_ps_prodi' => $this->request->getPost('santri_ps_prodi'),
            'santri_ps_masuk' => $this->request->getPost('santri_ps_masuk')
        ];
        $santri_id = $this->request->getPost('santri_id');
        $santriModel = $this->santriModel;
        $santriModel->update($santri_id, $update);
    
        return redirect()->to('berkas-pendaftaran');
    }
}