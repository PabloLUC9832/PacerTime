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
                @include('evento.modal-eliminar')


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
