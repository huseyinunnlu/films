<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostCategory extends Model
{
	use HasFactory;
	protected $table = 'post_categories';
	protected $fillable = ['post_id','cat_id'];
	
	public function categories(){
		return $this->hasMany('App\Models\Category');
	}

	
}
