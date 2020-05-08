<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_Group extends Model
{
    protected $table = 'task_group';
    public function task()
    {
        return $this->belongsTo('App\Task', 'id', 'group_id');
    }
}
