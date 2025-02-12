<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class SendEmail extends Controller
{
    public function daftar_auth($email, $nama)
    {
        $emailService = \Config\Services::email();

        // Konfigurasi email (gunakan .env atau set secara manual)
        $emailService->setFrom('alhikampsb@gmail.com', 'Admin Al-Hikam');
        $emailService->setTo($email);
        $emailService->setSubject('Pendaftaran Berhasil');
        $emailService->setMessage("
            <p>Halo <b>{$nama}</b>,</p>
            <p>Selamat! Pendaftaran Anda telah berhasil.</p>
            <p>Silakan login menggunakan akun yang baru Anda buat.</p>
            <br>
            <p>Salam,</p>
            <p><b>Admin Al-Hikam</b></p>
        ");

        // Kirim email
        if ($emailService->send()) {
            return true;
        } else {
            return $emailService->printDebugger(['headers']);
        }
    }
}
