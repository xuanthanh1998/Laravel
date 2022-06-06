<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated() {

        $user = Auth::user();

        event(new LoginHistory($user));
    }
}
