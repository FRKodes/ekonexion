<?php namespace App\Http\Controllers;

use App\Negocio;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NegociosController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('negocios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// return $request->all();
		
		$negocio = New Negocio;
		
		$negocio->nombre_negocio = $request->nombre_negocio;
		$negocio->descripcion = $request->descripcion;
		$negocio->logo = $request->logo;
		$negocio->correo = $request->email;
		$negocio->telefono = $request->telefono;
		$negocio->direccion = $request->direccion;
		$negocio->sitio_web = $request->sitio_web;
		$negocio->coords = $request->coords;
		$negocio->fb = $request->fb;
		$negocio->tw = $request->tw;
		$negocio->ig = $request->ig;
		$negocio->nombre_responsable = $request->nombre_responsable;
		$negocio->correo_responsable = $request->correo_responsable;
		$negocio->telefono_responsable = $request->telefono_responsable;

		$negocio->save();

		return back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
