<?php

namespace App\Models;

use CodeIgniter\Model;

class LainPrestasiModel extends Model
{
    protected $table = 'lain_prestasi';
    protected $primaryKey = 'lain_prestasi_id';
    
    protected $allowedFields = [
        'lain_prestasi_prestasi',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
