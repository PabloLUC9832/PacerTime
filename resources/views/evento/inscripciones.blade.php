@extends('layouts.evento')

@section('title', 'Competidores inscritos')

@section('content')

    {{ Breadcrumbs::render('inscripciones',$evento) }}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($evento->competidores as $competidor)
            <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">

                <td scope="row" class="px-6 py-4">
                     {{$competidor->nombre}}
                </td>
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
                    <a href="#" class="font-medium text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection
