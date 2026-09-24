<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display all tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => 'Pending',
            'due_date' => $request->due_date,
        ]);

        return redirect('/tasks');
    }

    // Show form to edit a task
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // Update the task in database
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status ?? $task->status,
            'due_date' => $request->due_date,
        ]);

        return redirect('/tasks');
    }

    // Delete task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks');
    }
}
