@extends('layouts.evento')

@section('title', 'Competidores inscritos')
@section('subtitle', 'Competidores inscritos')

@section('content')

    {{ Breadcrumbs::render('inscripciones',$evento) }}

    <form action="{{route('eventos.inscripciones',$evento->slug)}}" method="GET" value="{{$search}}" class="mb-4">
        <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input name="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-white border border-gray-600 rounded-lg bg-gray-700 focus:ring-secondary-yellow focus:border-secondary-yellow placeholder-gray-400" placeholder="Ingresa cualquier palabra para buscar" value="{{old('',$search)}}">

            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-primary-yellow hover:bg-secondary-yellow focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Buscar</button>

        </div>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        {{--@if(count($evento->competidores)<=0 || count($competidores)<=0)--}}
        @if(count($evento->competidores)<=0)

            <p class="text-xl font-bold text-white">
                Aún no hay competidores inscritos :(. <br>
                Comparte el evento para que se inscriban
                <a id="link" href="{{ url(route('competidor.show',$evento->slug))  }}" class="font-medium text-blue-500 hover:underline">
                    {{ url(route('competidor.show',$evento->slug))  }}
                </a>

            </p>

        @else

        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs text-gray-400 uppercase bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teléfono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoría
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Distancia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Editar</span>
                    </th>
                </tr>
            </thead>
            <tbody>

            @if(empty($search))

                @foreach($evento->competidores as $competidor)
                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4">
                            {{$competidor->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$competidor->apellido}}
                        </td>
                        <td class="px-6 py-4">
                            {{$competidor->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$competidor->telefono}}
                        </td>

                        <td class="px-6 py-4">
                            {{$competidor->sub_evento->categoria}}
                        </td>
                        <td class="px-6 py-4">
                            {{$competidor->sub_evento->distancia}}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach

            @else

                @foreach($competidores as $competidor)
                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4">
                            {{$competidor->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$competidor->apellido}}
                        </td>
                        <td class="px-6 py-4">
                            {{$competidor->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$competidor->telefono}}
                        </td>

                        <td class="px-6 py-4">
                            {{$competidor->sub_evento->categoria}}
                        </td>
                        <td class="px-6 py-4">
                            {{$competidor->sub_evento->distancia}}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach

            @endif

            </tbody>
        </table>

        @endif

    </div>




@endsection
