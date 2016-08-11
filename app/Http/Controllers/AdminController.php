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

		if ($request->images_to_delete) {
			
			$images = explode(',', $request->images_to_delete);
			array_shift($images);
			
 			foreach ($images as $image) {
 				$slice = explode('@', $image);
 				$image_path = explode('/', $slice[1]);
 				$image_name = array_pop($image_path);
 				$image_id = $slice[0];
 				$s3_image_path = str_replace('//', '', $slice[1]);
				$s3_slices = explode('el-sendero-del-chaman/', $slice[1]);
				$image_to_delete = (isset($s3_slices[1])) ? $s3_slices[1] : 'NULL.jpg';
 				$s3 = \Storage::disk('s3');
	
				if($s3->exists($image_to_delete))
					$s3->delete($image_to_delete);

 				$negocio->images()->detach($image_id);
 			}
			
		}

		// if(is_null($request->file('image')) === false ){
		// 	$image = $request->file('image');
		// 	$filename  = time() . '.' . $image->getClientOriginalExtension();
		// 	$image = $image->move(public_path().'/images/negocios/', $filename);
		// 	$negocio->logo = $filename;
		// }

		if(is_null($request->file('image')) === false ){
			$image = $request->file('image');
			$imageFileName = time() . '.' . $image->getClientOriginalExtension();
			$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.$imageFileName;
			$s3 = \Storage::disk('s3');
			$filePath = '/negocios/' . $imageFileName;
			$s3->put($filePath, file_get_contents($image), 'public');
			$negocio->logo = '//s3.amazonaws.com/el-sendero-del-chaman/negocios/'.$imageFileName;
		}

		if($request->file('images')[0]){
			$files = $request->file('images');
			$file_count = count($files);
			$uploadcount = 0;
			
			foreach($files as $file) {
				$filename = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time(). '-' . $uploadcount . '.' . $file->getClientOriginalExtension();
				$image = $file;
				$s3 = \Storage::disk('s3');
				$filePath = '/negocios/' . $filename;
				$s3->put($filePath, file_get_contents($image), 'public');
				/**/
				
				$last_image = Image::create(['image'=>'//s3.amazonaws.com/el-sendero-del-chaman/negocios/'.$filename]);
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

		$images = $negocio->images;

		foreach ($images as $image) {
 			$s3 = \Storage::disk('s3');
			$s3_slices = explode('el-sendero-del-chaman/', $image->image);
			$image_to_delete = (isset($s3_slices[1])) ? $s3_slices[1] : 'NULL.jpg';

			if($s3->exists($image_to_delete))
				$s3->delete($image_to_delete);

			$negocio->images()->detach($image->id);
			$image = Image::find($image->id);
			$image->delete();
		}

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

		// if($request->file('image')){
		// 	$image = $request->file('image');
		// 	$filename  = time() . '.' . $image->getClientOriginalExtension();
		// 	$image = $image->move(public_path().'/images/banners/', $filename);
		// 	$banner->imagen = $filename;
		// }

		if($request->file('image')){
			$image = $request->file('image');
			$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time() . '.' . $image->getClientOriginalExtension();
			$s3 = \Storage::disk('s3');
			$filePath = '/banners/' . $imageFileName;
			$s3->put($filePath, file_get_contents($image), 'public');
			$banner->imagen = '//s3.amazonaws.com/el-sendero-del-chaman/banners/'.$imageFileName;
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

		// if( $request->file('imagen') ){
		// 	$image = $request->file('imagen');
		// 	$filename  = time() . '.' . $image->getClientOriginalExtension();
		// 	$image = $image->move(public_path().'/images/banners/', $filename);
		// 	$banner->imagen = $filename;
		// }

		if($request->file('imagen')){
			$image = $request->file('imagen');
			$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time() . '.' . $image->getClientOriginalExtension();
			$s3 = \Storage::disk('s3');
			$filePath = '/banners/' . $imageFileName;
			$s3->put($filePath, file_get_contents($image), 'public');
			$banner->imagen = '//s3.amazonaws.com/el-sendero-del-chaman/banners/'.$imageFileName;
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

		// if($request->file('image')){
		// 	$image = $request->file('image');
		// 	$filename  = time() . '.' . $image->getClientOriginalExtension();
		// 	$image = $image->move(public_path().'/images/eventos/', $filename);
		// 	$evento->image = $filename;
		// }
		
		if($request->file('image')){
			$image = $request->file('image');
			$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time() . '.' . $image->getClientOriginalExtension();
			$s3 = \Storage::disk('s3');
			$filePath = '/eventos/' . $imageFileName;
			$s3->put($filePath, file_get_contents($image), 'public');
			$evento->image = $imageFileName;
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

		// if( $request->file('image') ){
		// 	$image = $request->file('image');
		// 	$filename  = time() . '.' . $image->getClientOriginalExtension();
		// 	$image = $image->move(public_path().'/images/eventos/', $filename);
		// 	$evento->image = $filename;
		// }

		if($request->file('image')){
			$image = $request->file('image');
			$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time() . '.' . $image->getClientOriginalExtension();
			$s3 = \Storage::disk('s3');
			$filePath = '/eventos/' . $imageFileName;
			$s3->put($filePath, file_get_contents($image), 'public');
			$evento->image = $imageFileName;
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
