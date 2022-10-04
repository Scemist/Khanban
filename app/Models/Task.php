<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

	public function column()
	{
		return $this->belongsTo(Column::class);
	}

	public function tag()
	{
		return $this->hasOne(Tag::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function subtasks()
	{
		return $this->hasMany(Subtask::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function owner()
	{
		return $this->hasOne(User::class, 'id', 'owner_id');
	}

	public function designated()
	{
		return $this->hasOne(User::class, 'id', 'designated_id');
	}
}
