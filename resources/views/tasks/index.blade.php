<x-app-layout>
    <x-slot name="header">

    
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-4xl mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-semibold text-center text-indigo-600">Your To-Do List</h1>

        
        <form action="{{ url('tasks') }}" method="POST" class="mt-6">
            @csrf
            <div class="flex items-center space-x-4">
                <input type="text" name="task" placeholder="Enter a new task" required 
                    class="flex-1 p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" 
                    class="px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Add Task</button>
            </div>
        </form>

       
        <h2 class="mt-8 text-2xl font-semibold text-indigo-600">Your Tasks</h2>
        <ul class="mt-4 space-y-4">
            @foreach ($tasks as $task)
                @if (!$task->completed)
                    <li class="flex items-center justify-between p-4 bg-gray-50 border-2 border-gray-200 rounded-lg hover:bg-gray-100">
                        <span class="text-lg text-gray-800">{{ $task->task }}</span>
                        
                        
                        <form action="{{ url('tasks/' . $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Mark as Done</button>
                        </form>

                       
                        <form action="{{ url('tasks/' . $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>

       
        <h2 class="mt-8 text-2xl font-semibold text-indigo-600">Completed Tasks</h2>
        <ul class="mt-4 space-y-4">
            @foreach ($tasks as $task)
                @if ($task->completed)
                    <li class="flex items-center justify-between p-4 bg-green-50 border-2 border-green-200 rounded-lg">
                        <span class="text-lg text-green-800">{{ $task->task }}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

</body>
</x-slot>
  
</x-app-layout>