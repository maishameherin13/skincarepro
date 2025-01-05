@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Manage Admins
        </div>

        <div class="mt-6 text-gray-500">
            
        </div>
        
        <!-- Buttons to Add/Remove Admins -->
        <div class="flex mt-6 space-x-4">
            <a href="{{ route('admin.addAdmin') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                Add Admin
            </a>
            <a href="{{ route('admin.removeAdmin') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                Remove Admin
            </a>
        </div>
    </div>
@endsection
