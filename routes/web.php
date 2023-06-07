<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clients','App\Http\Controllers\Admin\ClientController')->middleware('auth');;
Route::resource('subscriptions','App\Http\Controllers\Admin\SubscriptionController')->middleware('auth');;
Route::resource('diets','App\Http\Controllers\Admin\DietController')->middleware('auth');;
Route::resource('trainingSheets','App\Http\Controllers\Admin\TrainingSheetController')->middleware('auth');;
Route::resource('roles','App\Http\Controllers\Admin\RoleController')->middleware('auth');;
Route::resource('clientSubscriptions','App\Http\Controllers\Admin\ClientSubscriptionController')->middleware('auth');;
Route::resource('staff','App\Http\Controllers\Admin\StaffController')->middleware('auth');;

require __DIR__.'/auth.php';
