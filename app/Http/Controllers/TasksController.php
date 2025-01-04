<?php
namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Users;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->get();  
        return view('tasks.index', compact('tasks'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        auth()->user()->tasks()->create([
            'task' => $request->task,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index');
    }

   
    public function markAsDone($id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        $task->update(['completed' => true]);

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
