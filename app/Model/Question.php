<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Category;
use App\Model\Reply;

class Question extends Model
{
		// protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];

		

		// get detail question by using slug instead Id
		public function getRouteKeyName(){
			return 'slug';
		} 
		
		protected $guarded = [];

   public function user(){
		 return $this->belongsTo(User::class);
	 }

	 public function replies(){
		 return $this->hasMany(Reply::class);
	 }

	 public function category(){
		 return $this->belongsTo(Category::class);
	 }


	 // getting pasth in resource transform
	 public function getPathAttribute(){
		 return asset("api/question/$this->slug");
	 }
}
