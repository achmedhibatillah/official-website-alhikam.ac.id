<?php

namespace App\Controllers;

use \App\Models\PesertaModel;

class User extends BaseController
{
    protected $pesertaModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
    }

    public function index(): string
    {
        $session_id = session()->get('peserta_id');
        $user = $this->pesertaModel->where('peserta_id', $session_id)->first();

        $data = [
            'title' => 'Berkas Pendaftaran',
            'page' => 'user',
            'user' => $user
        ];

        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('user/index') .
        view('templates/footbar') .
        view('templates/footer');
    }
}