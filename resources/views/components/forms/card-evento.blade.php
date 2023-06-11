<div class="grid col-span-3">

    <!--flex-row-->
    <div class="flex flex-row">

        <!--CARD-->
        <div class="block border border-gray-200 rounded-lg">


            <img data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="object-fit rounded-t-lg h-96 w-full hover:cursor-zoom-in" src="{{$imagen}}">
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


                <h5 class="text-xl font-bold tracking-tight text-white text-justify">{{$nombre}}</h5>
                <p class="mb-3 font-normal text-gray-400">{{$descripcion}}</p>

            </div>

        </div>
        <!--CARD-->

    </div>
    <!--flex-row-->
</div>
