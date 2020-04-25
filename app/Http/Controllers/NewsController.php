<?php

namespace App\Http\Controllers;

use App\Notifications\TelegramNotificationNews;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function invia(Request $request)
    {
        //dd(config('services.telegram-bot-api.token'));
        $users = User::whereNotNull('user_id')->get();
        foreach ($users as $user){
            $user->notify(new TelegramNotificationNews($request->input('testo'), $user->user_id));
        }

    }
}
