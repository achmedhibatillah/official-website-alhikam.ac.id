<?php

namespace App\Controllers;

class Guest extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Beranda',
            'page' => 'beranda'
        ];
        return 
        view('templates/header', $data) .
        view('templates/navbar', $data) .
        view('guest/index') .
        view('templates/footbar') .
        view('templates/footer');
    }
}
