<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable
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
        return $this->markdown('emails.UserApprovedMail')
                    ->with([
                        'email_body' => $this->input['email_body'],
                    ])
                    ->from('info@netiquetteads.com', 'Netiquette Ads')
                    ->subject($this->input['email_subject']);
    }
}
