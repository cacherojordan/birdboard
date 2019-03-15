<?php

namespace App\Http\Controllers;

use App\Foundation\Redirect\RedirectInterface;
use App\Foundation\Validation\ValidatorInterface;
use App\Project;
use Illuminate\Contracts\View\Factory as ViewInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectsController extends Controller
{
    /**
     * Show the create form.
     *
     * @param \Illuminate\Contracts\View\Factory $view
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(ViewInterface $view): View
    {
        return $view->make('projects.create');
    }

    /**
     * List of all projects.
     *
     * @param \Illuminate\Contracts\View\Factory $view
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ViewInterface $view): View
    {
        $projects = $this->getAuthUser()->projects;

        return $view->make('projects.index', ['projects' => $projects]);
    }

    /**
     * Show a single project info.
     *
     * @param \Illuminate\Contracts\View\Factory $view
     * @param \App\Project $project
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(ViewInterface $view, Project $project): View
    {
        if ($this->getAuthUser()->isNot($project->owner)) {
            throw new NotFoundHttpException();
        }

        return $view->make('projects.show', ['project' => $project]);
    }

    /**
     * Store a validated project for a user.
     *
     * @param \App\Foundation\Redirect\RedirectInterface $redirect
     * @param \Illuminate\Http\Request $request
     * @param \App\Foundation\Validation\ValidatorInterface $validator
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        RedirectInterface $redirect,
        Request $request,
        ValidatorInterface $validator
    ): RedirectResponse {
        $attributes = $validator->validate($request->toArray(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        $this->getAuthUser()->projects()->create($attributes);

        return $redirect->to('/projects');
    }
}
