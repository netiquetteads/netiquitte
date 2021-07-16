<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGrid extends Mailable
{
    use Queueable, SerializesModels;

    public $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'janeexample@example.com';
        $subject = 'This is a demo!';
        $name = 'Jane Doe';

        return $this->markdown('emails.sendGrid')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'test_message' => $this->data['message'] ]);

                    // ->with([
                    //     'message' => $this->input['message'],
                    // ])
                    // ->from('test@gmail.com', 'Vector Global')
                    // ->subject($this->input['subject']);
    }
}