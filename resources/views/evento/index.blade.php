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
    @vite('node_modules/flowbite/dist/flowbite.js')
    @vite('node_modules/flowbite/dist/datepicker.js')

</head>
<body>

<div class="m-10">

    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Evento</h3>
                    <p class="mt-1 text-sm text-gray-600">Ingresa la información solicitada a continuación para la creación del evento.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    {{--<form action="{{ route('prueba') }}" method="POST" enctype="multipart/form-data">--}}
    <form action="" method="POST" enctype="multipart/form-data">

        @csrf
        {{--https://laravel.com/docs/9.x/blade#components--}}
        <div class="shadow sm:overflow-hidden sm:rounded-md">

            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                <x-forms.input-field  name="nombre" message="Nombre del evento"></x-forms.input-field>

                <div class="col-span-6 md:grid grid-cols-6 gap-4">

                    <div class="block md:col-start-1">
                        <label for="descripcion" class="block text-sm font-bold text-gray-700">Descripción</label>
                    </div>

                    <div class="block mt-3 md:col-start-3 col-end-6">
                        <div class="mt-1">
                            <textarea id="descripcion" name="descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Describe el evento"></textarea>
                        </div>
                    </div>

                </div>

                <x-forms.input-field  name="lugarEvento" message="Lugar del evento"></x-forms.input-field>

                <x-forms.date-picker name="Evento" message="Fecha del evento"></x-forms.date-picker>

                <x-forms.time-picker name="Evento" message="Hora de inicio del evento"></x-forms.time-picker>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <x-forms.input-field  name="lugarEntregaKits" message="Lugar de la entrega de kits"></x-forms.input-field>

                <x-forms.date-picker name="EntregaKits" message="Fecha de la entrega de kits"></x-forms.date-picker>

                <x-forms.time-picker name="InicioEntregaKits" message="Hora de inicio de la entrega de kits"></x-forms.time-picker>

                <x-forms.time-picker name="FinEntregaKits" message="Hora de finalización de la entrega de kits"></x-forms.time-picker>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="col-span-6 md:grid grid-cols-6 gap-4">

                    <div class="block md:col-start-1">
                        <label for="file" class="block text-sm font-bold text-gray-700">Imagen</label>
                    </div>

                    <div class="block mt-3 md:col-start-3 col-end-6">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Sube la imagen</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file" type="file" name="file" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

                    </div>

                </div>

                <button type="submit">Enviar</button>

            </div>

        </div>


    </form>

</div>

</body>
</html>
