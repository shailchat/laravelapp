<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllEmployees(){
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function showEmployeeAddForm(){

        return view('employees.addForm');
    }

    public function getEmployeeDetails($id){

        $employee = Employee::where('id', $id)->firstOrFail();

        return view('employees.single', compact('employee'));
    }

    // https://laravel.com/docs/10.x/validation#custom-validation-rules
    public function saveEmployee(StoreEmployeeRequest $request){

        return $request->all();

        // $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'author.name' => 'required',
        //     'author.description' => 'required',
        // ]);


        Employee::create([
            "name" => $request->name,
            "empId" => "emp",
            "email" => $request->email,
            "joiningDate" => $request->joiningDate,
            "designation" => $request->designation,
            "role" => $request->role
        ]);
        return back();
    }
}
