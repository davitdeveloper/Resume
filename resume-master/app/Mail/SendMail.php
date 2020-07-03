<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $phone;

    /**
     * SendMail constructor.
     * @param $email
     * @param $phone
     */
    public function __construct($email, $phone)
    {
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('new Resume on site')
            ->markdown('mail.send-mail')
            ->with([
                'text' => 'test description',
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
    }
}
