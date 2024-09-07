<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller {
    function StudentList(){
        return Student::all();
    }
}
