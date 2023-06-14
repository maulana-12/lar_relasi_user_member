<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Member\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/profile', function () {
})->middleware('verified');

Route::group(['middleware' => ['auth']], function () {
    route::get('/home', [HomeController::class, 'index'])->name('home');
    route::get('/user/register_member', [RegisterController::class, 'create'])->name('registerMember');
});
