<?php

namespace App\Http\Controllers;

use App\Notifications\TelegramNotificationNews;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function invia(Request $request)
    {
        $users = User::whereNotNull('user_id')->get();
        foreach ($users as $user){
            $user->notify(new TelegramNotificationNews($request->input('testo'), $user->user_id));
        }

    }
}
