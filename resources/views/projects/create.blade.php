@extends('layouts.app')

@section('content')
    <form method="POST" action="/projects">
        @csrf

        <h1 class="title">
            Create Project
        </h1>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" />
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" placeholder="Description"></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
        <a class="btn btn-outline-dark" href="/projects">Cancel</a>
    </form>
@endsection