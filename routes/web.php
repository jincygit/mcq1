<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontoller;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Usercontroller;

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

//show home 
Route::get('/', function () {
    return view('home');
});
//show login
Route::get('/login', function () {
    return view('login');
});
Route::post('/register', [Usercontroller::class, 'register']);
Route::get('/get_users', [Usercontroller::class, 'list_users']);
Route::post('/login', [Usercontroller::class, 'login']);
Route::get('/logout', [Usercontroller::class, 'logout']);
Route::get('/dashboard', [Usercontroller::class, 'dashboard']);










