<div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

    <div class="block md:col-start-1">
        <label for="{{$id}}" class="label-input">{{$message}}</label>
        @if($required)
            <span class="text-xs italic text-primary-red font-semibold">
                Obligatorio
             </span>
        @endif
    </div>


    <div class="block mt-3 md:col-start-3 col-end-6">
        <input type="text" name="{{$name}}" id="{{$id}}" class="bg-primary text-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm {{$class}}" {{$required}} value="{{ old($name,$value) }}">
    </div>

</div>
