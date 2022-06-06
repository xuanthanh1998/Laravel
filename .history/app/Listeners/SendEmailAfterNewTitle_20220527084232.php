<?php

namespace App\Listeners;

use App\Events\NewTitle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        sleep(600);

    $fileName = $event->theloai->id . '.txt';
    $data = 'thể loại mới tạo: ' . $event->theloai->name . ' với ID: ' . $event->product->id; 
    File::put(public_path('/txt/' . $fileName), $data);
    return true;
    }
}
