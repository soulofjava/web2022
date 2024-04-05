<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PinjamTempatMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Pinjam Tempat',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pinjam_tempat',
            with: [
                'nama' => $this->data['nama'],
                'jkel' => $this->data['jkel'],
                'usia' => $this->data['usia'],
                'pekerjaan' => $this->data['pekerjaan'],
                'pendidikan' => $this->data['pendidikan'],
                'instansi' => $this->data['instansi'],
                'tanggal' => $this->data['tanggal'],
                'waktu' => $this->data['waktu'],
                'kegiatan' => $this->data['kegiatan'],
                'acara' => $this->data['acara'],
                'jumlah' => $this->data['jumlah'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
