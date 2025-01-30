<?php

namespace App\Models;

use CodeIgniter\Model;

class LainOrganisasiModel extends Model
{
    protected $table = 'lain_organisasi';
    protected $primaryKey = 'lain_organisasi_id';
    
    protected $allowedFields = [
        'lain_organisasi_organisasi',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
