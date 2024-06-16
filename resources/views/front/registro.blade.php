<x-front-layout>

    <div class="container mx-auto w-96 py-10">
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <!-- Nombres -->
            <div>
                <x-input-label for="nombres" :value="__('Nombres')" />
                <x-text-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
                <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
            </div>
    
            <!-- Apellidos -->
            <div class="mt-4">
                <x-input-label for="apellidos" :value="__('Apellidos')" />
                <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
            </div>
    
            <!-- Dni -->
            <div class="mt-4">
                <x-input-label for="dni" :value="__('Dni')" />
                <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus autocomplete="dni" />
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>
    
            <!-- Fecha Nacimiento -->
            <div class="mt-4">
                <x-input-label for="fechaNac" :value="__('Fecha Nacimiento')" />
                {{-- <x-text-input id="fechaNac" class="block mt-1 w-full" type="text" name="fechaNac" :value="old('fechaNac')" required autofocus autocomplete="fechaNac" /> --}}
                <input type="text" id="fechaNac" name="fechaNac" placeholder="dd/mm/yyyy" class="placeholder-gray-300 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    required autofocus autocomplete="fechaNac" value="{{ old('fechaNac') }}">
                <x-input-error :messages="$errors->get('fechaNac')" class="mt-2" />
            </div>
    
            <!-- Telefono -->
            <div class="mt-4">
                <x-input-label for="telefono" :value="__('Telefono')" />
                <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" value="Contraseña" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" value="Confirmar contraseña" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    Estas registrado?
                </a>
    
                <x-primary-button class="ms-4">
                    Registrar
                </x-primary-button>
            </div>
        </form>
    </div>
    
</x-front-layout>