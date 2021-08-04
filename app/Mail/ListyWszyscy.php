<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListyWszyscy extends Mailable
{
    public $user;
    public $tresc;
    use Queueable, SerializesModels;

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
            ->markdown('listy.doWszyscy');
    }
}
