
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.scss'])
</head>
<body class="antialiased bg-slate-100 dark:bg-slate-900">
    
    <h2 class="my-4 font-serif text-3xl text-inline text-sky-600 dark:text-sky-500">Bienvenido @auth{{Auth::user()->name}}@endauth @guest Invitado @endguest</h2>
 
    <header>
        
        <!--aprenderemos a quitar esta funcion en otro momento-->
        <?php 
            function activeMenu($url){
                return request()->is($url) ? 'active' : '';
            }
        ?> 
        <nav class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
            <div class="px-4 mx-auto max-w-7xl sm:px-16 lg:px-20">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                        <div class="flex items-center flex-shrink-0">
                            <a href="{{ route('home') }}">
                                <svg class="w-8 h-8 text-sky-500" fill="none" width="0" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                </path>
                            </svg>
                            </a>
                        </div>
                        <div class="mx-auto">
                            <div class="flex space-x-4">
                                <a href="{{ route('home') }}"
                                    class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('home') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                    Home
                                </a>
                                <a href="{{route('messages.create')}}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('messages.create') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                    CrearMensaje
                                </a>
                                <a href="{{route('saludos','jorge')}}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('saludos/*') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                    Saludos
                                </a>
                                @auth
                                    <a href="{{route('messages.index')}}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('messages.index') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                        Mensajes
                                    </a>
                                    @if (auth()->user()->hasRoles(['admin']))
                                        <a href="{{route('users.index')}}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('users.index') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                            Usuarios
                                        </a>
                                    @endif
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <button class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('logout') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}" >Cerrar Sesion</button>
                                    </form>
                                @else
                                    <a href="{{route('register.create')}}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('register') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                        Registar
                                    </a>
                                    <a href="{{route('login')}}" class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('login') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                        Login
                                    </a>
                                    
                          
                                @endauth
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @if(session('status'))
            <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
                {{ session('status') }}
            </div>
        @endif
            
    </header>
    @yield('contenido')
    <footer>Copyright º {{date('Y')}}</footer>

</body>
</html>