<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

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
            subject: 'Mail Notify',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        try {
            // Kode untuk membangun email
            return $this->from('noreplyriasectest@gmail.com', 'RIASEC ADMIN')
                        ->subject($this->data['subject'])
                        ->view('emails.mail-result')
                        ->with('data', $this->data);
        } catch (\Exception $e) {
            // Tangani kesalahan yang terjadi
            Log::error('Error occurred while building email: ' . $e->getMessage());

            // Jika Anda ingin memberikan respons khusus saat terjadi kesalahan, Anda dapat mengembalikan pesan kesalahan yang lebih ramah pengguna
            return $this->from('noreplyriasectest@gmail.com', 'RIASEC ADMIN')
                        ->subject('Error Occurred')
                        ->view('emails.mail-result-error');
        }
    }
}
