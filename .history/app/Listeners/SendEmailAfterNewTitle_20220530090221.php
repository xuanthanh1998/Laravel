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
        $theloai = TheLoaiModel::all();

        $fileName = $event->product->id . '.txt';
    $data = 'Sản phẩm mới tạo: ' . $event->product->name . ' với ID: ' . $event->product->id; 
    File::put(public_path('/txt/' . $fileName), $data);
    return true;
    }
}
