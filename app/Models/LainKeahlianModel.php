<?php

namespace App\Models;

use CodeIgniter\Model;

class LainKeahlianModel extends Model
{
    protected $table = 'lain_keahlian';
    protected $primaryKey = 'lain_keahlian_id';
    
    protected $allowedFields = [
        'lain_keahlian_keahlian',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
