<?php

namespace App\Listeners;

use App\Events\NewTitle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\SendEmailTest;
use App\Models\TheLoaiModel;

class SendEmailAfterNewTitle implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewTitle  $event
     * @return void
     */
    public function handle(NewTitle $event)
    {
        $user = TheLoaiModel::findOrFail($event->theloai->id);
        Mail::to($user->email)
            ->send(new SendEmailTest($event));
    }
}
