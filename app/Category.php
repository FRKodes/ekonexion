<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function getName(){
		
		return $this->name;

	}

}
