<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'peserta_id';
    protected $allowedFields = [
        'peserta_username',
        'peserta_nama',
        'peserta_pass',
        'peserta_email',
        'peserta_ktp'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
