<x-front-layout>

    <main class="bg-gray-100">
        <div class="container mx-auto w-96 py-10">
            
            <div class="mb-4 text-sm text-gray-600">
                ¿Olvidaste tu contraseña? Escribe tu email y le enviaremos un enlace para restablecer su contraseña.
            </div>
        
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        Correo de recuperación
                    </x-primary-button>
                </div>
            </form>
        </div>
    </main>

</x-front-layout>