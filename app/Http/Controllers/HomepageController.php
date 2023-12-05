<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('homepage.index', [
            'tasks' => $tasks,
        ]);
    }
}
