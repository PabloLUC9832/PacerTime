<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvendo al evento</title>

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

        <p class="text-white">

            @switch($status)

                @case('approved')
                    {{$message}}
                @break

                @case('pending')
                @case('in_process')
                    {{$message}}
                @break

                @case('rejected')
                    {{$message}}
                @break

            @endswitch

        </p>
    </div>


</div>

</body>
</html>
