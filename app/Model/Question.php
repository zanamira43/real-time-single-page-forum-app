<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Category;
use App\Model\Reply;

class Question extends Model
{
	protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];

	// protected $guarded = [];

		// get detail question by using slug instead Id
		public function getRouteKeyName(){
			return 'slug';
		} 
		
		

		protected static function boot()
    {
        parent::boot();
        static::creating(function($question) {
            $question->slug = str_slug($question->title);
        });
    }

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
		 return "/question/$this->slug";
	 }
}
