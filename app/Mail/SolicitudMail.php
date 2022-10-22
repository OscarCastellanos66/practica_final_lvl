<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Solicitud";

    public $mail;

    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    public function build()
    {
        return $this->view('emails.mailRequest');
    }
}
