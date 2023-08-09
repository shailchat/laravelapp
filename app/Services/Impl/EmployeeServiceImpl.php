<?php

namespace App\Services\Impl;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\Project;
use App\Services\EmployeeService;
use App\Util\EmployeeUtitlity;
use Illuminate\Http\Request;

class EmployeeServiceImpl implements EmployeeService
{

    public function getAllEmployees()
    {
        $employees = Project::paginate(10);
        return $employees;
    }

    public function getEmployeeDetails($id)
    {
        return Project::where('id', $id)->firstOrFail();
    }


    public function saveEmployee(StoreEmployeeRequest $request)
    {
        // fetch the last id
        $lastEmployee = Project::orderBy('created_at', 'desc')->first();
        $employee = Employee::create([
            "name" => $request->name,
            "empId" => EmployeeUtitlity::generateEmployeeId($lastEmployee->id),
            "email" => $request->email,
            "joiningDate" => $request->joiningDate,
            "designation" => $request->designation,
            "role" => $request->role
        ]);

        return $employee;
    }

    public function deleteEmployee($id)
    {
        $employee = Project::where('id', $id)->firstOrFail();
        $employee->delete();
    }

    public function updateEmployees(Request $request, $id)
    {
        $employee = Project::where('id', $id)->firstOrFail();
        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->save();
    }
}
