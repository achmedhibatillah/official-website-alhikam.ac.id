<?php

namespace App\Models;

use CodeIgniter\Model;

class LainAgamaModel extends Model
{
    protected $table      = 'lain_agama';
    protected $primaryKey = 'lain_agama_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'lain_agama_agama',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
