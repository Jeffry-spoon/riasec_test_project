<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ResultController;
use App\Http\Middleware\RegisteredMiddleware;

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
//
// Route::get('quiz', [QuizController::class, 'create'])->name('quiz.create')->middleware(RegisteredMiddleware::class);

// Route::get('quiz', [QuizController::class, 'create'])->name('quiz.create');


 // Result
// Route::get('result', [ResultController::class, 'show'])->name('result.show');

// User guide
Route::get('help', function () {
    return view('user.user-guide');
})->name('help');

Route::middleware('registered')->group(function () {
    // Quiz
    Route::get('quiz', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('quiz', [QuizController::class, 'store'])->name('quiz.store');

    // Result
    Route::get('result', [ResultController::class, 'show'])->name('result.show');

});

require __DIR__.'/auth.php';