<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Egulias\EmailValidator\Warning\TLD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        //$tasks = Task::all();
        $tasks = Auth::user()->tasks;

        //dd($tasks);

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function store(TaskStoreRequest $request)
    {

        $task = Task::make();
        $task->name = $request->validated()['name'];


        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function status(Task $task)
    {
        $task->update(['is_done' => !$task->is_done]);

        return redirect()->route('tasks.index');
    }
}
