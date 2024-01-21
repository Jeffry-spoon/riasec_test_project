<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;

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
})->name('welcome');

// Quiz
Route::get('quiz', [QuizController::class, 'create'])->name('quiz.create');
Route::post('submit', [QuizController::class, 'store'])->name('quiz.store');



// User guide
Route::get('help', function () {
    return view('user.user-guide');
})->name('help');


Route::get('result', function () {
    return view('user.result');
})->name('result');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('register',[RegisterController::class, 'index']);
// Route::post('register',[RegisterController::class, 'store']);


require __DIR__.'/auth.php';
