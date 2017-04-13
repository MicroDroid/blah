<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($taskList)
    {
    	$list = Auth::user()->taskLists()->where('name', $taskList)->first();

    	return $list ? $list->tasks : response()->json([], 404);
    }

    public function get($taskList, $task)
    {
    	$list = Auth::user()->taskLists()->where('name', $taskList)->first();

    	return $list ? ($list->tasks()->where('index', $task)->first() ?: response()->json([], 404)) : response()->json([], 404);
    }
}
