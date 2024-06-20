<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobPosted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * Passing Job Model to the view
     */
    public function __construct(public Job $job)
    {
        //
    }

    /**
     * Get the message envelope. Here fill out:
     * Subject of the email
     * Who its to
     * Who its from
     * Reply to
     * Tags associated with the email provider
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Posted',
            /* can overwrite who sent from with a from: key value pairing here */
            from: 'admin@example.com',
            /* can overwrite the 'reply to' here also */
            replyTo: 'admin2@example.com'
        );
    }

    /**
     * Get the message content definition.
     * Return a new instance of content class and pass the name of a view
     */
    public function content(): Content
    {
        return new Content(
            /* updated view name to job-posted to correspond to blade file in mail folder in views */
            view: 'mail.job-posted',
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
