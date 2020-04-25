<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ricaricaCredito(User $user, Request $request)
    {
        $user->credito += $request->input('importo');
        $user->save();
    }

    public function stornaCredito(User $user, Request $request)
    {
        $user->credito -= $request->input('importo');
        $user->save();
    }
}
