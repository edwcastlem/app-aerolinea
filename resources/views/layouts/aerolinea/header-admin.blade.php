<header class="w-full bg-white border-b border-gray-200 mb-4">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">

                <x-aerolinea.breadcrumb :links="$linksBreadcrumb">
                </x-aerolinea.breadcrumb>

            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300 items-center"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full mr-3"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">

                            {{ Auth::user()->rol->descripcion }}
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Perfil</a>
                            </li>
                            <li>
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" onclick="event.preventDefault();
                                                this.closest('form').submit();">Salir</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
