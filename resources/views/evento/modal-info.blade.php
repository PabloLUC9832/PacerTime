<!-- drawer component -->
<div id="drawer-info{{$evento->id}}" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-gray-800 w-80" tabindex="-1" aria-labelledby="drawer-right-label">

    <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>{{$evento->nombre}}</h5>

    <button type="button" data-drawer-hide="drawer-info{{$evento->id}}" aria-controls="drawer-info{{$evento->id}}" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>

    <!--DESCRIPCION-->
    <p class="mb-1 text-base font-medium text-gray-300">Descripción</p>
    <p class="mb-1 text-sm text-gray-400 text-justify hyphens-auto" lang="es">{{$evento->descripcion}}</p>
    <!--DESCRIPCION-->

    <!--CATEGORIAS-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Categorías</p>
        <!--<p class="flex items-center p-1 text-gray-400 rounded-lg">-->

            @foreach($evento->subEventos as $subEv)

                <div class="flex flex-col">

                    <p class="flex items-center p-1 text-gray-400 rounded-lg">

                        <svg class="w-3 h-3 ml-1 iconify iconify--gis" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" preserveAspectRatio="xMidYMid meet"><path d="M50 0a3.5 3.5 0 0 0-3.5 3.5v80A3.5 3.5 0 0 0 50 87a3.5 3.5 0 0 0 3.5-3.5V47h43a3.5 3.5 0 0 0 3.5-3.5v-40A3.5 3.5 0 0 0 96.5 0h-46a3.5 3.5 0 0 0-.254.01A3.5 3.5 0 0 0 50 0zm13.8 7h9.8v7.43h9.8V7H93v7.43h-9.6v9.799H93v9.8h-9.6V40h-9.8v-5.97h-9.8V40H54v-5.97h9.8v-9.801H54v-9.8h9.8V7zm0 7.43v9.799h9.8v-9.8h-9.8zm9.8 9.799v9.8h9.8v-9.8h-9.8z" fill="#FFFFFF"></path><path d="M38.004 76.792C27.41 78.29 20 81.872 20 87.143C20 94.243 32.381 100 50 100s30-5.756 30-12.857c0-5.272-7.41-8.853-18.003-10.35l-1.468 2.499C68.514 80.399 74 82.728 74 85.429c0 3.787-10.745 6.857-24 6.857s-24-3.07-24-6.857c-.001-2.692 5.45-5.018 13.459-6.13c-.484-.836-.97-1.67-1.455-2.507z" fill="#FFFFFF"></path></svg>

                        <span class="ml-3"> {{$subEv->categoria}} - {{$subEv->distancia}} - {{$subEv->rama}} - ${{$subEv->precio}} </span>

                    </p>

                </div>
            @endforeach

        <!--</p>-->

    </div>
    <!--CATEGORIAS-->


    <!--LUGAR-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Lugar</p>
        <p class="flex items-center p-1 text-gray-400 rounded-lg">

            <svg class="w-3 h-3 ml-1" viewBox="-3 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                <title>pin_sharp_circle [#624]</title>
                <desc>Created with Sketch.</desc>
                <defs>

                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dribbble-Light-Preview" transform="translate(-223.000000, -5439.000000)" fill="#FFFFFF">
                        <g id="icons" transform="translate(56.000000, 160.000000)">
                            <path d="M176,5286.219 C176,5287.324 175.105,5288.219 174,5288.219 C172.895,5288.219 172,5287.324 172,5286.219 C172,5285.114 172.895,5284.219 174,5284.219 C175.105,5284.219 176,5285.114 176,5286.219 M174,5296 C174,5296 169,5289 169,5286 C169,5283.243 171.243,5281 174,5281 C176.757,5281 179,5283.243 179,5286 C179,5289 174,5296 174,5296 M174,5279 C170.134,5279 167,5282.134 167,5286 C167,5289.866 174,5299 174,5299 C174,5299 181,5289.866 181,5286 C181,5282.134 177.866,5279 174,5279" id="pin_sharp_circle-[#624]">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>

            <span class="ml-3">{{$evento->lugarEvento}}</span>

        </p>

    </div>
    <!--LUGAR-->

    <!--FECHA-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Fecha</p>
        <p class="flex items-center p-1 text-gray-400 rounded-lg">

            <svg class="w-3 h-3 ml-1"  viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>.cls-1{fill:#FFFFFF;}</style>
                </defs>
                <g data-name="calendar date" id="calendar_date">
                    <path class="cls-1" d="M22.5,3H21V2a1,1,0,0,0-1-1H19a1,1,0,0,0-1,1V3H14V2a1,1,0,0,0-1-1H12a1,1,0,0,0-1,1V3H7V2A1,1,0,0,0,6,1H5A1,1,0,0,0,4,2V3H2.5A1.5,1.5,0,0,0,1,4.5v18A1.5,1.5,0,0,0,2.5,24h20A1.5,1.5,0,0,0,24,22.5V4.5A1.5,1.5,0,0,0,22.5,3ZM19,2l1,0,0,3L19,5ZM12,2l1,0V3.44s0,0,0,.06,0,0,0,.07L13,5,12,5ZM5,2,6,2,6,5,5,5ZM2.5,4H4V5A1,1,0,0,0,5,6H6A1,1,0,0,0,7,5V4h4V5a1,1,0,0,0,1,1H13a1,1,0,0,0,1-1V4h4V5a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4h1.5a.5.5,0,0,1,.5.5V8H2V4.5A.5.5,0,0,1,2.5,4Zm20,19H2.5a.5.5,0,0,1-.5-.5V9H23V22.5A.5.5,0,0,1,22.5,23Z"/>
                    <path class="cls-1" d="M20.5,15h-6a.5.5,0,0,0-.5.5v5a.5.5,0,0,0,.5.5h6a.5.5,0,0,0,.5-.5v-5A.5.5,0,0,0,20.5,15ZM20,20H15V16h5Z"/>
                    <path class="cls-1" d="M6.5,11h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,6.5,11ZM6,13H5V12H6Z"/>
                    <path class="cls-1" d="M10.5,11h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,10.5,11ZM10,13H9V12h1Z"/>
                    <path class="cls-1" d="M6.5,16h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,6.5,16ZM6,18H5V17H6Z"/>
                    <path class="cls-1" d="M10.5,16h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,10.5,16ZM10,18H9V17h1Z"/>
                    <path class="cls-1" d="M14.5,14h2a.5.5,0,0,0,.5-.5v-2a.5.5,0,0,0-.5-.5h-2a.5.5,0,0,0-.5.5v2A.5.5,0,0,0,14.5,14Zm.5-2h1v1H15Z"/>
                    <path class="cls-1" d="M20.5,11h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,20.5,11ZM20,13H19V12h1Z"/>
                </g>
            </svg>

            <span class="ml-3">{{$evento->fechaInicioEvento}} - {{$evento->fechaFinEvento}}</span>

        </p>

    </div>
    <!--FECHA-->

    <!--HORA-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Hora</p>
        <p class="flex items-center p-1 text-gray-400 rounded-lg">

            <svg class="w-3 h-3 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="#FFFFFF"/>
            </svg>

            <span class="ml-3">{{$evento->horaEvento}}</span>

        </p>

    </div>
    <!--HORA-->

    <!--LUGAR ENTREGA KITS-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Entrega de kits</p>
        <p class="flex items-center p-1 text-gray-400 rounded-lg">

            <svg class="w-3 h-3 ml-1" viewBox="-3 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                <title>pin_sharp_circle [#624]</title>
                <desc>Created with Sketch.</desc>
                <defs>

                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dribbble-Light-Preview" transform="translate(-223.000000, -5439.000000)" fill="#FFFFFF">
                        <g id="icons" transform="translate(56.000000, 160.000000)">
                            <path d="M176,5286.219 C176,5287.324 175.105,5288.219 174,5288.219 C172.895,5288.219 172,5287.324 172,5286.219 C172,5285.114 172.895,5284.219 174,5284.219 C175.105,5284.219 176,5285.114 176,5286.219 M174,5296 C174,5296 169,5289 169,5286 C169,5283.243 171.243,5281 174,5281 C176.757,5281 179,5283.243 179,5286 C179,5289 174,5296 174,5296 M174,5279 C170.134,5279 167,5282.134 167,5286 C167,5289.866 174,5299 174,5299 C174,5299 181,5289.866 181,5286 C181,5282.134 177.866,5279 174,5279" id="pin_sharp_circle-[#624]">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>

            <span class="ml-3">{{$evento->lugarEntregaKits}}</span>

        </p>

    </div>
    <!--LUGAR ENTREGA KITS-->

    <!--FECHA ENTREGA KITS-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Fecha de la entrega de kits</p>
        <p class="flex items-center p-1 text-gray-400 rounded-lg">

            <svg class="w-3 h-3 ml-1"  viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>.cls-1{fill:#FFFFFF;}</style>
                </defs>
                <g data-name="calendar date" id="calendar_date">
                    <path class="cls-1" d="M22.5,3H21V2a1,1,0,0,0-1-1H19a1,1,0,0,0-1,1V3H14V2a1,1,0,0,0-1-1H12a1,1,0,0,0-1,1V3H7V2A1,1,0,0,0,6,1H5A1,1,0,0,0,4,2V3H2.5A1.5,1.5,0,0,0,1,4.5v18A1.5,1.5,0,0,0,2.5,24h20A1.5,1.5,0,0,0,24,22.5V4.5A1.5,1.5,0,0,0,22.5,3ZM19,2l1,0,0,3L19,5ZM12,2l1,0V3.44s0,0,0,.06,0,0,0,.07L13,5,12,5ZM5,2,6,2,6,5,5,5ZM2.5,4H4V5A1,1,0,0,0,5,6H6A1,1,0,0,0,7,5V4h4V5a1,1,0,0,0,1,1H13a1,1,0,0,0,1-1V4h4V5a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4h1.5a.5.5,0,0,1,.5.5V8H2V4.5A.5.5,0,0,1,2.5,4Zm20,19H2.5a.5.5,0,0,1-.5-.5V9H23V22.5A.5.5,0,0,1,22.5,23Z"/>
                    <path class="cls-1" d="M20.5,15h-6a.5.5,0,0,0-.5.5v5a.5.5,0,0,0,.5.5h6a.5.5,0,0,0,.5-.5v-5A.5.5,0,0,0,20.5,15ZM20,20H15V16h5Z"/>
                    <path class="cls-1" d="M6.5,11h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,6.5,11ZM6,13H5V12H6Z"/>
                    <path class="cls-1" d="M10.5,11h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,10.5,11ZM10,13H9V12h1Z"/>
                    <path class="cls-1" d="M6.5,16h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,6.5,16ZM6,18H5V17H6Z"/>
                    <path class="cls-1" d="M10.5,16h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,10.5,16ZM10,18H9V17h1Z"/>
                    <path class="cls-1" d="M14.5,14h2a.5.5,0,0,0,.5-.5v-2a.5.5,0,0,0-.5-.5h-2a.5.5,0,0,0-.5.5v2A.5.5,0,0,0,14.5,14Zm.5-2h1v1H15Z"/>
                    <path class="cls-1" d="M20.5,11h-2a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2A.5.5,0,0,0,20.5,11ZM20,13H19V12h1Z"/>
                </g>
            </svg>

            <span class="ml-3">{{$evento->fechaInicioEntregaKits}} - {{$evento->fechaFinEntregaKits}}</span>

        </p>

    </div>
    <!--FECHA ENTREGA KITS-->

    <!--HORA ENTREGA KITS-->
    <div class="mt-1.5 bg-primary border border-solid border-zinc-500 rounded-md p-1">

        <p class="mb-1 text-base font-medium text-gray-300">Hora de la entrega de kits</p>
        <p class="flex items-center p-1 text-gray-400 rounded-lg">

            <svg class="w-3 h-3 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z" fill="#FFFFFF"/>
            </svg>

            <span class="ml-3">{{$evento->horaInicioEntregaKits}} - {{$evento->horaFinEntregaKits}} </span>

        </p>

    </div>
    <!--HORA ENTREGA KITS-->

    <!--COMPETIDORES INSCRITOS, EDITAR Y ELIMINAR-->

    @auth
    <div class="grid grid-cols-1 mt-1.5 gap-2 bg-secondary sticky bottom-0">

        <a href="{{route('eventos.inscripciones',$evento->slug)}}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-800 focus:outline-none">

            <svg fill="#FFFFFF" class="w-4 h-4 ml-3" version="1.2" baseProfile="tiny"
                 id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="-1077 923 256 256" xml:space="preserve">
                <g>
                    <path d="M-868.7,1024.6c-0.2,0-0.4,0.1-0.7,0.1c-0.1,0-0.2-0.1-0.3-0.1l-30.5,4.6l-17.3-38.2c-2.3-4.7-5.2-8.5-8.7-11.5
                        c-1.5-1.5-3.2-2.8-5.1-3.8c-1.9-1.1-4-1.8-6.1-2.2c-5.6-1.3-10.7-0.5-15.4,2.2l-38.2,17.9c-2.6,1.7-5,2.3-5.7,2.8
                        c-3.9,2.7-4.6,4.2-5,5l-19.2,36.9c-0.2,0.3-0.3,0.7-0.4,1.1c-0.7,1.4-1.1,3-1.1,4.6c0,1.7,0.5,3.4,1.2,4.8c1,2.4,2.6,3.9,4.8,4.6
                        c1.3,0.6,2.8,1,4.4,1c4.1,0,7.7-2.4,9.4-5.9c0.1-0.2,0.3-0.4,0.4-0.6c12-22.5,18-33.8,18-34l20.4-4.8l-24.5,103.1l-46.8-0.3
                        c-0.1,0-0.2,0-0.2,0.1c-0.1,0-0.2,0-0.3,0c-6.2,0-11.2,5-11.2,11.2c0,5.7,4.3,10.4,9.8,11v0.1l13.1,0c10.1,0.5,40,1.8,49.1,0.8
                        c0.3,0,0.6,0.1,0.9,0.1c5.1,0,9.3-3.6,10.2-8.4l7-20.6l0,0c4.7-13.5,7.9-26.6,7.9-26.6c12.2,12.8,21.3,21.2,29.7,30l14.3,47l3,11.3
                        l0.1,0c1.6,4.9,6.2,8.6,11.6,8.6c6.8,0,12.3-5.5,12.3-12.3c0-1-0.1-1.9-0.4-2.8l-0.9-3.5c0-0.1,0-0.1,0-0.2l-2.6-9.8l-2.6-9.7l0,0
                        l-10.5-39.1c-1.5-3.6-2.7-7.2-5.8-10.6c0,0-29.3-32.5-30.1-33l6.7-31.5l9.3,19.7c0.1,0.2,0.2,0.3,0.4,0.5c0.6,0.9,1.2,1.7,1.7,2.3
                        c1.8,1.8,4.2,2.9,6.9,2.9c0.1,0,0.2,0,0.2,0c0.8,0,1.6-0.1,2.4-0.3l34.2-3.7c0.1,0,0.2,0,0.3,0c0.9,0,1.7-0.1,2.5-0.3l0.5-0.1
                        c0.1,0,0.2-0.1,0.3-0.2c4-1.4,7-5.2,7-9.7C-858.5,1029.2-863.1,1024.6-868.7,1024.6z"/>
                    <path d="M-933.3,966.9c5.8,0,10.7-2,14.8-6.1c4.1-4.1,6.1-8.9,6.1-14.4c0-5.8-2-10.7-6.1-14.8c-4.1-4.1-9-6.1-14.8-6.1
                        c-5.6,0-10.4,2-14.5,6.1c-4.1,4.1-6.1,9-6.1,14.8c0,5.6,2,10.4,6.1,14.4C-943.6,964.9-938.8,966.9-933.3,966.9z"/>
                </g>
            </svg>
            Competidores inscritos
        </a>

        <a href="{{route('eventos.edit',$evento->id)}}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-800 focus:outline-none">

            <svg class="w-4 h-4 ml-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#FFFFFF"/>
            </svg>

                Editar
        </a>

        <button data-modal-toggle="delete-modal{{$evento->id}}" type="button"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-red hover:bg-secondary-red focus:ring-2 focus:ring-secondary-red focus:outline-none">

            <svg class="w-4 h-4 ml-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12V17" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14 12V17" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 7H20" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            Eliminar

        </button>


    </div>
    @endauth

</div>
