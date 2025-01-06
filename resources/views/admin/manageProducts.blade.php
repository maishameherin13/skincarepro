@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Manage Products
        </div>

        @if(session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif
        
        <!-- Table of Products -->
        <div class="mt-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Product ID</th>
                        <th class="px-4 py-2 border">Product Name</th>
                        <th class="px-4 py-2 border">Product Price</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="px-4 py-2 border">{{ $product->product_id }}</td>
                            <td class="px-4 py-2 border">{{ $product->product_name }}</td>
                            <td class="px-4 py-2 border">{{ $product->product_price }}</td>
                            <td class="px-4 py-2 border">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.editProduct', $product->product_id) }}" class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <!-- Delete Button (use a form to send DELETE request) -->
                                <form action="{{ route('admin.deleteProduct', $product->product_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
