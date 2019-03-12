<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    /**
     * Validate and store a project task.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Project $project)
    {
        $this->validator->validate($request->toArray(), ['body' => 'required']);

        $project->addTask($request->input('body'));

        return $this->redirect->to($project->path(), 201);
    }
}
