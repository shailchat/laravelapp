<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Util\EmployeeUtitlity;
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


        // $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'author.name' => 'required',
        //     'author.description' => 'required',
        // ]);


        // fetch the last id
        $lastEmployee = Employee::orderBy('created_at', 'desc')->first();

        // save employee to db
        Employee::create([
            "name" => $request->name,
            "empId" => EmployeeUtitlity::generateEmployeeId($lastEmployee->id),
            "email" => $request->email,
            "joiningDate" => $request->joiningDate,
            "designation" => $request->designation,
            "role" => $request->role
        ]);
        return back();
    }

    public function deleteEmployee($id){

        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->delete();

        return redirect('/employees');
    }

    public function getDeletedEmployees(){
        $employees = Employee::onlyTrashed()->get();

        return view('employees.deleted', compact('employees'));
    }

    public function restoreEmployee($id){
        $employee = Employee::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->restore();

        return redirect('/employees');
    }

    public function forceDeleteEmployee($id){
        $employee = Employee::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->forceDelete();
        return redirect('/employees/deleted');
    }

    public function showEmployeeEditForm($id){
        $employee = Employee::where('id', $id)->firstOrFail();

        return view('employees.edit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id){


        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->save();

        return redirect('/employees');


    }
}
