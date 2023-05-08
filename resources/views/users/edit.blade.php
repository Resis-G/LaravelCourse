@extends('layout')
@section('contenido')

    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500" >Editar Usuario</h1>
    <form class="max-w-xl px-8 py-4 mx-auto bg-white rounded shadow dark:bg-slate-800" method="POST" action="{{ route('users.update',$user->id) }}">
        @method('PUT')
        @csrf
        <label class="flex flex-col" for="name">
            <span class="font-serif text-slate-600 dark:text-slate-400">Nombre</span> 
            <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="name" value="{{ $user->name}}">
            {!!$errors->first('name','<span class=errors>:message</span>')!!}
        </label>
    
    
        <label class="flex flex-col" for="email">
            <span class="font-serif text-slate-600 dark:text-slate-400" >Email</span> 
            <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="email" value="{{ $user->email}}">
            {!!$errors->first('email','<span class=errors>:message</span>')!!}
        </label>

        @foreach ($roles as $role)
            <label class="flex flex-row  mt-4 " for="roles">
                
                <input type="checkbox" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-sky-500 checked:bg-sky-500 checked:before:bg-sky-500  drak:checked:border-sky-700 drak:checked:bg-sky-700 drak:checked:before:bg-sky-700 hover:before:opacity-10"
                name="roles[]" value="{{$role->id}}" {{$user->roles->pluck('id')->contains($role->id) ? 'checked' : '' }} />

                <span class="font-serif text-slate-600 dark:text-slate-400" >{{$role->display_name}}</span>
            </label>
        @endforeach

        <div class="flex items-center justify-between mt-4">
            <input class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit" value="Editar">
        </div>
        
    </form>
@endsection