<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    function index(){
        $s['students'] = Student::all();

        // return view('student.index', compact('students', 'admin'));
        // return view('student.index', [' students'=> $students, ]);

        return view('student.index',$s);
        
    }
    function create(){
        return view('student.create'); 
    }
    function store(Request $req){ 
        $insert = new Student(); 
        $insert->name = $req->name;
        $insert->roll = $req->roll;
        $insert->registration = $req->reg;
        $insert->email = $req->email;
        $insert->save();
  
                                // ebar submit data dekhar jonne nicher code likhte hbe
        return redirect()->route('student.index');
        
        
    }
    function edit($id){
        // $s['student'] = Student::findOrFail($id);

        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));

        // $s['student'] = Student::find($id);
        // $s['student'] = Student::where('id',$id)->first();  // ei 2 way data tulajay!! 
    }
}

