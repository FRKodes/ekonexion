<?php namespace App\Http\Controllers;

use DB;

use App\Negocio; /*Negocio Model*/
use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$redirect = \Session::get('redirect');
		\Session::set('redirect', null);

		if ($redirect) {
			return redirect($redirect);
		}
		
		$negocios = Negocio::where('status', 1)->get();

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

	public function search()
	{
		$giro = Request::get('giro');
		$query = Request::get('q');
		$ciudad = Request::get('ciudad');

		// $negocios = Negocio::whereNested(function($query, $query_, $giro, $ciudad)
	 //    {
		// 	if ($giro)
		// 		$query_->where('categoria', '=', $giro);

		// 	if ($ciudad) 
		// 		$query_->where('ciudad', '=', $ciudad);
			
		// 	if ($query)
		// 		$query_->where('nombre_negocio', 'LIKE', "%$query%");
	        
	 //    })->paginate(20);

		
		DB::enableQueryLog();
		
		$negocios = $query 
					? Negocio::where('nombre_negocio', 'LIKE', "%$query%")->where('status', 1)->paginate(20) 
					: Negocio::paginate(20);
				
		// dd(DB::getQueryLog());
		
		/*
		 * Categories Stuff
		 */
		$categorias = Category::all();
		$selectCategorias = array();
		foreach($categorias as $category) {
		    $selectCategorias[$category->id] = $category->name;
		}

		return View('pages.search', compact('query', 'giro', 'negocios', 'selectCategorias', 'matchThis'));
		// return View('pages.search', compact('query', 'negocios', 'selectCategorias'));
	}

	public function itemDetalle($id)
	{
		$negocio = Negocio::find($id);

		return View('pages.itemDetalle', compact('negocio'));
	}


}
