@extends('layouts.evento')

@section('title', 'Inicio | Pacer Time')

@section('content')

    {{--<form action="{{route('eventos.index')}}" method="GET" value="{{$search}}" class="flex items-center mb-4">--}}
    <form action="{{route('eventos.index')}}" method="GET" value="{{$search}}" class="mb-4">

        <div class="flex items-center mb-4">

            <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Buscar</label>
            <div class="relative w-full">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <input name="search" type="search" id="default-search"
                       class="block w-full p-4 pl-10 text-sm text-white border border-gray-600 rounded-lg bg-gray-700 focus:ring-secondary-yellow focus:border-secondary-yellow placeholder-gray-400"
                       placeholder="Ingresa cualquier palabra para buscar" value="{{old('',$search)}}">

            </div>

            <button type="submit"
                    class="p-4 ml-2 text-sm font-medium text-white bg-primary-yellow rounded-lg hover:bg-secondary-yellow focus:ring-2 focus:outline-none focus:ring-secondary-yellow">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Buscar</span>
            </button>

        </div>


        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                        class="flex items-center justify-between w-full md:w-36 p-2 font-normal text-left text-gray-400 border rounded-md border-gray-700 rounded-t-xl hover:bg-gray-800"
                        data-accordion-target="#accordion-collapse-body-1"
                        aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>Filtros</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-t-0 md:border md:border-2 rounded-b-md border-gray-700 bg-gray-900">

                    <div class="flex items-center mb-1.5">
                        <input id="default-checkbox" type="checkbox" name="deleted" value="true"
                               class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2"
                               {{Cache::has('deleted') ? 'checked' : ''}} >

                        <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-300">Eventos eliminados</label>
                    </div>

                </div>
            </div>
        </div>

    </form>

    @if(session()->has('message'))

        @include('evento.success-message',['message'=> session()->get('message') ])

    @endif

    @if(count($eventos)<=0)
        <p class="text-xl font-bold text-white">
            No se ha encontrado eventos :(. <a href="{{route('eventos.create')}}" class="text-blue-500 hover:underline">Añadir evento</a>
        </p>
    @else

        <div class="grid grid-cols-3 gap-2 sm:grid sm:grid-cols-6 md:grid md:grid-cols-9">

                @foreach($eventos as $key => $evento)

                    @include('evento.card-event')


                    @include('evento.modal-info')
                    @include('evento.modal-eliminar',['id' => $evento->id, 'nombre' => $evento->nombre, 'ruta' => 'eventos.destroy'])

                @endforeach
        </div>

        {{ $eventos->links() }}

    @endif

@endsection
