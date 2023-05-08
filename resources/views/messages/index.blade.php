@extends('layout')
@section('contenido')

    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Todos los mensajes</h1>
    
            
    <main class="grid w-full gap-4 px-4 max-w-7xl sm:grid-cols-2 md:grid-cols-3">
        
        @foreach($messages as $message)
            <div class="max-w-3xl px-4 py-2 space-y-4 bg-white rounded shadow dark:bg-slate-800">
                @if ($message->user_id)
                    <h2 class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                        <a href="{{route('messages.show',$message->id)}}">
                            {{$message->user->name }}
                        </a>
                    </h2>
                @else
                    <h2 class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                        <a href="{{route('messages.show',$message->id)}}">
                            {{$message->nombre }}
                        </a>
                    </h2>
                @endif
                
                <div class="flex justify-between">
                    <a class="inline-flex items-center text-xs font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200" href="{{route('messages.edit',$message->id)}}">Edit</a>

                    <form action="{{route('messages.destroy',$message->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="inline-flex items-center text-xs font-semibold tracking-widest text-center text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none" type="submit">Delete</button>
                    </form>
                </div>
                <div class="flex justify-between">
                    <h2 class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                        {{$message->note ? $message->note : '' }}  
 
                    </h2>
                </div>
                <div class="flex justify-between">
                    <h2 class="text-xl text-slate-600 dark:text-slate-300 hover:underline">
                        {{$message->tags->pluck('name')->implode(', ')}}

                    </h2>
                </div>
            </div>
        @endforeach
        {{$messages->links()}}
        
    </main>

    


@endsection