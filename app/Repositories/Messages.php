<?php
namespace App\Repositories;

use App\Models\Message;


class Messages implements MessagesInterfaces{
    public function getPaginated(){
        return Message::with('user','note','tags')->latest()->simplePaginate(10);
    }

    public function store($request){
        $message = Message::create($request->all());
        if(auth()->check())
        {
            auth()->user()->messages()->save($message);
        }
        return $message;
    }
    public function FindById($id){
        return Message::findOrFail ($id);
    }
    public function update($request,$id){
        return Message::findOrFail($id)->update($request->all());
    }
    public function destroy($id){
        return Message::findOrFail($id)->delete();
    }
}