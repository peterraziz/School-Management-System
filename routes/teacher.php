<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teachers\dashboard\OnlineClassesController;
use App\Http\Controllers\Teachers\dashboard\ProfileController;
use App\Http\Controllers\Teachers\dashboard\QuestionController;
use App\Http\Controllers\Teachers\dashboard\QuizTeacherController;
use App\Http\Controllers\Teachers\dashboard\StudentController;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
    
        // elequent way
        // $teacher_id = auth()->user()->id;
        // $ids = Teacher::findorfail($teacher_id);
        $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id'); //Sections is a ralation
        $data ['sections_count'] = $ids->count();
        // to get the total number of students in the teachers sections
        $data ['students_count'] = Student::whereIn('section_id',$ids)->count(); // where in cause its more than 1 section
    
    
        // query builder way
        // $ids = DB::table('teacher_section_pivot')->where('teacher_id',auth()->user()->id)->pluck('section_id');
        // $sections_count =  $ids->count();
        // $students_count = DB::table('students')->whereIn('section_id',$ids)->count();
        
        return view('pages.Teachers.dashboard.dashboard', $data);
    });


    Route::get('student', [StudentController::class,'index'])->name('Student.index');
    
    Route::get('sections', [StudentController::class,'sections'])->name('sections');
    
    Route::post('attendance', [StudentController::class,'attendance'])->name('attendance');
    
    Route::post('edit_attendance', [StudentController::class,'editAttendance'])->name('attendance.edit');
    
    Route::get('attendance_report', [StudentController::class,'attendanceReport'])->name('attendance.report');
    
    Route::post('attendancesearch', [StudentController::class,'attendanceSearch'])->name('attendance.search');


    // ================== Quizzes ==============
    Route::resource('QuizzesTeacher', QuizTeacherController::class);
    
    Route::get('/Get_classrooms2/{id}', [QuizTeacherController::class,'getClassrooms']);
    Route::get('/Get_Sections2/{id}', [QuizTeacherController::class,'Get_Sections']);
    
    Route::resource('questions2', QuestionController::class);

    Route::get('student_quiz/{id}', [QuizTeacherController::class,'student_quiz'])->name('student_quiz');
    Route::post('repeat_quiz/{id}', [QuizTeacherController::class,'repeat_quiz'])->name('repeat_quiz');
    Route::get('student_answer', [QuizTeacherController::class,'student_answer'])->name('student_answer');
    // ================== Quizzes ==============
    
    
    // ================== Online Classes ==============
    Route::resource('online_zoom_classes', OnlineClassesController::class);
    
    Route::get('/indirect2', [OnlineClassesController::class, 'indirectCreate'])->name('indirect.teacher.create');
    Route::post('/indirect2', [OnlineClassesController::class, 'storeIndirect'])->name('indirect.teacher.store');
    Route::get('indirect2/{id}/edit', [OnlineClassesController::class, 'editIndirect'])->name('indirect.teacher.edit');
    Route::put('indirect2/{id}', [OnlineClassesController::class, 'updateIndirect'])->name('indirect.teacher.update');
    // ================== Online Classes ==============



    // ================== Profile ==============
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.show');
    Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    // ================== Profile ==============

    
});

