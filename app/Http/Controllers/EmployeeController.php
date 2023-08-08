<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeCreated;
use App\Models\Project;
use App\Http\Requests\StoreEmployeeRequest;
use App\Services\EmployeeService;
use App\Services\Impl\EmployeeServiceImpl;
use App\Util\EmployeeUtitlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{

    protected $empService;

    public function __construct(EmployeeServiceImpl $employeeService)
    {
        $this->empService = $employeeService;
    }

    public function getAllEmployees()
    {

        $employees = $this->empService->getAllEmployees();
        return view('employees.index', compact('employees'));
    }

    public function showEmployeeAddForm()
    {

        return view('employees.addForm');
    }

    public function getEmployeeDetails($id)
    {

        $employee = $this->empService->getEmployeeDetails($id);

        return view('employees.single', compact('employee'));
    }

    // https://laravel.com/docs/10.x/validation#custom-validation-rules
    public function saveEmployee(StoreEmployeeRequest $request)
    {


        // $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'author.name' => 'required',
        //     'author.description' => 'required',
        // ]);




        // save employee to db
        $employee = $this->empService->saveEmployee($request);

        Mail::to($employee->email)->send(new EmployeeCreated($employee));

        return back();
    }

    public function deleteEmployee($id)
    {

        $this->empService->deleteEmployee($id);

        return redirect('/employees');
    }

    public function getDeletedEmployees()
    {
        $employees = Project::onlyTrashed()->get();

        return view('employees.deleted', compact('employees'));
    }

    public function restoreEmployee($id)
    {
        $employee = Project::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->restore();

        return redirect('/employees');
    }

    public function forceDeleteEmployee($id)
    {
        $employee = Project::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->forceDelete();
        return redirect('/employees/deleted');
    }

    public function showEmployeeEditForm($id)
    {
        $employee = Project::where('id', $id)->firstOrFail();

        return view('employees.edit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {


        $this->empService->updateEmployees($request, $id);

        return redirect('/employees');


    }
}
