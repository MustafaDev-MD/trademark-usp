<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public Lead $lead;

    /**
     * Create a new message instance.
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->lead->selected_plan ? 'New '.ucfirst($this->lead->selected_plan).' Package Inquiry' : 'New Trademark Lead Submission',
            replyTo: [new \Illuminate\Mail\Mailables\Address($this->lead->email, $this->lead->name)]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.lead',
            with: [
                'lead' => $this->lead,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return $this->lead->logo_path ? [\Illuminate\Mail\Mailables\Attachment::fromStorageDisk('local', $this->lead->logo_path)->as('trademark-logo.'.pathinfo($this->lead->logo_path, PATHINFO_EXTENSION))] : [];
    }
}
