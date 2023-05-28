<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Mail;
use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class snedNotificationToTheOwner 
{
    /**
     * Handle the event.
     */
    public function handle(MessageWasReceived $event): void
    {
        $message =$event->message;
        Mail::send('emails.contact',['msg'=>$message],function($m) use($message){
            $m->from($message->email,$message->nombre)
            ->to('luis@gmail.com','luis')
            ->subject('Tu mensaje fue recibido');
        });
    }
}
