<?php

namespace App\Services\Impl;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Services\EmployeeService;
use App\Services\ProjectService;
use App\Util\EmployeeUtitlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectServiceImpl implements ProjectService
{

    public function getAllProjects()
    {
        $projects = Project::with('user')->paginate(10);
        return $projects;
    }

    public function getProjectDetails($id)
    {
        return Project::where('id', $id)->firstOrFail();
    }


    public function saveProject(StoreProjectRequest $request)
    {
        return Project::create([
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => Auth::user()->id
        ]);
    }

    public function deleteProject($id)
    {
        $employee = Project::where('id', $id)->firstOrFail();
        $employee->delete();
    }

    public function updateProjects(Request $request, $id)
    {
        $employee = Project::where('id', $id)->firstOrFail();
        $employee->name = $request->name;
        $employee->description = $request->description;
        $employee->save();
    }
}
