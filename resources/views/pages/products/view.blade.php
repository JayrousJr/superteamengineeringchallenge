<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="max-w-xl mx-auto mt-6 p-6 bg-white rounded-lg">
                    <div class="p-6 text-gray-900">
                        Update {{$product->name}} Product
                    </div>
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @method('PUT')
                        @csrf
                        <!-- Product Name -->
                        <div class="mt-4">
                            <x-input-label for="name" value="Product Name" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ $product->name }}" autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" value="Price" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                                value="{{ $product->price }}" min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="quantity" value="Quantity" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                                value="{{ $product->quantity }}" min="0" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" value="PRoduct Description" />
                            <textarea id="description" class="block mt-1 w-full" name="description"
                                value="{{ $product->description }}"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <!-- Submit -->
                        <div class="mt-6">
                            <x-primary-button class="w-full justify-center">
                                Update Product
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>