<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return view('frontend.index');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'adminpanel',], function() {
	
});
