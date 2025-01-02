<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Take the Quiz') }}
        </h2>
    </x-slot>
    <body class="bg-gray-50 font-sans">
      <div class="max-w-4xl mx-auto p-6">
        <div class="relative w-full h-96">
          <img alt="Close-up of a person applying skincare product on their face" class="absolute inset-0 w-full h-full object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/XamIBkdxCe2qJ6NsN7Bwdilp02AJWeBK5MxVFedgphSTBNCoA.jpg" width="800"/>
          <div class="absolute inset-0 bg-white bg-opacity-50 flex flex-col justify-center items-start p-8 md:p-16">
            <h1 class="text-black text-4xl md:text-6xl font-bold">
              SKIN
            </h1>
            <h1 class="text-black text-4xl md:text-6xl font-bold">
              DECODER QUIZ
            </h1>
            <p class="text-black text-lg md:text-xl mt-4">
              Need help finding out what to use?
            </p>
            <p class="text-black text-lg md:text-xl">
              Let's build your regimen
            </p>
          </div>
        </div>
        <form method="POST" action="{{ route('quiz.submit') }}" class="space-y-6">
          @csrf
          <div class="w-full max-w-4xl">
            <!-- Progress Bar -->
            <div class="relative">
                <div id="progress-bar" class="absolute top-0 left-0 w-0 h-2 bg-pink-300 transition-all duration-300"></div>
                <div class="w-full h-2 bg-gray-200"></div>
            </div>
        
            <!-- Step Navigation -->
            <div class="flex justify-between mt-4">
                <div id="step-basics" class="text-center cursor-pointer" onclick="showCategory('basics', 1)">
                    <div class="text-4xl text-gray-300">1</div>
                    <div class="text-black font-bold">BASICS</div>
                </div>
                <div id="step-skin" class="text-center cursor-pointer" onclick="showCategory('skin', 2)">
                    <div class="text-4xl text-gray-300">2</div>
                    <div class="text-black font-bold">SKIN</div>
                </div>
                <div id="step-environment" class="text-center cursor-pointer" onclick="showCategory('environment', 3)">
                    <div class="text-4xl text-gray-300">3</div>
                    <div class="text-gray-300 font-bold">ENVIRONMENT</div>
                </div>
                <div id="step-lifestyle" class="text-center cursor-pointer" onclick="showCategory('lifestyle', 4)">
                    <div class="text-4xl text-gray-300">4</div>
                    <div class="text-gray-300 font-bold">LIFESTYLE</div>
                </div>
                <div id="step-goals" class="text-center cursor-pointer" onclick="showCategory('goals', 5)">
                    <div class="text-4xl text-gray-300">5</div>
                    <div class="text-gray-300 font-bold">GOALS</div>
                </div>
            </div>
          </div>
          <div id="quiz-container" class="mt-8">
            <!-- Basics Category -->
            <div id="basics" class="category hidden">
              <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <label for="skin_type" class="block text-lg font-medium text-gray-700">How would you describe your skin type?</label>
                <select id="skin_type" name="skin_type" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="dry">Dry</option>
                  <option value="oily">Oily</option>
                  <option value="combination">Combination</option>
                  <option value="s ensitive">Sensitive</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="age" class="block text-lg font-medium text-gray-700">What is your age range?</label>
                <select id="age" name="age" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="under_20">Under 20</option>
                  <option value="20_30">20-30</option>
                  <option value="30_40">30-40</option>
                  <option value="over_40">Over 40</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="skin_concerns" class="block text-lg font-medium text-gray-700">What is your primary skin concern?</label>
                <select id="skin_concerns" name="skin_concerns" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="acne">Acne</option>
                  <option value="dryness">Dryness</option>
                  <option value="sensitivity">Sensitivity</option>
                  <option value="aging">Aging</option>
                </select>
              </div>
            </div>
            <!-- Skin Category -->
            <div id="skin" class="category hidden">
              <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <label for="acne" class="block text-lg font-medium text-gray-700">How often do you experience acne or breakouts?</label>
                <select id="acne" name="acne" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="never">Never</option>
                  <option value="rarely">Rarely</option>
                  <option value="occasionally">Occasionally</option>
                  <option value="frequently">Frequently</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="redness" class="block text-lg font-medium text-gray-700">Do you notice redness or irritation on your skin?</label>
                <select id="redness" name="redness" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="occasionally">Occasionally</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="dark_spots" class="block text-lg font-medium text-gray-700">Do you have visible dark spots or uneven skin tone?</label>
                <select id="dark_spots" name="dark_spots" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="slightly">Slightly</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="sensitivity" class="block text-lg font-medium text-gray-700">Does your skin react to new products?</label>
                <select id="sensitivity" name="sensitivity" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>
            <!-- Environment Category -->
            <div id="environment" class="category hidden">
              <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <label for="dryness" class="block text-lg font-medium text-gray-700">Does your skin feel tight, dry, or flaky after washing?</label>
                <select id="dryness " name="dryness" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="occasionally">Occasionally</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="large_pores" class="block text-lg font-medium text-gray-700">Do you have large or visible pores?</label>
                <select id="large_pores" name="large_pores" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="some">Only in some areas</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="sun_exposure" class="block text-lg font-medium text-gray-700">How often are you exposed to the sun?</label>
                <select id="sun_exposure" name="sun_exposure" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="daily">Daily</option>
                  <option value="weekly">Weekly</option>
                  <option value="rarely">Rarely</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div>
            <!-- Lifestyle Category -->
            <div id="lifestyle" class="category hidden">
              <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <label for="dullness" class="block text-lg font-medium text-gray-700">Does your skin appear dull or lack a natural glow?</label>
                <select id="dullness" name="dullness" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="occasionally">Occasionally</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="wrinkles" class="block text-lg font-medium text-gray-700">Do you have fine lines or wrinkles on your skin?</label>
                <select id="wrinkles" name="wrinkles" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="slightly">Slightly</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="stress" class="block text-lg font-medium text-gray-700">How would you rate your stress levels?</label>
                <select id="stress" name="stress" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="low">Low</option>
                  <option value="moderate">Moderate</option>
                  <option value="high">High</option>
                </select>
              </div>
            </div>
            <!-- Goals Category -->
            <div id="goals" class="category hidden">
              <div class="bg-white p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <label for="water_intake" class="block text-lg font-medium text-gray-700">How many glasses of water do you drink daily?</label>
                <select id="water_intake" name="water_intake" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="less_than_4">Less than 4</option>
                  <option value="4-6">4-6</option>
                  <option value="6-8">6-8</option>
                  <option value="more_than_8">More than 8</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="skincare_routine" class="block text-lg font-medium text-gray-700">How often do you follow a skincare routine?</label>
                <select id="skincare_routine" name="skincare_routine" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="never">Never</option>
                  <option value="occasionally">Occasionally</option>
                  <option value="daily">Daily</option>
                  <option value="twice_daily">Twice Daily</option>
                </select>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md mt-4 transition-transform transform hover:scale-105">
                <label for="sunscreen_use" class="block text-lg font-medium text-gray-700">Do you use sunscreen regularly?</label>
                <select id="sunscreen_use" name="sunscreen_use" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500">
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                  <option value="sometimes">Sometimes</option>
                </select>
              </div>
              <div class="text-center mt-6">
                <button type="submit" class="bg-pink-400 text-black font-bold py-2 px-4 rounded hover:bg-pink-500 focus:outline-none">
                  Submit Quiz
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <script>
        function showCategory(category, step) {
          document.querySelectorAll('.category').forEach(el => el.classList.add('hidden'));
          document.querySelectorAll('.flex-1').forEach(el => el.classList.remove('active-step'));
          document.getElementById(category).classList.remove('hidden');
          document.getElementById('step-' + category).classList.add('active-step');
  
          // Update progress bar
          const progressBar = document.getElementById('progress-bar');
          const totalSteps = 5; // Total number of steps
          const progressPercentage = (step / totalSteps) * 100;
          progressBar.style.width = progressPercentage + '%';
  
          // Update step colors
          for (let i = 1; i <= totalSteps; i++) {
            const stepElement = document.getElementById('step-' + (i === 1 ? 'basics' : i === 2 ? 'skin' : i === 3 ? 'environment' : i === 4 ? 'lifestyle' : 'goals'));
            if (i <= step) {
              stepElement.querySelector('div').classList.remove('text-gray-300');
              stepElement.querySelector('div').classList.add('text-pink-300');
            } else {
              stepElement.querySelector('div').classList.remove('text-pink-300');
              stepElement.querySelector('div').classList.add('text-gray-300');
            }
          }
        }
        // Show the first category by default
        showCategory('basics', 1);
      </script>
    </body>
</x-app-layout>