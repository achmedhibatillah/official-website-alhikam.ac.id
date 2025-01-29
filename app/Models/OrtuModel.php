<?php

namespace App\Models;

use CodeIgniter\Model;

class OrtuModel extends Model
{
    protected $table      = 'ortu';
    protected $primaryKey = 'ortu_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'ortu_a_nama',
        'ortu_a_pekerjaan',
        'ortu_a_pekerjaan_lain',
        'ortu_a_agama',
        'ortu_a_agama_lain',
        'ortu_a_pendidikan',
        'ortu_a_pendidikan_lain',
        'ortu_a_hp',
        'ortu_a_pendapatan',
        'ortu_i_nama',
        'ortu_i_pekerjaan',
        'ortu_i_pekerjaan_lain',
        'ortu_i_agama',
        'ortu_i_agama_lain',
        'ortu_i_pendidikan',
        'ortu_i_pendidikan_lain',
        'ortu_i_hp',
        'ortu_i_pendapatan',
        'ortu_saved',
        'peserta_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getOrtuByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}
