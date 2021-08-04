<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListUser extends Mailable
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
        $this->user=$user;
        $this->tresc=$tresc;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
           // ->from('dousera@abc.pl')->markdown('listy.doUsera');
           // ->from('dousera@abc.pl')->view('listy.doUsera')->with(['tresc'=>'Aaaaaaaaa', 'tresc2'=>$tresc2]);
           //->from('poczta@poradnikdyskutanta.pl')->markdown('listy.doUsera');
            //>from('dousera@abc.pl')->view('listy.doUsera')->with(['tresc'=>$this->tresc]);
           ->from('poczta@poradnikdyskutanta.pl')->markdown('listy.doUsera');
    }
}
