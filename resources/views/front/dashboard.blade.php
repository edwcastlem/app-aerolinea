<x-front-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bienvenido!!!!!

                    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'example-modal')" x-on:click.away="exampleModal = false">
                        Open Modal
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <x-modal name="example-modal" focusable>
        <div class="p-6">
            <button id="closeModal" class="absolute top-2 right-5 text-3xl text-gray-500 hover:text-gray-800" x-on:click="$dispatch('close')">&times;</button>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to continue?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('This action is irreversible.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>
</x-front-layout>