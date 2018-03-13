<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;
use App\Like;

class Reply extends Model
{
    public function user(){
			return $this->belongsTo(User::class);
		}

		public function question(){
			return $this->belongsTo(Question::class);
		}

		public function like(){
			return $this->hasMany(Like::class);
		}
}
