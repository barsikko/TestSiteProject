<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestBookController;

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

Route::get('/', [GuestBookController::class, 'index']);

Route::post('send', [GuestBookController::class, 'store'])->name('send');

Route::post('get_phone_list', [GuestBookController::class, 'getPhoneList'])
		->name('get_phone_list');
