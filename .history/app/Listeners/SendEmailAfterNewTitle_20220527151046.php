<?php

namespace App\Listeners;

use App\Events\NewTitle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use Mailer;
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
        $theloai = TheLoaiModel::find($event->id)->toArray();
        Mail::send('emails.mailEvent', $theloai, function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Event Testing');
        });
         }
}
