@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Manage Admins
        </div>

        <div class="mt-6 text-gray-500">
            @if(session('status'))
                <div class="mt-6 text-green-500">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Link to Add Admin page -->
            <div class="flex mt-6 space-x-4">
                <a href="{{ route('admin.addAdmin') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                    Add Admin
                </a>
                <!-- Link to Remove Admin page -->
                
            </div>

            <!-- List all admins -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold">Admins List</h3>

                @if($admins->isEmpty())
                    <p class="text-gray-500">No admins found.</p>
                @else
                    <ul class="mt-4">
                        @foreach($admins as $admin)
                            <li class="flex justify-between items-center py-2">
                                <span class="text-gray-800">{{ $admin->name }} ({{ $admin->email }})</span>
                                <form action="{{ route('admin.removeAdminSubmit', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Remove
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
