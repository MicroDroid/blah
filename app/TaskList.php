<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
