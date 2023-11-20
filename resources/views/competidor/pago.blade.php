@extends('layouts.evento')

@section('title', 'Realizar pago')

@section('content')

    <div class="grid items-center">

        <div class="bg-secondary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
            <p class="text-white font-bold">Confirma tus datos</p>

            <p class="text-white">
                Nombre completo: {{$request->nombre}} {{$request->apellido}}
            </p>

            <p class="text-white">
                Correo electrónico: {{$request->email}}
            </p>
            <p class="text-white">
                Teléfono: {{$request->telefono}}
            </p>

            @if(!empty($request->telefonoEmergencia))

                <p class="text-white">
                    Teléfono de emergencia: {{$request->telefonoEmergencia}}
                </p>

            @endif


        </div>

        <div class="bg-secondary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
            <p class="text-white font-bold">Categoría a participar</p>

            <p class="text-white">
                Categoría: {{$subEv->categoria}}
            </p>

            <p class="text-white">
                Distancia: {{$subEv->distancia}}
            </p>
            <p class="text-white">
                Rama: {{$subEv->rama}}
            </p>
            <p class="text-white">
                Cantidad a pagar: ${{$subEv->precio}}
            </p>
        </div>

        <div class="bg-secondary border border-solid border-zinc-500 rounded-md mt-2 p-2.5">
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

        <div id="wallet_container"></div>

        <a href="{{ back() }}"
           class="flex items-center justify-center focus:outline-none text-white bg-primary-red hover:bg-secondary-red focus:ring-2 focus:ring-secondary-red font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-4 h-12">
            Cancelar
        </a>


    </div>

@endsection

@section('script')

    <!-- SDK MercadoPago.js -->
    {{--<script src="https://sdk.mercadopago.com/js/v2"></script>--}}
    <script>

        const mp = new MercadoPago("{{config('services.mercadopago.key')}}");
        const bricksBuilder = mp.bricks();


        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "{{$preference->id}}",
            },
        });

    </script>
    <!-- FIn SDK MercadoPago.js -->

@endsection
