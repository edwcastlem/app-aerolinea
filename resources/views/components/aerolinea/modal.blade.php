<div x-data="{ isOpen: false }">
    <button @click="isOpen = true">Open Modal</button>

    <div x-show="isOpen" x-on:click.away="isOpen = false" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-white w-1/2 p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Modal Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <button @click="isOpen = false" class="mt-4 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">Close</button>
        </div>
    </div>
</div>