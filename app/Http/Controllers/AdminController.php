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
		$negocios = Negocio::paginate(5);

		return View('admin.index', compact('negocios'));
	}

	public function users(){
		
		$users = User::all();

		return View('admin.users', compact('users'));	
	}

	public function editUser($id){
		$user = User::find($id);
		return View('admin.user', compact('user'));
	}

}
