<?php namespace YC\Evo\Http\Controllers;

use YCMS\Modules\Routing\Controller;

class EvoController extends Controller {
	
	public function index()
	{
		return view('evo::index');
	}
	
}