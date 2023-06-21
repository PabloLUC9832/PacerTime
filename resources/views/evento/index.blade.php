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

    @if(session()->has('message'))

        <div id="alert-border-3" class="rounded-lg flex p-4 mb-4 text-green-400 border-t-4 border-green-800 bg-gray-800" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
                {{ session()->get('message') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-800 text-green-400 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex h-8 w-8 hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

    @endif

    @if(count($eventos)<=0)
        <p class="text-xl font-bold text-white">
            No se han encontrado eventos :(
        </p>
    @else

        <div class="grid grid-cols-6 gap-2 md:grid md:grid-cols-12">

            @foreach($eventos as $evento)

                @php

                    foreach ($evento->subEventos as $subE) {
                        $dist[] = $subE->distancia;
                    }
                    $distIm = implode(",",$dist);
                    $distancias = str_replace(","," - ",$distIm);
                @endphp



                <x-forms.card-evento id="{{$evento->id}}"
                                     imagen="https://pacertime.blob.core.windows.net/files/pacerIm2.jpeg"
                                     nombre="{{$evento->nombre}}"
                                     fechaInicioEvento="{{$evento->fechaInicioEvento}}" fechaFinEvento="{{$evento->fechaFinEvento}}"
                                     lugarEvento="{{$evento->lugarEvento}}" horaEvento="{{$evento->horaEvento}}"
                                     distancia="{{$distancias}}
                                     "
                >

                </x-forms.card-evento>
                {{--@endforeach--}}
                {{--@foreach($evento->subEventos as $subEv)--}}

                @include('evento.modal-info')
                @include('evento.modal-eliminar')

                {{--@endforeach--}}

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
