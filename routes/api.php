<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$controller_path = 'App\Http\Controllers';

Route::get('/news/{page?}', $controller_path . '\ApiController@newsList');
Route::get('/category', $controller_path . '\ApiController@categoryList');
Route::get('/category-news/{id}', $controller_path . '\ApiController@categoryNews');
Route::get('/news-slug/{slug}', $controller_path . '\ApiController@newsSlug');
