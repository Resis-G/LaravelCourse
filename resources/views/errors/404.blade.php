@extends('layout')
@section('contenido')
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">No pudimos encontrar esta página</h1>
<p class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500"><a href="{{route('home')}}">Volver al Home</a></p>
@endsection