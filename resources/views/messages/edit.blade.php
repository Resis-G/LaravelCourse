@extends('layout')
@section('contenido')
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Editando el mensaje con ID: {{$message->id}}</h1>
    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" method="POST" action="{{ route('messages.update',$message->id) }}">
        @method('PUT')
        @include('messages.form',[
            'btnText' => 'Actualizar',
            'showfields'=> ! $message->user_id
            ])
        
    </form>
@endsection