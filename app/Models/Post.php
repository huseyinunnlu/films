<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'posts';
    protected $fillable=['title','slug','banner','desc','type','status','release_date','director','company'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate'=>true,
                'source' => 'title'
            ]
        ];
    }

    public function user() {
        return $this->review()->lastest()->get();
    }

    public function category(){
        return $this->hasMany('App\Models\PostCategory');
    }

    public function review(){
        return $this->hasMany('App\Models\Review')->whereNotIn('user_id',[auth()->user()->id]);
    }
    public function myreview(){
        return $this->hasMany('App\Models\Review')->whereIn('user_id',[auth()->user()->id]);
    }
    public function wreview(){
        return $this->hasMany('App\Models\Review')->where('type','1');
    }
}
