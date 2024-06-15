@php
    $actual = 0;
    $nroElementos = count($links);
@endphp

<!-- Breadcrumb -->
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        @forelse ($links as $texto => $url)
            @if ($actual == 0)
                <li class="inline-flex items-center">
                    <a href="{{ $url }}"
                        class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-sky-500">
                        <i class="fa-solid fa-house me-2.5"></i>
                        {{ $texto }}
                    </a>
                </li>
            @elseif ($actual == $nroElementos - 1)
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fa-solid fa-angle-right text-gray-400 mx-1"></i>
                        <span
                            class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $texto }}</span>
                    </div>
                </li>
            @else
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-angle-right text-gray-400 mx-1"></i>
                        <a href="{{ $url }}"
                            class="ms-1 text-sm font-medium text-gray-900 hover:text-sky-500 md:ms-2">{{ $texto }}</a>
                    </div>
                </li>
            @endif
            @php $actual++ @endphp
        @empty
        <li class="inline-flex items-center">
            <a href="#"
                class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-sky-500">
                <i class="fa-solid fa-house me-2.5"></i>
                Inicio
            </a>
        </li>
        @endforelse      
    </ol>
</nav>