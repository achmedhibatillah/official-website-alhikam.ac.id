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
use \App\Models\PeriodeModel;

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
    protected $messageModel;
    protected $pengumumanModel;
    protected $periodeModel;

    protected $periode_now;

    protected $periode_mulai;
    protected $periode_selesai;

    protected $jumlah_peserta;
    protected $jumlah_peserta_lulus;

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
        $this->messageModel = new MessageModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->periodeModel = new PeriodeModel();

        if (session()->get('periode') !== null) {
            $this->periode_mulai = session()->get('periode')['mulai'];
            $this->periode_selesai = session()->get('periode')['selesai'];
            $this->jumlah_peserta = $this->pesertaModel->where('created_at >=', $this->periode_mulai . ' 00:00:00')->where('created_at <=', $this->periode_selesai . ' 23:59:59')->countAllResults();
            $this->jumlah_peserta_lulus = 
            $this->pesertaModel
            ->where('peserta.created_at >=', $this->periode_mulai . ' 00:00:00')->where('peserta.created_at <=', $this->periode_selesai . ' 23:59:59')
            ->where('pengumuman.pengumuman_status', 1)
            ->join('pengumuman', 'peserta.peserta_id = pengumuman.peserta_id')
            ->countAllResults();
        } else {
            $this->periode_mulai = '';
            $this->periode_selesai = '';
            $this->jumlah_peserta = $this->pesertaModel->countAllResults();
            $this->jumlah_peserta_lulus = 
            $this->pesertaModel
            ->where('pengumuman.pengumuman_status', 1)
            ->join('pengumuman', 'peserta.peserta_id = pengumuman.peserta_id')
            ->countAllResults();
        }
        
        $this->periode_now = $this->periodeModel
        ->where('periode_mulai <=', date('Y-m-d'))
        ->where('periode_selesai >=', date('Y-m-d'))
        ->first();
    }

    public function index(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first(); 

        $data = [
            'title' => 'Dashboard Admin',
            'page' => 'admin-dashboard',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
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

    public function periode(): string
    {
        $data = [
            'title' => 'Periode Penerimaan',
            'page' => 'admin-periode',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];

        $periodeModel = $this->periodeModel;
        $periodeData = $periodeModel->orderBy('created_at', 'DESC')->findAll();

        $pesertaModel = $this->pesertaModel;
        foreach ($periodeData as $key => $periode) {
            $periodeData[$key]['jumlah_peserta'] = $pesertaModel
                ->where('created_at >=', $periode['periode_mulai'] . ' 00:00:00')
                ->where('created_at <=', $periode['periode_selesai'] . ' 23:59:59')
                ->countAllResults();
        }

        return
        view('templates/header', $data) . 
        view('templates/navbar-admin', $data) . 
        view('admin/periode', [
            'periode' => $periodeData
        ]) . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }

    public function cog(): string
    {
        $data = [
            'title' => 'Konfigurasi Utama',
            'page' => 'admin-cog',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];

        $periodeModel = $this->periodeModel;
        $periodeData = $periodeModel->orderBy('created_at', 'DESC')->findAll();

        return
        view('templates/header', $data) . 
        view('templates/navbar-admin', $data) . 
        view('admin/cog', [
            'periode' => $periodeData
        ]) . 
        view('templates/footbar-admin') . 
        view('templates/footer');
    }

    public function santri($cond = ''): string
    {
        $data = [
            'title' => 'Daftar Calon Santri',
            'page' => 'admin-santri',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;

        $keyword = $this->request->getGet('keyword') ?? '';
    
        $santriQuery = $santriModel->orderBy('created_at', 'DESC');

        if (!empty($this->periode_mulai) && !empty($this->periode_selesai)) {
            $santriQueryFix = $santriQuery->where('created_at >=', $this->periode_mulai . ' 00:00:00')->where('created_at <=', $this->periode_selesai . ' 23:59:59');
        } else {
            $santriQueryFix = $santriQuery;
        }        
        
        if (!empty($keyword)) {
            $santriQuery->groupStart()->like('santri_nama', $keyword)->orLike('santri_nik', $keyword)->groupEnd();
        }
        
        $santriData = $santriQueryFix->findAll();
    
        $pesertaModel = $this->pesertaModel;
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
        $pengumumanModel = $this->pengumumanModel;
    
        foreach ($santriData as $key => $x) {
            $santriData[$key]['peserta_nama'] = $pesertaModel->find($x['peserta_id'])['peserta_nama'] ?? 0;
            $santriData[$key]['peserta_created_at'] = $pesertaModel->find($x['peserta_id'])['created_at'] ?? 0;
            $santriData[$key]['ortu_saved'] = $ortuModel->getOrtuByPesertaId($x['peserta_id'])['ortu_saved'] ?? 0;
            $santriData[$key]['rk_saved'] = $rkModel->getRiwayatKesehatanByIdPeserta($x['peserta_id'])['rk_saved'] ?? 0;
            $santriData[$key]['bp_saved'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_saved'] ?? 0;
            $santriData[$key]['bp_konfirm'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_konfirm'] ?? 0;
            $santriData[$key]['testulis_konfirm'] = $ttModel->getTtByPesertaId($x['peserta_id'])['testulis_konfirm'] ?? 0;
            $santriData[$key]['tw_status'] = $twModel->getTwByPesertaId($x['peserta_id'])['tw_status'] ?? 0;
            $santriData[$key]['bp_foto'] = $bpModel->getBpByPesertaId($x['peserta_id'])['bp_foto'] ?? 0;
            $santriData[$key]['pengumuman_saved'] = $pengumumanModel->getPengumumanByPesertaId($x['peserta_id'])['pengumuman_saved'] ?? 0;
            $santriData[$key]['pengumuman_status'] = $pengumumanModel->getPengumumanByPesertaId($x['peserta_id'])['pengumuman_status'] ?? 0;
        }

        if ($cond == 'biodata-telah-lengkap') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['santri_saved'] == 1 && $santri['ortu_saved'] == 1 && $santri['rk_saved'] == 1;
            });
        } elseif ($cond == 'bukti-pembayaran-tersimpan') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['bp_saved'] == 1 && ($santri['bp_konfirm'] == 0 || $santri['bp_konfirm'] = null );
            });
        } elseif ($cond == 'bukti-pembayaran-terverifikasi') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['bp_saved'] == 1 && $santri['bp_konfirm'] == 1;
            });
        } elseif ($cond == 'telah-mengikuti-tes-tulis') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['testulis_konfirm'] == 1;
            });
        } elseif ($cond == 'telah-mengikuti-tes-wawancara') { 
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['tw_status'] == 1;
            });
        } elseif ($cond == 'telah-diberikan-sk') {
            $santriData = array_filter($santriData, function ($santri) {
                return $santri['pengumuman_saved'] == 1;
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
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $pesertaModel = $this->pesertaModel;
        $santriModel = $this->santriModel;
        $ortuModel = $this->ortuModel;
        $rkModel = $this->riwayatKesehatanModel;
        $lainModel = $this->lainModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
        $twModel = $this->twModel;
        $pengumumanModel = $this->pengumumanModel;
    
        // Ambil data santri
        $santriData = $santriModel->getSantriByPesertaId($peserta_id);
    
        $pesertaData = $pesertaModel->find($peserta_id);
        $ortuData = $ortuModel->getOrtuByPesertaId($peserta_id);
        $rkData = $rkModel->getRiwayatKesehatanByIdPeserta($peserta_id);
        $lainData = $lainModel->getLainByIdPeserta($peserta_id);
        $bpData = $bpModel->getBpByPesertaId($peserta_id);
        $ttData = $ttModel->getTtByPesertaId($peserta_id);
        $twData = $twModel->getTwByPesertaId($peserta_id);
        $pengumumanData = $pengumumanModel->getPengumumanByPesertaId($peserta_id);
    
        $santriData['ortu_saved'] = $ortuData['ortu_saved'] ?? 0;
        $santriData['rk_saved'] = $rkData['rk_saved'] ?? 0;
        $santriData['bp_saved'] = $bpData['bp_saved'] ?? 0;
        $santriData['tt_konfirm'] = $ttData['tt_konfirm'] ?? 0;
        $santriData['tw_status'] = $twData['tw_status'] ?? 0;
        $santriData['pengumuman_saved'] = $pengumumanData['pengumuman_saved'] ?? 0;

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
                'peserta' => $pesertaData,
                'santri' => $santriData,
                'ortu' => $ortuData,
                'rk' => $rkData,
                'lain' => $lainData,
                'bp' => $bpData,
                'tt' => $ttData,
                'tw' => $twData,
                'pengumuman' => $pengumumanData
            ]) .
            view('templates/footbar-admin') .
            view('templates/footer');
    }
    
    public function pembayaran($cond = ''): string
    {
        $data = [
            'title' => 'Verifikasi Pembayaran',
            'page' => 'admin-verifikasi',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;

        if ($cond == 'verified') {
            $santriData = $santriModel
            ->select('santri.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_saved', '1')
            ->where('bp.bp_konfirm', '1')
            ->orderBy('santri.updated_at', 'DESC');
        } elseif ($cond == 'all') {
            $santriData = $santriModel
            ->select('santri.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_saved', '1')
            ->orderBy('santri.created_at', 'DESC');
        } else {
            $santriData = $santriModel
            ->select('santri.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_saved', '1')
            ->where('bp.bp_konfirm', '0')
            ->orderBy('santri.created_at', 'DESC');
        }

        if (!empty($this->periode_mulai) && !empty($this->periode_selesai)) {
            $santriDataFix = $santriData->where('santri.created_at >=', $this->periode_mulai)->where('santri.created_at <=', $this->periode_selesai)->findAll();
        } else {
            $santriDataFix = $santriData->findAll();
        }

        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/verifikasi-pembayaran', [
            'cond' => $cond,
            'santri' => $santriDataFix
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pembayaran_d($peserta_id): string
    {
        $data = [
            'title' => 'Detail Pembayaran',
            'page' => 'admin-verifikasi',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
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

    public function testulis($cond = ''): string
    {
        $data = [
            'title' => 'Atur Tes Tulis',
            'page' => 'admin-tes-tulis',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;

        if ($cond == 'all') {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, bp.*')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_konfirm', '1')
            ->orderBy('santri.created_at', 'DESC');
        } elseif ($cond == 'verified') {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, bp.*')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_konfirm', '1')
            ->where('testulis.testulis_konfirm', '1')
            ->orderBy('santri.created_at', 'DESC');
        } else {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, bp.*')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('bp.bp_konfirm', '1')
            ->where('testulis.testulis_konfirm', '0')
            ->orderBy('santri.created_at', 'DESC');
        }

        if (!empty($this->periode_mulai) && !empty($this->periode_selesai)) {
            $santriDataFix = $santriData->where('santri.created_at >=', $this->periode_mulai)->where('santri.created_at <=', $this->periode_selesai)->findAll();
        } else {
            $santriDataFix = $santriData->findAll();
        }

        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/atur-tes-tulis', [
            'cond' => $cond,
            'santri' => $santriDataFix
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function testulis_d($peserta_id): string
    {
        $data = [
            'title' => 'Atur Tes Tulis',
            'page' => 'admin-tes-tulis',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;
        $bpModel = $this->bpModel;
        $ttModel = $this->ttModel;
    
        $santriData = $santriModel->getSantriByPesertaId($peserta_id);
        $bpData = $bpModel->getBpByPesertaId($peserta_id);
        $ttData = $ttModel->getTtByPesertaId($peserta_id);
    
        return 
            view('templates/header', $data) .
            view('templates/navbar-admin', $data) .
            view('admin/atur-tes-tulis-detail', [
                'santri' => $santriData,
                'bp' => $bpData,
                'tt' => $ttData
            ]) .
            view('templates/footbar-admin') .
            view('templates/footer'); 
    }

    public function wawancara($cond = ''): string
    {
        $data = [
            'title' => 'Atur Wawancara',
            'page' => 'admin-wawancara',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;

        if ($cond == 'verified') {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, teswawancara.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('testulis.testulis_konfirm', '1')
            ->where('teswawancara.tw_status', '1')
            ->orderBy('santri.created_at', 'DESC');
        } elseif ($cond == 'queue') {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, teswawancara.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('testulis.testulis_konfirm', '1')
            ->where('teswawancara.tw_pewawancara IS NOT NULL')
            ->where('teswawancara.tw_status', '0')
            ->orderBy('santri.created_at', 'DESC');
        } elseif ($cond == 'all') {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, teswawancara.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('testulis.testulis_konfirm', '1')
            ->orderBy('santri.created_at', 'DESC');
        } else {
            $santriData = $santriModel
            ->select('santri.*, testulis.*, teswawancara.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('testulis', 'testulis.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('testulis.testulis_konfirm', '1')
            ->where('teswawancara.tw_pewawancara IS NULL')
            ->where('teswawancara.tw_status', '0')
            ->orderBy('santri.created_at', 'DESC');
        }
        
        if (!empty($this->periode_mulai) && !empty($this->periode_selesai)) {
            $santriDataFix = $santriData->where('santri.created_at >=', $this->periode_mulai)->where('santri.created_at <=', $this->periode_selesai)->findAll();
        } else {
            $santriDataFix = $santriData->findAll();
        }

        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/atur-wawancara', [
            'cond' => $cond,
            'santri' => $santriDataFix
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function wawancara_d($peserta_id): string
    {
        $data = [
            'title' => 'Atur Wawancara',
            'page' => 'admin-wawancara',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;
        $bpModel = $this->bpModel;
        $twModel = $this->twModel;
    
        $santriData = $santriModel->getSantriByPesertaId($peserta_id);
        $bpData = $bpModel->getBpByPesertaId($peserta_id);
        $twData = $twModel->getTwByPesertaId($peserta_id);
    
        return 
            view('templates/header', $data) .
            view('templates/navbar-admin', $data) .
            view('admin/atur-wawancara-detail-edit', [
                'santri' => $santriData,
                'bp' => $bpData,
                'tw' => $twData
            ]) .
            view('templates/footbar-admin') .
            view('templates/footer');
    }

    public function pengumuman($cond = ''): string
    {
        $data = [
            'title' => 'Pengumuman Kelulusan',
            'page' => 'admin-pengumuman',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;
        $pengumumanModel = $this->pengumumanModel;

        if ($cond == 'lulus') {
            $santriData = $santriModel
            ->select('santri.*, teswawancara.*, pengumuman.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('pengumuman', 'pengumuman.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('teswawancara.tw_status', '1') //
            ->where('pengumuman.pengumuman_saved', '1')
            ->where('pengumuman.pengumuman_status', '1')
            ->orderBy('santri.created_at', 'DESC');
        } elseif ($cond == 'tidak-lulus') {
            $santriData = $santriModel
            ->select('santri.*, teswawancara.*, pengumuman.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('pengumuman', 'pengumuman.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('teswawancara.tw_status', '1') //
            ->where('pengumuman.pengumuman_saved', '1')
            ->where('pengumuman.pengumuman_status', '0')
            ->orderBy('santri.created_at', 'DESC');
        } elseif ($cond == 'all'){
            $santriData = $santriModel
            ->select('santri.*, teswawancara.*, pengumuman.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('pengumuman', 'pengumuman.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('teswawancara.tw_status', '1') //
            ->orderBy('santri.created_at', 'DESC');
        } else {
            $santriData = $santriModel
            ->select('santri.*, teswawancara.*, pengumuman.*, bp.bp_saved, bp.bp_konfirm, bp.bp_foto, bp.bp_bp')
            ->join('bp', 'bp.peserta_id = santri.peserta_id')
            ->join('teswawancara', 'teswawancara.peserta_id = santri.peserta_id')
            ->join('pengumuman', 'pengumuman.peserta_id = santri.peserta_id')
            ->where('santri.santri_saved', '1')
            ->where('teswawancara.tw_status', '1') //
            ->where('pengumuman.pengumuman_saved IS NULL')
            ->orWhere('pengumuman.pengumuman_saved', '0')
            ->orderBy('santri.created_at', 'DESC');
        }

        if (!empty($this->periode_mulai) && !empty($this->periode_selesai)) {
            $santriDataFix = $santriData->where('santri.created_at >=', $this->periode_mulai)->where('santri.created_at <=', $this->periode_selesai)->findAll();
        } else {
            $santriDataFix = $santriData->findAll();
        }

        $pengumumanData = $pengumumanModel->findAll();

        return 
        view('templates/header', $data) .
        view('templates/navbar-admin', $data) .
        view('admin/pengumuman', [
            'cond' => $cond,
            'santri' => $santriDataFix,
            'pengumuman' => $pengumumanData
        ]) .
        view('templates/footbar-admin') .
        view('templates/footer');
    }

    public function pengumuman_d($peserta_id): string
    {
        $data = [
            'title' => 'Detail Pengumuman',
            'page' => 'admin-pengumuman',
            'periode_now' => $this->periode_now,
            'jumlah_peserta' => $this->jumlah_peserta,
            'jumlah_peserta_lulus' => $this->jumlah_peserta_lulus
        ];
        
        $santriModel = $this->santriModel;
        $bpModel = $this->bpModel;
        $pengumumanModel = $this->pengumumanModel;
    
        $santriData = $santriModel->getSantriByPesertaId($peserta_id);
        $bpData = $bpModel->getBpByPesertaId($peserta_id);
        $pengumumanData = $pengumumanModel->getPengumumanByPesertaId($peserta_id);

        if ($pengumumanData['pengumuman_saved'] == 0) {
            $view = 'admin/pengumuman-detail-edit';
        } else {
            $view = 'admin/pengumuman-detail';
        }
        
        return 
            view('templates/header', $data) .
            view('templates/navbar-admin', $data) .
            view($view, [
                'santri' => $santriData,
                'bp' => $bpData,
                'pengumuman' => $pengumumanData
            ]) .
            view('templates/footbar-admin') .
            view('templates/footer');
    }
}