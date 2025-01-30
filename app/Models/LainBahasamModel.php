<?php

namespace App\Models;

use CodeIgniter\Model;

class LainBahasamModel extends Model
{
    protected $table      = 'lain_bahasam';
    protected $primaryKey = 'lain_bahasam_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'lain_bahasam_bahasam',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
