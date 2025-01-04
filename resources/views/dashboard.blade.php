<x-app-layout>
    <x-slot name="header">
        {{-- <div class="bg-gradient-to-r from-indigo-600 to-purple-600 py-6 shadow-lg">
            <h2 class="font-semibold text-3xl text-white leading-tight text-center">
                {{ __('Dashboard') }}
            </h2>
        </div> --}}
        @if($result)
            <body class="flex items-center justify-center min-h-screen">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center bg-white-50">
             <div class="md:w-1/2 text-center md:text-left">
              <h1 class="title text-4xl md:text-5xl lg:text-5xl font-bold text-pink-300 leading-tight mb-4">
                {{ __('Your Skincare Recommendations') }}
              </h1>
              <p class="text-lg text-gray-700 mb-6">
                Based on your quiz answers, we’ve created a personalized plan just for you.
              </p>
              <div class="flex justify-center md:justify-start space-x-4">
                <a href="{{ route('products') }}" class="inline-block">
                    <button class="bg-pink-400 text-white py-2 px-6 rounded-full">
                        SHOP NOW
                    </button>
                </a>
                <a href="{{ route('tasks.index') }}" class="inline-block">
                    <button class="bg-pink-400 text-white py-2 px-6 rounded-full">
                        Create Your To-Do list
                       </button>
                </a>
               
              </div>
              <div class="flex justify-center md:justify-start space-x-2 mt-6">
               <span class="w-3 h-3 bg-pink-600 rounded-full inline-block">
               </span>
               <span class="w-3 h-3 bg-gray-300 rounded-full inline-block">
               </span>
               <span class="w-3 h-3 bg-gray-300 rounded-full inline-block">
               </span>
              </div>
             </div>
             <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
              <img alt="A woman with clear skin touching her face" class="w-full h-auto object-cover" height="800" src="https://storage.googleapis.com/a1aa/image/UllANhiLesyjDa089RI2GvGm8cMQZc7uiPjW1m2ejRaHNEBUA.jpg" width="600"/>
             </div>
            </div>
        </body>
    @endif
    </x-slot>
    
    <div class="py-0 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-6xl mx-auto px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-8 text-gray-900">
                    @if($result)
                        <!-- Recommendations Content -->
                        <div class="space-y-10">
                            <!-- Skin Type Section -->
                            <section>
                                <h3 class="text-2xl font-semibold text-pink-400 mb-4">Your Skin Type</h3>
                                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                                    <p class="text-lg text-gray-700">{{ $result->skin_type }}</p>
                                </div>
                            </section>

                            <!-- Recommended Ingredients Section -->
                            <section>
                                <h3 class="text-2xl font-semibold text-pink-400 mb-4">Recommended Ingredients</h3>
                                <div class="space-y-4">
                                    @foreach($ingredients as $ingredient)
                                        <div class="ingredient-card p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow">
                                            <button class="ingredient-toggle flex justify-between items-center w-full text-left font-semibold text-xl text-gray-800 focus:outline-none">
                                                <span>{{ $ingredient->ingredient_name }}</span>
                                                <span class="icon text-gray-500 text-xl">+</span>
                                            </button>
                                            <div class="ingredient-content hidden mt-2 text-lg text-gray-600">
                                                <p>{{ $ingredient->ingredient_description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>

                            <!-- Skincare Tips Section -->
                            <section>
                                <h3 class="text-2xl font-semibold text-pink-400 mb-4">Skincare Tips</h3>
                                <div class="space-y-4">
                                    @foreach($tips as $tip)
                                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow">
                                            <p class="text-lg text-gray-700">✨ {{ $tip }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>

                        <!-- Images Section -->
                        {{-- <div class="mt-12">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Recommended Products</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                                @foreach($productImages as $image)
                                    <div class="overflow-hidden rounded-lg shadow-md transition-transform transform hover:scale-105">
                                        <img src="{{ $image }}" alt="Product Image" class="w-full h-auto">
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}

                        <!-- Retake Quiz Button -->
                        <div class="mt-12 text-center">
                            <a href="{{ route('quiz') }}" class="inline-block">
                                <button class="rounded-full bg-pink-400 px-6 py-3 text-lg font-semibold text-white shadow-md hover:bg-indigo-500 transition-all">
                                    Retake Quiz
                                </button>
                            </a>
                        </div>
                    @else
                        <!-- No Quiz Results Section -->
                        <div class="text-center">
                            <p class="text-lg mb-6 text-gray-700">
                                You haven’t taken the quiz yet. Take the quiz to evaluate your skin concerns.
                            </p>
                            <a href="{{ route('quiz') }}" class="inline-block">
                                <button class="rounded-full bg-purple-600 px-6 py-3 text-lg font-semibold text-white shadow-md hover:bg-purple-500 transition-all">
                                    Take the Quiz
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle ingredient content
        const ingredientCards = document.querySelectorAll('.ingredient-card');
      
        ingredientCards.forEach(card => {
          const toggleButton = card.querySelector('.ingredient-toggle');
          const content = card.querySelector('.ingredient-content');
          const icon = toggleButton.querySelector('.icon');
      
          toggleButton.addEventListener('click', () => {
            content.classList.toggle('hidden');
            icon.textContent = content.classList.contains('hidden') ? '+' : '-';
          });
        });
    </script>
</x-app-layout>
