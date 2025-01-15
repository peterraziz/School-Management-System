<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\dashboard\ExamsController;
use App\Http\Controllers\Students\dashboard\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    });


    Route::resource('student_exams', ExamsController::class); 
    
    Route::resource('profile_student', ProfileController::class); 


});

