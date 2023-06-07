<section class="space-y-6">
    <header>
        <!--<h2 class="text-lg font-medium text-gray-900">-->
        <h2 class="text-lg font-medium text-gray-100">
            {{ __('Eliminar cuenta') }}
        </h2>

        <!--<p class="mt-1 text-sm text-gray-600">-->
        <p class="mt-1 text-sm text-gray-400">
            {{ __('Una vez que tu cuenta sea eliminada, toda la información se eliminará definitivamente. Antes de eliminar tu cuenta, por favor respalda la información que consideres necesaria.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Eliimar cuenta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <!--<h2 class="text-lg font-medium text-gray-900">-->
            <h2 class="text-lg font-medium text-gray-100">
                {{ __('¿Estás seguro de querer eliminar tu cuenta?') }}
            </h2>

            <!--<p class="mt-1 text-sm text-gray-600">-->
            <p class="mt-1 text-sm text-gray-400">
                {{ __('Una vez que tu cuenta sea eliminada, toda la información se eliminará definitivamente. Antes de eliminar tu cuenta, por favor respalda la información que consideres necesaria.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Contraseña') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
