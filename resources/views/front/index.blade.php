<x-front-layout>

    <!-- Slider -->
    <section class="relative bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/fondo1.jpg') }}'); height: 100%;">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <!-- Buscador de vuelos -->
        <div class="relative w-2/5 px-4 py-16 sm:px-6 lg:px-8 ml-20">
            <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Buscador de vuelos</h2>
                <form class="space-y-4">
                    <div class="flex items-center mb-4 text-gray-700">
                        <input type="radio" name="trip" id="roundtrip" class="mr-2" checked>
                        <label for="roundtrip" class="mr-4">Ida y vuelta</label>
                        <input type="radio" name="trip" id="oneway" class="mr-2">
                        <label for="oneway">Solo ida</label>
                    </div>
                    <div class="flex flex-col">
                        <label class="flex-1">
                            <span class="block text-gray-700">Origen</span>
                            <input type="text" placeholder="Ingresa desde dónde viajas"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </label>
                        <label class="flex-1">
                            <span class="block text-gray-700">Destino</span>
                            <input type="text" placeholder="Ingresa hacia dónde viajas"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </label>
                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-4">
                        <label class="flex-1">
                            <span class="block text-gray-700">Ida</span>
                            <input type="date"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-500">
                        </label>
                        <label class="flex-1">
                            <span class="block text-gray-700">Vuelta</span>
                            <input type="date"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-500">
                        </label>
                    </div>
                    <div>
                        <label>
                            <span class="block text-gray-700">Pasajeros</span>
                            <input type="text" value="1 Pasajero, Económica"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-500">
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="px-6 py-2 size-full bg-blue-600 text-white rounded-md hover:bg-blue-700 flex items-center justify-center">
                            <i class="fa-solid fa-magnifying-glass"></i> &nbsp; Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Promoción -->
    {{-- <section class="py-16">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Disfruta de nuestra promoción del mes</h2>
            <p class="text-gray-700 mb-8">Disfruta de increíbles descuentos en vuelos internacionales durante todo
                el mes de junio. No esperes más, reserva tu vuelo hoy mismo y prepárate para una experiencia
                inolvidable.</p>
            <p class="text-gray-700 mb-8 font-bold">25% de descuento en vuelos a destinos nacionales e
                internacionales.</p>
            <img src="assets/img/promo.jpg" alt="Promoción 25%" class="mx-auto">
        </div>
    </section> --}}

    <!-- Promoción modificacion -->
    <section class="container mx-auto px-10 py-16">
        <div class="grid sm:grid-cols-1 md:grid-cols-12">
            <div class="md:col-start-2 md:col-span-4 md:mx-5">
                <h2 class="text-3xl font-bold mb-4">Disfruta de nuestra promoción del mes</h2>
                <p class="text-gray-700 mb-8">Disfruta de increíbles descuentos en vuelos internacionales durante
                    todo el mes de junio. No esperes más, reserva tu vuelo hoy mismo y prepárate para una
                    experiencia inolvidable.</p>
                <p class="text-gray-700 mb-8 font-bold">25% de descuento en vuelos a destinos nacionales e
                    internacionales.</p>
            </div>
            <div class="md:col"></div>
            <div class="md:col-span-4">
                <img src="{{ asset('assets/img/promo.jpg') }}" alt="Promoción 25%" class="mx-auto w-full rounded-md">
            </div>
        </div>
    </section>

    <!-- Info -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-6">
                <div class="text-3xl mb-2">✈️</div>
                <h3 class="text-xl font-bold">Estado de vuelo</h3>
                <p class="text-gray-700">Revisa el estado de tu próximo vuelo.</p>
            </div>
            <div class="p-6">
                <div class="text-3xl mb-2">📝</div>
                <h3 class="text-xl font-bold">Requisitos para volar</h3>
                <p class="text-gray-700">Conoce aquí los requisitos para llegar sin contratiempos a tu destino.</p>
            </div>
            <div class="p-6">
                <div class="text-3xl mb-2">🏷️</div>
                <h3 class="text-xl font-bold">Promociones</h3>
                <p class="text-gray-700">Revisa todas nuestras promociones y escoge la mejor para ti.</p>
            </div>
        </div>
    </section>

</x-front-layout>