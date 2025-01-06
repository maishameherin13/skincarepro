@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Manage Admins
        </div>

        <div class="mt-6 text-gray-500">
        </div>

        <!-- Display success message if any -->
        @if(session('status'))
            <div class="mt-6 text-green-500">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex mt-6 space-x-4">
            <!-- Link to the Add Admin form -->
            <a href="{{ route('admin.addAdmin') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                Add Admin
            </a>
        </div>
    </div>
@endsection