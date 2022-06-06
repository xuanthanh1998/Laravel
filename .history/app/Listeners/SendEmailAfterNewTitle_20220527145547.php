<?php

namespace App\Listeners;

use App\Events\NewTitle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use Mailer;


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
        $data = [
            'user' => $event->user,
               'from' => 'hello@test.dev',
               'subject' => 'Welcome to test'
         ];
     
     
             $this->mailer->send('emails.auth.verify', $data, function($message) {
                 $message->to($data['user']->email, $data['user']->matric)
                         ->subject($data['subject']);
             });
         }
}
