@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0" style="background: #f8fafc;">
                    <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
                    <li class="breadcrumb-item active">{{ $project->title }}</li>
                </ol>
            </nav>
        </div>
        <div class="col">
            {{--<a href="/projects/create" class="btn btn-dark float-right">Create</a>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="mb-4">
                <h5 class="text-black-50">Tasks</h5>
                @foreach ($project->tasks as $task)
                    <div class="card card-body p-3 mb-2">
                        <p class="card-text">{{ $task->body }}</p>
                    </div>
                @endforeach
            </div>

            <div>
                <h5 class="text-black-50">General Notes</h5>
                <textarea class="form-control w-100" style="height: 200px;"></textarea>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $project->title }}
                    </h5>
                    <p class="card-text text-black-50">{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection