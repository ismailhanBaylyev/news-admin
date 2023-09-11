<?php

use Illuminate\Support\Facades\Route;

$controller_path = 'App\Http\Controllers';

// Auth:
Route::get('/auth', $controller_path . '\Auth@index');
Route::post('/auth', $controller_path . '\Auth@auth');
Route::get('/logout', $controller_path . '\Auth@logout');

// Users:
// List
Route::get('/users/{name?}', $controller_path . '\User@listView')->middleware('valid')->name('users');
// Add
Route::get('/add-users', $controller_path . '\User@addView')->middleware('valid')->name('users');
Route::post('/add-users', $controller_path . '\User@addUser');
// Edit
Route::get('/edit-users/{id}', $controller_path . '\User@editView')->middleware('valid')->name('users');
Route::post('/edit-users/{id}', $controller_path . '\User@editUser');

// Category:
// List
Route::get('/category/{name?}', $controller_path . '\Categories@listView')->middleware('valid')->name('category');
Route::post('/sort-category', $controller_path . '\Categories@sortList');
// Add
Route::get('/add-category', $controller_path . '\Categories@addView')->middleware('valid')->name('category');
Route::post('/add-category', $controller_path . '\Categories@addCategory');
// Edit
Route::get('/edit-category/{id}', $controller_path . '\Categories@editView')->middleware('valid')->name('category');
Route::post('/edit-category/{id}', $controller_path . '\Categories@editCategory');

// News:
// List
Route::get('/news/{name?}', $controller_path . '\Newss@listView')->middleware('valid')->name('news');
Route::post('/sort-news', $controller_path . '\Newss@sortList');
// Add
Route::get('/add-news', $controller_path . '\Newss@addView')->middleware('valid')->name('news');
Route::post('/add-news', $controller_path . '\Newss@addNews');
// Edit
Route::get('/edit-news/{id}', $controller_path . '\Newss@editView')->middleware('valid')->name('news');
Route::post('/edit-news/{id}', $controller_path . '\Newss@editNews');

// Redirect
Route::get('/')->middleware('redirect');