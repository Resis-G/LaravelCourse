@extends('layout')
@section('contenido')
    <h1>Iniciar Sesion</h1>
    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" method="POST" action="{{ route('login') }}">
        @csrf
        <label class="flex flex-col" for="email">
            <span class="font-serif text-slate-600 dark:text-slate-400" >Email</span> 
            <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="email" value="{{ old('email')}}">
            {!!$errors->first('email','<span class=errors>:message</span>')!!}
        </label>
        <label class="flex flex-col" for="password">
            <span class="font-serif text-slate-600 dark:text-slate-400">password</span> 
            <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="password" name="password" value="{{ old('password')}}">
            {!!$errors->first('password','<span class=errors>:message</span>')!!}
        </label>
        <div class="flex items-center justify-between mt-4">
            <p class="text-xl text-slate-600 dark:text-slate-300 hover:underline">¿No tienes cuenta? <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" href="{{route('register.create')}}"> ¡Registrate!</a></p>
            <input class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit" value="Iniciar Session">
        </div>
    </form>
@endsection