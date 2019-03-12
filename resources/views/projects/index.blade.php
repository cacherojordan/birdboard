@extends('layouts.app')

@section('content')
    <div class="row align-items-end mb-2">
        <div class="col">
            <h5 class="text-black-50">Projects</h5>
        </div>
        <div class="col">
            <a href="/projects/create" class="btn btn-dark float-right">Create</a>
        </div>
    </div>

    <div class="row">
        @forelse($projects as $project)
            <div class="col-4 p-2">
                @include('projects.card')
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </div>
@endsection