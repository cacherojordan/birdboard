<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectsController extends Controller
{
    /**
     * Show the create form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * List of all projects.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $projects = $this->getAuthUser()->projects;

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show a single project info.
     *
     * @param \App\Project $project
     *
     * @return \Illuminate\View\View
     */
    public function show(Project $project): View
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', ['project' => $project]);
    }

    /**
     * Store a validated project for a user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        auth()->user()->projects()->create($attributes);

        return redirect('/projects');
    }
}
