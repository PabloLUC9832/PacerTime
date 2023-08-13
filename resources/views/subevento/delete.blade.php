@extends('layouts.evento')

@section('title', 'Eliminar categorías')

@section('content')

    {{ Breadcrumbs::render('destroy-categorias',$evento) }}

    <div class="space-y-6 px-4 py-5 sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-3">
                <div class="px-4 sm:px-0">
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
                        <input type="text" id="fechaEvento"
                               class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               value="{{$evento->fechaInicioEvento}}  {{$evento->fechaFinEvento ? "- $evento->fechaFinEvento": ''}}" disabled>
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


                    <div class="mt-2 grid place-items-center">

                        <button data-modal-toggle="delete-modal{{$subEv->id}}" type="button" class="text-white bg-primary-red hover:bg-secondary-red focus:ring-2 focus:outline-none focus:ring-secondary-red font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2">
                            Eliminar
                            <svg class="w-4 h-4 ml-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12V17" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 12V17" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 7H20" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="sr-only">Eliminar</span>

                        </button>

                        @include('evento.modal-eliminar',['id' => $subEv->id, 'nombre' => $subEv->categoria, 'ruta' => 'subeventos.destroy'])

                    </div>

                    <x-forms.separator></x-forms.separator>

                @endforeach

            </div>
            <!--Fin categorías del evento-->

            <div class="borde-tarjeta">

                <div class="grid place-items-center md:flex items-center justify-center">

                    <a href="{{ route('eventos.edit',$evento->id) }}" class="text-gray-300 bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border border-gray-500 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">Cancelar</a>


                </div>

            </div>


        </div>

    </div>

@endsection
