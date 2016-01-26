<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View('pages.index');
	}
	
	public function nosotros()
	{
		return View('pages.nosotros');
	}
	
	public function inscribe()
	{
		return View('pages.inscribe');
	}
	
	public function aviso()
	{
		return View('pages.aviso');
	}


}
