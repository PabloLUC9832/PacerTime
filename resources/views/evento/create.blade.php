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
                    <h3 class="titulo-1">Creación de Evento</h3>
                    <p class="subtitulo">Ingresa la información solicitada a continuación para la creación del evento.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <form action="{{route('eventos.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="shadow sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 px-4 py-5 sm:p-6">

                 <div class="bg-secondary border border-solid border-white rounded-md p-5">

                     <p class="subtitulo">Datos del evento</p>

                     <div class="hidden sm:block" aria-hidden="true">
                         <div class="py-5">
                             <div class="border-t border-gray-200"></div>
                         </div>
                     </div>

                     <x-forms.input-field  name="nombre" id="nombre" message="Nombre del evento"></x-forms.input-field>

                     <x-forms.input-text-area id="descripcion" name="descripcion" ></x-forms.input-text-area>

                     <x-forms.input-field  name="lugarEvento" id="lugarEvento" message="Lugar del evento"></x-forms.input-field>

                     <x-forms.date-picker name="Evento" message="Fecha del evento"></x-forms.date-picker>

                     <x-forms.time-picker name="Evento" message="Hora de inicio del evento"></x-forms.time-picker>

                    <x-forms.input-file name="files[]" id="file"></x-forms.input-file>

                 </div>

                <div class="bg-secondary border border-solid border-white rounded-md p-5">

                    <p class="subtitulo">Datos de la entrega de kits</p>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <x-forms.input-field  name="lugarEntregaKits" id="lugarEntregaKits" message="Lugar de la entrega de kits"></x-forms.input-field>

                    <x-forms.date-picker name="EntregaKits" message="Fecha de la entrega de kits"></x-forms.date-picker>

                    <x-forms.time-picker name="InicioEntregaKits" message="Hora de inicio de la entrega de kits"></x-forms.time-picker>

                    <x-forms.time-picker name="FinEntregaKits" message="Hora de finalización de la entrega de kits"></x-forms.time-picker>


                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <x-forms.input-field  id="distancia" name="distancia[]" message="Distancia del evento"></x-forms.input-field>

                <x-forms.input-field  id="categoria" name="categoria[]" message="Categoría"></x-forms.input-field>

                <x-forms.input-field  id="precio" name="precio[]" message="Precio"></x-forms.input-field>

                <x-forms.input-field  id="rama" name="rama[]" message="Rama"></x-forms.input-field>


                <button id="btn-add">+</button>

                <div id="li-container">
                    <ul>

                    </ul>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

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
