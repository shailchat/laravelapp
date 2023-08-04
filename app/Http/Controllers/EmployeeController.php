<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Services\EmployeeService;
use App\Services\Impl\EmployeeServiceImpl;
use App\Util\EmployeeUtitlity;
use Illuminate\Http\Request;

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
        $this->empService->saveEmployee($request);
        return back();
    }

    public function deleteEmployee($id)
    {

        $this->empService->deleteEmployee($id);

        return redirect('/employees');
    }

    public function getDeletedEmployees()
    {
        $employees = Employee::onlyTrashed()->get();

        return view('employees.deleted', compact('employees'));
    }

    public function restoreEmployee($id)
    {
        $employee = Employee::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->restore();

        return redirect('/employees');
    }

    public function forceDeleteEmployee($id)
    {
        $employee = Employee::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->forceDelete();
        return redirect('/employees/deleted');
    }

    public function showEmployeeEditForm($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();

        return view('employees.edit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {


        $this->empService->updateEmployees($request, $id);

        return redirect('/employees');


    }
}
