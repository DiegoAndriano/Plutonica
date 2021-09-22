<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel=sheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <particles></particles>

    <section
        class="w-full h-screen bg-main-option-2 bg-center bg-no-repeat bg-cover bg-gray-900">
        <nav class="flex justify-between py-10 text-center justify-center ">
            <div class="w-full items-center ">
                <a class="hover:no-underline" href="/"><h1 class="font-body text-emerald-500 text-3xl tracking-wider">plutonia</h1></a>
            </div>
            <div class="w-full">
                <ul class="flex justify-evenly">
                    <a href="#" class="font-body text-gray-100 text-lg border-b-4 border-emerald-500 px-2 py-2 -my-2 cursor-pointer">Inicio</a>
                    <a href="#" class="font-body text-gray-100 text-lg cursor-pointer z-20">Contacto</a>
                    <a href="#" class="font-body text-gray-100 text-lg cursor-pointer z-20">Servicios</a>
                    <a href="/articulos" class="font-body text-gray-100 text-lg cursor-pointer z-20">Artículos</a>
                </ul>
            </div>
            <div class="w-full">
                <ul class="flex">
                    <li class="text-gray-100 text-lg px-1 cursor-pointer z-20">(svg)IG</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)FB</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)TL</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)Wpp</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)Mail</li>
                </ul>
            </div>
        </nav>

        <div class="py-20 mx-auto flex-col w-1/3 content-center text-center items-center justify-center">
            <entrance><h1 class="text-gray-50 text-7xl font-body">Lorem ipsum dolor sit amet</h1></entrance>
            <div class="mx-auto my-10 w-24 border-t-4 border-emerald-500">

            </div>
            <p class="text-gray-300 text-lg font-display">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, nulla omnis! Fuga nihil nisi odit
                pariatur
                quis. At cumque, cupiditate enim, expedita facilis magni, maiores nam quasi quia quod sunt.
            </p>

            <div class="flex justify-evenly mt-6 items-center">
                <button
                    class="text-center w-1/3 z-20 font-display flex justify-center font-semibold tracking-wide py-3 cursor-pointer transition ease-in-out duration-100 bg-emerald-500 text-emerald-900 rounded-full">
                    Contactar
                    <span class="flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-yellow-300 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-400"></span>
                </span>
                </button>
                <button
                    class="font-display flex justify-center items-center font-semibold tracking-wide border-2 border-gray-50 text-gray-50 py-3 cursor-pointer w-1/3">
                    Leer más
                    <span>
                    <svg viewBox="0 0 20 20" class="ml-2 w-4 h-4">
						<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<g class="fill-current" id="icon-shape">
								<path d="M13,10 L13,2 L7,2 L7,10 L2,10 L10,18 L18,10 L13,10 Z"
                                      id="Combined-Shape"></path>
							</g>
						</g>
						</svg>
                </span>
                </button>
            </div>
        </div>
    </section>

    {{ $slot }}
</div>

</body>
</html>
