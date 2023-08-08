<?php

namespace App\Services;

use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;

interface ProjectService
{
    public function getAllProjects();

    public function getProjectDetails($id);

    public function saveProject(StoreProjectRequest $request);

    public function deleteProject($id);

    public function updateProjects(Request $request, $id);
}
