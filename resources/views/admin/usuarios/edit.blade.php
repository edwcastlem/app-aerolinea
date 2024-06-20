<form action="{{ $user->exists ? route('admin.usuario.update', $user) : route('admin.usuario.store') }}" method="POST">
    @csrf
    @if($user->exists)
        @method('PUT')
    @endif

    <div>
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres" value="{{ old('nombres', $user->nombres) }}" required>
    </div>

    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $user->apellidos) }}" required>
    </div>

    <div>
        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni" value="{{ old('dni', $user->dni) }}" required>
    </div>

    <div>
        <label for="fechaNac">Fecha de Nacimiento</label>
        <input type="date" id="fechaNac" name="fechaNac" value="{{ old('fechaNac', $user->fechaNac ? $user->fechaNac->format('Y-m-d') : '') }}" required>
    </div>

    <div>
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $user->telefono) }}" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" {{ $user->exists ? '' : 'required' }}>
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" {{ $user->exists ? '' : 'required' }}>
    </div>

    <button type="submit">{{ $user->exists ? 'Actualizar' : 'Crear' }}</button>
</form>