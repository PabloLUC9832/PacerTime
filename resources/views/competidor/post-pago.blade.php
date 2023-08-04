@extends('layouts.evento')

@section('title', 'Bienvenido al evento')

@section('content')

    <div class="grid items-center">

        <p class="text-white">

            @switch($status)

                @case('approved')
                    {{$message}}
                    @break

                @case('pending')
                @case('in_process')
                    {{$message}}
                    @break

                @case('rejected')
                    {{$message}}
                    @break

            @endswitch

        </p>
    </div>

@endsection
