<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to Tunzaa MAuzo!") }}
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                <!-- Products -->
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
                    <h2 class="text-gray-700 text-sm uppercase font-bold">Products</h2>
                    <p class="text-3xl font-semibold mt-2 text-blue-700">{{ $prodCount }}</p>
                </div>

                <!-- Users -->
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
                    <h2 class="text-gray-700 text-sm uppercase font-bold">Users Registreded</h2>
                    <p class="text-3xl font-semibold mt-2 text-green-700">{{ $userCount }}</p>
                </div>

                <!-- Sales -->
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
                    <h2 class="text-gray-700 text-sm uppercase font-bold">Sales</h2>
                    <p class="text-3xl font-semibold mt-2 text-yellow-700">{{ $selCount }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>