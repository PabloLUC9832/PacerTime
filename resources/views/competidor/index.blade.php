@extends('layouts.evento')

@section('title', 'Inicio | Pacer Time')

@section('content')

    <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

            @foreach($eventos as $key => $evento)
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{ $urls[$key][0] }}"
                         class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{$evento['nombre']}}">

                    <a href="{{ route('competidor.show',$evento->slug) }}"
                       class="absolute right-2.5 bottom-0 focus:outline-none text-white bg-primary-yellow hover:bg-yellow-500 focus:ring-4 focus:ring-secondary-yellow font-medium rounded-lg text-sm px-5 py-2.5 mr-8 mb-8">
                        Ir al evento
                    </a>

                </div>
            @endforeach

        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            @foreach($eventos as $key => $evento)
                <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="true" aria-label="Slide {{$key}}" data-carousel-slide-to="{{$key}}"></button>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60
            group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

@endsection
