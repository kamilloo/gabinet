<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $user_email, $user_subject, $user_message)
    {
        //
        $this->data['user_name'] = $user_name;
        $this->data['user_email'] = $user_email;
        $this->data['user_subject'] = $user_subject;
        $this->data['user_message'] = $user_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Wiadomość ze strony kosmetolog.wlkp.pl')
            ->from($this->data['user_email'], $this->data['user_name'])
            ->view('mails.message',['data' => $this->data]);
    }
}
