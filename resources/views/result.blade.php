<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Your Skincare Recommendations') }}
        </h2>
        <h3 class="mt-4 text-xl text-gray-600">Based on your quiz answers, we've created a personalized plan just for you.</h3>
    </x-slot>

    {{-- <div class="bg-gray-50 py-12"> --}}
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
            <div class="bg-white shadow-lg sm:rounded-lg">
                <div class="px-6 py-8 sm:px-12 sm:py-16">
                    <!-- Skin Type Section -->
                    <div class="space-y-8">
                        <section>
                            <h3 class="text-2xl font-semibold text-gray-800">Your Skin Type</h3>
                            <div class="mt-4 p-6 bg-gray-100 rounded-lg shadow-sm">
                                <p class="text-lg text-gray-700">{{ $result->skin_type }}</p>
                            </div>
                        </section>

                        <!-- Recommended Ingredients Section -->
                        <section>
                            <h3 class="text-2xl font-semibold text-gray-800">Recommended Ingredients</h3>
                            <div class="mt-4 p-6 bg-gray-100 rounded-lg shadow-sm">
                                <ul class="list-disc pl-6 space-y-2 text-lg text-gray-700">
                                    @foreach($ingredients as $ingredient)
                                        <li>{{ $ingredient }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>

                        <!-- Skincare Tips Section -->
                        <section class="mt-15">
                            <h3 class="text-2xl font-semibold text-gray-800 mt-10">Skincare Tips</h3>
                            <div class="mt-4 p-6 bg-gray-100 rounded-lg shadow-sm">
                                <ul class="list-disc pl-6 space-y-2 text-lg text-gray-700">
                                    @foreach($tips as $tip)
                                        <li>{{ $tip }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Images Section -->
                <div class="px-6 py-8 sm:px-12 sm:py-16 bg-gray-50">
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                        <!-- Example Images, replace with real images -->
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-01.jpg" alt="Example Image 1" class="rounded-lg shadow-md bg-gray-100">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-02.jpg" alt="Example Image 2" class="rounded-lg shadow-md bg-gray-100">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-03.jpg" alt="Example Image 3" class="rounded-lg shadow-md bg-gray-100">
                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-feature-03-detail-04.jpg" alt="Example Image 4" class="rounded-lg shadow-md bg-gray-100">
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
</x-app-layout>
