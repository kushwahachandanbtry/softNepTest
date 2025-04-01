<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('show', compact('tasks'));
    }

    public function add()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);


        return redirect('task.show')->with('status', 'Task created successfully');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('task.show')->with('status', 'Task updated successfully.');
    }

    public function updateStatus($id)
    {
        $task = Task::find($id);
        $task->status = !$task->status;
        $task->save();

        return redirect()->back()->with('status', 'Task status updated successfully.');
    }

}
