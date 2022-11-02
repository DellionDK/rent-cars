<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallMail extends Mailable
{
    use Queueable, SerializesModels;
    public $call;

    /**
     * Create a new message instance.
     *
     * @param $order
     */
    public function __construct($call)
    {
        $this->call = $call;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Аренда Mercedes')->subject("Обратный вызов")
            ->view('emails.call')->with(['call' => $this->call]);
    }
}
