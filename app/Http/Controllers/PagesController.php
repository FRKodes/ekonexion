<?php namespace App\Http\Controllers;

use DB;

use App\Negocio; /*Negocio Model*/
use App\Category;
use App\Banner;
use App\Evento;

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

		//Categories
		$categorias = Category::all();
		$selectCategorias = array();
		foreach($categorias as $category) {
		    $selectCategorias[$category->id] = $category->name;
		}
		
		$negocios = Negocio::where('status', 1)->orderBy('updated_at', 'desc')->get();
		
		$ciudades = DB::table('negocios')->orderBy('ciudad', 'asc')->distinct()->lists('ciudad');
		$ciudades_array = array();
		foreach ($ciudades as $ciudad => $value) {
			$ciudades_array[$value] = $value;
		}

		$banners_top = Banner::where('place', '=', 'home')->where('status', '=', 1)->get();

		return View('pages.index', compact('negocios', 'ciudades_array', 'selectCategorias', 'banners_top'));
	}
	
	public function nosotros()
	{
		$banners_top = Banner::where('place', '=', 'home')->where('status', '=', 1)->get();
		return View('pages.nosotros', compact('banners_top'));
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
		
		DB::enableQueryLog();
		
		$negocios = $ciudad 
					? Negocio::where('nombre_negocio', 'LIKE', "%$query%")
					->where('categoria', '=', $giro)
					->where('ciudad', '=', $ciudad)
					->where('status', 1)
					->paginate(20) 
					: Negocio::where('status', 1)->paginate(20);
				
		// dd(DB::getQueryLog());
		
		//Categories Stuff
		$categorias = Category::all();
		$selectCategorias = array();
		foreach($categorias as $category) {
		    $selectCategorias[$category->id] = $category->name;
		}
		
		$ciudades = DB::table('negocios')->orderBy('ciudad', 'asc')->distinct()->lists('ciudad');
		$ciudades_array = array();

		foreach ($ciudades as $ciudad => $value) {
			$ciudades_array[$value] = $value;
		}

		$banners_inner = Banner::where('place', '=', 'inner')->where('status', '=', 1)->get();

		return View('pages.search', compact('negocios', 'selectCategorias', 'ciudades_array', 'banners_inner'));
	}

	public function itemDetalle($id)
	{
		$negocio = Negocio::find($id);

		return View('pages.itemDetalle', compact('negocio'));
	}

	public function eventos(){

		$eventos = Evento::where('status', 1)->orderBy('date', 'asc')->get();

		return View('pages.eventos', compact('eventos'));

	}

}
