<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
	use Sluggable;
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['title','slug','status'];
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
