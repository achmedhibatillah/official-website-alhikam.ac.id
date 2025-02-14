<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SendEmail extends Controller
{
    public function daftar_auth($email, $nama)
    {
        $emailService = service('email'); // Lebih disarankan daripada \Config\Services::email()

        // Konfigurasi email
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

        // Kirim email dengan pengecekan error
        if ($emailService->send()) {
            return "Email berhasil dikirim ke $email";
        } else {
            return $emailService->printDebugger(['headers', 'subject', 'body']);
        }
    }
}
