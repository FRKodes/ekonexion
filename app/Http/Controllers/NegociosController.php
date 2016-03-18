<?php namespace App\Http\Controllers;

use Input;
use App\Image;
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
		
		$this->validate($request, ['nombre_negocio'=>'required', 
								   'email'=>'required', 
								   'telefono'=>'required', 
								   'nombre_responsable'=>'required', 
								   'correo_responsable'=>'required',
								   'ciudad'=>'required',
								   'telefono_responsable'=>'required' 
								   ]);

		$request->all();
		
		$negocio = New Negocio;
		
		$negocio->nombre_negocio = $request->nombre_negocio;
		$negocio->descripcion = $request->descripcion;
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
		$negocio->nombre_responsable = $request->nombre_responsable;
		$negocio->correo_responsable = $request->correo_responsable;
		$negocio->telefono_responsable = $request->telefono_responsable;

		if($request->file('image')){
			$image = $request->file('image');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$image = $image->move(public_path().'/images/negocios/', $filename);
			$negocio->logo = $filename;
		}

		\Session::flash('added_successfuly', 'GRACIAS!<br>El negocio se registró exitosamente. En breve nos pondremos en contacto con el encargado del negocio para verificar los datos.');
		$negocio->save();

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
