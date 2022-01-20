<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeCategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamGradeController;
use App\Http\Controllers\ExamMarkController;
use App\Http\Controllers\MarkDistributionController;
use App\Http\Controllers\MarkDistributionValueController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleController;
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
    return view('welcome');
});
Route::post('/result', [ResultController::class, 'result'])->name('result.see');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login',  [AuthController::class, 'login'])->name('login.post');


Route::group(['middleware'=>'auth'], function (){

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        //Dept
        Route::get('/departments',[DepartmentController::class, 'index'])->name('departments');
        Route::get('/departments/create',[DepartmentController::class, 'create'])->name('department.create');
        Route::post('/departments/create',[DepartmentController::class, 'store'])->name('department.store');
        Route::get('/departments/edit/{id}',[DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('/departments/update/{id}',[DepartmentController::class, 'update'])->name('department.update');
        Route::get('/departments/delete',[DepartmentController::class, 'destroy'])->name('department.delete');

        //Courses
        Route::get('/courses',[CourseController::class, 'index'])->name('courses');
        Route::get('/courses/create',[CourseController::class, 'create'])->name('course.create');
        Route::post('/courses/create',[CourseController::class, 'store'])->name('course.store');
        Route::get('/courses/update/{id}',[CourseController::class, 'edit'])->name('course.edit');
        Route::post('/courses/update/{id}',[CourseController::class, 'update'])->name('course.update');
        Route::get('/courses/delete}',[CourseController::class, 'destroy'])->name('course.delete');

        //Batches
        Route::get('/batches',[BatchController::class, 'index'])->name('batches');
        Route::get('/batches/create',[BatchController::class, 'create'])->name('batch.create');
        Route::post('/batches/create',[BatchController::class, 'store'])->name('batch.store');
        Route::get('/batches/update/{id}',[BatchController::class, 'edit'])->name('batch.edit');
        Route::post('/batches/update/{id}',[BatchController::class, 'update'])->name('batch.update');
        Route::get('/batches/delete',[BatchController::class, 'destroy'])->name('batch.delete');

        //Students
        Route::get('/students',[StudentController::class, 'index'])->name('students');
        Route::get('/students/create',[StudentController::class, 'create'])->name('student.create');
        Route::post('/students/create',[StudentController::class, 'store'])->name('student.store');
        Route::get('/students/update/{id}',[StudentController::class, 'edit'])->name('student.edit');
        Route::post('/students/update/{id}',[StudentController::class, 'update'])->name('student.update');
        Route::get('/students/delete',[StudentController::class, 'destroy'])->name('student.delete');

        //Grade Categories
        Route::get('/gradecategories',[GradeCategoryController::class, 'index'])->name('grade.categories');
        Route::get('/gradecategories/create',[GradeCategoryController::class, 'create'])->name('gc.create');
        Route::post('/gradecategories/create',[GradeCategoryController::class, 'store'])->name('gc.store');
        Route::get('/gradecategories/update/{id}',[GradeCategoryController::class, 'edit'])->name('gc.edit');
        Route::post('/gradecategories/update/{id}',[GradeCategoryController::class, 'update'])->name('gc.update');
        Route::get('/gradecategories/delete',[GradeCategoryController::class, 'destroy'])->name('gc.delete');

        //Mark Distribution
        Route::get('/markdistributions',[MarkDistributionController::class, 'index'])->name('mds');
        Route::get('/markdistributions/create',[MarkDistributionController::class, 'create'])->name('md.create');
        Route::post('/markdistributions/create',[MarkDistributionController::class, 'store'])->name('md.store');
        Route::get('/markdistributions/update/{id}',[MarkDistributionController::class, 'edit'])->name('md.edit');
        Route::post('/markdistributions/update/{id}',[MarkDistributionController::class, 'update'])->name('md.update');
        Route::get('/markdistributions/delete',[MarkDistributionController::class, 'destroy'])->name('md.delete');

        //Exam Grades
        Route::get('/grades',[ExamGradeController::class, 'index'])->name('grades');
        Route::get('/grades/create',[ExamGradeController::class, 'create'])->name('grade.create');
        Route::post('/grades/create',[ExamGradeController::class, 'store'])->name('grade.store');
        Route::get('/grades/update/{id}',[ExamGradeController::class, 'edit'])->name('grade.edit');
        Route::post('/grades/update/{id}',[ExamGradeController::class, 'update'])->name('grade.update');
        Route::get('/grades/delete',[ExamGradeController::class, 'destroy'])->name('grade.delete');

        //Exams
        Route::get('/exams',[ExamController::class, 'index'])->name('exams');
        Route::get('/exams/create',[ExamController::class, 'create'])->name('exam.create');
        Route::post('/exams/create',[ExamController::class, 'store'])->name('exam.store');
        Route::get('/exams/update/{id}',[ExamController::class, 'edit'])->name('exam.edit');
        Route::post('/exams/update/{id}',[ExamController::class, 'update'])->name('exam.update');
        Route::get('/exams/delete',[ExamController::class, 'destroy'])->name('exam.delete');
        Route::get('/exam/get-courses/{id}',[ExamController::class, 'getCourses']);
        Route::get('/exam/get-students/{id}',[ExamController::class, 'getStudents']);

        //Exam Marks
        Route::get('/marks',[ExamMarkController::class, 'index'])->name('marks');
        Route::post('/marks/input',[ExamMarkController::class, 'input'])->name('mark.input');
        Route::post('/marks/save',[ExamMarkController::class, 'save'])->name('mark.save');
        Route::get('/marks/update/{id}',[ExamMarkController::class, 'edit'])->name('mark.edit');
        Route::post('/marks/update/{id}',[ExamMarkController::class, 'update'])->name('mark.update');
        Route::get('/marks/delete',[ExamMarkController::class, 'destroy'])->name('mark.delete');

        //Exam Result
        Route::get('/results',[ResultController::class, 'index'])->name('results');
        Route::get('/results/view/{exam_id}',[ResultController::class, 'view'])->name('result.view');
        Route::get('/results/details/{id}',[ResultController::class, 'details'])->name('result.details');
        Route::post('/results/generate',[ResultController::class, 'generate'])->name('result.generate');

        Route::get('/present',[AttendanceController::class, 'toggle'])->name('attendance.take');
        Route::match(['get', 'post'],'/attendance',[AttendanceController::class, 'store'])->name('attendance');
        // Route::get('/attendance/update/{id}',[AttendanceController::class, 'edit'])->name('attendance.edit');
        // Route::post('/attendance/update/{id}',[AttendanceController::class, 'update'])->name('attendance.update');

        Route::get('/attendance/delete/{id}',[AttendanceController::class, 'destroy'])->name('attendance.delete');
        Route::get('/get-batches/{id}', function ($id) {
            return json_encode(App\Models\Batch::where('department_id', $id)->get());
        });
});

