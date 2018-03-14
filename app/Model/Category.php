<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Question;


class Category extends Model
{
	protected $fillable = ['name', 'slug'];

	// // get detail category by using slug instead Id 
	public function getRouteKeyName()
	{
			return 'slug';
	}


	// public function questions(){
	// 	return $this->hasMany(Question::class);
	// }
}
