<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller {
    function StudentList() {
        return Student::all();
    }

    function addStudent( Request $request ) {
        $rules = array(
            'name' => 'required | min:2 | max:10',
            'email'=> 'email | required',
            'phone'=> 'required'
        );
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return $validator->errors();
        } else {
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;

            if ( $student->save() ) {
                return "Student Added";
            } else {
                return "Operation Failed";
            }
        }
    }

    function updateStudent( Request $request ) {
        $student = Student::find( $request->id );
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        if ( $student->save() ) {
            return "Student Updated";
        } else {
            return "Operation Failed";
        }
    }

    function deleteStudent( $id ) {
        $student = Student::destroy( $id );
        if ( $student ) {
            return "Student Record Deleted";
        } else {
            return "Student Record Not Deleted";
        }
    }

    function searchStudent( $name ) {
        $student = Student::where( 'name', 'like', "%$name%" )->get();
        if ( $student ) {
            return array("result" => $student);
        } else {
            return array("result" => "No Record Found");
        }
    }
}
