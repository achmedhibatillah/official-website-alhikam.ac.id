<?php

namespace App\Models;

use CodeIgniter\Model;

class LainPenalaranModel extends Model
{
    protected $table      = 'lain_penalaran';
    protected $primaryKey = 'lain_penalaran_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'lain_penalaran_penalaran',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
