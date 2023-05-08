@csrf
            
@if ($showfields)
    <label class="flex flex-col" for="nombre">
        <span class="font-serif text-slate-600 dark:text-slate-400">Nombre</span> 
        <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="nombre" value="{{$message->nombre ?? old('nombre')}}">
        {!!$errors->first('nombre','<span class=errors>:message</span>')!!}
    </label>


    <label class="flex flex-col" for="email">
        <span class="font-serif text-slate-600 dark:text-slate-400" >Email</span> 
        <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="email" value="{{$message->email ?? old('email')}}">
        {!!$errors->first('email','<span class=errors>:message</span>')!!}
    </label>
@endif


<label class="flex flex-col" for="mensaje">
    <span class="font-serif text-slate-600 dark:text-slate-400">Mensaje</span> 
    <textarea class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" name="mensaje" >{{$message->mensaje ?? old('message')}}</textarea>
    {!!$errors->first('mensaje','<span class=errors>:message</span>')!!}
</label>

<div class="flex items-center justify-between mt-4">
    <input class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit" value="{{ $btnText ?? 'Guardar' }}">
</div>