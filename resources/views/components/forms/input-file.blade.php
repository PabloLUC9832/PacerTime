<div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

    <div class="block md:col-start-1 lg:align-text-bottom">
        <label for="{{$id}}" class="label-input">Imagen</label>
    </div>

    <div class="block mt-3 md:col-start-3 col-end-6">

        <label class="block mb-2 text-sm font-medium text-white" for="file_input">Sube la imagen</label>

        <input class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-primary focus:outline-none" aria-describedby="file_input_help" id="{{$id}}" type="file" name="{{$name}}" accept="image/*" multiple>

        <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

    </div>

</div>
