<?php

namespace App\Models;

use CodeIgniter\Model;

class LainSenbudModel extends Model
{
    protected $table      = 'lain_senbud';
    protected $primaryKey = 'lain_senbud_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'lain_senbud_senbud',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
