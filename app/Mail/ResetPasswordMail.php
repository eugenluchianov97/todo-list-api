<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;


    public $code;
    public function __construct($code) {
        $this->code = $code;
    }

    public function build(): ResetPasswordMail
    {
        return $this->view('emails.reset-password')->with(['code' => $this->code]);
    }
}
