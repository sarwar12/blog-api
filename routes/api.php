<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MemberController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/test", function(){
    return ["name"=>"Golam Sarwar", "channel"=>"Learn with GSarwar"];
});

Route::get('students', [StudentController::class, 'StudentList']);
Route::post('add', [StudentController::class, 'addStudent']);  
Route::put('update', [StudentController::class, 'updateStudent']);  
Route::delete('delete/{id}', [StudentController::class, 'deleteStudent']);  
Route::get('search/{name}', [StudentController::class, 'searchStudent']);  
Route::resource('member', MemberController::class);