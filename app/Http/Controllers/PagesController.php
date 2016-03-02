<?php namespace App\Http\Controllers;

use DB;

use App\Negocio; /*Negocio Model*/

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
		// $negocios = DB::table('negocios')->get();
		
		$negocios = Negocio::all();

		return View('pages.index', compact('negocios'));
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

	public function itemDetalle($id)
	{
		$negocio = Negocio::find($id);

		return View('pages.itemDetalle', compact('negocio'));
	}


}
