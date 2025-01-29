<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitSedangModel extends Model
{
    protected $table = 'rk_penyakit_sedang_dialami';
    protected $primaryKey = 'rk_sedang_id';
    protected $allowedFields = [
        'rk_sedang_penyakit', 
        'rk_id'
    ];
    protected $useTimestamps = true;
}