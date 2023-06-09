<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendAutoResponder 
{

    /**
     * Handle the event.
     */
    public function handle(MessageWasReceived $event): void
    {
        $message =$event->message;
        
        if(auth()->check()){
            $message->email = auth()->user()->email;
        }

        Mail::send('emails.contact',['msg'=>$message],function($m) use($message){
            $m->to($message->email,$message->nombre)->subject('Tu mensaje fue recibido');
        });
    }
}
