<?php

namespace App\Models;

use CodeIgniter\Model;

class LainBahasaModel extends Model
{
    protected $table = 'lain_bahasa';
    protected $primaryKey = 'lain_bahasa_id';
    
    protected $allowedFields = [
        'lain_bahasa_bahasa',
        'lain_id_lain',
        'created_at',
        'updated_at'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAllBahasa()
    {
        return $this->findAll();
    }

    public function getBahasaById($lain_bahasa_id)
    {
        return $this->find($lain_bahasa_id);
    }

    public function insertBahasa($data)
    {
        return $this->insert($data);
    }

    public function updateBahasa($lain_bahasa_id, $data)
    {
        return $this->update($lain_bahasa_id, $data);
    }

    public function deleteBahasa($lain_bahasa_id)
    {
        return $this->delete($lain_bahasa_id);
    }
}
