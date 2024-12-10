<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Take the Quiz') }}
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Skin Assessment Quiz</h1>
                  <form method="POST" action="{{ route('quiz.submit') }}" class="space-y-6">
                      @csrf

                      <!-- Question 1 -->
                      <div>
                          <label for="skin_type" class="block text-lg font-medium text-gray-700">How would you describe your skin type?</label>
                          <select id="skin_type" name="skin_type" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="dry">Dry</option>
                              <option value="oily">Oily</option>
                              <option value="combination">Combination</option>
                              <option value="sensitive">Sensitive</option>
                          </select>
                      </div>

                      <!-- Question 2 -->
                      <div>
                          <label for="acne" class="block text-lg font-medium text-gray-700">How often do you experience acne or breakouts?</label>
                          <select id="acne" name="acne" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="never">Never</option>
                              <option value="rarely">Rarely</option>
                              <option value="occasionally">Occasionally</option>
                              <option value="frequently">Frequently</option>
                          </select>
                      </div>

                      <!-- Question 3 -->
                      <div>
                          <label for="redness" class="block text-lg font-medium text-gray-700">Do you notice redness or irritation on your skin?</label>
                          <select id="redness" name="redness" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                              <option value="occasionally">Occasionally</option>
                          </select>
                      </div>

                      <!-- Question 4 -->
                      <div>
                          <label for="dark_spots" class="block text-lg font-medium text-gray-700">Do you have visible dark spots or uneven skin tone?</label>
                          <select id="dark_spots" name="dark_spots" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                              <option value="slightly">Slightly</option>
                          </select>
                      </div>

                      <!-- Question 5 -->
                      <div>
                          <label for="dryness" class="block text-lg font-medium text-gray-700">Does your skin feel tight, dry, or flaky after washing?</label>
                          <select id="dryness" name="dryness" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                              <option value="occasionally">Occasionally</option>
                          </select>
                      </div>

                      <!-- Question 6 -->
                      <div>
                          <label for="large_pores" class="block text-lg font-medium text-gray-700">Do you have large or visible pores?</label>
                          <select id="large_pores" name="large_pores" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                              <option value="some">Only in some areas</option>
                          </select>
                      </div>

                      <!-- Question 7 -->
                      <div>
                          <label for="dullness" class="block text-lg font-medium text-gray-700">Does your skin appear dull or lack a natural glow?</label>
                          <select id="dullness" name="dullness" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                              <option value="occasionally">Occasionally</option>
                          </select>
                      </div>

                      <!-- Question 8 -->
                      <div>
                          <label for="wrinkles" class="block text-lg font-medium text-gray-700">Do you have fine lines or wrinkles on your skin?</label>
                          <select id="wrinkles" name="wrinkles" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                              <option value="slightly">Slightly</option>
                          </select>
                      </div>

                      <!-- Question 9 -->
                      <div>
                          <label for="water_intake" class="block text-lg font-medium text-gray-700">How many glasses of water do you drink daily?</label>
                          <select id="water_intake" name="water_intake" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                              <option value="less_than_4">Less than 4</option>
                              <option value="4-6">4-6</option>
                              <option value="6-8">6-8</option>
                              <option value="more_than_8">More than 8</option>
                          </select>
                      </div>

                      <!-- Add other questions similarly -->

                      <!-- Submit Button -->
                      <div class="text-center">
                          <button type="submit" class="bg-indigo-600 text-black font-bold py-2 px-4 rounded hover:bg-indigo-500 focus:outline-none">
                              Submit Quiz
                          </button>
                      </div>
                  </form>
                  {{-- <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-500 focus:outline-none">
                    <a href="{{ route('quiz.result', ['id' => Auth::id()]) }}" class="bg-indigo-600 text-black font-bold py-2 px-4 rounded hover:bg-indigo-500 focus:outline-none">
                      View Results
                    </a>
                  
                  </button> --}}
              </div>
          </div>
      </div>
  </div>

</x-app-layout>
