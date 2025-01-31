<?php

namespace App\Models;

use CodeIgniter\Model;

class TesTulisModel extends Model
{
    protected $table            = 'testulis';
    protected $primaryKey       = 'testulis_id';
    protected $allowedFields    = [
        'testulis_konfirm', 
        'peserta_id', 
        'created_at', 
        'updated_at'
    ];
    protected $useTimestamps    = true;

    public function getTtByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}
