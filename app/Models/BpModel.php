<?php

namespace App\Models;

use CodeIgniter\Model;

class BpModel extends Model
{
    protected $table      = 'bp';
    protected $primaryKey = 'bp_id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'bp_foto',
        'bp_bp',
        'bp_saved',
        'peserta_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getBpByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}
