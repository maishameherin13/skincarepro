@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Admin Dashboard
        </div>

        <div class="mt-6 text-gray-500">
    
        </div>
        
        <!-- Updated buttons -->
        <div class="flex mt-6 space-x-4">
            <a href="{{ route('admin.manageAdmins') }}" class="bg-blue-500 text-white p-4 rounded hover:bg-blue-600 transition">
                Manage Admins
            </a>
            <a href="{{ route('admin.manageProducts') }}" class="bg-green-500 text-white p-4 rounded hover:bg-green-600 transition"> <!-- Updated href -->
                Manage Products
            </a>
        </div>
    </div>
@endsection
