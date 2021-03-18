<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;

Route::get('/', function () {
	return view('frontend.index');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'adminpanel',], function() {
	Route::get('/', function(){return view('adminpanel.index');});
	Route::get('/settings',[SettingsController::class, 'index'])->whereNumber('id')->name('settings');
	Route::get('/settings/edit/{id}',[SettingsController::class, 'edit'])->whereNumber('id')->name('settings.edit');
	Route::resource('/settings', SettingsController::class);
});
