<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Take the Quiz') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <form method="POST" action="{{ route('quiz') }}">
                      @csrf

                      <!-- Section 1: Demographics -->
                      <div class="mb-4">
                        <label class="block text-gray-700">What is your age?</label>
                        <select name="age" class="mt-2 p-2 border rounded w-full" required>
                            <option value="under_18">Under 18</option>
                            <option value="18-25">18-25</option>
                            <option value="26-30">26-30</option>
                            <option value="31-40">31-40</option>
                            <option value="40_plus">40+</option>
                        </select>
                      </div>
                      <div class="mb-4">
                        <label class="block text-gray-700">What is your gender?</label>
                        <select name="gender" class="mt-2 p-2 border rounded w-full" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="non_binary">Non-Binary</option>
                            <option value="prefer_not_to_say">Prefer not to say</option>
                        </select>
                      </div>
                      <div class="mb-4">
                        <label class="block text-gray-700">What type of climate do you live in?</label>
                        <select name="climate" class="mt-2 p-2 border rounded w-full" required>
                            <option value="hot_and_humid">Hot and humid</option>
                            <option value="cold_and_dry">Cold and dry</option>
                            <option value="moderate">Moderate</option>
                        </select>
                      </div>
                      <div class="mb-4">
                        <label class="block text-gray-700">How often do you spend time outdoors in the sun?</label>
                        <select name="sun_exposure" class="mt-2 p-2 border rounded w-full" required>
                            <option value="rarely">Rarely</option>
                            <option value="occasionally">Occasionally</option>
                            <option value="daily">Daily</option>
                            <option value="all_the_time">All the time</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you wear sunscreen regularly?</label>
                        <select name="sunscreen" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="sometimes">Sometimes</option>
                        </select>
                      </div>

                      <!-- Section 2: Skin Concerns -->
                      <div class="mb-4">
                        <label class="block text-gray-700">How would you describe your skin type?</label>
                        <select name="skin_type" class="mt-2 p-2 border rounded w-full" required>
                            <option value="dry">Dry</option>
                            <option value="oily">Oily</option>
                            <option value="combination">Combination</option>
                            <option value="normal">Normal</option>
                            <option value="sensitive">Sensitive</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you often experience redness or irritation on your skin?</label>
                        <select name="redness" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="occasionally">Occasionally</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you have acne or breakouts?</label>
                        <select name="acne" class="mt-2 p-2 border rounded w-full" required>
                            <option value="never">Never</option>
                            <option value="rarely">Rarely</option>
                            <option value="occasionally">Occasionally</option>
                            <option value="frequently">Frequently</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you have visible dark spots or hyperpigmentation?</label>
                        <select name="dark_spots" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="a_few">A few</option>
                            <option value="many">Many</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Is your skin prone to itchiness or flakiness?</label>
                        <select name="itchiness" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="occasionally">Occasionally</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you have visible fine lines or wrinkles?</label>
                        <select name="wrinkles" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="starting_to_show">Starting to show</option>
                            <option value="many">Many</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Does your skin feel tight or stretched after washing?</label>
                        <select name="skin_tightness" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="occasionally">Occasionally</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you notice oil buildup on your skin during the day?</label>
                        <select name="oil_buildup" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="only_in_t_zone">Only in the T-zone</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you experience dark circles or puffiness under your eyes?</label>
                        <select name="dark_circles" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="occasionally">Occasionally</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you experience skin dullness or lack of glow?</label>
                        <select name="skin_dullness" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="occasionally">Occasionally</option>
                        </select>
                      </div>

                      <div class="mb-4">
                        <label class="block text-gray-700">Do you have uneven skin tone?</label>
                        <select name="uneven_skin_tone" class="mt-2 p-2 border rounded w-full" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            <option value="slightly">Slightly</option>
                        </select>
                      </div>

                      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                          Submit Quiz
                      </button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
