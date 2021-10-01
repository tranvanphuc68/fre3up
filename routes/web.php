<?php

use App\Http\Controllers\Q\DetailQuizController;
use App\Http\Controllers\Q\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [QuizController::class, 'getAll']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index']);
    Route::post('/quiz', [QuizController::class, 'store']);
    Route::delete('/quiz/{id}', [QuizController::class, 'delete']);


    Route::get('/detail_quiz/{id}', [DetailQuizController::class, 'create']);
    Route::post('/detail_quiz/{id}', [DetailQuizController::class, 'store']);
    Route::get('/detail_quiz/edit/{id}', [DetailQuizController::class, 'edit']);
    Route::put('/detail_quiz/edit/{id}', [DetailQuizController::class, 'update']);
    Route::get('/do_quiz/{id}', [DetailQuizController::class, 'do_quiz']);
});
