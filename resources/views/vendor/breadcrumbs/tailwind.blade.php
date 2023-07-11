@unless ($breadcrumbs->isEmpty())

<nav class="flex ml-6 mb-2" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)

                <li class="inline-flex items-center">

                    <a href="{{ $breadcrumb->url }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-white">
                        {{--
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        --}}
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @else

                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="ml-1 text-sm font-medium text-gray-400">{{ $breadcrumb->title }}</span>
                    </div>
                </li>

            @endif

                @unless($loop->last)
                    <li class="text-gray-500">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </li>
                @endif

        @endforeach
    </ol>
</nav>

@endunless
