<?php
public function index() {
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required',
        'description' => 'required'
    ]);

    Task::create($request->all());
    return response()->json(['success'=>'Task created successfully.']);
}

public function update(Request $request, Task $task) {
    $request->validate([
        'title' => 'required',
        'description' => 'required'
    ]);
    $task->update($request->all());
    return response()->json(['success'=>'Task updated successfully.']);
}

public function destroy(Task $task) {
    $task->delete();
    return response()->json(['success'=>'Task deleted successfully.']);
}
