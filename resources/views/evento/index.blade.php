@extends('layouts.evento')

@section('title', 'Inicio | Pacer Time')

@section('content')

    <form action="{{route('eventos.index')}}" method="GET" value="{{$search}}" class="flex items-center mb-4">

        <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Buscar</label>
        <div class="relative w-full">

            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <input name="search" type="search" id="default-search"
                   class="block w-full p-4 pl-10 text-sm text-white border border-gray-600 rounded-lg bg-gray-700 focus:ring-secondary-yellow focus:border-secondary-yellow placeholder-gray-400" placeholder="Ingresa cualquier palabra para buscar" value="{{old('',$search)}}">

        </div>

        <button type="submit"
                class="p-4 ml-2 text-sm font-medium text-white bg-primary-yellow rounded-lg hover:bg-secondary-yellow focus:ring-2 focus:outline-none focus:ring-secondary-yellow">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Buscar</span>
        </button>

    </form>

    @if(count($eventos)>1)
        <p class="text-white mb-2 text-sm"> Se han encontrado {{ count($eventos)  }} eventos.</p>
    @else
        <p class="text-white mb-2 text-sm"> Se ha encontrado {{ count($eventos)  }} evento.</p>
    @endif

    @if(session()->has('message'))

        @include('evento.success-message',['message'=> session()->get('message') ])

    @endif

    @if(count($eventos)<=0)
        <p class="text-xl font-bold text-white">
            No se ha encontrado eventos :(. <a href="{{route('eventos.create')}}" class="text-blue-500 hover:underline">Añadir evento</a>
        </p>
    @else

        {{--<div class="grid grid-cols-3 gap-2 sm:grid sm:grid-cols-6 md:grid md:grid-cols-12">--}}
        <div class="grid grid-cols-3 gap-2 sm:grid sm:grid-cols-6 md:grid md:grid-cols-9">

                @foreach($eventos as $key => $evento)

                    @include('evento.card-event')


                    @include('evento.modal-info')
                    @include('evento.modal-eliminar',['id' => $evento->id, 'nombre' => $evento->nombre, 'ruta' => 'eventos.destroy'])

                @endforeach
        </div>

    @endif

@endsection
