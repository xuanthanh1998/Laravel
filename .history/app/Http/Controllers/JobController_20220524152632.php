<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;

class JobController extends Controller
{
    $emailJob = new SendWelcomeEmail();
    dispatch($emailJob);
}
