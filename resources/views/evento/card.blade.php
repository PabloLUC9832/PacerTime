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

    <div class="grid grid-cols-6 gap-2 md:grid md:grid-cols-12">

       <!--1-->

        <div class="grid col-span-3">

            <!--flex-row-->
            <div class="flex flex-row">

                <!--CARD-->
                <div class="block border border-gray-200 rounded-lg">


                    <img data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="object-fit rounded-t-lg h-96 w-full hover:cursor-zoom-in" src="https://pacertime.blob.core.windows.net/files/pacerIm3.jpg">
                    @include('evento.modal-image')

                    <!--Submenu-->
                    <div class="flex justify-end px-4 pt-2">

                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-400 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="bg-gray-700 z-10 hidden text-base list-none divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Cambiar imagen</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Editar</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600">Eliminar</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Submenu -->

                    <div class="flex flex-col justify-between p-2">


                        <h5 class="text-xl font-bold tracking-tight text-white text-justify">Noteworthy technology acquisitions 2021</h5>
                        <p class="mb-3 font-normal text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                    </div>

                </div>
                <!--CARD-->

            </div>
            <!--flex-row-->
        </div>

       <!--1-->

       <!--2-->

        <div class="grid col-span-3">

            <!--flex-row-->
            <div class="flex flex-row">

                <!--CARD-->
                <div class="block border border-gray-200 rounded-lg">


                    <img class="object-fit rounded-t-lg h-96 w-full" src="https://pacertime.blob.core.windows.net/files/pacerIm2.jpeg">

                    <!--Submenu-->
                    <div class="flex justify-end px-4 pt-2">

                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-400 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="bg-gray-700 z-10 hidden text-base list-none divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Cambiar imagen</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Editar</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600">Eliminar</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Submenu -->

                    <div class="flex flex-col justify-between p-2">


                        <h5 class="text-xl font-bold tracking-tight text-white text-justify">Noteworthy technology acquisitions 2021</h5>
                        <p class="mb-3 font-normal text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                    </div>

                </div>
                <!--CARD-->

            </div>
            <!--flex-row-->

        </div>

       <!--2-->

       <!--3-->

        <div class="grid col-span-3">

            <!--flex-row-->
            <div class="flex flex-row">

                <!--CARD-->
                <div class="block border border-gray-200 rounded-lg">


                    <img class="object-fit rounded-t-lg h-96 w-full" src="https://pacertime.blob.core.windows.net/files/pacerIm1.jpg">

                    <!--Submenu-->
                    <div class="flex justify-end px-4 pt-2">

                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-400 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="bg-gray-700 z-10 hidden text-base list-none divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Cambiar imagen</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Editar</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600">Eliminar</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Submenu -->

                    <div class="flex flex-col justify-between p-2">


                        <h5 class="text-xl font-bold tracking-tight text-white text-justify">Noteworthy technology acquisitions 2021</h5>
                        <p class="mb-3 font-normal text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                    </div>

                </div>
                <!--CARD-->

            </div>
            <!--flex-row-->

        </div>


       <!--3-->

        <!--4-->

        <div class="grid col-span-3">

            <!--flex-row-->
            <div class="flex flex-row">

                <!--CARD-->
                <div class="block border border-gray-200 rounded-lg">


                    <img class="object-fit rounded-t-lg h-96 w-full" src="https://pacertime.blob.core.windows.net/files/pacerIm1.jpg">

                    <!--Submenu-->
                    <div class="flex justify-end px-4 pt-2">

                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-400 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="bg-gray-700 z-10 hidden text-base list-none divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Cambiar imagen</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Editar</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600">Eliminar</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Submenu -->

                    <div class="flex flex-col justify-between p-2">


                        <h5 class="text-xl font-bold tracking-tight text-white text-justify">Noteworthy technology acquisitions 2021</h5>
                        <p class="mb-3 font-normal text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>

                    </div>

                </div>
                <!--CARD-->

            </div>
            <!--flex-row-->

        </div>

        <!--4-->


    </div>



</div>

</body>
</html>
