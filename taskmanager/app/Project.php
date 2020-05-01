<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function tasks() {
      // alternatively
      // App/Task
      return $this->hasMany(Task::class);
    }
}
