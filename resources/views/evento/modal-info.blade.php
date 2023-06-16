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


    <!--EDITAR Y ELIMINAR-->
    <div class="grid grid-cols-2 gap-4 sticky bottom-0">

        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

            <svg class="w-4 h-4 ml-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#FFFFFF"/>
            </svg>

            Editar
        </a>

        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

            <svg class="w-4 h-4 ml-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12V17" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14 12V17" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 7H20" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            Eliminar

        </a>

    </div>

</div>
