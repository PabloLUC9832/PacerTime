<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminación de imágenes</title>

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
                    <h3 class="titulo-1">Eliminación de imágenes</h3>
                    <p class="subtitulo">Selecciona las imágenes que deseas eliminar.</p>
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

    <form action="{{ route('eventos.destroyImages') }}" method="POST">
        @csrf
        <button type="submit"
                class="px-6 font-medium text-red-600 underline dark:text-blue-500 hover:no-underline">
            Eliminar
        </button>

    <ul class="grid w-full gap-6 md:grid-cols-3">

        @foreach($listFiles as $img)

        <li>
            <input name="img[]" type="checkbox" id="{{$img["imageName"]}}" value="{{$img["uri"]}}" class="hidden peer">
            <label for="{{$img["imageName"]}}" class="inline-flex items-center justify-between w-full h-full p-5 text-gray-400 bg-gray-800 border-4 border-gray-700 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-300 peer-checked:text-gray-300 hover:bg-gray-700">

            <div class="block">
                <img class="w-1/2 h-1/2 mx-auto" src="https://pacertime.blob.core.windows.net/files/{{$img["uri"]}}"
                     alt="{{$img["imageName"]}}">
                <p class="mb-1.5 text-justify">{{$img["imageName"]}}</p>
            </div>

            </label>
        </li>

        @endforeach

    </ul>

    </form>





</div>

</body>
</html>
