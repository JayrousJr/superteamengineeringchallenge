<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden sm:rounded-lg">
        <div class="max-w-xl mx-auto mt-6 p-6 bg-white rounded-lg">
            <div class="max-w-xl mx-auto mt-6">
                @if (session('success'))
                    <div class="mb-4 text-green-700 bg-green-100 p-3 rounded shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 text-red-700 bg-red-100 p-3 rounded shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('sales.store') }}" class="bg-white p-6 rounded shadow">
                    @csrf
                    <div class="mb-4">
                        <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                        <select name="product_id" id="product_id" class=" mt-1 block w-full rounded border-gray-300">
                            <option value="">-- Select a product --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ old("product_id") == $product->id ? 'selected' : ""}}>
                                    {{ $product->name }} (Available {{ $product->quantity }} - Price:
                                    Tsh {{ $product->price }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <x-input-label for="quantity" value="Quantity" />
                        <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                            :value="old('quantity')" autofocus />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="amount" value="Selling Price" />
                        <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount"
                            :value="old('amount')" autofocus />
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                            Add Product
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>