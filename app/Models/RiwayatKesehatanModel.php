<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatKesehatanModel extends Model
{
    protected $table = 'riwayatkesehatan';
    protected $primaryKey = 'rk_id';
    protected $allowedFields = [
        'rk_golongandarah', 
        'rk_perawatan', 
        'rk_kontak_nama', 
        'rk_kontak_alamat', 
        'rk_kontak_hp', 
        'rk_saved', 
        'peserta_id', 
        'created_at', 
        'updated_at'
    ];
    protected $useTimestamps = true;

    protected $penyakitPernahTable = 'rk_penyakit_pernah_dialami';
    protected $penyakitSedangTable = 'rk_penyakit_sedang_dialami';

    public function getRiwayatKesehatanByIdPeserta($peserta_id)
    {
        $riwayat = $this->where('peserta_id', $peserta_id)->first();
    
        if (!$riwayat) {
            return null;
        }
    
        $riwayat['penyakit_pernah'] = $this->db->table('rk_penyakit_pernah_dialami')
            ->where('rk_id', $riwayat['rk_id'])
            ->get()
            ->getResultArray();
    
        $riwayat['penyakit_sedang'] = $this->db->table('rk_penyakit_sedang_dialami')
            ->where('rk_id', $riwayat['rk_id'])
            ->get()
            ->getResultArray();
    
        return $riwayat;
    }
    
}
