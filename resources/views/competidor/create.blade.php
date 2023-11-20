@extends('layouts.evento')

@section('title', $evento->nombre)
@section('subtitle', "Inscripción a {$evento->nombre}")

@section('content')

    <div class="space-y-6 px-4 py-5 sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-3">
                <div class="px-4 sm:px-0">
                    <p class="subtitulo">Ingresa la información solicitada a continuación para inscribirse al evento.</p>
                </div>
            </div>

        </div>
    </div>

    <form action="{{route('competidor.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 px-4 py-5 sm:p-6">

                <!--Datos del competidor-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Datos del competidor</p>

                    <x-forms.separator></x-forms.separator>

                    <!--Input nombre del competidor-->
                    <x-forms.input-field  name="nombre" id="nombre" message="Nombre(s)" class="uppercase" required="required"></x-forms.input-field>

                    <!--Input apellido del competidor-->
                    <x-forms.input-field  name="apellido" id="apellido" message="Apellidos" class="uppercase" required="required"></x-forms.input-field>

                    <!-- Fecha nacimiento del competidor-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="fechaNacimiento" class="label-input">Fecha nacimiento</label>
                            <span class="text-xs italic text-primary-red font-semibold">Obligatorio</span>
                        </div>

                        <!--Input Fecha nacimiento del competidor-->
                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="relative max-w-2xl">

                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </div>

                                <input type="text" name="fechaNacimiento"
                                       class="date-picker"
                                       placeholder="Fecha de nacimiento"
                                       value="{{ old('fechaNacimiento') }}"
                                       required>

                            </div>

                        </div>

                    </div>

                    <!--Inputs género del competidor-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="rama" class="label-input">Género</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <!--Inputs género del competidor-->
                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <ul class="items-center w-full text-sm text-white bg-primary border border-gray-200 rounded-lg sm:flex">

                                <x-forms.input-radio id="generoMasculino" name="genero" value="Masculino"></x-forms.input-radio>
                                <x-forms.input-radio id="generoFemenino" name="genero" value="Femenino"></x-forms.input-radio>

                            </ul>

                        </div>

                    </div>

                    <!--Input email del competidor-->
                    <x-forms.input-field  name="email" id="email" message="Correo electrónico"></x-forms.input-field>

                    <!--Input telefono del competidor-->
                    <x-forms.input-field  name="telefono" id="telefono" message="Teléfono" required="required"></x-forms.input-field>

                    <!--Input telefono de emergencia del competidor-->
                    <x-forms.input-field  name="telefonoEmergencia" id="telefonoEmergencia" message="Teléfono de emergencia"></x-forms.input-field>

                    <!--Input club/equipo del competidor-->
                    <x-forms.input-field  name="club" id="club" message="Club/Equipo"></x-forms.input-field>

                    <!--Inputs pais-estado-municipio del competidor-->
                    <div class="mt-2 col-span-6 md:grid grid-cols-6 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="rama" class="label-input">País - Estado - Municipio</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <!--Inputs País-Estado-Municipio del competidor-->
                        <div class="block mt-3 md:col-start-3 col-end-4">

                            <select id="pais" name="pais"
                                    class="text-white bg-primary inline-flex items-center px-3 bg-gray-50 rounded-lg md:rounded-none md:rounded-l-lg border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    onchange="loadStates()">
                                <option value="">Selecciona el país</option>
                                <!--<option value="México">México</option>-->
                            </select>

                        </div>

                        <div class="block mt-3 md:col-start-4 col-end-5">

                            <select id="estado" name="estado"
                                    class="text-white bg-primary inline-flex items-center px-3 bg-gray-50 rounded-lg md:rounded-none md:border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    onchange="loadCities()">
                                <option value="">Selecciona el estado</option>
                                <!--<option value="Veracruz">Veracruz</option>-->
                            </select>

                        </div>

                        <div class="block mt-3 md:col-start-5 col-end-6">

                            <select id="ciudad" name="municipio"
                                    class="text-white bg-primary inline-flex items-center px-3 bg-gray-50 rounded-lg md:rounded-none md:rounded-r-lg border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">Selecciona la ciudad</option>
                                <!--<option value="Xalapa-Enriquez">Xalapa-Enriquez</option>-->
                            </select>

                        </div>

                    </div>

                </div>

                <!--Fin datos del competidor-->

                <!--Datos del evento-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Datos del evento</p>

                    <x-forms.separator></x-forms.separator>

                    <!-- Inputs categorias del evento-->
                    <div class="mt-3 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1 col-end-3">
                            <label for="categoria" class="label-input">Selecciona la categoría a participar</label>
                            <span class="text-xs italic text-primary-red font-semibold	">
                                Obligatorio
                            </span>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="flex">
                                <!--Input unidad de la distancia del evento-->

                                <select id="categoria" name="categoria" class="text-white bg-primary inline-flex items-center px-3 rounded-md border-gray-300 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                    @foreach($evento->subEventos as $subEv)
                                        <option value="{{$subEv->id}}">
                                            {{$subEv->categoria}} - Distancia: {{$subEv->distancia}} - Rama: {{$subEv->rama}} - Precio: ${{$subEv->precio}}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="bg-primary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
                        <p class="text-white font-bold">Datos del evento</p>

                        <p class="text-white">
                            Evento: {{$evento->nombre}}
                        </p>

                        <p class="text-white">
                            Lugar: {{$evento->lugarEvento}}
                        </p>
                        <p class="text-white">
                            Fecha: {{$evento->fechaInicioEvento}} {{$evento->fechaFinEvento ? "- $evento->fechaFinEvento" : ''}}
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
                            Fecha: {{$evento->fechaInicioEntregaKits}} {{$evento->fechaFinEntregaKits ? "- $evento->fechaFinEntregaKits" : ''}}
                        </p>
                        <p class="text-white">
                            Hora: {{$evento->horaInicioEntregaKits}} {{ $evento->horaFinEntregaKits != "--:-- --" ? "- $evento->horaFinEntregaKits" : ''}}
                        </p>
                    </div>

                </div>
                <!-- Fin datos del evento-->

                <!--Área de los botones Cancelar y Guardar-->
                <div class="borde-tarjeta">

                    <div class="grid place-items-center md:flex items-center justify-center">

                        <a href="{{route('competidor.show',$evento->slug)}}" class="btn-cancelar">Cancelar</a>

                        <button type="submit" class="mr-2 mb-2 btn-ok">Proceder al pago</button>

                    </div>

                </div>
                <!--Área de los botones Cancelar y Guardar-->


            </div>

        </div>

    </form>

@endsection

@section('script')

    <script src="{{ Vite::asset('resources/js/countries-states-cities.js') }}"></script>

@endsection
