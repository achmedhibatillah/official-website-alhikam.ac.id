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

class Admin extends BaseController
{
    protected $pesertaModel;
    protected $santriModel;
    protected $ortuModel;
    protected $riwayatKesehatanModel;
    protected $lainModel;
    protected $bpModel;
    protected $ttModel;
    protected $twModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->santriModel = new SantriModel();
        $this->ortuModel = new OrtuModel();
        $this->riwayatKesehatanModel = new RiwayatKesehatanModel();
        $this->lainModel = new LainModel();
        $this->bpModel = new BpModel();
        $this->ttModel = new TesTulisModel();
        $this->twModel = new TeswawancaraModel();
    }

    public function index(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first(); 

        $data = [
            'title' => 'Dashboard Admin',
            'page' => 'admin-dashboard',
        ];

        $santriModel = $this->santriModel;
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;

        $santriData = $santriModel->getSantriByPesertaId($session_id);
        $ortuData = $ortuModel->getOrtuByPesertaId($session_id);
        $rkData = $rkModel->getRiwayatKesehatanByIdPeserta($session_id);
        $bpData = $bpModel->getBpByPesertaId($session_id);
        $ttData = $ttModel->getTtByPesertaId($session_id);
        $twData = $twModel->getTwByPesertaId($session_id);

        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/index', [
            'santri' => $santriData,
            'ortu' => $ortuData,
            'rk' => $rkData,
            'bp' => $bpData,
            'tt' => $ttData,
            'tw' => $twData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function santri($cond = ''): string
    {
        $data = [
            'title' => 'Daftar Calon Santri',
            'page' => 'admin-santri',
        ];
        
        $santriModel = $this->santriModel;

        $keyword = $this->request->getGet('keyword') ?? '';
    
        $santriQuery = $santriModel->orderBy('created_at', 'DESC')->where('santri_saved', '1');
        
        if (!empty($keyword)) {
            $santriQuery->groupStart()->like('santri_nama', $keyword)->orLike('santri_nik', $keyword)->groupEnd();
        }
        
        $santriData = $santriQuery->findAll();
    
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
    
        foreach ($santriData as $key => $x) {
            $santriData[$key]['ortu_saved'] = $ortuModel->getOrtuByPesertaId($x['peserta_id'])['ortu_saved'] ?? 0;
            $santriData[$key]['rk_saved'] = $rkModel->getRiwayatKesehatanByIdPeserta($x['peserta_id'])['rk_saved'] ?? 0;
            $santriData[$key]['bp_saved'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_saved'] ?? 0;
            $santriData[$key]['testulis_konfirm'] = $ttModel->getTtByPesertaId($x['peserta_id'])['testulis_konfirm'] ?? 0;
            $santriData[$key]['tw_status'] = $twModel->getTwByPesertaId($x['peserta_id'])['tw_status'] ?? 0;
            $santriData[$key]['bp_foto'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_foto'] ?? 0;
        }

        if ($cond == 'bo') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['ortu_saved'] == 1;
            });
        } elseif ($cond == 'rk') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['rk_saved'] == 1;
            });
        } elseif ($cond == 'bp') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['bp_saved'] == 1;
            });
        } elseif ($cond == 'tt') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['testulis_konfirm'] == 1;
            });
        } elseif ($cond == 'tw') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['tw_status'] == 1;
            });
        }
        
        $santriData = array_values($santriData);
    
        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/santri', [
            'keyword' => $keyword,
            'santri' => $santriData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function santri_d($peserta_id): string
    {
        $data = [
            'title' => 'Calon Santri',
            'page' => 'admin-santri',
        ];
        
        $santriModel = $this->santriModel;
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $lainModel = $this->lainModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
    
        // Ambil data santri
        $santriData = $santriModel->getSantriByPesertaId($peserta_id);
    
        $ortuData = $ortuModel->getOrtuByPesertaId($peserta_id);
        $rkData = $rkModel->getRiwayatKesehatanByIdPeserta($peserta_id);
        $lainData = $lainModel->getLainByIdPeserta($peserta_id);
        $bpData = $bpModel->getBpByPesertaId($peserta_id);
        $ttData = $ttModel->getTtByPesertaId($peserta_id);
        $twData = $twModel->getTwByPesertaId($peserta_id);
    
        $santriData['ortu_saved'] = $ortuData['ortu_saved'] ?? 0;
        $santriData['rk_saved'] = $rkData['rk_saved'] ?? 0;
        $santriData['bp_saved'] = $bpData['bp_saved'] ?? 0;
        $santriData['tt_konfirm'] = $ttData['tt_konfirm'] ?? 0;
        $santriData['tw_status'] = $twData['tw_status'] ?? 0;

        $pekerjaanOptions = [
            1 => 'Tidak bekerja',
            2 => 'Nelayan',
            3 => 'Petani',
            4 => 'Peternak',
            5 => 'PNS/TNI/Polri',
            6 => 'Karyawan swasta',
            7 => 'Pedagang kecil',
            8 => 'Pedagang besar',
            9 => 'Wiraswasta',
            10 => 'Buruh',
            11 => 'Pensiunan',
            12 => 'Sudah meninggal',
            13 => 'Lainnya'
        ];
        $ortuData['ortu_a_pekerjaan_string'] = $pekerjaanOptions[$ortuData['ortu_a_pekerjaan']] ?? '';
        $ortuData['ortu_i_pekerjaan_string'] = $pekerjaanOptions[$ortuData['ortu_i_pekerjaan']] ?? '';

        $agamaOptions = [
            1 => 'Islam',
            2 => 'Protestan',
            3 => 'Katolik',
            4 => 'Hindu',
            5 => 'Buddha',
            6 => 'Konghuchu',
            7 => 'Lainnya'
        ];
        $ortuData['ortu_a_agama_string'] = $agamaOptions[$ortuData['ortu_a_agama']] ?? '';
        $ortuData['ortu_i_agama_string'] = $agamaOptions[$ortuData['ortu_i_agama']] ?? '';

        $pendidikanOptions = [
            1 => 'Tidak sekolah',
            2 => 'PAUD',
            3 => 'TK / sederajat',
            4 => 'Putus SD',
            5 => 'SD / sederajat',
            6 => 'SMP / sederajat',
            7 => 'SMA / sederajat',
            8 => 'Paket A',
            9 => 'Paket B',
            10 => 'Paket C',
            11 => 'D1',
            12 => 'D2',
            13 => 'D3',
            14 => 'D4',
            15 => 'Profesi',
            16 => 'S1',
            17 => 'SP-1',
            18 => 'S2',
            19 => 'SP-2',
            20 => 'S3',
            21 => 'Non-Formal',
            22 => 'Informal',
            23 => 'Lainnya'
        ];
        $ortuData['ortu_a_pendidikan_string'] = $pendidikanOptions[$ortuData['ortu_a_pendidikan']] ?? '';
        $ortuData['ortu_i_pendidikan_string'] = $pendidikanOptions[$ortuData['ortu_i_pendidikan']] ?? '';

        $golonganDarahOptions = [
            1 => 'A',
            2 => 'B',
            3 => 'AB',
            4 => 'O',
            5 => '-'
        ];
        $rkData['rk_golongandarah_string'] = $golonganDarahOptions[$rkData['rk_golongandarah']] ?? 'Tidak Diketahui';
        
        $perawatanOptions = [
            1 => 'Iya',
            2 => 'Tidak',
            3 => 'Jalan',
            4 => 'Inap'
        ];
        $rkData['rk_perawatan_string'] = $perawatanOptions[$rkData['rk_perawatan']] ?? 'Tidak Diketahui';

    
        return 
            view('templates/header', $data) .
            view('templates/navbar-admin', $data) .
            view('admin/santri-detail', [
                'santri' => $santriData,
                'ortu' => $ortuData,
                'rk' => $rkData,
                'lain' => $lainData,
                'bp' => $bpData,
                'tt' => $ttData,
                'tw' => $twData
            ]) .
            view('templates/footbar-admin') .
            view('templates/footer');
    }
    
    public function pembayaran($cond = ''): string
    {
        $data = [
            'title' => 'Verifikasi Pembayaran',
            'page' => 'admin-verifikasi',
        ];
        
        $santriModel = $this->santriModel;

        if ($cond == 'verified') {
            $santriData = $santriModel
            ->select('santri.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_saved', '1')
            ->where('bp.bp_konfirm', '1')
            ->orderBy('santri.created_at', 'DESC')
            ->findAll();
        } elseif ($cond == 'all') {
            $santriData = $santriModel
            ->select('santri.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_saved', '1')
            ->orderBy('santri.created_at', 'DESC')
            ->findAll();
        } else {
            $santriData = $santriModel
            ->select('santri.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_saved', '1')
            ->where('bp.bp_konfirm', '0')
            ->orderBy('santri.created_at', 'DESC')
            ->findAll();
        }


        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/verifikasi-pembayaran', [
            'cond' => $cond,
            'santri' => $santriData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pembayaran_d($peserta_id): string
    {
        $data = [
            'title' => 'Detail Pembayaran',
            'page' => 'admin-verifikasi',
        ];
        
        $santriModel = $this->santriModel;
        $bpModel = $this->bpModel;
    
        $santriData = $santriModel->getSantriByPesertaId($peserta_id);
        $bpData = $bpModel->getBpByPesertaId($peserta_id);
    
        return 
            view('templates/header', $data) .
            view('templates/navbar-admin', $data) .
            view('admin/verifikasi-pembayaran-detail', [
                'santri' => $santriData,
                'bp' => $bpData
            ]) .
            view('templates/footbar-admin') .
            view('templates/footer');
    }
}