<?php namespace App\Http\Controllers;

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
		// $negocios = Negocio::all();
		$negocios = Negocio::paginate(20);

		return View('admin.index', compact('negocios'));

	}

	public function editNegocio($id){
		
		$negocio = Negocio::find($id);

		return View('admin.negocio', compact('negocio'));

	}

	public function updateNegocio(Request $request, Negocio $negocio){
		
		$negocio->update($request->except('_method', '_token'));

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

	public function update(Request $request, User $user){
		
		$user->update($request->except('_method', '_token', 'email'));

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
