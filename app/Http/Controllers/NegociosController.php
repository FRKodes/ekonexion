<?php namespace App\Http\Controllers;

use Input;
// use Mail;
use App\Image;
use App\Negocio;
use App\Category;
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
		$cats = [];
		$categories = [];
		$cats = Category::get(['id','name']);

		foreach ($cats as $cat) {
			$categories[$cat->id] = $cat->name;
		}

		return View('negocios.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$messages = array(
			'nombre_negocio.required' => 'El nombre del negocio es obligatorio',
			'email.required' => 'El email del negocio es obligatorio',
			'telefono.required' => 'El teléfono del negocio es obligatorio',
			'nombre_responsable.required' => 'El nombre del responsable es obligatorio',
			'correo_responsable.required' => 'El email del responsable es obligatorio',
			'ciudad.required' => 'Debes especificar la ciudad',
			'telefono_responsable.required' => 'El teléfono del responsable es obligatorio',
			'image.required' => 'El logo del negocio es obligatorio'
			);
		$this->validate($request, ['nombre_negocio'=>'required', 
								   'email'=>'required', 
								   'telefono'=>'required', 
								   'nombre_responsable'=>'required', 
								   'correo_responsable'=>'required',
								   'ciudad'=>'required',
								   'telefono_responsable'=>'required',
								   'image'=>'required'
								   ], $messages);

		$request->all();
		
		$negocio = New Negocio;
		
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
		$negocio->nombre_responsable = $request->nombre_responsable;
		$negocio->correo_responsable = $request->correo_responsable;
		$negocio->telefono_responsable = $request->telefono_responsable;

		if($request->file('image')){
			// $image = $request->file('image');
			// $filename  = time() . '.' . $image->getClientOriginalExtension();
			// $image = $image->move(public_path().'/images/negocios/', $filename);
			// $negocio->logo = $filename;

			/**/
			$image = $request->file('image');
			$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time() . '.' . $image->getClientOriginalExtension();
			$s3 = \Storage::disk('s3');
			$filePath = '/negocios/' . $imageFileName;
			$s3->put($filePath, file_get_contents($image), 'public');
			$negocio->logo = '//s3.amazonaws.com/el-sendero-del-chaman/negocios/'.$imageFileName;
			/**/
		}

		\Session::flash('added_successfuly', 'GRACIAS!<br>El negocio se registró exitosamente. En breve nos pondremos en contacto con el encargado del negocio para verificar los datos.');
		
		/**
		 * Send an email if a new busniess was registered
		 */
		if ($negocio->save()) {
			// $data = ['name'=>$negocio->nombre_negocio, 'telefono'=>$negocio->telefono, 'correo'=>$negocio->correo];

			// Mail::send('emails.new-registered', $data, function($message){
			// 	$message->to('theshamanicjourney@gmail.com', 'frkalderon@gmail.com')->subject('Un nuevo negocio se ha registrado en el directorio');
			// });
		}


		if($request->file('images')[0]){
			$files = $request->file('images');
			$file_count = count($files);
			$uploadcount = 0;
			
			foreach($files as $file) {
				// $destinationPath = 'uploads';
				// $filename = time(). '-' . $uploadcount . '.' . $file->getClientOriginalExtension();
				// $upload_success = $file->move(public_path().'/images/negocios/', $filename);

				/**/
				$image = $file;
				$imageFileName = substr($_SERVER['HTTP_HOST'], 0,10).'-'.time().'-'. $uploadcount . '.' . $image->getClientOriginalExtension();
				$s3 = \Storage::disk('s3');
				$filePath = '/negocios/' . $imageFileName;
				$s3->put($filePath, file_get_contents($image), 'public');
				/**/
				
				$last_image = Image::create(['image'=>'//s3.amazonaws.com/el-sendero-del-chaman/negocios/'.$imageFileName]);
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
