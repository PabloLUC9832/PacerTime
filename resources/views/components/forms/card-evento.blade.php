<div class="grid col-span-3">

    <!--flex-row-->
    <div class="flex flex-row">

        <!--CARD-->
        <div class="block border border-gray-200 rounded-lg hover:bg-secondary">

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
                            <a data-modal-toggle="delete-modal{{$id}}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600">Eliminar</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Submenu -->

            <div class="flex flex-col justify-between p-2">


                <h5 data-drawer-target="drawer-info{{$id}}" data-drawer-show="drawer-info{{$id}}" data-drawer-placement="right" aria-controls="drawer-info{{$id}}" data-drawer-body-scrolling="true"
                    class="inline-flex items-center text-lg font-bold tracking-tight text-white text-justify cursor-pointer" >{{$nombre}}

                    <svg class="w-4 h-4 ml-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#FFFFFF" fill="none"><path d="M55.4,32V53.58a1.81,1.81,0,0,1-1.82,1.82H10.42A1.81,1.81,0,0,1,8.6,53.58V10.42A1.81,1.81,0,0,1,10.42,8.6H32"/><polyline points="40.32 8.6 55.4 8.6 55.4 24.18"/><line x1="19.32" y1="45.72" x2="54.61" y2="8.91"/></svg>

                </h5>
                {{--<p class="mb-3 font-normal text-gray-400">{{$descripcion}}</p> --}}

                <!--<div class="mt-2 flex items-center p-3 text-base font-bold text-white rounded-lg bg-gray-600 hover:bg-gray-500 group hover:shadow">-->
                <div class="mt-2 flex items-center p-2.5 text-base rounded-lg bg-blue-950 hover:bg-blue-900">

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">Lugar</span>

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm"> {{$lugarEvento}}</span>
                </div>

                <div class="mt-2 flex items-center p-2.5 text-base rounded-lg bg-blue-950 hover:bg-blue-900">

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">Fecha</span>

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">{{$fechaInicioEvento}} - {{$fechaFinEvento}}</span>

                </div>

                <div class="mt-2 flex items-center p-2.5 text-base rounded-lg bg-blue-950 hover:bg-blue-900">

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">Hora</span>

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">{{$horaEvento}}</span>

                </div>

                <div class="mt-2 flex items-center p-2.5 text-base rounded-lg bg-blue-950 hover:bg-blue-900">

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">Distancias</span>

                    <span class="inline-flex items-center justify-center px-1 py-0.5 ml-3 text-xs font-thin text-white bg-cyan-950 rounded md:text-sm">
                            {{$distancia}}
                    </span>

                </div>

            </div>

        </div>
        <!--CARD-->

    </div>
    <!--flex-row-->
</div>
