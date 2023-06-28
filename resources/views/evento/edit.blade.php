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
                    <h3 class="titulo-1">Edición de evento</h3>
                    <p class="subtitulo">Ingresa la información solicitada a continuación para la edición del evento.</p>
                </div>
            </div>

        </div>
    </div>

    @if(session()->has('message'))
        <div class="mx-8">
            @include('evento.success-message',['message'=> session()->get('message') ])
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @include('components.forms.error-message',['error'=>$error])
        @endforeach
    @endif

    <form name="myForm" action="{{route('eventos.update',$evento->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="shadow sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 px-4 py-5 sm:p-6">

                <!--Datos del evento-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Datos del evento</p>

                    <x-forms.separator></x-forms.separator>

                    <!--Input nombre del evento-->
                    <x-forms.input-field  name="nombre" id="nombre"
                                          message="Nombre del evento" class="uppercase"
                                          required="required" value="{{$evento->nombre}}">
                    </x-forms.input-field>

                    <!--Input descripción del evento-->
                    <x-forms.input-text-area id="descripcion" name="descripcion"
                                             required="required" value="{{$evento->descripcion}}">
                    </x-forms.input-text-area>

                    <!--Input lugar del evento-->
                    <x-forms.input-field  name="lugarEvento" id="lugarEvento"
                                          message="Lugar del evento" required="required"
                                          value="{{$evento->lugarEvento}}">
                    </x-forms.input-field>

                    <!--Fecha del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="fechaInicioEvento" class="label-input">Fecha del evento</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="flex">
                                <!--Input fecha inicial del evento-->
                                <x-forms.date-picker name="fechaInicioEvento" message="Fecha de inicio"
                                                     required="required" value="{{$evento->fechaInicioEvento}}">
                                </x-forms.date-picker>

                                <span class="mx-4 my-2 text-white text-md">a</span>
                                <!--Input fecha final del evento-->
                                <x-forms.date-picker name="fechaFinEvento" message="Fecha de finalización"
                                                     value="{{$evento->fechaFinEvento}}">
                                </x-forms.date-picker>

                            </div>

                        </div>


                    </div>

                    <!--Input hora inicial del evento-->

                    <x-forms.time-picker name="Evento" message="Hora de inicio del evento"
                                         required="required" valueHora="{{$tiempoE[0]}}"
                                         valueMinuto="{{$tiempoE[1]}}" valuePeriodo="{{$tiempoE[2]}}">
                    </x-forms.time-picker>

                    <!--Input imagen del evento-->
                    <x-forms.input-file name="files[]" id="file"></x-forms.input-file>

                </div>
                <!--Fin Datos del evento-->

                <!--Categorías del evento-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Categorías del evento</p>
                    @if(count($evento->subEventos) > 0)
                    <p class="mt-2 text-sm text-white sm:text-justify">
                        ¿Deseas eliminar alguna categoría? ve a
                        <a href="{{route('subeventos.delete',$evento->id)}}" class="font-bold text-blue-500 hover:underline">Eliminar categorías</a>
                    </p>
                    @endif
                    <x-forms.separator></x-forms.separator>
                    @foreach($evento->subEventos as $subEv)
                    <!--Categorías del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="categoria{{$subEv->id}}" class="label-input">Categoría</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <!--Input categoría del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">
                            <input type="text" name="categoria{{$subEv->id}}" id="categoria{{$subEv->id}}"
                                   class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm uppercase"
                                   value="{{$subEv->categoria}}">
                        </div>

                    </div>

                    <!--Distancias y unidad de distancia del evento-->
                    <div class="mt-3 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="distancia{{$subEv->id}}" class="label-input">Distancia</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            @php

                                $distancia=explode(" ",$subEv->distancia);

                            @endphp

                            <div class="flex">
                                <!--Input unidad de la distancia del evento-->
                                <input type="number" name="distancia{{$subEv->id}}" id="distancia{{$subEv->id}}" class="text-white bg-primary block w-full border border-r-0 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                       value="{{ $distancia[0] }}">

                                <select id="unidadDistancia{{$subEv->id}}" name="unidadDistancia{{$subEv->id}}" class="text-white bg-primary inline-flex items-center px-3 rounded-none rounded-r-lg border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                    <option value="Kilometros" {{$distancia[1] == 'Kilometros' ? 'selected' : '' }}>Kilometros</option>
                                    <option value="Millas" {{$distancia[1] == 'Millas' ? 'selected' : '' }}>Millas</option>
                                    <option value="Metros" {{$distancia[1] == 'Metros' ? 'selected' : '' }}>Metros</option>
                                </select>

                            </div>

                        </div>

                    </div>

                    <!--Ramas del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="rama" class="label-input">Rama</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <!--Inputs ramas del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <ul class="items-center w-full text-sm text-white bg-primary border border-gray-200 rounded-lg sm:flex">

                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">

                                        <input id="ramaAmbas{{$subEv->id}}" type="radio" value="AMBAS" name="rama{{$subEv->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" {{ ($subEv->rama=="AMBAS") ? "checked" : "" }}>

                                        <label for="ramaAmbas{{$subEv->id}}" class="w-full py-3 ml-2 text-sm font-medium text-white">AMBAS</label>

                                    </div>
                                </li>

                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">

                                        <input id="ramaFemenil{{$subEv->id}}" type="radio" value="FEMENIL" name="rama{{$subEv->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" {{ ($subEv->rama=="FEMENIL") ? "checked" : "" }}>

                                        <label for="ramaFemenil{{$subEv->id}}" class="w-full py-3 ml-2 text-sm font-medium text-white">FEMENIL</label>

                                    </div>
                                </li>

                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center pl-3">

                                        <input id="ramaVaronil{{$subEv->id}}" type="radio" value="VARONIL" name="rama{{$subEv->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" {{ ($subEv->rama=="VARONIL") ? "checked" : "" }}>

                                        <label for="ramaVaronil{{$subEv->id}}" class="w-full py-3 ml-2 text-sm font-medium text-white">VARONIL</label>

                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <!--Precios del evento-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="precio{{$subEv->id}}" class="label-input">Precio</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <!--Input precios del evento-->
                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="flex">
                             <span class="inline-flex items-center px-3 text-sm text-white bg-secondary border border-r-0 border-gray-300 rounded-l-md">
                                $
                             </span>
                                <input type="number" name="precio{{$subEv->id}}" id="precio{{$subEv->id}}" class="text-white bg-primary block w-full rounded-none rounded-r-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$subEv->precio}}">

                            </div>
                        </div>

                    </div>

                    <x-forms.separator></x-forms.separator>
                    @endforeach
                    <div id="empty">
                        <p></p>
                    </div>

                    <!--Area de numero de categorías agregadas y botón Añadir categoría -->
                    <div class="grid place-items-center">

                        <input class="bg-secondary text-white mt-2 w-56" id="clicks" name="clicks" value="    Has agregado 0 categorías" readonly="readonly"/>

                        <button id="btn-add" class="mt-2 btn-ok">
                            Añadir categoría
                            <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <title/> <g id="Complete"> <g data-name="add" id="add-2"> <g> <line fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="12" x2="12" y1="19" y2="5"/> <line fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" x1="5" x2="19" y1="12" y2="12"/> </g> </g> </g> </svg>
                        </button>

                    </div>

                    <div id="li-container" class="mt-2">
                        <ul id="listaRamas">

                        </ul>
                    </div>

                </div>
                <!--Fin categorías del evento-->

                <!--Datos de la entrega de kits-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Datos de la entrega de kits</p>

                    <x-forms.separator></x-forms.separator>

                    <!--Input lugar de la entrega de kits-->
                    <x-forms.input-field  name="lugarEntregaKits" id="lugarEntregaKits"
                                          message="Lugar de la entrega de kits" required="required"
                                          value="{{$evento->lugarEntregaKits}}">
                    </x-forms.input-field>

                    <!--Fechas de la entrega de kits-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="fechaInicioEvento" class="label-input">Fecha del evento</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="flex">

                                <!--Fecia inicial de la entrega de kits-->
                                <x-forms.date-picker name="fechaInicioEntregaKits" message="Fecha de inicio"
                                                     required="required" value="{{$evento->fechaInicioEntregaKits}}">
                                </x-forms.date-picker>

                                <span class="mx-4 my-2 text-white text-md">a</span>

                                <!--Fecha final de la entrega de kits-->
                                <x-forms.date-picker name="fechaFinEntregaKits" message="Fecha de finalización"
                                                     value="{{$evento->fechaFinEntregaKits}}">
                                </x-forms.date-picker>

                            </div>

                        </div>

                    </div>

                    <!--Input hora incial de la entrega de kits-->

                    <x-forms.time-picker name="InicioEntregaKits" message="Hora de inicio de la entrega de kits"
                                         required="required" valueHora="{{$tiempoIEK[0]}}"
                                         valueMinuto="{{$tiempoIEK[1]}}" valuePeriodo="{{$tiempoIEK[2]}}">
                    </x-forms.time-picker>

                    <!--Input hora final de la entrega de kits-->

                    <x-forms.time-picker name="FinEntregaKits" message="Hora de finalización de la entrega de kits"
                                         valueHora="{{$tiempoFEK[0]}}" valueMinuto="{{$tiempoFEK[1]}}"
                                         valuePeriodo="{{$tiempoFEK[2]}}">
                    </x-forms.time-picker>


                </div>

                <!--Fin de la entrega de kits-->

                <!--Área de los botones Cancelar y Guardar-->
                <div class="borde-tarjeta">

                    <div class="grid place-items-center md:flex items-center justify-center">

                        <a href="{{route('eventos.index')}}" class="btn-cancelar">Cancelar</a>

                        <button type="submit" class="mr-2 mb-2 btn-ok">Guardar</button>

                    </div>

                </div>

            </div>

        </div>


    </form>

</div>

</body>
</html>
