<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 26/01/2017
 * Time: 01:38 PM
 */

namespace App\Repositories;


use App\Http\Requests\TaskRequest;
use App\Task;
use App\User;

class TaskRepository
{
    public function index(User $user)
    {
        return $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
    }

    public function store(TaskRequest $request, User $user)
    {
        return $user->tasks()->save(new Task($request->all()));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return $task;
    }

    public function destroy(Task $task)
    {
        return $task->delete();
    }
}