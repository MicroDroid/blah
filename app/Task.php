<?php

namespace App;

use App\Subtask;
use App\TaskList;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function subtasks()
    {
    	return $this->hasMany(Subtask::class);
    }

    public function taskList()
    {
    	return $this->belongsTo(TaskList::class);
    }
}
