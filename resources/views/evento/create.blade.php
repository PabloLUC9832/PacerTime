<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/createSubEvento.js')
    @vite('node_modules/flowbite/dist/flowbite.js')
    @vite('node_modules/flowbite/dist/datepicker.js')

</head>
<body class="bg-primary">

<div class="m-10">

    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-3">
                <div class="px-4 sm:px-0">
                    <h3 class="titulo-1">Creación de evento</h3>
                    <p class="subtitulo">Ingresa la información solicitada a continuación para la creación del evento.</p>
                </div>
            </div>

        </div>
    </div>

    <x-forms.separator></x-forms.separator>

    <form action="{{route('eventos.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="shadow sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 px-4 py-5 sm:p-6">

                <!--Datos del evento-->
                 <div class="borde-tarjeta">

                     <p class="subtitulo">Datos del evento</p>

                     <x-forms.separator></x-forms.separator>

                     <x-forms.input-field  name="nombre" id="nombre" message="Nombre del evento"></x-forms.input-field>

                     <x-forms.input-text-area id="descripcion" name="descripcion" ></x-forms.input-text-area>

                     <x-forms.input-field  name="lugarEvento" id="lugarEvento" message="Lugar del evento"></x-forms.input-field>

                     <x-forms.date-picker name="Evento" message="Fecha del evento"></x-forms.date-picker>

                     <x-forms.time-picker name="Evento" message="Hora de inicio del evento"></x-forms.time-picker>

                    <x-forms.input-file name="files[]" id="file"></x-forms.input-file>

                 </div>
                <!--Fin Datos del evento-->

                <!--Categorías del evento-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Categorías del evento</p>

                    <x-forms.separator></x-forms.separator>

                    <x-forms.input-field  id="categoria" name="categoria[]" message="Categoría"></x-forms.input-field>

                    <div class="col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="distancia" class="label-input">Distancia</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="flex">

                                <input type="text" name="distancia[]" id="distancia" class="text-white bg-primary block w-full border border-r-0 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                                <select id="unidadDistancia" name="unidadDistancia[]" class="text-white bg-primary inline-flex items-center px-3 bg-gray-50 rounded-none rounded-r-lg border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Selecciona la unidad de longitud</option>
                                    <option value="kilometros">Kilometros</option>
                                    <option value="millas">Millas</option>
                                    <option value="metros">Metros</option>
                                </select>

                            </div>

                        </div>

                    </div>


                    <div class="col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="rama" class="label-input">Rama</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <ul class="items-center w-full text-sm text-white bg-primary border border-gray-200 rounded-lg sm:flex">

                                <x-forms.input-radio id="ramaAmbas" name="rama[]" value="Ambas"></x-forms.input-radio>
                                <x-forms.input-radio id="ramaFemenil" name="rama[]" value="Femenil"></x-forms.input-radio>
                                <x-forms.input-radio id="ramaVaronil" name="rama[]" value="Varonil"></x-forms.input-radio>

                            </ul>



                        </div>

                    </div>

                    <div class="col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

                        <div class="block md:col-start-1">
                            <label for="precio" class="label-input">Precio</label>
                        </div>

                        <div class="block mt-3 md:col-start-3 col-end-6">

                            <div class="flex">
                             <span class="inline-flex items-center px-3 text-sm text-white bg-secondary border border-r-0 border-gray-300 rounded-l-md">
                                $
                             </span>
                            <input type="text" name="precio[]" id="precio" class="text-white bg-primary block w-full rounded-none rounded-r-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                            </div>
                        </div>

                    </div>

                </div>
                <!--Fin categorías del evento-->


                <button id="btn-add">+</button>

                <div id="li-container">
                    <ul id="listaRamas">

                    </ul>
                </div>

                <!--Datos de la entraga de kits-->
                <div class="borde-tarjeta">

                    <p class="subtitulo">Datos de la entrega de kits</p>

                    <x-forms.separator></x-forms.separator>

                    <x-forms.input-field  name="lugarEntregaKits" id="lugarEntregaKits" message="Lugar de la entrega de kits"></x-forms.input-field>

                    <x-forms.date-picker name="EntregaKits" message="Fecha de la entrega de kits"></x-forms.date-picker>

                    <x-forms.time-picker name="InicioEntregaKits" message="Hora de inicio de la entrega de kits"></x-forms.time-picker>

                    <x-forms.time-picker name="FinEntregaKits" message="Hora de finalización de la entrega de kits"></x-forms.time-picker>


                </div>

                <!--Fin de la entraga de kits-->

                <div id="empty">
                    <p></p>
                </div>

                <input id="clicks" name="clicks" value="XD"/>

                <button type="submit">Enviar</button>

            </div>

        </div>


    </form>

</div>

</body>
</html>
