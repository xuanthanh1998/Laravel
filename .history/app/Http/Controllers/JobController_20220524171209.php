<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class JobController extends Controller
{
    $email = new SendEmailJob();
    dispatch($email);
}
