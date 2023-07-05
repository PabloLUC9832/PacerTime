<div id="popup-modal-gallery{{$evento->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow bg-gray-700">

            <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-600">
                <h3 class="text-white text-lg font-medium">
                    {{$evento->nombre}}
                </h3>
                <button type="button" class="text-gray-400 bg-gray-600 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:text-white" data-modal-hide="popup-modal-gallery{{$evento->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            @php

                $path = "{$evento->imagen}";
                $disk = Storage::disk('azure');
                $files = $disk->files($path);
                $listFiles = array();
                foreach ($files as $file){
                    $filename = "$file";
                    $item = array(
                        'name' => $filename,
                    );
                    array_push($listFiles,$item);
                }
                //dd($listFiles);
                //die();
            @endphp

            <div class="grid grid-cols-2 gap-2 mx-1">

                @foreach($listFiles as $img)
                    <div>
                        <img class="h-auto max-w-full rounded-lg mb-1"
                             src="https://pacertime.blob.core.windows.net/files/{{$img["name"]}}"
                             alt="{{$img["name"]}}">
                    </div>

                @endforeach

            </div>

        </div>
    </div>
</div>
