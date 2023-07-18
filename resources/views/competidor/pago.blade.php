<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realizar pago</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.ico') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')

</head>
<body class="bg-primary">

<div class="m-10">

    <div class="grid items-center">

        <p class="text-white"> Confirma tus datos: {{$nombreC}}</p>

        <div id="wallet_container"></div>

        <a href="{{ back() }}"
           class="flex items-center focus:outline-none text-white bg-primary-red hover:bg-secondary-red focus:ring-2 focus:ring-secondary-red font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-4 h-12">Cancelar</a>


    </div>


</div>


<!-- SDK MercadoPago.js -->
<script src="https://sdk.mercadopago.com/js/v2"></script>
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

</body>
</html>
