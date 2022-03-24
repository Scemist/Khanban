<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	use HasFactory;

	public function columns()
	{
		return $this->hasMany(Column::class)->orderBy('position');
	}

	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	public function projectsettings()
	{
		return $this->hasMany(ProjectSetting::class);
	}
}
