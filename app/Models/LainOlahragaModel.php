<?php

namespace App\Models;

use CodeIgniter\Model;

class LainOlahragaModel extends Model
{
    protected $table      = 'lain_olahraga';
    protected $primaryKey = 'lain_olahraga_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'lain_olahraga_olahraga',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
