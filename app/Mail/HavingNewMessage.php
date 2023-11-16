<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HavingNewMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_to;
    public $sender;
    public $receiver;

    /**
     * Create a new message instance.
     */
    public function __construct($mail_to, $sender, $receiver)
    {
        $this->mail_to = $mail_to;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->mail_to,
            from: 'no-replay@tu06.com',
            subject: 'پیام جدید دارید',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.having-a-new-message',
            with: ['sender' => $this->sender, 'receiver', $this->receiver],
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
