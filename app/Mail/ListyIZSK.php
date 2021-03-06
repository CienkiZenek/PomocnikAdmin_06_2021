<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListyIZSK extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $tresc;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $tresc)
    {
        $this->tresc=$tresc;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('List od redakcji PoradnikDyskutanta.pl')
            ->from(env('MAIL_REDAKCJA'))
            /*->bcc(config('mail.admin.adress'))*/
            ->markdown('listy.doIZSK');
    }
}
