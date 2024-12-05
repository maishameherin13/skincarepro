<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg">
                <!-- Header -->
                <div class="text-center py-10 bg-indigo-600 rounded-t-lg">
                    <h1 class="text-5xl font-bold text-white">Your Skincare Recommendations</h1>
                    <p class="mt-4 text-lg text-indigo-200">Based on your quiz answers, we've created a personalized plan just for you.</p>
                </div>

                <!-- Content -->
                <div class="px-6 py-10 space-y-10">
                    <!-- Skin Type Section -->
                    <section>
                        <h2 class="text-3xl font-semibold text-indigo-800">Your Skin Type</h2>
                        <div class="mt-4 p-6 bg-indigo-50 rounded-lg shadow">
                            <p class="text-gray-800 text-lg font-medium">Normal to Oily Skin</p>
                        </div>
                    </section>

                    <!-- Recommended Ingredients Section -->
                    <section>
                        <h2 class="text-3xl font-semibold text-indigo-800">Recommended Ingredients</h2>
                        <div class="mt-4 p-6 bg-indigo-50 rounded-lg shadow">
                            <ul class="list-disc list-inside space-y-2 text-gray-800">
                                <li>Salicylic Acid</li>
                                <li>Niacinamide</li>
                                <li>Green Tea Extract</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Skincare Tips Section -->
                    <section>
                        <h2 class="text-3xl font-semibold text-indigo-800">Skincare Tips</h2>
                        <div class="mt-4 p-6 bg-indigo-50 rounded-lg shadow">
                            <ul class="list-disc list-inside space-y-2 text-gray-800">
                                <li>Cleanse your face twice daily to control oil buildup.</li>
                                <li>Incorporate niacinamide into your routine for better pore control.</li>
                                <li>Use a lightweight, gel-based moisturizer.</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Action Buttons -->
                    <div class="flex justify-center gap-6 mt-3">
                        <a href="{{ route('quiz') }}" class="inline-block rounded-lg bg-indigo-600 px-8 py-4 text-s font-semibold text-black shadow hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                            Retake Quiz
                        </a>
                        <a href="{{ route('products') }}" class="inline-block rounded-lg bg-green-500 px-8 py-4 text-s font-semibold text-black shadow hover:bg-green-600 focus:ring-4 focus:ring-green-300">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
