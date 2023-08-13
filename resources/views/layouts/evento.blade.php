<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.ico') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/createSubEvento.js')
    @vite('node_modules/flowbite/dist/flowbite.js')
    {{--@vite('node_modules/flowbite/dist/datepicker.js')--}}

    <script src="https://sdk.mercadopago.com/js/v2"></script>

</head>
<body class="bg-primary">

@auth
    @include('layouts.navigation')
@else
    @include('layouts.navigation-competidor')
@endauth

@hasSection('subtitle')

    <header class="bg-secondary shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                @yield('subtitle')
            </h2>
        </div>
    </header>

@endif

<div class="m-10">

    @yield('content')

</div>

@hasSection('script')
    @yield('script')
@endif
{{--
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
@vite('resources/js/app.js')
--}}
</body>
</html>
