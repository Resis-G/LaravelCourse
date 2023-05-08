@extends('layout')
@section('contenido')
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Saludos para {{$nombre}}</h1>
    <ul>

        @forelse ($consolas as $consola)
        <li>{{$consola}}</li>

        @empty
            <p>No hay consolas</p>
        @endforelse
    </ul>
    @if ($consolas===1)
        <p>Solo tienes una consola</p>
    @else
        <p>Tienes varias consolas</p>
    @endif
@endsection