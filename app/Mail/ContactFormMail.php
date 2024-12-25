<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $surname;
    public $email;
    public $subject;
    public $messages;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $surname, $email, $subject, $message)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->subject = $subject;
        $this->messages = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', // Chỉ định view của email
            with: [
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'message' => $this->messages,
            ],
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

    // public function build()
    // {
    //     // // Kiểm tra kiểu dữ liệu của message
    //     // if (is_object($this->message)) {
    //     // }
    //     // $this->message = (string) $this->message; // Chuyển đối tượng thành chuỗi nếu cần
    //     // // dd($this->message);
    //     return $this->subject($this->subject)
    //         ->view('emails.contact')
    //         ->with([
    //             'name' => $this->name,
    //             'surname' => $this->surname,
    //             'email' => $this->email,
    //             'messages' => $this->messages,
    //         ]);
        
    // }
}
