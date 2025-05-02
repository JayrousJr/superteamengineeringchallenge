<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="max-w-md mx-auto mt-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href={{ route("products.create") }} class="bg-green-500 text-white px-3 py-2 rounded-md"> Create
                        Product</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>