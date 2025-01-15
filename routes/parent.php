<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parents\dashboard\ProfileController;
use App\Http\Controllers\Parents\dashboard\SonsController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

    //==============================dashboard============================
    Route::get('/parent/dashboard', function () {

        $sons = Student::where('parent_id', auth()->user()->id)->get();
        return view('livewire.dashboard_parents.dashboard', compact('sons'));
    });

    // Route::get('student_quiz/{id}', [SonsController::class,'student_quiz'])->name('student_quiz');
    Route::resource('sons', SonsController::class);
    Route::get('results/{id}', [SonsController::class,'results'])->name('sons.results');
    
    Route::get('attendances', [SonsController::class,'attendances'])->name('sons.attendances');
    Route::post('attendances2', [SonsController::class,'search'])->name('sons_attendances.search');
    
    Route::get('fees2', [SonsController::class,'fees'])->name('sons.fees');
    Route::get('receipt/{id}', [SonsController::class,'receipt'])->name('sons.receipt');
    
    Route::resource('profile_parent', ProfileController::class); 

});

