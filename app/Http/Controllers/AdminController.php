<?php namespace App\Http\Controllers;

use App\User;
use App\Negocio;
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
		$negocios = Negocio::paginate(15);

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
		
		$users = User::paginate(15);

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

}
