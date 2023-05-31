<?php

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



Route::resource('clients','App\Http\Controllers\Admin\ClientController');
Route::resource('subscriptions','App\Http\Controllers\Admin\SubscriptionController');
Route::resource('diets','App\Http\Controllers\Admin\DietController');
Route::resource('trainingSheets','App\Http\Controllers\Admin\TrainingSheetController');
Route::resource('roles','App\Http\Controllers\Admin\RoleController');
Route::resource('clientSubscriptions','App\Http\Controllers\Admin\ClientSubscriptionController');
Route::resource('staff','App\Http\Controllers\Admin\StaffController');
