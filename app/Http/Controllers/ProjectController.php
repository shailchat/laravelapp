<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Models\User;
use App\Services\Impl\ProjectServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectServiceImpl $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getAllProjects()
    {

        $projects = $this->projectService->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    public function showProjectAddForm()
    {

        return view('projects.addForm');
    }

    public function getEmployeeDetails($id)
    {

        $employee = $this->projectService->getEmployeeDetails($id);

        return view('projects.single', compact('employee'));
    }

    public function saveProjects(StoreProjectRequest $request)
    {
        $this->projectService->saveProject($request);

        return redirect("/projects");
    }

    public function deleteEmployee($id)
    {
        $this->projectService->deleteEmployee($id);

        return redirect('/projects');
    }

    public function getDeletedProjects()
    {
        $projects = Project::onlyTrashed()->get();

        return view('projects.deleted', compact('projects'));
    }

    public function restoreProject($id)
    {
        $employee = Project::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->restore();

        return redirect('/projects');
    }

    public function forceDeleteProject($id)
    {
        $employee = Project::where('id', $id)->onlyTrashed()->firstOrFail();
        $employee->forceDelete();
        return redirect('/projects/deleted');
    }

    public function showProjectsEditForm($id)
    {
        $project = Project::where('id', $id)->firstOrFail();

        return view('projects.edit', compact('project'));
    }

    public function updateProjects(Request $request, $id)
    {

        $project = Project::where('id', $id)->firstOrFail();

//        if (! Gate::allows('update-project', $project)) {
//            abort(403);
//        }

        $user = User::where('id', 9)->firstOrFail();
        auth()->login($user);

        if (!Auth::user()->can('update', $project)) {
            return abort(403);
        }

        $this->projectService->updateProjects($request, $id);
        return redirect('/projects');
    }
}
