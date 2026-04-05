<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordGenerada extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public string $passwordPlano,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🔐 Tu contraseña de ChuchoGram',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.password-generada',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}