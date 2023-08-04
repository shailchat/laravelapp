<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function getallstudents(){
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function showstudentsaddform(){

        return view('students.addform');
    }

    public function getstudentdetails($id){

        $students = Student::where('id', $id)->firstOrFail();

        return view('students.single', compact('students'));
    }

    public function savestudents(storestudentrequest $request){

        Student::create([
            "studentname" => $request->studentname,
            "stfathername" => $request->stfathername,
            "studentdob" => $request->studentdob,
            "gender" => $request->gender,
            "telephone" => $request->telephone,
            "email" => $request->email
        ]);
        return back();
    }

    public function deletestudent($id){

        $students = Student::where('id', $id)->firstOrFail();
        $students->delete();

        return redirect('/students');
    }

    public function getdeletedstudents(){
        $students = Student::onlyTrashed()->get();

        return view('students.deleted', compact('students'));
    }

    public function restorestudents($id){
        $students = Student::where('id', $id)->onlyTrashed()->firstOrFail();
        $students->restore();

        return redirect('/students');
    }

    public function forcedeletestudents($id){
        $students = Student::where('id', $id)->onlyTrashed()->firstOrFail();
        $students->forceDelete();
        return redirect('/students/deleted');
    }

}
