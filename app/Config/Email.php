<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'psb@alhikam.ac.id';  // Sesuaikan dengan email domain Anda
    public string $fromName   = 'Admin Al-Hikam';
    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';

    public string $protocol = 'smtp';
    public string $mailPath = '/usr/sbin/sendmail';

    // Gunakan SMTP dari Plesk
    public string $SMTPHost = 'mail.alhikam.ac.id';  // Sesuaikan dengan hosting Anda
    public string $SMTPUser = 'psb@alhikam.ac.id';
    public string $SMTPPass = 'Mypassworddissecure123';  // Ganti dengan password yang benar

    public int $SMTPPort = 465;  // Coba dengan 465 atau 587
    public string $SMTPCrypto = 'ssl';  // Jika pakai 587, gunakan 'tls'

    public int $SMTPTimeout = 10;
    public bool $SMTPKeepAlive = false;

    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';
    public string $charset = 'UTF-8';

    public bool $validate = false;
    public int $priority = 3;

    public string $CRLF = "\r\n";
    public string $newline = "\r\n";

    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}
