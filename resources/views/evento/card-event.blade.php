<div class="grid col-span-3">

    <!--flex-row-->
    <div class="flex flex-row">

        <!--CARD-->

        <div id="card"
           class="flex flex-col lg:flex-row md:max-w-xl border border-gray-200 rounded-lg hover:bg-secondary w-full">

            <img dusk="img{{$evento->id}}"
                 data-modal-target="popup-modal{{$evento->id}}" data-modal-toggle="popup-modal{{$evento->id}}"
                 class="object-cover w-full rounded-t-lg h-60 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg
                 {{ $urls[$key][0] != "https://pacertime.blob.core.windows.net/files/imagen-no-disponible.png" ? 'cursor-pointer' : ''}}"
                 src="{{ $urls[$key][0] }}">
            @if($urls[$key][0] != "https://pacertime.blob.core.windows.net/files/imagen-no-disponible.png")
                @include('evento.modal-image',[
                        'nombre' => $evento->id,
                        'imagen' => $urls[$key][0]
                    ])
            @endif
            <div class="flex flex-col justify-between p-4 leading-normal w-full">

                <!--Submenu-->
                <div class="flex flex-row justify-end px-4">

                    <button id="dropdownButton{{$evento->id}}" data-dropdown-toggle="dropdown{{$evento->id}}"
                            class="inline-block text-gray-400 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true"
                             fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown{{$evento->id}}" class="bg-gray-700 z-10 hidden text-base list-none divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>

                                @auth

                                    <a data-drawer-target="drawer-info{{$evento->id}}" data-drawer-show="drawer-info{{$evento->id}}"
                                       {{--data-drawer-backdrop="false"--}}
                                       data-drawer-placement="right" aria-controls="drawer-info{{$evento->id}}"
                                       data-drawer-body-scrolling="true"
                                       class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white cursor-pointer">
                                        Ver información
                                    </a>

                                @else

                                    <a href="{{ route('competidor.show',$evento->slug) }}"
                                       class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white cursor-pointer">
                                        Ver información
                                    </a>

                                @endauth

                            </li>

                            @if($evento->imagen != "Indisponible")

                                <li>
                                    <a data-modal-target="popup-modal-gallery{{$evento->id}}" data-modal-toggle="popup-modal-gallery{{$evento->id}}"
                                       class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white cursor-pointer">
                                        Ver imágenes
                                    </a>
                                </li>

                            @endif

                            @auth

                                <li>
                                    <a dusk="editar{{$evento->id}}"
                                       href="{{route('eventos.edit',$evento->id)}}"
                                       class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 hover:text-white">Editar</a>
                                </li>

                                <li>
                                    <a data-modal-toggle="delete-modal{{$evento->id}}"
                                       class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-600 cursor-pointer">
                                        {{ Cache::has('deleted') ? 'Eliminar definitivamente' : 'Eliminar' }}
                                    </a>
                                </li>

                            @endauth

                        </ul>
                    </div>

                </div>
                @include('evento.modal-gallery')
                <!-- Submenu -->

                @auth
                    <h5 dusk="titulo{{$evento->id}}"
                        data-drawer-target="drawer-info{{$evento->id}}" data-drawer-show="drawer-info{{$evento->id}}"
                        data-drawer-placement="right" aria-controls="drawer-info{{$evento->id}}"
                        data-drawer-body-scrolling="true"
                        class="inline-flex items-center text-lg font-bold tracking-tight text-white text-justify cursor-pointer hover:underline">
                        {{$evento->nombre}}
                    </h5>
                @else
                    <a href="{{ route('competidor.show',$evento->slug) }}"
                       class="inline-flex items-center text-lg font-bold tracking-tight text-white text-justify hover:underline">
                        {{$evento->nombre}}
                    </a>
                @endauth

                <div>
                    <div class="mt-1 flex items-center text-base rounded-lg bg-blue-950">

                        <span
                            class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">
                            Lugar
                        </span>

                            <span
                                class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-normal text-white bg-cyan-950 rounded md:text-sm">
                            {{$evento->lugarEvento}}
                        </span>
                    </div>

                    <div class="mt-1 flex items-center text-base rounded-lg bg-blue-950">

                        <span
                            class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">
                            Fecha
                        </span>

                            <span
                                class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-normal text-white bg-cyan-950 rounded
                             md:text-sm">
                            {{$evento->fechaInicioEvento}} {{ $evento->fechaFinEvento ? "- $evento->fechaFinEvento" : ''}}
                        </span>

                    </div>

                    <div class="mt-1 flex items-center text-base rounded-lg bg-blue-950">

                        <span
                            class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">Hora</span>

                        <span
                            class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-normal text-white bg-cyan-950 rounded md:text-sm">{{$evento->horaEvento}}</span>

                    </div>

                    <div class="mt-1 flex items-center text-base rounded-lg bg-blue-950">

                        <span
                            class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-medium text-white bg-cyan-950 rounded md:text-sm">Distancias</span>
                        <span
                            class="inline-flex items-center justify-center px-1 py-0.5 ml-0.5 text-xs font-normal3 text-white bg-cyan-950 rounded
                        md:text-sm truncate">
                            @foreach($evento->subEventos as $subEv)
                                    {{$subEv->distancia}} <br>
                            @endforeach
                            </span>
                    </div>

                </div>

            </div>

        </div>
        <!--CARD-->

    </div>
    <!--flex-row-->
</div>
