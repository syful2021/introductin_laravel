<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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
        $validator =validator::make($req->all(),[
            'name'=>['required', 'string', ],
            'roll'=>['required', 'numeric', 'digits:3' ],
            'reg'=>['required', 'numeric', "digits:6" ],
            'email'=>['required', 'email', 'unique:students,email'],
            'image'=>['required', 'image', 'mimes:jpeg,png,jpg,gif,webp','max:2048'],

        ]);
        if($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();
        }

        $insert = new Student();
        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store("students/$insert->id", 'public');
            $insert->image = $path;
        }



        $insert->name = $req->name;
        $insert->roll = $req->roll;
        $insert->registration = $req->reg;
        $insert->email = $req->email;
        $insert->save();

                                // ebar submit data dekhar jonne nicher code likhte hbe
        return redirect()->route('student.index')->with('success','Data Insert Successfully.');


    }
    function edit($id){
        $s['student'] = Student::findOrFail($id);

        return view('student.edit', $s);

        // $student = Student::findOrFail($id);
        // $s['student'] = Student::find($id);
        // $s['student'] = Student::where('id',$id)->first();  // ei 2 way data tulajay!!
    }

    function update(Request $req, $id){

        $validator =validator::make($req->all(),[
            'name'=>['required', 'string', ],
            'roll'=>['required', 'numeric', 'digits:3' ],
            'reg'=>['required', 'numeric', "digits:6" ],
            // 'email'=>['required', 'email', 'unique:students,email'],
            'image'=>['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp','max:2048'],

        ]);
        if($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();
        }


        $student = Student::findOrFail($id);

        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store("students", 'public');
            Storage::delete('public/'. $req->image);
            $student->image = $path;
        }


        $student->name = $req->name;
        $student->roll = $req->roll;
        $student->registration = $req->reg;
        $student->email = $req->email;
        // $student->updated_at = Carbon::now();
        $student->update();

        return redirect()->route('student.index')->with('success','Data Insert Successfully.');

    }

    // delete function

    function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->back();

    }
}

