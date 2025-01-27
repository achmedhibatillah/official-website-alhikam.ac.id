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
        $data = [
            'title' => 'Berkas Pendaftaran',
            'page' => 'user'
        ];
        return 
        view('templates/header', $data) .
        view('user/index') .
        view('templates/footer');
    }
}