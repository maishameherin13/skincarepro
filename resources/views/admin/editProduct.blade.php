@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Edit Product
        </div>

        @if(session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <!-- Product Edit Form -->
        <form action="{{ route('admin.updateProduct', $product->product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="product_name" class="block text-gray-700">Product Name</label>
                <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" class="w-full p-2 border" required>
            </div>

            <div class="mb-4">
                <label for="product_price" class="block text-gray-700">Product Price</label>
                <input type="number" id="product_price" name="product_price" value="{{ $product->product_price }}" class="w-full p-2 border" required>
            </div>

            <div class="mb-4">
                <label for="product_description" class="block text-gray-700">Product Description</label>
                <textarea id="product_description" name="product_description" class="w-full p-2 border">{{ $product->product_description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="how_to_use" class="block text-gray-700">How to Use</label>
                <textarea id="how_to_use" name="how_to_use" class="w-full p-2 border">{{ $product->how_to_use }}</textarea>
            </div>

            <div class="mb-4">
                <label for="product_ingredients" class="block text-gray-700">Product Ingredients</label>
                <textarea id="product_ingredients" name="product_ingredients" class="w-full p-2 border">{{ $product->product_ingredients }}</textarea>
            </div>

            <div class="mb-4">
                <label for="product_image" class="block text-gray-700">Product Image</label>
                <input type="file" id="product_image" name="product_image" class="w-full p-2 border">
                @if ($product->product_image)
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" class="mt-2" width="100">
                @endif
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
