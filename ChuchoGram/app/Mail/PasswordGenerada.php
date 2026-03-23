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

<<<<<<< HEAD
    /**
     * Create a new message instance.
     * Recibe el usuario y la contraseña en texto plano para enviarla por correo.
     */
=======
>>>>>>> origin/master
    public function __construct(
        public User $user,
        public string $passwordPlano,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
<<<<<<< HEAD
            subject: '🔐 Tu contraseña de Chuchogram',
=======
            subject: '🔐 Tu contraseña de ChuchoGram',
>>>>>>> origin/master
        );
    }

    public function content(): Content
    {
        return new Content(
<<<<<<< HEAD
            view: 'emails.password-generada',
        );
    }

    /**
     * Get the attachments for the message.
     */
=======
            markdown: 'emails.password-generada',
        );
    }

>>>>>>> origin/master
    public function attachments(): array
    {
        return [];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/master
