<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/createSubEvento.js')
    @vite('node_modules/flowbite/dist/flowbite.js')
    @vite('node_modules/flowbite/dist/datepicker.js')

</head>
<body class="bg-primary">

@include('layouts.navigation')


<div class="m-10">




        <div class="col-span-6 md:grid grid-cols-9 gap-1.5">

            @if(count($eventos)<=0)
                No se han encontrado eventos
            @else

                @foreach($eventos as $evento)

            <div class="block mt-4 md:col-span-3">

                <!--card-->

                <div class="block md:inline-flex">

                    <!--CARD-->

                    <div class="flex flex-col items-center bg-secondary border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-primary">

                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://pacertime.blob.core.windows.net/files/pacerIm1.jpg" alt="">

                        <div class="flex flex-row">

                            <div class="flex flex-col justify-between p-2 leading-normal">


                                <!--<h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Noteworthy technology acquisitions 2021</h5>-->
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{$evento->nombre}}</h5>
                                <!--<p class="mb-3 font-normal text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>-->
                                <p class="mb-3 font-normal text-gray-400">{{$evento->descripcion}}</p>

                            </div>

                            <!--Submenu-->
                            <div>

                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-400 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown" class="bg-gray-700 z-10 hidden text-base list-none divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2" aria-labelledby="dropdownButton">
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Cambiar imagen</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Editar</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600">Eliminar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Submenu -->

                        </div>

                    </div>
                    <!--CARD-->

                </div>


            </div>
                @endforeach

            @endif

        </div>








</div>

</body>
</html>

{{--


{{$evento->nombre}}
{{$evento->descripcion}}
{{$evento->lugarEvento}}
{{$evento->fechaInicioEvento}}
{{$evento->fechaFinEvento}}
{{$evento->horaEvento}}
{{$evento->lugarEntregaKits}}
{{$evento->fechaInicioEntregaKits}}
{{$evento->fechaFinEntregaKits}}
{{$evento->horaInicioEntregaKits}}
{{$evento->horaFinEntregaKits}}
{{$evento->imagen}}

--}}
