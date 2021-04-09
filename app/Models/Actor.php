<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Actor extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'actors';
    protected $fillable = ['image','name_surname','slug','birthdate'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate'=>true,
                'source' => 'name_surname'
            ]
        ];
    }


   
}
