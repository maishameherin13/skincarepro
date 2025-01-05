<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Content Area -->
        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <!-- Account Name and Logout -->
                <div class="flex justify-between items-center p-6 border-b border-gray-200">
                    <div class="text-lg font-semibold text-gray-900">
                        {{ Auth::user()->name }} <!-- Display logged in account name -->
                    </div>
                    <div>
                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 border-none">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Render additional content here -->
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
