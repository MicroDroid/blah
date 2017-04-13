<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    /*
    
Route::get('/tasklists/{taskList}/tasks/{task}/subtasks', 'SubtaskController@index');
Route::get('/tasklists/{taskList}/tasks/{task}/subtasks/{subtask}', 'SubtaskController@get');
     */
    
    public function index($taskList, $task)
    {
        $list = Auth::user()->taskLists()->where('name', $taskList)->first();
        
        if (!$list)
            return response()->json([], 404);

        $task = $list->tasks()->where('index', $task)->first();

        if (!$task)
            return response()->json([], 404);

        return $task->subtasks;
    }

    public function get($taskList, $task, $subtask)
    {
        $list = Auth::user()->taskLists()->where('name', $taskList)->first();
        
        if (!$list)
            return response()->json([], 404);

        $task = $list->tasks()->where('index', $task)->first();

        if (!$task)
            return response()->json([], 404);

        return $task->subtasks()->where('index', $subtask)->first() ?: response()->json([], 404);
    }
}
