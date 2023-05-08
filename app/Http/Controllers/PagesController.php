<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequests;
use Illuminate\Http\Request;



class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function saludo($nombre ='invitado')
    {
        $consolas=[
            "play station",
            "Xbox",
            "Nintendo"
        ];
        return view('saludo',compact('nombre','consolas') );
    }
}
