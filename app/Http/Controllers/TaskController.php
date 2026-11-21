<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Events\TaskCreated;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(
            Task::paginate(10)
        );
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

        TaskCreated::dispatch($task);

        return new TaskResource($task);
    }

    public function show(Request $request, Task $task)
    {
        $task->load('project');

        if ($request->query('include') === 'comments') {
            $task->load('comments');
        }

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Task deleted'
        ]);
    }
}