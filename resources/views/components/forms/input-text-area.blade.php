<div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

    <div class="block md:col-start-1">
        <label for="descripcion" class="label-input">Descripción</label>
        <span class="text-xs italic text-primary-red font-semibold	">
            Obligatorio
         </span>
    </div>

    <div class="block mt-3 md:col-start-3 col-end-6">
        <div class="mt-1">
            <textarea id="{{$id}}" name="{{$name}}" rows="3" class="text-white bg-primary mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Describe el evento" required >{{ old($name) }}</textarea>
        </div>
    </div>

</div>
