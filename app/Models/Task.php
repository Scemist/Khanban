<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

	public function columns()
	{
		return $this->belongsTo(Column::class);
	}

	public function tags()
	{
		return $this->hasOne(Tag::class);
	}

	public function categories()
	{
		return $this->hasOne(Category::class);
	}

	public function subtasks()
	{
		return $this->hasMany(Subtask::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
