<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
=======
<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-5xl text-gray-800 leading-tight">
            {{ __('From The Blog:') }}
        </h2>
    
>>>>>>> Stashed changes
<body class="bg-gray-100">
    <!-- Main Container -->
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
>>>>>>> Stashed changes
            <!-- Page Header -->
            <div class="mx-auto max-w-2xl lg:mx-0 text-left">
                <h2 class="text-6xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the Blog</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">Discover insightful content and grow your knowledge with our expert advice.</p>
            </div>
<<<<<<< Updated upstream
=======
            
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-16">
                @foreach ($blogs as $blog)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 overflow-hidden">
                        <!-- Blog Image -->
                        <img src="{{ $blog['image'] ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $blog['title'] }}" class="w-full h-48 object-cover">
                        
                        <!-- Blog Content -->
                        <div class="p-6">
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="{{ $blog['date'] }}" class="text-gray-500">{{ $blog['date'] }}</time>
                                <a href="#" class="rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Blog</a>
                            </div>
                            <h3 class="mt-4 text-lg font-semibold text-gray-900 hover:text-gray-600">
                                <a href="{{ $blog['external_link'] }}" target="_blank">{{ $blog['title'] }}</a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-600">{{ Str::limit($blog['description'], 100) }}</p>
                        </div>
                        
                        <!-- Author Section -->
                        <div class="flex items-center gap-x-4 px-6 py-4">
                            <!--<img src="https://via.placeholder.com/50" alt="Author Image" class="w-10 h-10 rounded-full"> -->
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $blog['author'] }}</p>
                                <p class="text-sm text-gray-600">Contributor</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
<<<<<<< Updated upstream
</html>
=======
</x-slot> 
    
</x-app-layout>
>>>>>>> Stashed changes
