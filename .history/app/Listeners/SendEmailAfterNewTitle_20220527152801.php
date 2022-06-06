<?php

namespace App\Listeners;

use App\Events\NewTitle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

use App\Models\TheLoaiModel;


class SendEmailAfterNewTitle
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
        $theloai = TheLoaiModel::find($event->theloai)->toArray();
        Mail::send('emails.mailEvent', $theloai, function($message) use ($theloai) {
            $message->to($theloai['email']);
            $message->subject('Event Testing');
        });
         }
}
