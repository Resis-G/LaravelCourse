@extends('layout')
@section('contenido')
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Contactos</h1>
    <h2>Escríbeme</h2>
    @if (session()->has('info'))
        <h3>{{session('info')}}</h3>
    @else
        <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" method="POST" action="{{ route('messages.store') }}">
           @include('messages.form', [
            'message'=> new App\Models\Message,
            'showfields'=> auth()->guest()
            ])
        </form>
    @endif

    
    
@endsection