<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_actors', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('post_id');
         $table->unsignedBigInteger('actor_id');
         $table->string('rolename');
         $table->enum('role',['lead','supporting','bit','cameo','extras','stunt']);
         $table->timestamps();
         $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
         $table->foreign('actor_id')->references('id')->on('actors')->onUpdate('cascade')->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_actors');
    }
}
