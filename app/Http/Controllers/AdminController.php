<?php namespace App\Http\Controllers;

use App\Image;
use App\User;
use App\Negocio;
use App\Category;
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

		return View('admin.negocio', compact('negocio'));

	}

	public function updateNegocio(Request $request, $id){

		$negocio = Negocio::find($id);
		$negocio->nombre_negocio = $request->nombre_negocio;
		$negocio->descripcion = $request->descripcion;
		$negocio->correo = $request->email;
		$negocio->telefono = $request->telefono;
		$negocio->direccion = $request->direccion;
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

	public function users(){
		
		$users = User::paginate(20);

		return View('admin.users', compact('users'));
	}

	public function editUser($id){

		$user = User::find($id);
		
		return View('admin.user', compact('user'));

	}

	public function update(Request $request, $id){
		
		// $user->update($request->except('_method', '_token', 'email'));
		
		$user = User::with('roles')->find($id);
		$user->name = $request->name;
		$user->save();
		
		return back();

	}

	public function categories(){
		
		$categories = Category::paginate(20);
		
		return View('admin.categories', compact('categories'));

	}

	public function editCategory($id){
		
		$category = Category::find($id);
		// $categoriesName = Category::get('name');
		// $categoriesId = Category::get('id');
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

}
