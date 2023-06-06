<?php

namespace App\Http\Controllers;

use App\Events\MessageWasReceived;
use App\Http\Requests\CreateMessageRequests;
use App\Repositories\MessagesInterfaces;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //Atributos
    protected $messages;

    public function __construct(MessagesInterfaces $messages)
    {   
        //$this->middleware('hasestosiesto');
        $this->messages=$messages;
        $this->middleware('auth',['only'=>['edit','destroy','update']]);
    } 

    public function index()
    {
       $messages = $this->messages->getPaginated();
        return view('messages.index',compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(CreateMessageRequests $request)
    {
        $message = $this->messages->store($request);
        event(new MessageWasReceived($message));
        return redirect()->route('messages.index');
    }

    public function show(string $id)
    {
        $message = $this->messages->FindById($id);
        return view('messages.show',compact('message'));
    }

    public function edit(string $id)
    {
        $message = $this->messages->FindById($id);
        return view('messages.edit',compact('message'));
    }

    public function update(Request $request, string $id)
    {
        $messages = $this->messages->update($request,$id);
        return redirect()->route('messages.index');
    }
    
    public function destroy(string $id)
    {
        $this->messages->destroy($id);
        return redirect()->route('messages.index');
    }
}
