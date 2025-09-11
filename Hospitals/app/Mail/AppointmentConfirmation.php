<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(public $appointment)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'تأكيد الموعد',
        );
    }


    public function content(): Content
    {
        return new Content(
            markdown: 'emails.appointments',
             with: [
                'patientName' => $this->appointment->name ?? 'Patient',
                'appointmentDate' => $this->appointment->appointment->format('Y-m-d') ?? 'N/A',
                'appointmentTime' => $this->appointment->appointment->format('H:i:s') ?? 'N/A',
                'appointmentId' => $this->appointment->id ?? 'N/A',
            ]
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
