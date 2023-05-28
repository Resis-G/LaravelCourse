<?php
namespace App\Presenters;

use App\Models\Message;

class MessagePresenter{

    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;    
    }

    public function UserName(){
        if($this->message->user){
            return $this->message->user->name;
        }
        return $this->message->nombre;
    }
    public function UserEmail(){
        if($this->message->user){
            return $this->message->user->email;
        }
        return $this->message->email;
    }
}