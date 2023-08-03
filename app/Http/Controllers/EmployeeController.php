<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function getAllEmployees(){
        $employees = \App\Models\Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function showEmployeeAddForm(){

        return view('employees.addForm');
    }

    public function getEmployeeDetails($id){

        $employee = Employee::where('id', $id)->firstOrFail();

        return view('employees.single', compact('employee'));
    }
}
