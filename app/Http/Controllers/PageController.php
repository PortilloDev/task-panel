<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function tasks()
    {
        return view('tasks', [
            'tasks' => Task::with('user')->latest()->paginate()
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Task $task
     * @return void
     */
    public function task(Task $task)
    {
        return view('task', ['task' => $task]);
    }
}
