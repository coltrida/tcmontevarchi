<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function dimenticata($indirizzo)
    {
        Mail::send('mails.dimenticata',
            [
                'indirizzo' => $indirizzo,
                /* 'mailfrom' => $mailfrom,
                 'consenso' => $consenso,
                 'content' => $content*/
            ], function ($message) use ($indirizzo)
            {
                $subject = "Reimposta password TcMontevarchi";
                $message->from('coltrida@gmail.com', "TcMontevarchi");
                $message->to($indirizzo);
            });
    }
}
