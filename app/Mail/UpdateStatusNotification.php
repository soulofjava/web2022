<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class UpdateStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Data yang akan digunakan dalam email

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Pemberitahuan Status Peminjaman')->view('emails.update_status_notification');
    }
}
