<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TaskRequest;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->tasks->index(request()->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest|Request $request
     * @return \App\Task
     */
    public function store(TaskRequest $request)
    {
        return $this->tasks->store($request, $request->user());
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return \App\Task
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest|Request $request
     * @param Task $task
     * @return \App\Task
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        return $this->tasks->update($request, $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        return $this->tasks->destroy($task);
    }
}
