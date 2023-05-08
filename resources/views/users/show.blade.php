@extends('layout')
@section('contenido')
<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Datos del {{$user->name}}</h1>
<div class="flex flex-col max-w-xl px-8 py-4 mx-auto bg-white rounded shadow h-96 dark:bg-slate-800">
    <p class="flex-1 leading-normal text-slate-600 dark:text-slate-400">Id: {{$user->id}}</p>
    <p class="flex-1 leading-normal text-slate-600 dark:text-slate-400">Nombre: {{$user->name}}</p>
    <p class="flex-1 leading-normal text-slate-600 dark:text-slate-400">Email: {{$user->email}}</p>
    <a class="mr-auto text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('users.index') }}">Regresar</a>
   
    <div class="flex justify-between">
        @can('edit', $user)
            <a class="inline-flex leading-right items-center text-xs font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200" href="{{route('users.edit',$user->id)}}">Edit</a>
        @endcan
        @can('destroy', $user)
            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="inline-flex items-center text-xs font-semibold tracking-widest text-center text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none" type="submit">Delete</button>
            </form>
        @endcan
   
    </div>
   

</div>
@endsection 