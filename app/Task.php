<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task'];
    public function grupo()
    {
        return $this->hasOne('App\Task_Group', 'id', 'group_id');
    }
}
