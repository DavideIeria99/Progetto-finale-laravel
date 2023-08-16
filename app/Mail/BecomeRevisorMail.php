<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BecomeRevisorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $description;
    /**
     * Create a new message instance.
     */
    // public function __construct(User $user)
    // {
    //     $this->user=$user;
    // }
    public function __construct(User $user,$_description)
    {
        $this->user=$user;
        $this->description =$_description;
    }

    public function build(){
        return $this->from('colicaStore@noReply.com')->view('mail.become-revisor');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Richiesta per diventare Revisore',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.become-revisor',
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
