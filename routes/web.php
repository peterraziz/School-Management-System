<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Fees\FeeInvoicesController;
use App\Http\Controllers\Fees\FeesController;
use App\Http\Controllers\Fees\PaymentController;
use App\Http\Controllers\Fees\ProcessingFeeController;
use App\Http\Controllers\Fees\ReceiptStudentsController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Libraries\LibraryController;
use App\Http\Controllers\OnlineClasses\OnlineClassControllre;
use App\Http\Controllers\Parents\MyParentController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Permissions\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Quizzes\QuestionController;
use App\Http\Controllers\Quizzes\QuizController; 
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController; 
use App\Livewire\AddParent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', [HomeController::class, 'index'])->name('selection');


Route::get('/login/{type}',[LoginController::class,'loginForm'])->middleware('guest')->name('login.show');

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout/{type}',[LoginController::class,'logout'])->name('logout');


//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
], function(){  
//============================== Translate all pages ============================


//============================== dashboard ============================
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
//============================== dashboard ============================


// ================== Grades & Classes ==============
Route::resource('Grades', GradeController::class);
Route::resource('Classrooms', ClassroomController::class);
Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');////  
Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');
// ================== Grades & Classes ==============



// ================== Sections ==============
Route::resource('Sections', SectionController::class);

Route::get('/classes/{id}', [SectionController::class,'getclasses']);
// ================== Sections ==============



// ================== Parents Livewire ==============
Route::view('add_parent','livewire.show_Form')->name('add_parent'); //view takes me to the blade directly

Route::view('add_parentt', 'livewire.Parent_Table.blade')->name('add_parentt');
// ================== Parents Livewire ==============



// ================== Teachers ==============
Route::resource('Teachers', TeacherController::class);
// ================== Teachers ==============



// ================== Students ==============
Route::resource('Students', StudentController::class);

Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);

Route::get('/Get_Sections/{id}', [StudentController::class,'Get_Sections']);

Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');

Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class,'Download_attachment'])->name('Download_attachment');

Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');

// ----- Promotion 
Route::resource('Promotion', PromotionController::class);

// ----- Graduated
Route::resource('Graduated', GraduatedController::class);

// ================== Students ==============



// ================== Fees ==============
Route::resource('Fees', FeesController::class);

Route::resource('Fees_Invoices', FeeInvoicesController::class);

Route::resource('receipt_students', ReceiptStudentsController::class);

Route::resource('ProcessingFee', ProcessingFeeController::class);

Route::resource('Payment_students', PaymentController::class);
// ================== Fees ==============



// ================== Attendance ==============
Route::resource('Attendance', AttendanceController::class);

Route::post('attendance_edit', [AttendanceController::class,'edit'])->name('edit.attendancee');

Route::get('attendance_report2', [AttendanceController::class,'attendanceReport'])->name('attendance.report2');
Route::post('attendancesearch2', [AttendanceController::class,'attendanceSearch'])->name('attendance.search2');
// ================== Attendance ==============



// ================== Subjects ==============
Route::resource('subjects', SubjectController::class);
// ================== Subjects ==============



// ================== Quizzes ==============
Route::resource('Quizzes', QuizController::class);

Route::resource('questions', QuestionController::class);

Route::get('student_quiz2/{id}', [QuizController::class,'student_quiz2'])->name('student_quiz2');
Route::post('repeat_quiz2/{id}', [QuizController::class,'repeat_quiz2'])->name('repeat_quiz2');

// ================== Quizzes ==============



// ================== Online Classes ==============
Route::resource('online_classes', OnlineClassControllre::class);

Route::get('/indirect', [OnlineClassControllre::class, 'indirectCreate'])->name('indirect.create');
Route::post('/indirect', [OnlineClassControllre::class, 'storeIndirect'])->name('indirect.store');
Route::get('indirect/{id}/edit', [OnlineClassControllre::class, 'editIndirect'])->name('indirect.edit');
Route::put('indirect/{id}', [OnlineClassControllre::class, 'updateIndirect'])->name('indirect.update');
// ================== Online Classes ==============



// ================== Library ==============
Route::resource('library', LibraryController::class);

Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');
// ================== Library ==============



// ================== Settings ==============
Route::resource('settings', SettingsController::class);
// ================== Settings ==============


// ================== Profile ==============
Route::resource('admin_profile', ProfileController::class);
Route::resource('Admins', AdminController::class);
// ================== Profile ==============


// ================== permissions ============== 
Route::resource('roles',RoleController::class);
// ================== permissions ==============



}); 



