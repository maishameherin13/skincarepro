@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Add New Product
        </div>

        <!-- Display Validation Errors -->
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add Product Form -->
        <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <div class="mb-4">
                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('product_name') }}" required>
            </div>

            <!-- Product Price -->
            <div class="mb-4">
                <label for="product_price" class="block text-sm font-medium text-gray-700">Product Price</label>
                <input type="number" name="product_price" id="product_price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('product_price') }}" required>
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <label for="product_description" class="block text-sm font-medium text-gray-700">Product Description</label>
                <textarea name="product_description" id="product_description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('product_description') }}</textarea>
            </div>

            <!-- How to Use -->
            <div class="mb-4">
                <label for="how_to_use" class="block text-sm font-medium text-gray-700">How to Use</label>
                <textarea name="how_to_use" id="how_to_use" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('how_to_use') }}</textarea>
            </div>

            <!-- Product Ingredients -->
            <div class="mb-4">
                <label for="product_ingredients" class="block text-sm font-medium text-gray-700">Product Ingredients</label>
                <textarea name="product_ingredients" id="product_ingredients" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('product_ingredients') }}</textarea>
            </div>

            <!-- Product Image -->
            <div class="mb-4">
                <label for="product_image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Add Product button below the form -->
            <div class="mt-6 text-right">
                <button type="submit" class="bg-green-500 text-white p-4 rounded hover:bg-green-600 transition">
                    Add Product
                </button>
            </div>
        </form>
    </div>
@endsection
