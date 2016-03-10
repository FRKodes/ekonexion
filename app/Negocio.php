<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model {

	public function logo(){
		if ($this->logo) {
			return $this->logo;
		}
		return 'blank.jpg';
	}

	public function images(){
		
		return $this->belongsToMany('App\Image');

	}

}
