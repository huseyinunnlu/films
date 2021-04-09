<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MovieController;


Route::get('/', [MainController::class, 'index'])->whereNumber('id')->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::post('/contact/store', [MessageController::class, 'store'])->name('contact.store');
Route::get('/movies', [MovieController::class, 'movies'])->name('movies');
Route::post('/movies/filter', [MovieController::class, 'filter'])->name('movies.filter');
Route::get('/movies/{slug}', [MovieController::class, 'article'])->whereNumber('id')->name('movies.article');


Route::group(['middleware' => ['auth','verified']], function() {
	Route::get('/dashboard', function() {
		return view('dashboard');
	})->name('dashboard');
	Route::post('review/create', [MovieController::class, 'create'])->name('review.create');
	Route::get('review/{id}/destroy', [MovieController::class, 'destroy'])->name('review.destroy');
});


Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'adminpanel',], function() {
	Route::get('/', function(){return view('adminpanel.index');});
	/*Settings*/
	Route::get('/settings',[SettingsController::class, 'index'])->whereNumber('id')->name('settings');
	Route::get('/settings/edit/{id}',[SettingsController::class, 'edit'])->whereNumber('id')->name('settings.edit');
	Route::resource('settings',SettingsController::class);
	/*Social*/
	Route::resource('social', SettingsController::class);
	Route::get('/social/edit/{id}',[SettingsController::class, 'edit'])->whereNumber('id')->name('social.edit');
	/*Category*/
	Route::resource('category', CategoryController::class);
	Route::get('category/{id}/destroy', [CategoryController::class, 'destroy'])->whereNumber('id')->name('category.destroy');
	/*Actors*/
	Route::resource('actor', ActorController::class);
	Route::get('actor/{id}/destroy', [ActorController::class, 'destroy'])->whereNumber('id')->name('actor.destroy');
	/*Message*/
	Route::resource('message', MessageController::class);
	Route::get('message/{id}/destroy', [MessageController::class, 'destroy'])->whereNumber('id')->name('message.destroy');
	/*Gallery*/
	Route::get('post/{id}/gallery', [PostsController::class, 'galleryindex'])->whereNumber('id')->name('post.gallery');
	Route::post('post/{id}/gallery/create', [PostsController::class, 'gallerycreate'])->whereNumber('id')->name('post.gallery.create');
	Route::get('post/{post_id}/gallery/{id}/destroy', [PostsController::class, 'gallerydestroy'])->whereNumber('id')->name('post.gallery.destroy');
	/*Posts*/
	Route::resource('post', PostsController::class);
	Route::get('post/{id}/destroy', [PostsController::class, 'destroy'])->whereNumber('id')->name('post.destroy');
	/*Post-categories*/
	Route::get('post/{id}/categories', [PostsController::class, 'catindex'])->whereNumber('id')->name('post.categories');
	Route::post('post/{id}/category/create', [PostsController::class, 'catcreate'])->whereNumber('id')->name('post.category.create');
	Route::get('post/{id}/category/destroy', [PostsController::class, 'catdestroy'])->whereNumber('id')->name('post.category.destroy');
	/*Post-Actors*/
	Route::get('post/{id}/actors', [PostsController::class, 'actorindex'])->whereNumber('id')->name('post.actors');
	Route::post('post/{id}/actor/create', [PostsController::class, 'actorcreate'])->whereNumber('id')->name('post.actor.store');
	Route::get('post/{post_id}/postactor/{id}/destroy', [PostsController::class, 'actordestroy'])->whereNumber('id')->name('post.postactor.destroy');
});
