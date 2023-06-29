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

    <body class="antialiased bg-gray-200">

        <div class="flex flex-col justify-center items-center h-screen">
            <p class="font-dark text-gray-700 mb-4 text-4xl">Ops... Pagina não encontrada.</p>
            <p class="font-dark text-gray-700">Deseja voltar para a página inicial ?</p>
            <a class="mt-4 inline-flex items-center px-4 py-2 mt-4 bg-gray-500 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:bg-gray-600 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('pagina.inicial') }}">Ir para página inicial</a>
        </div>

    </body>
</html>

