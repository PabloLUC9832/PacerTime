@if ($paginator->hasPages())

    <div class="mt-2 grid place-items-center">
        {{--<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">--}}
        <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

            <div>
                <div>
                    <p class="text-sm text-gray-200 leading-5">
                        {!! __('Mostrando') !!}
                        @if ($paginator->firstItem())
                            <span class="font-medium">{{ $paginator->firstItem() }}</span>
                            {!! __('-') !!}
                            <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        {!! __('de') !!}
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        {!! __('resultados') !!}
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex shadow-sm rounded-md mt-2">
                        {{-- Previous Page Link --}}
                        @if (!$paginator->onFirstPage())
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                               class="flex items-center justify-center px-4 h-10 leading-tight text-gray-400 bg-gray-800 border border-gray-700
                                   rounded-l-lg hover:bg-gray-700 hover:text-white"
                               aria-label="{{ __('pagination.previous') }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span
                                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-400 bg-gray-800 border border-gray-700 hover:bg-gray-700 hover:text-white"
                                    >{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <span aria-current="page">
                                            <span
                                                class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-white border
                                                border-gray-700 bg-gray-700 hover:bg-blue-100 hover:text-blue-700">{{ $page }}</span>
                                        </span>
                                    @else
                                        <a href="{{ $url }}"
                                           class="flex items-center justify-center px-4 h-10 leading-tight text-gray-400 bg-gray-800 border border-gray-700 hover:bg-gray-700 hover:text-white"
                                           aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                               class="flex items-center justify-center px-4 h-10 leading-tight text-gray-400 bg-gray-800 border border-gray-700 rounded-r-lg hover:bg-gray-700 hover:text-white"
                               aria-label="{{ __('pagination.next') }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    </span>
                </div>
            </div>
        </nav>

    </div>

@endif
