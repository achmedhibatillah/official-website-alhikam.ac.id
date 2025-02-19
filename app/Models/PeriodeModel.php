<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table      = 'periode';
    protected $primaryKey = 'periode_id';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'periode_nama',
        'periode_mulai',
        'periode_selesai'
    ];

    public function countPesertaByPeriode($periode_mulai, $periode_selesai)
    {
        return $this->where('created_at >=', $periode_mulai)
                    ->where('created_at <=', $periode_selesai)
                    ->countAllResults();
    }
}
