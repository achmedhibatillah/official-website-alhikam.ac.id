<?php

namespace App\Controllers;

use \App\Models\PesertaModel;

class Guest extends BaseController
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
            'title' => 'Beranda',
            'page' => 'beranda',
            'user' => $user
        ];
        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('guest/index') .
        view('templates/footbar') .
        view('templates/footer');
    }
}
