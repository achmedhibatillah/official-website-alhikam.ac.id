<?php

namespace App\Models;

use CodeIgniter\Model;

class LainModel extends Model
{
    protected $table = 'lain';
    protected $primaryKey = 'lain_id';
    
    protected $allowedFields = [
        'lain_btq_membaca',
        'lain_btq_menulis',
        'lain_btq_terjemah',
        'lain_khatam',
        'lain_juz',
        'lain_bahasa_arab',
        'lain_bahasa_inggris',
        'lain_bahasa_jepang',
        'lain_keahlian_komputer',
        'lain_keahlian_elektro',
        'lain_keahlian_desain',
        'lain_olahraga_footbal',
        'lain_olahraga_basket',
        'lain_olahraga_badminton',
        'lain_senbud_musik',
        'lain_senbud_senisuara',
        'lain_senbud_senilukis',
        'lain_penalaran_seminar',
        'lain_penalaran_jurnalistik',
        'lain_penalaran_karyatulis',
        'lain_agama_qiroah',
        'lain_agama_sholawat',
        'lain_agama_ptq',
        'lain_bahasam_arab',
        'lain_bahasam_inggris',
        'lain_bahasam_jepang',
        'peserta_id',
        'created_at',
        'updated_at'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getLainByIdPeserta($peserta_id)
    {
        $builder = $this->builder();
        $lainData = $builder->where('peserta_id', $peserta_id)->get()->getRowArray();

        if ($lainData) {
            // Ambil data dari tabel lain_prestasi berdasarkan lain_id
            $lainPrestasiModel = new \App\Models\LainPrestasiModel();
            $lainData['lain_prestasi'] = $lainPrestasiModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_organisasi berdasarkan lain_id
            $lainOrganisasiModel = new \App\Models\LainOrganisasiModel();
            $lainData['lain_organisasi'] = $lainOrganisasiModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_bahasa berdasarkan lain_id
            $lainBahasaModel = new \App\Models\LainBahasaModel();
            $lainData['lain_bahasa'] = $lainBahasaModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_keahlian berdasarkan lain_id
            $lainKeahlianModel = new \App\Models\LainKeahlianModel();
            $lainData['lain_keahlian'] = $lainKeahlianModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_olahraga berdasarkan lain_id
            $lainOlahragaModel = new \App\Models\LainOlahragaModel();
            $lainData['lain_olahraga'] = $lainOlahragaModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_senbud berdasarkan lain_id
            $lainSenbudModel = new \App\Models\LainSenbudModel();
            $lainData['lain_senbud'] = $lainSenbudModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_penalaran berdasarkan lain_id
            $lainPenalaranModel = new \App\Models\LainPenalaranModel();
            $lainData['lain_penalaran'] = $lainPenalaranModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_agama berdasarkan lain_id
            $lainAgamaModel = new \App\Models\LainAgamaModel();
            $lainData['lain_agama'] = $lainAgamaModel->where('lain_id_lain', $lainData['lain_id'])->findAll();

            // Ambil data dari tabel lain_bahasam berdasarkan lain_id
            $lainBahasamModel = new \App\Models\LainBahasamModel();
            $lainData['lain_bahasam'] = $lainBahasamModel->where('lain_id_lain', $lainData['lain_id'])->findAll();
        }

        return $lainData;
    }
}
