<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'pengumuman_pdf',
        'pengumuman_kasur',
        'pengumuman_ranjang',
        'pengumuman_lemari',
        'pengumuman_tas',
        'pengumuman_jas',
        'pengumuman_olahraga',
        'pengumuman_koko',
        'pengumuman_sarung',
        'pengumuman_kopiah',
        'pengumuman_bukukitab',
        'pengumuman_bukubio',
        'pengumuman_saved',
        'peserta_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPengumumanByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}
