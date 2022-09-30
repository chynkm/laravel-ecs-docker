<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/q', 'App\Http\Controllers\SampleController@logIPthruQ');
Route::get('/s3', 'App\Http\Controllers\SampleController@createInS3');
Route::get('/rds', 'App\Http\Controllers\SampleController@createInRDS');
