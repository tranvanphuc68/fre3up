<?php

use App\Http\Controllers\Q\DetailQuizController;
use App\Http\Controllers\Q\QuizController;
use App\Http\Controllers\Q\ResultController;
use App\Http\Controllers\Process\DetailProcessController;
use App\Http\Controllers\Process\ProcessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [QuizController::class, 'get_CheckedQuiz']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
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
    Route::get('/review_quiz/{id}', [QuizController::class, 'review_quiz']);
    Route::get('/do_quiz/{id}', [DetailQuizController::class, 'do_quiz']);

    Route::get('/result/{id}', [ResultController::class, 'show_result']);
    Route::post('/result/quiz/{id}', [ResultController::class, 'check']);

    //Process
    Route::get('/process', [ProcessController::class, 'index']);
    Route::post('/process', [ProcessController::class, 'store']);
    Route::post('rename/process/{id}', [ProcessController::class, 'rename']);
    Route::post('/process/edit/{id}', [ProcessController::class, 'theme']);
    Route::delete('/process/{id}', [ProcessController::class, 'delete']);

    //Detail_process
    Route::get('/detail_process/{id_process}', [DetailProcessController::class, 'detail']);
    Route::post('/detail_process/{id_process}', [DetailProcessController::class, 'store']);
    Route::get('/detail_process/edit/{id_process}', [DetailProcessController::class, 'edit']);
    Route::put('/detail_process/edit/{id_process}', [DetailProcessController::class, 'update']);
    Route::post('/update/detail_process/{id_detail}',[DetailProcessController::class, 'updateStatus']);
    Route::delete('/delete/detail_process/{id}', [DetailProcessController::class, 'delete']);


    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/auth/user/profile', [UserController::class, 'profile']);
    Route::post('/update/profile', [UserController::class, 'update_profile']);
    Route::get('/duplicate/{id_process}', [UserController::class, 'duplicate']);

    Route::get('/search', [QuizController::class, 'get_CheckedQuiz']);
});



Route::middleware('admin')->group(function(){
    Route::get('/censorship', [QuizController::class, 'censorship']);
    Route::get('/censorship/{id}', [QuizController::class, 'censorship_ed']);
    Route::get('/eviction/{id}', [QuizController::class, 'eviction']);

});
