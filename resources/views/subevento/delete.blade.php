<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edición de evento</title>

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

    <div class="space-y-6 px-4 py-5 sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-3">
                <div class="px-4 sm:px-0">
                    <h3 class="titulo-1">Eliminación de categorías</h3>
                    <p class="subtitulo">Elimina las categorías deseadas.</p>
                </div>
            </div>

        </div>
    </div>

    @if(session()->has('message'))
        <div class="mx-8">
            @include('evento.success-message',['message'=> session()->get('message') ])
        </div>
    @endif


        <div class="shadow sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 px-4 py-5 sm:p-6">

                <!--Datos del evento-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Datos del evento</p>

                    <x-forms.separator></x-forms.separator>

                    <!--Input nombre del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="nombre" class="label-input">Nombre del evento</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="nombre" class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$evento->nombre}}" disabled>
                        </div>

                    </div>


                    <!--Input descripción del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="descripcion" class="label-input">Descripción</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <div class="mt-1">

                                <textarea id="descripcion" rows="4" class="text-white bg-primary mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>{{$evento->descripcion}}</textarea>
                            </div>
                        </div>

                    </div>


                    <!--Input lugar del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="lugarEvento" class="label-input">Nombre del evento</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="lugarEvento" class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$evento->lugarEvento}}" disabled>
                        </div>

                    </div>

                    <!--Fecha del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="fechaEvento" class="label-input">Fecha del evento</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="fechaEvento" class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$evento->fechaInicioEvento}} - {{$evento->fechaFinEvento}}" disabled>
                        </div>

                    </div>

                    <!--Input hora inicial del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="horaEvento" class="label-input">Hora del evento</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="horaEvento" class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$evento->horaEvento}}" disabled>
                        </div>

                    </div>

                    <!--Input imagen del evento-->
                    {{--
                    <x-forms.input-file name="files[]" id="file"></x-forms.input-file>
                    --}}
                </div>
                <!--Fin Datos del evento-->

                <!--Categorías del evento-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Categorías del evento</p>

                    <x-forms.separator></x-forms.separator>

                    @foreach($evento->subEventos as $subEv)

                    <!--Categorías del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="categoria{{$subEv->id}}" class="label-input">Categoría</label>
                        </div>

                        <!--Input categoría del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="categoria{{$subEv->id}}"
                                   class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                   value="{{$subEv->categoria}}" disabled>
                        </div>

                    </div>

                    <!--Distancias y unidad de distancia del evento-->

                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="distancia{{$subEv->id}}" class="label-input">Distancia</label>
                        </div>

                        <!--Input categoría del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="distancia{{$subEv->id}}"
                                   class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                   value="{{$subEv->distancia}}" disabled>
                        </div>

                    </div>

                    <!--Ramas del evento-->

                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="rama{{$subEv->id}}" class="label-input">Rama</label>
                        </div>

                        <!--Input categoría del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="rama{{$subEv->id}}"
                                   class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                   value="{{$subEv->rama}}" disabled>
                        </div>

                    </div>

                    <!--Precios del evento-->

                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="precio{{$subEv->id}}" class="label-input">Precio</label>
                        </div>

                        <!--Input categoría del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" id="precio{{$subEv->id}}"
                                   class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                   value="$ {{$subEv->precio}}" disabled>
                        </div>

                    </div>


                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <button data-modal-toggle="delete-modal{{$subEv->id}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Eliminar</span>
                            Eliminar
                        </button>
                        @include('evento.modal-eliminar',['id' => $subEv->id, 'nombre' => $subEv->categoria, 'ruta' => 'subeventos.destroy'])
                    </div>
                    <x-forms.separator></x-forms.separator>

                    @endforeach

                </div>
                <!--Fin categorías del evento-->

                <div class="borde-tarjeta">

                    <div class="grid place-items-center md:flex items-center justify-center">

                        <a href="{{ url()->previous() }}" class="btn-cancelar">Cancelar</a>

                    </div>

                </div>


            </div>

        </div>


</div>

</body>
</html>
