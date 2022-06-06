<?php

namespace App\Http\Controllers;

use App\Events\NewTitle;
use Illuminate\Http\Request;
use Event;
use App\Events\SendMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        Event::fire(new NewTitle(2));
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showPageGuest()
    {
        if (!$this->userCan('view-page-guest')) {
            abort(403);
        }

        return view("layouts.page_guest");
    }

    public function showPageAdmin()
    {
        if (!$this->userCan('view-page-admin')) {
            abort(403);
        }

        return view("layouts.page_admin");
    }
}
