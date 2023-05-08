<?php

namespace App\Http\Controllers;

use App\Events\MessageWasReceived;
use App\Http\Requests\CreateMessageRequests;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MessagesController extends Controller
{

    public function __construct()
    {   
        //$this->middleware('hasestosiesto');
        $this->middleware('auth',['only'=>['edit','destroy','update']]);
    } 

    public function index()
    {
        $key="messages.page".request('page',1);


        $messages = Cache::rememberForever($key,function(){
            return Message::with('user','note','tags')->latest()->simplePaginate(10);
        });
         
        return view('messages.index',compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(CreateMessageRequests $request)
    {
        
        $message = Message::create($request->all());
        if(auth()->check())
        {
            auth()->user()->messages()->save($message);
        }

        Cache::flush();

        event(new MessageWasReceived($message));

      
        return redirect()->route('messages.index');
    }

    public function show(string $id)
    {
        $message = Cache::rememberForever("messages.{$id}",function() use ($id){
            return Message::findOrFail ($id);
        });
        
        return view('messages.show',compact('message'));
    }

    public function edit(string $id)
    {
        $message = Cache::rememberForever("messages.{$id}",function() use ($id){
            return Message::findOrFail ($id);
        });
        return view('messages.edit',compact('message'));
    }

    public function update(Request $request, string $id)
    {
        Cache::flush();
        Message::findOrFail($id)->update($request->all());
        return redirect()->route('messages.index');
    }
    
    public function destroy(string $id)
    {
        Cache::flush();
        Message::findOrFail($id)->delete();
        return redirect()->route('messages.index');
    }
}
