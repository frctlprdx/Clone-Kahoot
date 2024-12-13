<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoundController;
use App\Filament\Pages\RoundSelectionPage;
use App\Http\Controllers\SchoolsController;

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
    return view('user.welcome');
});

// Route::get('/view_kelas', [AdminController::class,'view_kelas']);
Route::get('/signin', [SchoolsController::class, 'index'])->name('user.login');
Route::get('/dashboard', [RoundController::class, 'index'])->name('user.level');
Route::get('/popup', function () {
    return view('user.popup');
});
Route::get('/question', function () {
    return view('user.question');
})->name('user.question');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [RoundController::class, 'index'])->name('user.level');
});