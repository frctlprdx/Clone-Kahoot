<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoundController;
use App\Filament\Pages\RoundSelectionPage;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\QuestionController;

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
Route::get('/signup', [SchoolsController::class, 'index'])->name('user.register');
Route::get('/dashboard', [RoundController::class, 'index'])->name('user.level');
Route::get('/popup', function () {
    return view('user.popup');
});

Route::get('/round/{id}/question/{index}', [QuestionController::class, 'showQuestion'])
    ->name('user.question');


Route::get('/leaderboard', function(){
    return view('user.leaderboard');
})->name('user.leaderboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [RoundController::class, 'index'])->name('user.level');
});