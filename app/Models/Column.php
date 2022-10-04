<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

	public function projects()
	{
		return $this->belongsTo(Project::class);
	}

	public function tasks()
	{
		return $this->hasMany(Task::class)->orderBy('position');
	}
}
