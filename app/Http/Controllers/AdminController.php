<?php namespace App\Http\Controllers;

use App\Image;
use App\Banner;
use App\User;
use App\Negocio;
use App\Category;
use App\Evento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$negocios = Negocio::orderBy('created_at', 'DESC')->paginate(20);
		return View('admin.index', compact('negocios'));

	}

	public function editNegocio($id){
		
		$negocio = Negocio::find($id);

		$cats = [];
		$categories = [];
		$cats = Category::get(['id','name']);

		foreach ($cats as $cat) {
			$categories[$cat->id] = $cat->name;
		}

		return View('admin.negocio', compact('negocio', 'categories'));

	}

	public function updateNegocio(Request $request, $id){

		$negocio = Negocio::find($id);
		$negocio->nombre_negocio = $request->nombre_negocio;
		$negocio->descripcion = $request->descripcion;
		$negocio->categoria = $request->categoria;
		$negocio->correo = $request->email;
		$negocio->telefono = $request->telefono;
		$negocio->direccion = $request->direccion;
		$negocio->ciudad = $request->ciudad;
		$negocio->estado = $request->estado;
		$negocio->sitio_web = $request->sitio_web;
		$negocio->coords = $request->coords;
		$negocio->fb = $request->fb;
		$negocio->tw = $request->tw;
		$negocio->ig = $request->ig;
		$negocio->status = $request->status;
		$negocio->nombre_responsable = $request->nombre_responsable;
		$negocio->correo_responsable = $request->correo_responsable;
		$negocio->telefono_responsable = $request->telefono_responsable;

		if(is_null($request->file('image')) === false ){

			$image = $request->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$image = $image->move(public_path().'/images/negocios/', $filename);
			$negocio->logo = $filename;

		}

		if($request->file('images')[0]){
			$files = $request->file('images');
			$file_count = count($files);
			$uploadcount = 0;
			
			foreach($files as $file) {
				$destinationPath = 'uploads';
				$filename = time(). '-' . $uploadcount . '.' . $file->getClientOriginalExtension();
				$upload_success = $file->move(public_path().'/images/negocios/', $filename);
				
				$last_image = Image::create(['image'=>$filename]);
				$negocio->images()->attach($last_image);

				$uploadcount ++;
			}

			if($uploadcount != $file_count){
				
				return back()->withInput();
				\Session::flash('images_failed', 'Lo sentimos!<br>Alguna(s) imágen(es) no fueron subidas.');

			}
		}

		$negocio->save();
		\Session::flash('updated_successfuly', 'Los datos fueron actualizados con éxito.');

		return back();

	}

	public function deleteNegocio($id){
		$negocio = Negocio::find($id);
		$negocio->delete();
		return back();
	}

	public function users(){
		
		$users = User::paginate(20);

		return View('admin.users', compact('users'));
	}

	public function editUser($id){

		$user = User::find($id);
		
		return View('admin.user', compact('user'));

	}

	public function update(Request $request, $id){
		
		$user = User::with('roles')->find($id);
		$user->name = $request->name;
		$user->save();
		return back();

	}

	public function deleteUser($id){
		$user = User::find($id);
		$user->delete();
		return back();
	}

	public function categories(){
		
		$categories = Category::paginate(20);
		
		return View('admin.categories', compact('categories'));

	}

	public function createCategory(){
		
		return View('admin.create-category');

	}

	public function storeCategory(Request $request){
		
		$this->validate($request, ['name'=>'required']);
		$request->all();
		$category = New Category;
		$category->name = $request->name;
		$category->save();
		\Session::flash('added_successfuly', 'La categoría se agregó correctamente.');
		return back();

	}

	public function deleteCategory($id){
		$category = Category::find($id);
		$category->delete();
		return back();
	}

	public function editCategory($id){
		
		$category = Category::find($id);
		$categories = Category::all();
		$categoriesArray = [];

		return View('admin.category', compact('category', 'categories'));

	}

	public function updateCategory(Request $request, $id){
		
		$category = Category::find($id);
		$category->name = $request->name;

		dd($category->parent.' '.$request->parent);

		if ($category->parent != $category->parent) {
			$category->parent = $request->parent;
		}

		$category->save();
		return back();

	}

	public function banners(){
		
		$banners = Banner::orderBy('created_at', 'desc')->get();

		return View('admin.banners', compact('banners'));

	}

	public function createBanner(){
		return View('admin.create-banner');
	}

	public function storeBanner(Request $request){
		$this->validate($request, ['title'=>'required']);
		$request->all();
		$banner = New Banner;
		
		$banner->title = $request->title;
		$banner->description = $request->description;
		$banner->link = $request->link;
		$banner->place = $request->place;
		$banner->status = $request->status;

		if($request->file('image')){
			$image = $request->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$image = $image->move(public_path().'/images/banners/', $filename);
			$banner->imagen = $filename;
		}

		\Session::flash('added_successfuly', 'El banner se agregó correctamente.');
		$banner->save();

		return back();
	}

	public function editBanner($id){
		
		$banner = Banner::find($id);

		return View('admin.banner', compact('banner'));

	}

	public function updateBanner(Request $request, $id){
		
		$banner = Banner::find($id);
		$banner->title = $request->title;
		$banner->link = $request->link;
		$banner->place = $request->place;
		$banner->status = $request->status;
		$banner->description = $request->description;

		if( $request->file('imagen') ){

			$image = $request->file('imagen');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$image = $image->move(public_path().'/images/banners/', $filename);
			$banner->imagen = $filename;

		}

		$banner->save();

		return back();

	}

	public function deleteBanner($id){
		$banner = Banner::find($id);
		$banner->delete();
		return back();
	}

	public function eventos(){
		
		$eventos = Evento::orderBy('created_at', 'desc')->paginate(20);

		return View('admin.eventos', compact('eventos'));

	}

	public function storeEvento(Request $request)
	{
		
		$this->validate($request, ['title'=>'required']);

		$request->all();
		
		$evento = New Evento;
		
		$evento->title = $request->title;
		$evento->descripction = $request->descripction;
		$evento->link = $request->link;
		$evento->date = $request->date;
		$evento->status = $request->status;

		if($request->file('image')){
			$image = $request->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$image = $image->move(public_path().'/images/eventos/', $filename);
			$evento->image = $filename;
		}

		\Session::flash('added_successfuly', 'El evento se agregó exitosamente.');
		$evento->save();

		return back();

	}

	public function createEvento(){
		return View('eventos.create');
	}

	public function editEvento($id){
		
		$evento = Evento::find($id);
		return View('admin.evento', compact('evento'));

	}


	public function updateEvento(Request $request, $id){
		
		$evento = Evento::find($id);
		$evento->title = $request->title;
		$evento->descripction = $request->descripction;
		$evento->link = $request->link;
		$evento->status = $request->status;
		$evento->date = $request->date;

		if( $request->file('image') ){

			$image = $request->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$image = $image->move(public_path().'/images/eventos/', $filename);
			$evento->image = $filename;

		}

		$evento->save();

		return back();

	}

	public function deleteEvento($id){
		$evento = Evento::find($id);
		$evento->delete();
		return back();
	}

}
