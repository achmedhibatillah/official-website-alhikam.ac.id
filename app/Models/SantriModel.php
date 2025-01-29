<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $table      = 'santri';
    protected $primaryKey = 'santri_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'santri_nama',
        'santri_panggilan',
        'santri_nik',
        'santri_tempatlahir',
        'santri_tanggallahir',
        'santri_alamat',
        'santri_anakke',
        'santri_bersaudara',
        'santri_hp',
        'santri_sdmasuk',
        'santri_sdlulus',
        'santri_smpmasuk',
        'santri_smplulus',
        'santri_smamasuk',
        'santri_smalulus',
        'santri_pa',
        'santri_pa_alamat',
        'santri_pa_jurusan',
        'santri_pa_lulus',
        'santri_ps_pt',
        'santri_ps_fakultas',
        'santri_ps_prodi',
        'santri_ps_masuk',
        'santri_saved',
        'peserta_id',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSantriByPesertaId($peserta_id)
    {
        return $this->where('peserta_id', $peserta_id)->first();
    }
}
