<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostActor extends Model
{
    use HasFactory;
    protected $table = 'post_actors';
    protected $fillable= ['post_id','actor_id','rolename','role']; 

       public function actor() {
        return $this->belongsTo('App\models\Actor');
    }
}
