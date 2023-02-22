<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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


Route::get('/crud',[StudentController::class,'index']);
Route::post('/student/store',[StudentController::class,'store']);
Route::get('/student/edit/{student_id}',[StudentController::class,'edit']);
Route::post('/student/update/{student_id}',[StudentController::class,'update']);
Route::get('/student/destroy/{student_id}',[StudentController::class,'destroy']);

Route::get('/ajax',[AjaxController::class,'index']);
Route::get('/teacher/all',[AjaxController::class,'allData']);
Route::post('/teacher/store',[AjaxController::class,'storeData']);
Route::get('/teacher/edit/{id}',[AjaxController::class,'editData']);
Route::PATCH('/teacher/update/{id}',[AjaxController::class,'updateData']);
Route::get('/teacher/destroy/{id}',[AjaxController::class,'deleteData']);



