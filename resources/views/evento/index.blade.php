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


    <form action="{{route('eventos.index')}}" method="GET" value="{{$search}}" class="mb-4">
        <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input name="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-white border border-gray-600 rounded-lg bg-gray-700 focus:ring-secondary-yellow focus:border-secondary-yellow placeholder-gray-400" placeholder="Ingresa cualquier palabra para buscar" value="{{old('',$search)}}">

            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-primary-yellow hover:bg-secondary-yellow focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Buscar</button>

        </div>
    </form>


    @if(session()->has('message'))

        @include('evento.success-message',['message'=> session()->get('message') ])

    @endif

    @if(count($eventos)<=0)
        <p class="text-xl font-bold text-white">
            No se han encontrado eventos :(
        </p>
    @else

        <div class="grid grid-cols-6 gap-2 md:grid md:grid-cols-12">

            @foreach($eventos as $evento)

                @include('evento.card-event')


                @include('evento.modal-info')
                @include('evento.modal-eliminar',['id' => $evento->id, 'nombre' => $evento->nombre, 'ruta' => 'eventos.destroy'])


            @endforeach

        </div>

    @endif


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
