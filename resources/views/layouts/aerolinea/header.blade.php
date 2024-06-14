<!-- Header -->
<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">ACME</h1>

        <div class="grid grid-cols-2">
            @if(Auth::user())
            <a href="#" class="text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">{{ Auth::user()->nombres }}</a>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout')}} " class="text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                onclick="event.preventDefault();this.closest('form').submit();">Cerrar sesión</a>
            </form>
            @else
                <a href="{{ route('front-login')}}" class="text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"><i class="fa-solid fa-user-large"></i> &nbsp; Iniciar sesión</a>
            @endif
        </div>

    </div>
</header>