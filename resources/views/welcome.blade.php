<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <title>Super Gestão</title>
    
            <link rel="shortcut icon" href="{{ asset('images/management.png') }}" type="image/x-icon">

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>

    <body background="{{ asset('images/aerial-view-business-team.jpg') }}" class="antialiased">

        <nav id="navigation" class="flex justify-start">
            <div class="flex items-center justify-start px-2">
                <a href="{{ route('funcionario.index') }}"><img width="40" src="{{ asset('images/managementCinza.png') }}" alt="" srcset=""></a>
            </div>
            <div class="max-w-6x1 mx-auto px-4 flex flex-row-reverse ">
                <div class="flex items-center justify-end h-16">
                    <div class="flex justify-end">
                        @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-2 font-semibold text-blueButton hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="px-2 font-semibold text-blueButton hover:text-blueButton dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Entrar</a>
                
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-2 ml-4 font-semibold text-blueButton hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500">Registrar-se</a>
                                    @endif
                                @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex flex-row items-center justify-center h-screen">
            <div id="box-text" class="flex items-center flex-col justify-center">
                <div class="font-black text-2xl text-white px-10 pt-5">
                    <h1>SUPER GESTÃO</h1>
                </div>
                <div class="italic text-white px-10">
                    <p>O sistema que fará você gerenciar seus funcionarios sem nenhuma dor de cabeça.</p>
                </div>
                <div class="flex items-center gap-4 px-10 pb-5">
                    <a href="{{ route('funcionario.index') }}" class="inline-flex items-center px-4 py-2 mt-4 bg-gray-500 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:bg-gray-600 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Começar') }}</a>
                </div>
            </div>
        </div>

    </body>
</html>
