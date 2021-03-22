<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\MainController;

Route::get('/',[MainController::class, 'index'])->whereNumber('id')->name('index');

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');

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
});
