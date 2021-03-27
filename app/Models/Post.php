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
}
