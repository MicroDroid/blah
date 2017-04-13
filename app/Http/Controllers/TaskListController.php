<?php

namespace App\Http\Controllers;

use App\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return $user->taskLists;
    }

    public function get($taskList)
    {
    	$list = Auth::user()->taskLists()->where('name', $taskList)->first();

    	return $list ?: response()->json([], 404);
    }
}
