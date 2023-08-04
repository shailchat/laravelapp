<?php

namespace App\Services;

use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\Request;

interface EmployeeService
{
    public function getAllEmployees();

    public function getEmployeeDetails($id);

    public function saveEmployee(StoreEmployeeRequest $request);

    public function deleteEmployee($id);

    public function updateEmployees(Request $request, $id);
}
