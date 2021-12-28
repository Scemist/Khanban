<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkeletonController extends Controller
{
    public function css () 
	{
		$any = file_get_contents(public_path('css/root.css'));
		echo $any;
		die;
	}

	public function js ()
	{
		echo 'okay js';
		die;
	}
}
