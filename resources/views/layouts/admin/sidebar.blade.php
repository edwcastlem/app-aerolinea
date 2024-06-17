@php
    $links = [
        [
            'name' => 'Inicio',
            'url' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-house',
            'active' => request()->routeIs('admin.dashboard')
        ],
        [
            'name' => 'Gestión de vuelos',
            'url' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-plane-departure',
            'active' => request()->routeIs('admin.vuelos')
        ],
        [
            'name' => 'Gestión de aeronaves',
            'url' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-plane-circle-check',
            'active' => request()->routeIs('admin.aviones')
        ],
        [
            'name' => 'Tripulación',
            'url' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-users-gear',
            'active' => request()->routeIs('admin.tripulacion')
        ],
        [
            'name' => 'Reservas',
            'url' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-calendar-days',
            'active' => request()->routeIs('admin.reservas')
        ],
        [
            'name' => 'Usuarios',
            'url' => route('admin.usuarios.index'),
            'icon' => 'fa-solid fa-user-group',
            'active' => request()->routeIs('admin.usuarios.index')
        ]
    ];
@endphp


<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="false" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-8 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <hr class="w-full mx-auto mb-6 h-0.5 border-0 bg-gradient-to-r from-teal-800 via-gray-400 to-teal-800">
        <a href="#" class="flex items-center justify-center ps-2.5 mb-5">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Aerolíneas ACME</span>
        </a>
        <hr class="w-full mx-auto my-6 h-0.5 border-0 bg-gradient-to-r from-teal-800 via-gray-400 to-teal-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['url'] }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-200 hover:text-gray-900 {{ $link['active'] ? 'bg-gray-200 text-gray-900' : 'text-white' }}">
                        <i class="{{ $link['icon'] }} text-lg size-8 pl-1"></i>
                        <span class="ms-3">{{ $link['name'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endpush