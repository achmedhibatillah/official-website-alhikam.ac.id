<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'message_id';

    protected $allowedFields = [
        'message_isi',
        'message_show',
        'peserta_id',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getMessageByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}