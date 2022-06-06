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
        $theloai = $event->theloai;
        Mail::send('emails.welcome', ['theloai' => $theloai], function ($message) use ($theloai) {
                $message->from('xuanthanh12tin@gmail.com', 'John Doe');
                $message->subject('Welcome aboard '.$user->name.'!');
                $message->to($user->email);
        });
         }
}
