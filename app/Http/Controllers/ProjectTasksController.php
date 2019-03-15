<?php

namespace App\Http\Controllers;

use App\Foundation\Redirect\RedirectInterface;
use App\Foundation\Validation\ValidatorInterface;
use App\Project;
use Illuminate\Http\RedirectResponse;
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
    public function store(
        Project $project,
        RedirectInterface $redirect,
        Request $request,
        ValidatorInterface $validator
    ): RedirectResponse {
        $attribute = $validator->validate($request->toArray(), ['body' => 'required']);

        $project->addTask($attribute);

        return $redirect->to($project->path(), 201);
    }
}
