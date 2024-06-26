<x-front-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = "text-2xl">Bienvenido!!!!!</h1>

                    <p class="py-4">Desde aqui podrás ver tus reservaciones y demas opciones</p>

                    <form method="GET" action="{{ route('profile.edit') }}">
                        <x-primary-button>
                            Editar perfil
                        </x-primary-button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>

</x-front-layout>