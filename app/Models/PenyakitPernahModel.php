<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitPernahModel extends Model
{
    protected $table = 'rk_penyakit_pernah_dialami';
    protected $primaryKey = 'rk_pernah_id';
    protected $allowedFields = [
        'rk_pernah_penyakit', 
        'rk_id'
    ];
    protected $useTimestamps = true;
}