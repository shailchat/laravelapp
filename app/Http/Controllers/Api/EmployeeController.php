<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\Project;
use App\Util\EmployeeUtitlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{

    public function getAllEmployees(Request $request)
    {

        // validate query params
        $perPage = $request->perPage;
        $order = $request->order;
        $sortBy = $request->sortBy;
        $designation = $request->designation;

        $employees = new Employee();


        if($designation){
            $employees = $employees->getDevelopers($designation);
        }

        $employees = $employees->orderBy($sortBy, $order)
            ->paginate($perPage);
        return EmployeeResource::collection($employees);
    }


    public function saveEmployee(Request $request)
    {

//        $validator = \Validator::make($request->all(), [
//            'name'  => 'required',
//            'email' => 'required'
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json($validator->errors(), 422);
//        }


        Log::info("save Employee api called");

        $lastEmployee = Project::orderBy('created_at', 'desc')->first();

        $employee = Employee::create([
            "name"        => $request->name,
            "empId"       => EmployeeUtitlity::generateEmployeeId($lastEmployee->id),
            "email"       => $request->email,
            "joiningDate" => $request->joiningDate,
            "designation" => $request->designation,
            "role"        => $request->role
        ]);

        return new EmployeeResource($employee);

    }

    public function getAllEmployeeById($id)
    {
        $employee = Employee::where('id', $id)->first();

        if (!$employee) {

            return response()->json([
                "status"  => "error",
                "message" => "Employee not found"
            ], 404);
        }

        return $employee;
    }

}
