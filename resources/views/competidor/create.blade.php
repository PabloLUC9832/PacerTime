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

@include('layouts.navigation-competidor')

<header class="bg-secondary shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Inscripción a {{$evento->nombre}}
        </h2>
    </div>
</header>


<div class="m-10">

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

                    <!--Input email del competidor-->
                    <x-forms.input-field  name="email" id="email" message="Correo electrónico"></x-forms.input-field>

                    <!--Input telefono del competidor-->
                    <x-forms.input-field  name="telefono" id="telefono" message="Teléfono" required="required"></x-forms.input-field>

                    <!--Input telefono de emergencia del competidor-->
                    <x-forms.input-field  name="telefonoEmergencia" id="telefonoEmergencia" message="Teléfono de emergencia"></x-forms.input-field>

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

                </div>
                <!-- Fin datos del evento-->

                <!--Área de los botones Cancelar y Guardar-->
                <div class="borde-tarjeta">

                    <div class="grid place-items-center md:flex items-center justify-center">
                        {{--
                        <a href="{{route('competidor.show',$evento->slug)}}" class="flex items-center focus:outline-none text-white bg-primary-red hover:bg-secondary-red focus:ring-2 focus:ring-secondary-red font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-4 h-12">Cancelar</a>
                        --}}
                        <a href="{{route('competidor.show',$evento->slug)}}" class="btn-cancelar">Cancelar</a>

                        <button type="submit" class="mr-2 mb-2 btn-ok">Proceder al pago</button>

                    </div>

                </div>
                <!--Área de los botones Cancelar y Guardar-->


            </div>

        </div>

    </form>



</div>

</body>
</html>
