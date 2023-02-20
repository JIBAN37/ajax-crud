<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy('id','DESC')->get();
        return view('crud',compact('students'));
    }

    // ------------- store data --------- 
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
        ],[
            'name.required' => 'please input your name', 
        ]);

        Student::insert([
            'name' => $request->name,
            'roll' => $request->roll,
            'class' => $request->class,
        ]);

        return redirect()->back()->with('success','Successfully Data Added');
    }

    // ------------------ student edit -------------- 
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('edit',compact('student'));
    }

    // --------------- update student ----------- 
    public function update(Request $request,$id){
        Student::findOrFail($id)->update([
            'name' => $request->name,
            'roll' => $request->roll,
            'class' => $request->class,
        ]);

        return redirect()->to('/crud')->with('update','Successfully Data Updated');
    }


    // ----------------- studen destroy -------- 
    public function destroy($id){
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('delete','Successfully Data Deleted');
    }
}
