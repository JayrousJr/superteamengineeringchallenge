<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                    class="max-w-md mx-auto mt-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md shadow">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                    class="max-w-md mx-auto mt-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded-md shadow">
                    {{ session('error') }}
                </div>
            @endif
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">All Sales</h3>
                    <a href="{{ route('sales.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">+ Make Sale</a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Recorded By</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sold At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($sales as $sale)
                            <tr>
                                <td class="px-4 py-3">{{ $sale->product->name }}</td>
                                <td class="px-4 py-3">{{ $sale->quantity }}</td>
                                <td class="px-4 py-3">{{ $sale->amount }}</td>
                                <td class="px-4 py-3">{{ $sale->user->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $sale->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center text-gray-500">No sale found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>