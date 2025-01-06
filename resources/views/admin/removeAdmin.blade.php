@extends('layouts.admin-layout')

@section('content')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl font-bold text-gray-900">
            Remove Admins
        </div>

        <div class="mt-6 text-gray-500">
            @if(session('status'))
                <div class="mt-6 text-green-500">
                    {{ session('status') }}
                </div>
            @endif

            <!-- List all admins -->
            <div class="mt-6">
                @if($admins->isEmpty())
                    <p>No admins available to remove.</p>
                @else
                    <ul>
                        @foreach($admins as $admin)
                            <li class="flex items-center justify-between py-2">
                                <span>{{ $admin->name }} ({{ $admin->email }})</span>

                                <!-- Remove Admin Button -->
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
