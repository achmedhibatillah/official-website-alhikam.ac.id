<?php

namespace App\Models;

use CodeIgniter\Model;

class TeswawancaraModel extends Model
{
    protected $table            = 'teswawancara';
    protected $primaryKey       = 'tw_id';
    protected $allowedFields    = [
        'tw_tgl', 
        'tw_tempat', 
        'tw_pewawancara', 
        'tw_status', 
        'peserta_id', 
        'created_at', 
        'updated_at'
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getTwByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}
