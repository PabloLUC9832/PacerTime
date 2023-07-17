<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$evento->nombre}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.ico') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')

</head>
<body class="bg-primary">

<header class="bg-secondary shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{$evento->nombre}}
        </h2>
    </div>
</header>


<div class="m-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                @foreach($imagenes as $imagen)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ $imagen }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{$evento->nombre}}">
                    </div>
                @endforeach

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                @foreach($imagenes as $imagen)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <div class="sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 px-4 ">

                <div class="borde-tarjeta">

                    <p class="text-white">{{$evento->descripcion}}</p>

                    <div class="bg-primary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
                        <p class="text-white font-bold">Categorías</p>
                        @foreach($evento->subEventos as $subEv)
                            <p class="text-white">
                                • {{$subEv->categoria}} - Distancia: {{$subEv->distancia}} - Rama: {{$subEv->rama}} - Precio: ${{$subEv->precio}}
                            </p>
                        @endforeach
                    </div>

                    <div class="bg-primary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
                        <p class="text-white font-bold">Datos del evento</p>
                            <p class="text-white">
                                Lugar: {{$evento->lugarEvento}}
                            </p>
                            <p class="text-white">
                                Fecha: {{$evento->fechaInicioEvento}} - {{$evento->fechaFinEvento}}
                            </p>
                            <p class="text-white">
                                Hora: {{$evento->horaEvento}}
                            </p>
                    </div>

                    <div class="bg-primary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
                        <p class="text-white font-bold">Datos de la entrega de kits</p>
                        <p class="text-white">
                            Lugar: {{$evento->lugarEntregaKits}}
                        </p>
                        <p class="text-white">
                            Fecha: {{$evento->fechaInicioEntregaKits}} - {{$evento->fechaFinEntregaKits}}
                        </p>
                        <p class="text-white">
                            Hora: {{$evento->horaInicioEntregaKits}} - {{$evento->horaFinEntregaKits}}
                        </p>
                    </div>

                    <div class="grid items-center mt-2">
                        <a href="{{ route('competidor.create',$evento->slug)  }}" class="text-center focus:outline-none text-white bg-primary-yellow hover:bg-yellow-500 focus:ring-4 focus:ring-secondary-yellow font-medium rounded-lg text-sm px-5 py-2.5">
                            INSCRIBIRSE
                        </a>
                    </div>

                </div>


            </div>

        </div>

    </div>

</div>

</body>
</html>
