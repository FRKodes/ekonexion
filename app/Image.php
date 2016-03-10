<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $fillable = ['image'];

	public function negocio(){
		
		return $this->belongsTo('App\Negocio');

	}

}
